Disqus
=============

This feature adds a Disqus discusssion box.

Available Feature Controllers
------------------------------

* \app\feature\Disqus\Discussion

Configuration
-------------

At the moment it is only possible to set the Disqus shortname you will get at the registration process.

Type   | Keyname                | Default    | Description
-----  | ---------              | ---------  | ------------
string | `disqus_shortname`     | `ENTER YOUR SHORTNAME`     | Enter here the disqus_shortname you have got at registration.


Example
--------

~~~{.php}
<?php

$features = [
	'~^.*~i' => [
		'#content' => [
			[
				'action' => 'append',
				'class' => '\\app\\modules\\Disqus\\Discussion',
				'config' => [
					'disqus_shortname' => 'm3framework'
				]
			],
		],
	],
];

?>
~~~
