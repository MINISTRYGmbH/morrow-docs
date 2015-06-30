<?php

$modules = [
	'~^page/~i' => [
		'post' => [
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Pages\\Detail',
				'selector' => '#content',
			],
		],
	],
	'~^class/~i' => [
		'post' => [
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Classes\\Detail',
				'selector' => '#content',
			],
		],
	],
	'~.+~i' => [
		'post' => [
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Pages\\Navigation',
				'selector' => '#sidebar',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Classes\\Navigation',
				'selector' => '#sidebar',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Pages\\Changelog',
				'selector' => '#navbar-right',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Classes\\Visibility',
				'selector' => '#navbar-right',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Disqus\\Discussion',
				'config'   => ['disqus_shortname' => 'm3framework'],
				'selector' => '#content',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Pages\\SEO',
				'selector' => '#content',
			],
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Tracking_GoogleAnalytics\\Snippet',
				'config'   => ['id' => 'UA-57282967-1'],
				'selector' => 'body',
			],
			/*
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Pages\\Error404',
				'config'   => ['if_does_not_exist' => '//*[@id="content"]/*'],
				'selector' => '#content',
			],
			*/
		],
	],
	'~^page/features$~i' => [
		'post' => [
			[
				'action'   => 'append',
				'class'    => '\\app\\modules\\Time\\Simple',
				'config'   => ['seconds' => true],
				'selector' => '#content h2:nth-child(7)+p',
			],
		],
	],
];

/* modify here
********************************************************************************************/
foreach($modules as $regex => $module){
	// ... modify here
}

return $modules;
