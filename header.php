<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=980">
		<link href="<?php bloginfo('template_url'); ?>/img/favicon.png" rel="icon" type="image/png">
		<title><?php if(is_home ()){bloginfo('name');}else{wp_title("");}?></title>

		<!-- Styles -->
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/global.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">

		<?php wp_head(); ?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
	<!-- header menu -->
	<div class="wrapper menu-wrapper">
		<div class="container">
			<ul>
				<li class="menu1"><a href="/">Главная</a></li>
				<li class="menu2"><a href="/category/catalog/">Каталог</a></li>
				<?php if(get_field('roz_torg_link', 'option')){ ?>
					<li class="menu3"><a href="<?php the_field('roz_torg_link', 'option'); ?>">Розничная торговля</a></li>
				<?php }; ?>
				<li class="menu4"><a href="/contacts/">Контакты</a></li>
			</ul>
		</div>
	</div>

	<!-- header -->
	<header class="container header-top">
		<div class="row">
			<div class="col-xs-5 logo">
				<a href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Furnistek"></a>
				<p>Фурнитура для стекла и зеркал</p>
			</div>
			<div class="col-xs-7">
				<div class="phones-container">
					<div class="phones">
						<header>Розничная торговля</header>
						<?php the_field('tel_roz', 'option'); ?>
					</div>
					<div class="phones">
						<header>Оптовая торговля</header>
						<?php the_field('tel_opt', 'option'); ?>
					</div>
				</div>
				<form method="get" id="searchform" action="/">
					<input type="text" value="" placeholder="Поиск интересующего товара" name="s" id="s" class="findText" />
					<input type="submit" id="searchsubmit" value=""  class="findButton" />
				</form>
			</div>
		</div>
	</header>