<?php get_header(); ?>

	<div class="container content-container main-content">
		<div class="row">
			<div class="col-xs-3 sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
			<div class="col-xs-9 text">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<div class="col-xs-4">
								<a href="<?php the_permalink(); ?>" class="item">
									<?php $slide_img = get_field('item_img'); ?>
									<div class="img-block">
										<img src="<?php echo $slide_img['sizes']['medium']; ?>" alt="<?php echo $slide_img['alt']; ?>">
									</div>
									<header class="title">
										<h2><?php the_title(); ?></h2>
									</header>
									<div class="cost">Цена: <span><?php curs(get_field('item_cost')); ?> б.р</span></div>
								</a>
							</div>
						<?php endwhile; ?>
							<div class="clearfix"></div>
							<div class="centered">
								<?php if(function_exists('proPagination')) { proPagination(); } ?>
							</div>
						<?php endif;?>
						<?php else : ?>
							<div class="col-xs-12">
								<h1 class="title-default">Ничего не найдено</h1>
								<div class="post-content">
									<p><?php _e( 'Простите, но по вашему запросу ничего не найдено, попробуйте еще раз.', '52' ); ?></p>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php	get_footer(); ?>