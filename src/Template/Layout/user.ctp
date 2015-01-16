<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $this->fetch("title")?></title>

		<!-- Bootstrap -->
		<?= $this->Html->css("bootstrap.min.css"); ?>
		<?= $this->Html->css("bootstrap.padding.css"); ?>
		<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
		<script src="//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML-full"></script>  

	</head>
	<body>
		<div class="container">
			<?= $this->Flash->render();?>
			<?= $this->Flash->render("auth");?>
			<?= $this->cell("Navbar",["userId"=>$userId])?>
			<?= $this->fetch('content') ?>
		</div>	

	
	</body>
</html>
