	<!-- citata -->
	<div class="wrapper citata-wr">
		<div class="container">
			<p><?php the_field('citata','option'); ?></p>
		</div>
	</div>

	<footer class="container footer-bottom">
		<div class="container">
			<div class="col-xs-9">
				<p>Сайт не является интернет-магазином. Все представленные сведения несут информационный характер.<br>
					Наш партнер: <a href="http://kozlova.by/">Студия текстильного дизайна Наталии Козловой</a><br>
					Copyright 2015 Furnistek.by. All Rights Reserved. <a href="http://webber.by">Created by Webber Studio</a></p>
			</div>
			<div class="col-xs-3 unp">
				<br>
				<p>ИП Козлов Олег Владимирович<br>
					УНП: 190861884</p>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="<?php bloginfo('template_url'); ?>/js/min/jquery-2.1.4-min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/min/jquery.fancybox-min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/min/slick-min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/min/jquery.navgoco-min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/min/script-min.js"></script>
</body>
<?php wp_footer(); //вывод админ панели ?>
</html>
