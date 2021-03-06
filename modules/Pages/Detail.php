<?php

namespace app\modules\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$view = new \Morrow\Views\Serpent;
		$view->mappings = [
			'markdown' => '\\app\\modules\\_main\\_Default::markdown',
		];

		$docs_root		= $this->_core_path . 'docs/';
		$id				= $this->Page->get('nodes.1');
		try {
			$page_content	= file_get_contents($docs_root . $id . '.md');
		} catch (\Exception $e) {
			$this->Url->redirect('404');
		}
		$view->setContent('page_content', $page_content);

		return $view;
	}
}
