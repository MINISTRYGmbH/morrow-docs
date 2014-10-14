<?php

namespace app\features\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$class = '\\' . implode('\\', array_slice($this->Page->get('nodes'), 1));
		$class = new \Docblock($class);
		$this->Views_Serpent->setContent('class', $class->get());

		return $this->Views_Serpent;
	}
}