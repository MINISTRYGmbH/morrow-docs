<?php

namespace app\features\Time;
use Morrow\Factory;
use Morrow\Debug;

class Simple extends _Default {
	public function run($dom) {
		$time		= new Models\Time;

		$seconds	= Factory::load('Config:feature')->get('seconds');
		$this->Views_Serpent->setContent('seconds', $seconds);

		$dom->append('body', '<script src="features/Time/public/default.js" />');

		return $this->Views_Serpent;
	}
}