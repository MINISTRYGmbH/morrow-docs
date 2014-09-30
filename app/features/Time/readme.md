Time
=====

This is just an example feature you can use to get a feeling for the construction of features.
It display just a clock.

You will find it in the folder `app/features/`.


Available Feature Controllers
------------------------------

* \app\feature\Time\Simple

Configuration
-------------

Type   | Keyname                | Default    | Description                                                              
-----  | ---------              | ---------  | ------------                                                             
string | `format`     | `%x %X`     | Sets the display format


Example
--------

~~~{.php}
<?php

$features = [
	'~^.*~i' => [
		'#content' => [
			[
				'action' => 'append',
				'class' => '\\app\\features\\Time\\Simple',
				'config' => [
					'format' => '%y-%m-%d'
				]
			],
		],
	],
];

?>
~~~