<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Object extends _Default {
	public function run() {
		$class = '\\' . str_replace('/', '\\', $this->input->get('routed.path'));
		$class = new \Docblock($class);
		$this->view->setContent('class', $class->get());
	}
}