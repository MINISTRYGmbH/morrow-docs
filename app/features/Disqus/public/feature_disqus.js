var disqus_thread		= document.getElementById('disqus_thread');
var disqus_shortname	= disqus_thread.getAttribute('data-disqus_shortname');
var disqus_identifier	= disqus_thread.getAttribute('data-disqus_identifier');

(function() {
	var dsq	= document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	dsq.src	= '//' + disqus_shortname + '.disqus.com/embed.js';
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
})();
