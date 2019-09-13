<?php get_header(); ?>

	<div class="left-wrap clearfix">
	
		<div class="left-article clearfix">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="entryContent">
					<div class="blog-title">
						<h1><?php the_title(); ?></h1>
						<?php $sub_title = rwmb_meta( 'isabelblog_sub_title' ); ?>
						<?php if ( $sub_title != NULL ): ?>
						
							<h2><?php echo rwmb_meta( 'isabelblog_sub_title' ); ?></h2>
							
						<?php endif; ?>
					</div>
					
					<?php the_content('<p class="serif">Continue reading &raquo;</p>'); ?>
	                <div class="clear"></div>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
					<!-- Begin PHP Social Share -->
					<div class="social-share">
					    <p>
					        Share This Article With Your Friends!
					    </p>
					    
					    <!-- Facebook --> 
					    <div class="left">
					    
					        <div class="fb-like" data-send="true" data-layout="button_count" data-width="132" data-show-faces="false" data-font="arial"></div>
					    </div>
					    
					    <!-- Email -->
					    <div class="left small-lm">
					        <a href="mailto:?Subject=<?php urldecode(the_title()); ?>&amp;Body=Check+out+this+article+about+<?php urldecode(the_title()); ?>%3a+<?php echo urlencode(get_permalink($post->ID)); ?>"><img alt="Email" src="//d3f3hlqdx4azlp.cloudfront.net/buttons/EmailButton.jpg"></a>
					    </div>
					    
					    <!-- Pinterest -->
					    
					    <?php
			    		
						$images = rwmb_meta( 'isabelblog_featured_image', 'type=image&size=medium' );
						foreach ( $images as $image )
						{
							$pinterestimage = "{$image['url']}";
						}
						
						?>
					    <div class="left small-lm">
	<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage; ?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
					    </div>
					    <!-- Include Pinterest Scritp -->
					    <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
					    
					    <!-- Twitter -->
					    <div class="left small-lm">
					    	<a href="https://twitter.com/share" class="twitter-share-button" data-via="beyond_diet">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					    </div>
					    
					    <!-- Stumble Upon -->
					    <div class="left">
					        <!-- Place this tag where you want the su badge to render -->
							<su:badge layout="1" location="<?php echo urlencode(get_permalink($post->ID)); ?>"></su:badge>
							
							<!-- Place this snippet wherever appropriate -->
							<script type="text/javascript">
							  (function() {
							    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
							    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
							    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
							  })();
							</script>
	
					    </div>
					    
					    <div class="clear-both">
					    </div>
					    
					</div>
					
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

	</div>
	<!-- End: Left Panel -->
	
	<!-- Start: Right Panel -->
	<div class="rightPan">
		<?php get_sidebar(); ?>
	</div>
	<!-- End: Right Panel -->
	
<?php get_footer(); ?>
