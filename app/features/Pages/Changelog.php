<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Changelog extends _Default {
	public function run($dom) {
		return '<li><a href="' . $this->Url->create('page/changelog') . '">Changelog</a></li>';
	}
}