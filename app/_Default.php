<?php

namespace app;
use Morrow\Factory;
use Morrow\Debug;

class _Default extends Factory {
	public function setup() {
		$this->view->setHandler('serpent');

		// add markdown mapping
		$this->view->setProperty('mappings', array(
			'markdown' => '\\App\\DefaultController::markdown',
		));

		// toggle enduser view and developer view
		$spap = $this->input->get('show_protected_and_private');
		if (isset($spap)) {
			$this->session->set('show_protected_and_private', $spap);
		}

		$this->view->setContent('show_protected_and_private', $this->session->get('show_protected_and_private', ''));

		$morrow_root = realpath('../vendor') . '/morrow/core/';

		// get all classes
		$classes = $this->_scandir_recursive($morrow_root . 'src/');

		// strip non php files and create relative paths
		$new_classes = array();
		foreach ($classes as $i=>$class) {
			$temp		= preg_replace('|.+?src/(.+)\.php$|', 'Morrow/$1', $class);
			$parts		= explode('/', $temp);
			$basename	= array_pop($parts);
			$dirname	= implode('/', $parts);
			$new_classes[$dirname][] = $basename;
		}

		$this->view->setContent('classes', $new_classes);

		// redirect to the first page
		if (!in_array($this->page->get('alias'), array('page', 'object'))) {
			$this->url->redirect('page/introduction');
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
		$returner	= array();
		$folders	= array();
		
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
