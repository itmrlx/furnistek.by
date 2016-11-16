<?php get_header(); ?>

	<!-- slider -->
	<div class="wrapper slider-wr">
		<div class="container">
			<div class="row">
				<div class="col-xs-9 col-xs-offset-3">
					<div class="slider-title">Популярные товары</div>
					<div class="row slider-container">
						<!-- slides -->
						<?php query_posts('cat=3&posts_per_page=15'); ?>
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<div class="col-xs-4 slide">
								<a href="<?php the_permalink(); ?>" class="item">
									<?php $slide_img = get_field('item_img'); ?>
									<div class="img-block">
										<?php $notin = get_field('notin'); ?>
										<?php if( $notin ): ?>
											<div class="notin">ожидаем поступления</div>
										<?php endif; ?>
										<?php $super = get_field('super'); ?>
										<?php if( $super ): ?>
											<div class="super"></div>
										<?php endif; ?>
										<img src="<?php echo $slide_img['sizes']['medium']; ?>" alt="<?php echo $slide_img['alt']; ?>">
									</div>
									<header class="title">
										<h2><?php the_title(); ?></h2>
									</header>
									<div class="cost">Цена: <span><?php curs(get_field('item_cost')); ?> б.р</span></div>
								</a>
							</div>
						<?php endwhile; ?>
						<?php endif; wp_reset_query();?>
						<!-- end slides -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container content-container main-content">
		<div class="row">
			<div class="col-xs-3 sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
			<div class="col-xs-9 text">
				<h1 class="title-default"><?php the_field('main_title','option'); ?></h1>
				<?php the_field('main_text','option'); ?>
				<div class="clearfix"></div>


					<?php query_posts('category_name=news&posts_per_page=1'); ?>
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<div class="news-main">
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="desc"><?php echo wp_trim_words(get_the_content(), 40); ?> <a href="<?php the_permalink(); ?>">Читать подробнее</a></div>
						</div>
					<?php endwhile; ?>
					<?php endif; wp_reset_query();?>


				<div class="clearfix"></div>
				<h1 class="title-default">Хиты продаж</h1>
				<div class="row">
					<?php query_posts('cat=4&posts_per_page=3'); ?>
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<div class="col-xs-4">
							<a href="<?php the_permalink(); ?>" class="item">
								<?php $slide_img = get_field('item_img'); ?>
								<div class="img-block">
									<?php $notin = get_field('notin'); ?>
									<?php if( $notin ): ?>
										<div class="notin">ожидаем поступления</div>
									<?php endif; ?>
									<?php $super = get_field('super'); ?>
									<?php if( $super ): ?>
										<div class="super"></div>
									<?php endif; ?>
									<img src="<?php echo $slide_img['sizes']['medium']; ?>" alt="<?php echo $slide_img['alt']; ?>">
								</div>
								<header class="title">
									<h2><?php the_title(); ?></h2>
								</header>
								<div class="cost">Цена: <span><?php curs(get_field('item_cost')); ?> б.р</span></div>
							</a>
						</div>
					<?php endwhile; ?>
					<?php endif; wp_reset_query();?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
