<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$docs_root		= $this->_core_path . 'docs/';
		$id				= $this->Page->get('nodes.1');
		$page_content	= file_get_contents($docs_root . $id . '.md');
		$this->Views_Serpent->setContent('page_content', $page_content);

		return $this->Views_Serpent;
	}
}