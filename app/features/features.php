<?php

$features = [
	'~^(object|page)~i' => [
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Disqus\\Discussion'],
		],
		'html' => [
			['action' => 'append', 'class' => '\\app\\features\\Minifier\\HTML'],
		],
	],
];

foreach ($features as $regex => $feature) {
	// ... modify here
}

return $features;