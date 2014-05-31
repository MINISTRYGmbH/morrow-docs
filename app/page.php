<?php

namespace App;
use Morrow\Factory;
use Morrow\Debug;

class PageController extends DefaultController {
	public function run() {
		$docs_root		= VENDOR_PATH . 'morrow/core/docs/';
		$id				= $this->input->get('routed.id');
		$page_content	= file_get_contents($docs_root . $id . '.md');
		$this->view->setContent('page_content', $page_content);
	}
}