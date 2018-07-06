<?php get_header(); ?>

<div class="main">
	<div class="container">
		<div class="main-cont">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<article class="post">
						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<div class="meta">
							Created By <?php the_author(); ?> on <?php echo get_the_date('F j, Y h:i:s A'); // the_date(); ?>
						</div>
						<div class="post-content">
							<?php if (has_post_thumbnail()): ?>
								<div class="post-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif ?>
							<div class="post-text">
								<?php the_excerpt(); ?>
							</div>
						</div>
						<a class="button" href="<?php the_permalink(); ?>">
							Read More
						</a>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<?php echo wpautop('Sorry, No Posts were found'); ?>
			<?php endif; ?>
		</div>
		<div class="sidebar-right">
			<?php if (is_active_sidebar('sidebar')): ?>
				<?php dynamic_sidebar('sidebar'); ?>
			<?php endif ?>
		</div>
		<div class="clr"></div>
	</div>
</div>

<?php get_footer(); ?>
