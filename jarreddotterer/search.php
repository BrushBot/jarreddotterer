<?php get_header(); ?>

	<!-- Start: Left Panel -->
	<div class="left-wrap clearfix">

	<?php if (have_posts()) : ?>

		<h2 class="pageTitle">Search Results</h2>


		<?php while (have_posts()) : the_post(); ?>

		<!-- Start: Post -->
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="entryContent archives clearfix">
			
				<a href="<?php the_permalink() ?>"><h3 class="articleTitle"><?php the_title(); ?></h3></a>
				
				<div class="articleImageBorder clearfix">
					
					 <a href="<?php the_permalink() ?>">
							    	
				    	<div class="articleImageDiv clearfix">
				    	
				    		
				    		
					    		<?php
					    		
								$images = rwmb_meta( 'isabelblog_featured_image', 'type=image&size=large_square' );
								foreach ( $images as $image )
								{
									echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
								}
								
								?>
				    		
				    	</div><!-- End .articleImageDiv -->
				    	
				    </a>
					
					</div><!-- End .articleImageBorder -->
				
				<div class="articleText">
				
					<p class="articleDate"><?php the_date() ?></p>
				
					<?php the_excerpt(); ?>
					
					<a class="articleLink ruly" href="<?php the_permalink() ?>">Read More &#187;</a>
				
				</div>
			
			</div><!-- End .entryContent -->
		
		</div>

		<?php endwhile; ?>

		<?php isabelblog_navigation();?>

	<?php else : ?>

		<?php get_template_part('searchform'); ?><h2 class="pageTitle" style="font-size:24px;">No Entries found. Try a different search.</h2>

	<?php endif; ?>

	</div>
	<!-- End: Left Panel -->
	<!-- Start: Right Panel -->
	<div class="rightPan">
		<?php get_sidebar(); ?>
	</div>
	<!-- End: Right Panel -->
	
<?php get_footer(); ?>