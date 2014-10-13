<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class _Default extends Factory {
	public function __construct() {
		// the path to the morrow framework
		$this->_core_path		= VENDOR_PATH . 'morrow/core/';
		$this->_feature_path	= $this->_core_path . '../../../app/features/';

		// toggle enduser view and developer view
		$spap = $this->Input->get('show_protected_and_private');
		if (isset($spap)) {
			$this->Session->set('show_protected_and_private', $spap);
		}

		Factory::onload('Views\Serpent', function($instance){
			// add markdown mapping
			$instance->mappings = [
				'markdown' => '\\app\\_Default::markdown',
			];
	
			// toggle enduser view and developer view
			$instance->setContent('show_protected_and_private', $this->Session->get('show_protected_and_private', ''));

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

			$instance->setContent('classes', $new_classes);

			// get added features
			$features		= [];

			foreach (scandir($this->_feature_path) as $file) {
				if ($file{0} === '.') continue;
				if (is_dir($this->_feature_path . $file)) $features[] = $file;
			}
			$instance->setContent('features', $features);
		});

		if ($this->Page->get('path.relative') === '') {
			$this->Url->redirect('page/introduction');
		}
	}

	// edit rendered markdown blocks
	public static function markdown($content) {
		$content = \Michelf\MarkdownExtra::defaultTransform($content);
		
		// change table formatting
		$content = str_replace('<table>', '<table class="table table-striped table-condensed">', $content);

		// add syntax highlighter
		$content = preg_replace('|<pre><code class="([a-z]+?)">|s', '<pre><code class="language-$1">', $content);

		// auto link classes
		$content = preg_replace_callback('|(\\\\[A-Z][\\\\A-Za-z0-9]+)|s', function($match){
			$url = Factory::load('Url')->create('object/');
			$url .= str_replace('\\', '/', $match[0]);

			return '<a href="'.$url.'">'.$match[0].'</a>';
		}, $content);		

		return $content;
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
