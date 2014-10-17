<?php

namespace app\features\Disqus;
use Morrow\Factory;
use Morrow\Debug;

class Discussion extends _Default {
	public function run($dom) {
		$config	= Factory::load('Config:feature')->get();
		
		$view = Factory::load('Views\Serpent');
		$view->setContent('config', $config);

		$dom->append('body', '<script src="features/Disqus/public/feature_disqus.js"></script>');

		return $view;
	}
}