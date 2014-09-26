<?php

$features = [
	'~^(object|page)~i' => [
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Disqus\\Discussion', 'config' => ['disqus_shortname' => 'm3framework']],
		],
		'html' => [
			//['action' => 'append', 'class' => '\\app\\features\\Minifier\\HTML'],
		],
	],
];

foreach ($features as $regex => $feature) {
	// ... modify here
}

return $features;