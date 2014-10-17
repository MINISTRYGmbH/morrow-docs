<?php

namespace app\features\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$class = '\\' . implode('\\', array_slice($this->Page->get('nodes'), 1));
		
		try {
			$class = new \Docblock($class);
			$this->Views_Serpent->setContent('class', $class->get());
		} catch(\RunTimeException $e) {
			// Redirect only if the class could not be found
			$this->Url->redirect('404');
		}

		// add specials styles for classes pages
		$dom->append('head', '<link rel="stylesheet" href="features/Classes/public/style.css" />');

		return $this->Views_Serpent;
	}
}