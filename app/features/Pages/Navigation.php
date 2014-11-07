<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Navigation extends _Default {
	public function run($dom) {
		// append the javascript to the page
		$dom->before('#collapse-plugin', '<script src="features/Pages/public/default.js" />');

		$view = Factory::load('Views\Serpent');
		return $view;
	}
}