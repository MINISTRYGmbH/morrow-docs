<?php

namespace app\features\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Detail extends _Default {
	public function run($dom) {
		$class = '\\' . implode('\\', array_slice($this->Page->get('nodes'), 1));
		
		try {
			$path_to_class = $this->_core_path . 'src/' . implode('/', array_slice($this->Page->get('nodes'), 2)) . '.php';
			$hash = md5(file_get_contents($path_to_class));

			if (!$result = $this->Cache->load($class, $hash)) {
				$result = (new \Docblock($class))->get();
				$this->Cache->save($class, $result, '+1 day', $hash);
			}

			$this->Views_Serpent->setContent('class', $result);
		} catch(\RunTimeException $e) {
			// Redirect only if the class could not be found
			$this->Url->redirect('404');
		}

		// add specials styles for classes pages
		$dom->append('head', '<link rel="stylesheet" href="features/Classes/public/style.css" />');

		return $this->Views_Serpent;
	}
}