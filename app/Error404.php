<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Error404 extends _Default {
	public function run() {
		$this->header->set('HTTP/1.0 404 Not Found');

		return $this->view;
	}
}