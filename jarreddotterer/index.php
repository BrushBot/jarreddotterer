<?php get_header(); ?>

<div class="wrapper">

	<h1 class="image-title">

	<img src="<?php bloginfo( 'template_url' ); ?>/images/journal.png" alt="Journal">
	
	</h1>
 
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>

			<!-- Start: Post -->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="entryContent archives clearfix">
				
					<a href="<?php the_permalink() ?>"><h2 class="articleTitle"><?php the_title(); ?></h2></a>
					
					<p class="entry-date"><?php the_date(); ?></p>
					
					<div class="entry-content">
					
						<?php the_content(); ?>
					
					</div>
				
				</div><!-- End .entryContent -->
			
			</div>
		
		<?php endwhile; ?>
                
		<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_template_part('searchform'); ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
