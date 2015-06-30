<?php

namespace app\modules\Time;
use Morrow\Factory;
use Morrow\Debug;

class Simple extends _Default {
	public function run($dom) {
		$view = new \Morrow\Views\Serpent;

		// get the current server time and pass it to the template
		$time		= new models\Time;
		$view->setContent('time', $time->get());

		// pass to the template if we want to put seconds or not
		$seconds	= $this->Config->get('modules.Time.seconds');
		$view->setContent('seconds', $seconds);

		// append the javascript to the page
		$dom->append('body', '<script async="async" src="Time/public/default.js" />');

		return $view;
	}
}
