<?php get_header(); ?>

	<div class="container content-container main-content">
		<div class="row">
			<div class="col-xs-3 sidebar">
				<?php include 'sidebar.php'; ?>
			</div>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php if(get_field('item_cost') || get_field('item_img') || get_field('item_thumbs') || get_field('item_char') || get_field('item_desc')): ?>
				<div class="col-xs-9 text post">
					<h1 class="title-default"><?php the_title(); ?></h1>
					<div class="row">
						<?php $slide_img = get_field('item_img'); ?>
						<div class="col-xs-4 img-big">
							<div class="row img-big">
								<div class="col-xs-12">
									<a href="<?php echo $slide_img['url']; ?>">
										<?php $notin = get_field('notin'); ?>
										<?php if( $notin ): ?>
											<div class="notin">ожидаем поступления</div>
										<?php endif; ?>
										<img src="<?php echo $slide_img['sizes']['medium']; ?>" alt="<?php echo $slide_img['alt']; ?>">
									</a>
								</div>
							</div>
							<div class="row img-small">
								<?php 
								$images = get_field('item_thumbs');

								if( $images ): ?>
									<?php foreach( $images as $image ): ?>
										<div class="col-xs-4">
											<a href="<?php echo $image['url']; ?>">
												<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
											</a>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
								
							</div>
						</div>
						<div class="col-xs-8">
							<div class="post-title">Цена: <span><?php curs(get_field('item_cost')); ?> б.р</span></div>
							<?php if(get_field('item_char')){ ?>
								<div class="post-title">Характеристики:</div>
								<?php the_field('item_char'); ?>
							<?php }; ?>
						</div>
						<div class="col-xs-12">
							<?php if(get_field('item_desc')){ ?>
								<div class="post-title">Описание:</div>
								<?php the_field('item_desc'); ?>
							<?php }; ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="col-xs-9 text post">
					<h1 class="title-default"><?php the_title(); ?></h1>
					<div class="row">
						<div class="col-xs-12">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif;?>
		</div>
	</div>

<?php get_footer(); ?>