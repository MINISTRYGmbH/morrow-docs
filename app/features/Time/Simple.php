<?php

namespace app\features\Time;
use Morrow\Factory;
use Morrow\Debug;

class Simple extends _Default {
	public function run($dom) {
		$time	= new Models\Time;

		$seconds	= Factory::load('Config:feature')->get('seconds');
		$view		= Factory::load('Views\Serpent:feature');
		$view->setContent('seconds', $seconds);

		$dom->append('body', '<script src="features/Time/public/default.js" />');

		return $view;
	}
}