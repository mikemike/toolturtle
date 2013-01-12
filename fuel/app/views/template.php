<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?> | Tool Turtle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <?php if(!empty($description)): ?><meta name="description" content="<?=$description?>"><?php endif; ?>
    
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<?php echo Asset::css('bootstrap.min.css'); ?>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<?php echo Asset::css('bootstrap-responsive.min.css'); ?>
    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::css('styles.css'); ?>
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-1749798-31']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo Uri::create('/'); ?>">
            <div class="img"><?php echo Asset::img('turtletool.png'); ?></div>
            <span class="text">Tool Turtle</span>
          </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php echo ((!empty($tab) && $tab=='home') ? 'class="active"' : '') ?>><a href="<?php echo Uri::create(); ?>">Home</a></li>
              <li class="dropdown <?php echo ((!empty($tab) && $tab=='geek') ? ' active' : '') ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Geek <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo Uri::create('tools/geek/md5-encrypt'); ?>">MD5 Encrypt</a></li>
                  <li><a href="<?php echo Uri::create('tools/geek/sha1-encrypt'); ?>">SHA1 Encrypt</a></li>
                  <li><a href="<?php echo Uri::create('tools/geek/strlen'); ?>">Strlen / String Length</a></li>
                  <li><a href="<?php echo Uri::create('tools/geek/word-count'); ?>">Word Count</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <?= $content ?>

      <hr>

      <footer>
        <p>&copy; Tool Turtle <?= date('Y') ?></p>
      </footer>

    </div> <!-- /container -->

</body>
</html>
