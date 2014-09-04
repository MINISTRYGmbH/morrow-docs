<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class Page extends _Default {
	public function run() {
		$docs_root		= $this->_core_path . 'docs/';
		$id				= $this->input->get('routed.id');
		$page_content	= file_get_contents($docs_root . $id . '.md');
		$this->view->setContent('page_content', $page_content);
	}
}