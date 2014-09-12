<?php

namespace app\features\Disqus;
use Morrow\Factory;
use Morrow\Debug;

class Discussion extends _Default {
	public function run($dom) {
		$config	= $this->config->get('app.features.disqus');
		
		$view = Factory::load('View:view-feature');
		$view->setContent('config', $config);
	}
}