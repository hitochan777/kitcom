<!DOCTYPE html5>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<title>
			<?= $this->fetch('title') ?>
		</title>
		<?= $this->Html->meta('icon') ?>

		<!--<?= $this->Html->css('base.css',["fullBase"=>true]) ?>-->
		<!--<?= $this->Html->css('cake.css',["fullBase"=>true]) ?>-->

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
		<script type="text/x-mathjax-config">
		MathJax.Hub.Config({
			"HTML-CSS": { 
				preferredFont: "TeX", 
				availableFonts: ["STIX","TeX"],
				linebreaks: { automatic:true },
				EqnChunk: (MathJax.Hub.Browser.isMobile ? 10 : 50)
			},
			tex2jax: { 
				inlineMath: [ ["$", "$"], ["\\\\(","\\\\)"] ],
				displayMath: [ ["$$","$$"], ["\\[", "\\]"] ],
				processEscapes: true, 
				ignoreClass: "tex2jax_ignore|dno"
			},
			TeX: {
				noUndefined: { 
					attributes: {
						mathcolor: "red",
						mathbackground: "#FFEEEE",
						mathsize: "90%"
					}
				},
				Macros: {
					href: "{}"
				}
			},
			messageStyle: "none"
		});
		</script>       
		<script type="text/javascript" src="/var/www/kitweb/webroot/js/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
			</div>
			<div id="body">
				<?= $this->fetch('content') ?>
			</div>
			<div id="footer">
			</div>
		</div>
		<!--JQuery and bootstrap js files(Place at the bottom of body in order to load faster)-->	
		<?= $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");?>
		<!--<?= $this->Html->script("bootstrap.min.js",["fullBase"=>true]);?>-->
	</body>
</html>
