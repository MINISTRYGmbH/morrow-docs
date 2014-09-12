<?php

return array(
	'~^(object|page)~i' => array(
		'#content' => array(
			array('append' => '\\app\\features\\Disqus\\Discussion'),
		),
		'' => array(
			array('append' => '\\app\\features\\Minifier\\HTML'),
		),
	),
);
