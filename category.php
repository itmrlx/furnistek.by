<?php get_header(); ?>

<?php if(!is_category('news')): ?>
	<div class="container content-container main-content">
		<div class="row">
			<div class="col-xs-3 sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
			<div class="col-xs-9 text catalog">
				<h1 class="title-default">Фурнитура для стеклянных душевых</h1>
				<div class="row">
					<?php 
 global $query_string;
 query_posts( $query_string . '&order=ASC' ); 
					 ?>
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
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="container content-container main-content">
		<div class="row">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<div class=".col-xs-12 news-main">
					<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="desc"><?php echo wp_trim_words(get_the_content(), 40); ?> <a href="<?php the_permalink(); ?>">Читать подробнее</a></div>
					<div class="clearfix"></div>
					<hr>
				</div>
			<?php endwhile; ?>
				<div class="clearfix"></div>
				<div class="centered">
					<?php if(function_exists('proPagination')) { proPagination(); } ?>
				</div>
			<?php endif;?>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>