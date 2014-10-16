<?php

namespace app\features\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Visibility extends _Default {
	public function run($dom) {
		// toggle enduser view and developer view
		$spap = $this->Input->get('show_protected_and_private');
		if (isset($spap)) {
			$this->Session->set('show_protected_and_private', $spap);
		}
	
		$spap = $this->Session->get('show_protected_and_private');

		// toggle enduser view and developer view
		$this->Views_Serpent->setContent('show_protected_and_private', $spap);

		// remove protected/private members/methods
		if (!$spap) {
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