<?php

namespace app\modules\_main;
use Morrow\Factory;
use Morrow\Debug;

class _Default extends Factory {
	public function __construct() {
		if ($this->Page->get('path.relative') === '') {
			$this->Url->redirect('page/introduction');
		}
	}

	// edit rendered markdown blocks
	public static function markdown($content) {
		$content = \Michelf\MarkdownExtra::defaultTransform($content);

		// change table formatting
		$content = str_replace('<table>', '<table class="table table-striped table-condensed">', $content);

		// add syntax highlighter
		$content = preg_replace('|<pre><code class="([a-z]+?)">|s', '<pre><code class="language-$1">', $content);

		// auto link classes
		$content = preg_replace_callback('|(.\\\\[A-Z][\\\\A-Za-z0-9_]+)|s', function($match){
			if($match[0]{0} === '\\'){
				return substr($match[0], 1);
			}
			$url = Factory::load('Url')->create('class/');
			$url .= str_replace('\\', '/', $match[0]);

			return '<a href="'.$url.'">'.$match[0].'</a>';
		}, $content);

		return $content;
	}
}
