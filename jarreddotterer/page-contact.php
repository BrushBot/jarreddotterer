<?php
/*
Template Name: Contact
*/
?>

<?php

//Form Submission Script

//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please fill out your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'Please fill out your email address. I would like to get back to you.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'Please enter a valid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure a note was entered	
		if(trim($_POST['note']) === '') {
			$noteError = 'Looks like you didn\'t enter a note. Please do so.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$note = stripslashes(trim($_POST['note']));
			} else {
				$note = trim($_POST['note']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'j.d.dotterer@gmail.com';
			$subject = 'Contact Form Submission from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nNote: $note";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: Your Name <noreply@somedomain.com>';
				ini_set("sendmail_from", "jarred@beyonddiet.com");
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
}

?>

<?php get_header(); ?>
<div class="wrapper">

	<h1 class="image-title">

		<img src="<?php bloginfo( 'template_url' ); ?>/images/contact.png" alt="Contact">

	</h1>

	<div class="content">

		<h2>Send Me A Note:</h2>

		<div class="note clearfix">

			<?php if(isset($emailSent) && $emailSent == true) { ?>
			
				<div class="thanks">
					<h2>Thanks, <?=$name;?></h2>
					<p>I got you note! I will get back to you as soon!</p>
				</div>

			<?php } else { ?>
					
				<?php if(isset($hasError)) { ?>
					<div class="form-error">
						<h3 class="error">Ooops! That didn't work! Please fix the errors below.</h3>
						<ul id="errors">
							<?php if(isset($nameError)) echo "<li>".$nameError."</li>"; ?>
							<?php if(isset($emailError)) echo "<li>".$emailError."</li>"; ?>
							<?php if(isset($noteError)) echo "<li>".$noteError."</li>"; ?>
						</ul>
					</div>
				<?php } ?>
			
				<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			
					<ol class="forms">
						<li class="half"><label for="contactName">Name</label>
							<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
						</li>
						
						<li class="half last"><label for="email">Email</label>
							<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
						</li>
						
						<li class="textarea"><label for="noteText">Note</label>
							<textarea name="note" id="noteText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['note'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['note']); } else { echo $_POST['note']; } } ?></textarea>
						</li>
						<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Send Note &raquo;</button></li>
					</ol>
				</form>
		<?php } ?>

		</div><!-- End .note -->

	</div><!-- End .content -->

</div><!-- End .wrapper -->
						
<?php get_footer(); ?>