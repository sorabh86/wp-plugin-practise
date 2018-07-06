<?php get_header(); ?>

<div class="main">
	<div class="container">
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
				<article class="post no-border">
					<h3><?php the_title(); ?></h3>
					<div class="meta">
						Created By <?php the_author(); ?> on <?php echo get_the_date('F j, Y h:i:s A'); // the_date(); ?>
					</div>
					<?php if (has_post_thumbnail()): ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<?php echo wpautop('Sorry, No Posts were found'); ?>
		<?php endif; ?>
		
		<div class="sos-comments">
			<?php comments_template(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
