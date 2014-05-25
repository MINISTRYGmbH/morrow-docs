<?php

namespace App;
use Morrow\Factory;
use Morrow\Debug;

class PageController extends DefaultController {
	public function run() {
		$class = '\\' . str_replace('/', '\\', $this->input->get('routed.path'));
		$class = new \Docblock($class);
		$this->view->setContent('class', $class->get());
	}
}