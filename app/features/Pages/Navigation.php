<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Navigation extends _Default {
	public function run($dom) {
		$view = new \Morrow\Views\Serpent;
		$view->mappings = [
			'markdown' => '\\Michelf\\MarkdownExtra::defaultTransform',
		];

		// append the javascript to the page
		$dom->before('#collapse-plugin', '<script src="features/Pages/public/default.js" />');

		return $view;
	}
}