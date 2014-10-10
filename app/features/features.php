<?php

$features = [
	'~^.+~i' => [
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Disqus\\Discussion', 'config' => ['disqus_shortname' => 'm3framework']],
		],
		'' => [
			['action' => 'append', 'class' => '\\app\\features\\Minifier\\HTML'],
		],
	],
	'~^(feature/time)~i' => [
		'#content p:first-child' => [
			['action' => 'prepend', 'class' => '\\app\\features\\Time\\Simple', 'config' => ['seconds' => true]],
		],
	],
];

foreach ($features as $regex => $feature) {
	// ... modify here
}

return $features;