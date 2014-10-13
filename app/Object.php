<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Object extends _Default {
	public function run() {
		$class = '\\' . str_replace('/', '\\', $this->Input->get('routed.path'));
		$class = new \Docblock($class);
		$this->Views_Serpent->setContent('class', $class->get());
		
		return $this->Views_Serpent;
	}
}