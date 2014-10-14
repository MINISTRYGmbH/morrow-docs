<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Navigation extends _Default {
	public function run($dom) {
		$view = Factory::load('Views\Serpent');
		return $view;
	}
}