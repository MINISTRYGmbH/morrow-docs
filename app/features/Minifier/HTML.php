<?php

namespace app\features\Minifier;
use Morrow\Factory;
use Morrow\Debug;

class HTML extends _Default {
	public function run($dom) {
		Factory::load('View:feature')->setHandler('plain');

		Factory::load('Event')->on('core.after_view_creation', function($e, $handle){
			rewind($handle);
			$content = stream_get_contents($handle);

			// remove whitespace
			$regex = '%# Collapse whitespace everywhere but in blacklisted elements.
				(?>             # Match all whitespans other than single space.
				[^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
				| \s{2,}        # or two or more consecutive-any-whitespace.
				) # Note: The remaining regex consumes no text at all...
				(?=             # Ensure we are not in a blacklist tag.
				[^<]*+        # Either zero or more non-"<" {normal*}
				(?:           # Begin {(special normal*)*} construct
				<           # or a < starting a non-blacklist tag.
				(?!/?(?:textarea|pre|script)\b)
				[^<]*+      # more non-"<" {normal*}
				)*+           # Finish "unrolling-the-loop"
				(?:           # Begin alternation group.
				<           # Either a blacklist start tag.
				(?>textarea|pre|script)\b
						| \z          # or end of file.
				)             # End alternation group.
				)  # If we made it here, we are not in a blacklist tag.
				%Six';
			 
			$content = preg_replace($regex, " ", $content);

			// remove comments (but not conditional)
			//$content = preg_replace('/<!--(?!\[if).*?-->/', '', $content);
			$content = preg_replace('/(<head.*)<!--(?!\[if).*?-->/', '$1', $content);

			// remote quotes around attributes
			$content = preg_replace('/([a-z0-9-_])="([^ =]+?)"/i', '$1=$2', $content);

			ftruncate($handle, 0);
			fwrite($handle, $content);
			return $handle;
		});
	}
}