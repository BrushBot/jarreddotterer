<?php get_header(); ?>

		<div class="wrapper">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="pageTitle"><?php single_cat_title(); ?></h1>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="pageTitle"><?php single_tag_title(); ?></h1>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pageTitle"><?php echo get_the_time('F jS, Y'); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pageTitle"><?php echo get_the_time('F, Y'); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pageTitle"><?php echo get_the_time('Y'); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="pageTitle">Author Archive</h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pageTitle">Blog Archives</h1>
 	  <?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<!-- Start: Post -->
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="entryContent archives clearfix">
			
				<a href="<?php the_permalink() ?>"><h2 class="articleTitle"><?php the_title(); ?></h2></a>
				
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

		<h2 class="center">Not Found</h2>
		<?php get_template_part('searchform'); ?>

	<?php endif; ?>

	</div>
	<!-- End: Left Panel -->
	
	<!-- Start: Right Panel -->
	<div class="rightPan">
		<?php get_sidebar(); ?>
	</div>
	<!-- End: Right Panel -->

<?php get_footer(); ?>
