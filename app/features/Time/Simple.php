<?php

namespace app\features\Time;
use Morrow\Factory;
use Morrow\Debug;

class Simple extends _Default {
	public function run($dom) {
		// get the current server time and pass it to the template
		$time		= new models\Time;
		$this->Views_Serpent->setContent('time', $time->get());
		
		// pass to the template if we want to put seconds or not
		$seconds	= Factory::load('Config:feature')->get('seconds');
		$this->Views_Serpent->setContent('seconds', $seconds);

		// append the javascript to the page
		$dom->append('body', '<script async="async" src="features/Time/public/default.js" />');

		return $this->Views_Serpent;
	}
}