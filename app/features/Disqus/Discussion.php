<?php

namespace app\features\Disqus;
use Morrow\Factory;
use Morrow\Debug;

class Discussion extends _Default {
	public function run($dom) {
		$config	= Factory::load('Config:feature')->get();
		
		$view = Factory::load('Views\Serpent:feature');
		$view->setContent('config', $config);

		return $view;
	}
}