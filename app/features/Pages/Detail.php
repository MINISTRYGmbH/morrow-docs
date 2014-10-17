<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$docs_root		= $this->_core_path . 'docs/';
		$id				= $this->Page->get('nodes.1');
		try {
			$page_content	= file_get_contents($docs_root . $id . '.md');
		} catch (\Exception $e) {
			$this->Url->redirect('404');
		}
		$this->Views_Serpent->setContent('page_content', $page_content);

		return $this->Views_Serpent;
	}
}