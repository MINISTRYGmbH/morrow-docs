<?php

namespace app\features\Tracking_GoogleAnalytics;
use Morrow\Factory;
use Morrow\Debug;

class Snippet {
	public function run($dom) {
		// pass to the template if we want to put seconds or not
		$id	= Factory::load('Config:feature')->get('id');

		// append the javascript to the page
		return "<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '".$id."','auto');ga('send', 'pageview');</script>";
	}
}