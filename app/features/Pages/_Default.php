<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class _Default extends Factory {
	public function __construct() {
		// the path to the morrow framework
		$this->_core_path		= VENDOR_PATH . 'morrow/core/';
	}
}
