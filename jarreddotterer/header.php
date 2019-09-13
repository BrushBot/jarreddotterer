<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

	<head>
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>
		
			<?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;
		
			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( 'Page %s', max( $paged, $page ) );
			
			?>
		
		</title>
		
		<?php
			
			if ( is_front_page() ) {
				$page_description = 'The portfolio website of Jarred Dotterer';
			}
			
			elseif ( is_category() ) {
				
				$cat_descritpion = category_description( get_category_by_slug('category-slug')->term_id );
				
				$page_description =strip_tags($cat_descritpion);
			}
			else {
				
				global $wp_query;
				$thePostID = $wp_query->post->ID;
				$postinfo = get_post($thePostID);
				if ($postinfo->post_content) {
					$stripinfo = strip_tags($postinfo->post_content);
					$page_description = substr($stripinfo, 0, 135);
				}
			}
			
		?>
		
		<script type="text/javascript" src="//use.typekit.net/jok2jol.js"></script>
		
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		
		<meta name="keywords" content="Jarred, Dotterer, Portfolio, Denver, Colorado" />
		
		<meta name="description" content="<?php echo $page_description; ?>">
		
		<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" type="image/x-icon">
	
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head(); ?>
	
	</head>

	<body <?php body_class(); ?>><!-- Closed in footer.php -->
	
		<div id="menu-container">
		
			<div class="menu-wrapper">
			
				<div id="navigation-container" class="clearfix">
					
					<div id="navigation-button">
					
					</div>
				
					<ul id="navigation">
						
						<li>
						
							<a href="/" class="nav-journal">
								
								<span class="nav-icon"></span>
								
								<span class="nav-text">Journal</span>
							
							</a>
							
						</li>
						
						<li>
						
							<a href="/work" class="nav-work">
							
								<span class="nav-icon"></span>
								
								<span class="nav-text">Work</span>
							
							</a>
							
						</li>
						
						<li>
						
							<a href="/about" class="nav-about">
							
								<span class="nav-icon"></span>
								
								<span class="nav-text">About</span>
							
							</a>
							
						</li>
						
						<li>
						
							<a href="/contact" class="nav-contact">
								
								<span class="nav-icon"></span>
								
								<span class="nav-text">Contact</span>
							
							</a>
							
						</li>
												
					</ul><!-- End #navigation-->
					
					<a id="logo_link" href="http://jarreddotterer.com">
			
						<div id="logo_container">
							
							<span class="site-title">Jarred Dotterer</span>
						
						</div>
						
					</a>
			
				</div><!-- End #navigation-container-->
			
			</div><!-- End .menu-wrapper -->
		
		</div><!-- End #menu-container -->
		
			<div class="main"><!-- Closed in footer.php -->