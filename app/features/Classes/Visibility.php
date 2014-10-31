<?php

namespace app\features\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Visibility extends _Default {
	public function run($dom) {
		// init session value
		if (!$this->Session->get('view')) {
			$this->Session->set('view', 'enduser');
		}

		// toggle enduser view and developer view
		$view = $this->Input->get('view');
		if (isset($view)) {
			$this->Session->set('view', $view);
		}
	
		$view = $this->Session->get('view');
		$this->Views_Serpent->setContent('view', $view);

		// remove protected/private members/methods
		if ($view === 'enduser') {
			$dom->delete('tr.member_protected');
			$dom->delete('tr.member_private');
			$dom->delete('div.method_protected');
			$dom->delete('div.method_private');
		}

		// remove empty Members headline if there is no item anymore
		if (!$dom->exists('xpath://h2[text()="Members"]/following-sibling::table[tbody/*]')) {
			$dom->delete('xpath://h2[text()="Members"]');
		}

		return $this->Views_Serpent;
	}
}