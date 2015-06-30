<?php

namespace app\modules\Disqus;
use Morrow\Factory;
use Morrow\Debug;

class Discussion extends _Default {
	public function run($dom) {
		$view = new \Morrow\Views\Serpent;
		$view->setContent('config', $this->Config->get('modules.Disqus'));

		$dom->append('body', '<script src="Disqus/public/feature_disqus.js"></script>');

		return $view;
	}
}
