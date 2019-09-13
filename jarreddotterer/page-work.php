<?php
/*
Template Name: Work
*/
?>

<?php get_header(); ?>

<div class="wrapper">

	<h1 class="image-title">

		<img src="<?php bloginfo( 'template_url' ); ?>/images/work.png" alt="Journal">
		
	</h1>
		
	<?php
        
        // The Query
        $projects = new WP_Query ( 'post_type=project' );
        
		// Loop
		if($projects->have_posts()):
		
		?>	
			
			<?php
				        
	        	while($projects->have_posts()) : $projects->the_post();
	        		$id = $projects->post->ID;
	        		$images = rwmb_meta( 'jdot_project_image', 'type=image&size=projectimage', $id );
	        		$desc = rwmb_meta( 'jdot_project_short_desc', 'type=textarea', $id );
	        		$url = rwmb_meta( 'jdot_project_url', 'type=text', $id );
	        	
	        ?>		        

			
					<div class="project">
					
						<h2><?php the_title(); ?></h2>
					
						<?php foreach ( $images as $image ){echo "<img src='{$image['url']}' alt='{$image['alt']}' />";}?>

						<p><?php echo $desc; ?></p>
						
						<?php if (strlen($url) > 0) { ?>
						
							<a class="project-url" href="//<?php echo $url ?>">Visit Site</a>
						
						<?php } ?> 
						
					</div>
				
				<?php
	            
        		endwhile;
        	
        		?>
        	
        	<?php
        	
        	endif;
	            
	        ?>
	
</div>

<?php get_footer(); ?>