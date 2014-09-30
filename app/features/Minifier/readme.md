Minifier
=============

This feature shrinks minifies the requested page.

Available Feature Controllers
------------------------------

* \app\feature\Minifier\HTML

Configuration
-------------

There are no configuration parameters available

Example
--------

~~~{.php}
<?php

$features = [
	'~^.*~i' => [
		'' => [
			[
				'action' => 'append',
				'class' => '\\app\\features\\Minifier\\HTML',
			],
		],
	],
];

?>
~~~