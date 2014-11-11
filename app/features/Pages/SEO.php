<?php

namespace app\features\Pages;
use Morrow\Factory;
use Morrow\Debug;

class SEO extends _Default {
	public function run($dom) {
		// create the title tag
		$query = $dom->query('xpath://h1');
		if ($query->length) {
			$h1 = trim($query->item(0)->nodeValue);
			$dom->prepend('xpath://title', htmlspecialchars($h1, ENT_QUOTES, 'utf-8') . ' | ');
		}
		
		// create meta description
		$query = $dom->query('p.lead');
		if ($query->length) {
			$intro = trim($query->item(0)->nodeValue);
			$dom->append('head', '<meta name="description" value="'.htmlspecialchars($intro, ENT_QUOTES, 'utf-8').'" />');
		}
		
		return '';
	}
}