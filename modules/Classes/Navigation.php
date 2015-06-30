<?php

namespace app\modules\Classes;
use Morrow\Factory;
use Morrow\Debug;

class Navigation extends _Default {
	public function run($dom) {
		// append the javascript to the page
		$dom->before('#collapse-plugin', '<script src="Classes/public/default.js" />');

		$view = new \Morrow\Views\Serpent;

		// get all classes
		$classes = $this->_scandir_recursive($this->_core_path . 'src/');

		// strip non php files and create relative paths
		$new_classes = [];
		foreach ($classes as $i=>$class) {
			$temp		= preg_replace('|.+?src/(.+)\.php$|', 'Morrow/$1', $class);
			$parts		= explode('/', $temp);
			$basename	= array_pop($parts);
			$dirname	= implode('/', $parts);
			$new_classes[$dirname][] = $basename;
		}

		$view->setContent('classes', $new_classes);

		return $view;
	}

	/* get all files recursive and sort folders to the end */
	protected function _scandir_recursive($path) {
		$returner	= [];
		$folders	= [];

		foreach (scandir($path) as $file) {
			if ($file{0} === '.') continue;
			$full = $path . $file;
			if (is_file($full)) {
				$returner[] = $full;
			} else if (is_dir($full)) {
				$folders[] = $full . '/';
			}
		}

		foreach ($folders as $folder) {
			$returner = array_merge($returner, $this->_scandir_recursive($folder));
		}

		return $returner;
	}
}
