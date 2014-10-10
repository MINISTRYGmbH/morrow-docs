<?php

// If you want to modify defaults for your project (like routing rules), use this file.

return array(
// security
	'security.csp.default-src'		=> "'self' *.disqus.com *.disquscdn.com cdnjs.cloudflare.com",
	// 'security.csp.script-src'	=> "'self'",
	// 'security.csp.img-src'		=> "'self'",
	'security.csp.style-src'		=> "'self' 'unsafe-inline' cdnjs.cloudflare.com",
	// 'security.csp.media-src'		=> "'self'",
	// 'security.csp.object-src'	=> "'self'",
	// 'security.csp.frame-src'		=> "'self'",
	// 'security.csp.font-src'		=> "'self'",
	'security.frame_options'		=> "DENY", // (DENY|SAMEORIGIN|ALLOW-FROM uri)
	'security.content_type_options'	=> "nosniff",
	
// routing rules
	'router.routes'					=> array(
		'=^object/(?P<path>.+)$='	=> '\app\Object',
		'=^page/(?P<id>.+)$='		=> '\app\Page',
		'=^feature/(?P<name>.+)$='	=> '\app\Feature',
		'=^changelog$='				=> '\app\Changelog',
	),
	'router.fallback'				=>	function($url) { return '\app\Error404'; },
);
