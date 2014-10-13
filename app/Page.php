<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Page extends _Default {
	public function run() {
		$docs_root		= $this->_core_path . 'docs/';
		$id				= $this->Input->get('routed.id');
		$page_content	= file_get_contents($docs_root . $id . '.md');
		$this->Views_Serpent->setContent('page_content', $page_content);

		return $this->Views_Serpent;
	}
}