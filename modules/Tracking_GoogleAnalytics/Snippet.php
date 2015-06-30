<?php

namespace app\modules\Tracking_GoogleAnalytics;
use Morrow\Factory;
use Morrow\Debug;

class Snippet {
	public function run($dom) {
		// pass to the template if we want to put seconds or not
		$id	= Factory::load('Config')->get('modules.Tracking_GoogleAnalytics.id');

		// append the javascript to the page
		$dom->append('body', '<script src="Tracking_GoogleAnalytics/public/feature_googleanalytics.js"></script>');
	}
}
