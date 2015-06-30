<?php

namespace app\modules\Pages;
use Morrow\Factory;
use Morrow\Debug;

class Error404 extends _Default {
	public function run($dom) {
		$view = new \Morrow\Views\Serpent;

		$marker		= $this->Config->get('modules.Pages.if_does_not_exist');
		Debug::dump($dom->get());
		$is_content	= $dom->xpath->query($marker)->length;
		die();

		if ($is_content) return '';

		if (!$is_content && $this->Page->get('path.relative') !== '404') {
			$this->Url->redirect('404');
		}

		$this->Header->set('HTTP/1.0 404 Not Found');
		return $view;
	}
}
