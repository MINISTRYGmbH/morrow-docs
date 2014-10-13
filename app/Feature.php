<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Feature extends _Default {
	public function run() {
		$name			= $this->Input->get('routed.name');
		$page_content	= file_get_contents($this->_feature_path . $name . '/readme.md');
		$this->Views_Serpent->setContent('page_content', $page_content);

		return $this->Views_Serpent;
	}
}