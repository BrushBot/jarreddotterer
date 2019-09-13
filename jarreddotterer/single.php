<?php get_header(); ?>

	<div class="wrapper">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="entry-content">
					<div class="blog-title">
						<h1><?php the_title(); ?></h1>
						<p class="entry-date"><?php the_date(); ?></p>
					</div>
					<?php the_content(); ?>
	                <div class="clear"></div>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
				</div>
				
				<div class="alignleft ruly post-nav">
					<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
					  <a href="<?php echo get_permalink( $prev_post->ID ); ?>">« Previous Entry</a>
					<?php endif; ?>
				</div>
				
				<div class="alignright ruly post-nav">
					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
					  <a href="<?php echo get_permalink( $next_post->ID ); ?>">Next Entry »</a>
					<?php endif; ?>
				</div>	
				
			</div>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	
	</div>
	
<?php get_footer(); ?>
