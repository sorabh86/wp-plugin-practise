<?php get_header(); ?>

<div class="main">
	<div class="container">
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
				<article class="page">
					<h3><?php the_title(); ?></h3>
					<?php if (has_post_thumbnail()): ?>
						<div class="page-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif ?>
					<div class="page-text">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<?php echo wpautop('Sorry, No Posts were found'); ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
