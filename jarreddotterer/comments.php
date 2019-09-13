<?php 
			if ( post_password_required() ) : ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
				return;
			endif;
			?>
<?php
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php //if ($comments) : ?>
	
	<div styley="z-index:10000;" class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="2" data-width="673" data-colorscheme="light" data-mobile="false"></div>

<?php //endif; // if you delete this the sky will fall on your head ?>



