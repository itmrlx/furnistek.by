<?php get_header(); ?>

	<div class="container content-container main-content">
		<div class="row">
			<div class="col-xs-3 sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
			<div class="col-xs-9 text post">
				<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<h1 class="title-default"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif;?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>