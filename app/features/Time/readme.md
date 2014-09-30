Time
=====

This is just an example feature you can use to get a feeling for the construction of features.
It just displays a clock.
And only on this page you will see that clock on the right side of this paragraph.

You will find its code in the folder `app/features/`.


Available Feature Controllers
------------------------------

* \app\feature\Time\Simple

Configuration
-------------

Type   | Keyname                | Default    | Description                                                              
-----  | ---------              | ---------  | ------------                                                             
boolean | `seconds`     | `false`     | Should seconds be shown or not.


Example
--------

~~~{.php}
<?php

$features = [
	'~^.*~i' => [
		'#content p:first-child' => [
			[
				'action' => 'append',
				'class' => '\\app\\features\\Time\\Simple',
				'config' => [
					'seconds' => true
				]
			],
		],
	],
];

?>
~~~