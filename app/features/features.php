<?php

$features = [
	'~^page/~i' => [
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Pages\\Detail'],
		],
	],
	'~^class/~i' => [
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Classes\\Detail'],
		],
	],
	'~.+~i' => [
		'#sidebar' => [
			['action' => 'append', 'class' => '\\app\\features\\Pages\\Navigation'],
			['action' => 'append', 'class' => '\\app\\features\\Classes\\Navigation'],
		],
		'#navbar-right' => [
			['action' => 'append', 'class' => '\\app\\features\\Pages\\Changelog'],
			['action' => 'append', 'class' => '\\app\\features\\Classes\\Visibility'],
		],
		'#content' => [
			['action' => 'append', 'class' => '\\app\\features\\Pages\\Error404', 'config' => ['if_does_not_exist' => '//*[@id="content"]/*']],
			['action' => 'append', 'class' => '\\app\\features\\Disqus\\Discussion', 'config' => ['disqus_shortname' => 'm3framework']],
			['action' => 'append', 'class' => '\\app\\features\\Pages\\SEO'],
		],
	],
	'~^page/features$~i' => [
		'#content h2:nth-child(7)+p' => [
			['action' => 'append', 'class' => '\\app\\features\\Time\\Simple', 'config' => ['seconds' => true]],
		],
	],
];

foreach ($features as $regex => $feature) {
	// ... modify here
}

return $features;
