<?php

namespace app\modules\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Changelog extends _Default {
	public function run() {
		$this->Views_serpent->setContent('url', $this->Url->create('page/changelog'));

		return $this->Views_serpent;
	}
}
