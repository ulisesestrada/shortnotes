<?php
/*
Template Name: Contact
*/
if(isset($_POST['submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __("You forgot to enter your name.", "site5framework");
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __("You forgot to enter your email address.", "site5framework");
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __("You entered an invalid email address.", "site5framework");
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure message were entered
		if(trim($_POST['message']) === '') {
			$messageError = __("You forgot to enter your message.", "site5framework");
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']));
			} else {
				$message = trim($_POST['message']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {
			$msg .= "------------User Info------------ \r\n"; //Title
			$msg .= "User IP: ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info: ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "Referrer: ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.of_get_option('shortnotes_contact_email').'';
			$subject = 'Contact Form Submission From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $message \n\n $msg";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}
?>
<?php get_header(); ?>

<!-- begin #main -->
			<div id="main">
				<h2><?php the_title();?></h2>
				<!-- BEGIN #contact-form -->
				<?php if(!of_get_option('shortnotes_contact_text')==''):?>
					<p><?php echo of_get_option('shortnotes_contact_text')  ?></p>
				<?php endif;?>
				<p class="error" <?php if($hasError != '') echo 'style="display:block;"'; ?>><?php _e('There was an error submitting the form.', 'site5framework'); ?></p>
				<p class="thanks"><?php _e('<strong>Thanks!</strong> Your email was successfully sent. We should be in touch soon.', 'site5framework'); ?></p>
			          <form id="contact-form" method="post" >
			            <fieldset>
			            <div>
			              <label for="name"><?php _e("Your name", "site5framework"); ?>:*</label><br />
			              <input type="text" id="name" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" tabindex="1"/>
			              <span class="error" <?php if($nameError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your name.", "site5framework");?></span>
			            </div>
			            <div>
			              <label for="email"><?php _e("Your email", "site5framework"); ?>:*</label><br />
			              <input type="text" id="email" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email"/>
			              <span class="error" <?php if($emailError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your email address.", "site5framework");?></span>
			            </div>
			            </fieldset>
			            <fieldset>
			            <div>
			              <label for="message"><?php _e("Your message", "site5framework"); ?>:*</label><br />
			              <textarea cols="20" rows="7" id="message" name="message" class="requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
				  <span class="error" <?php if($messageError != '') echo 'style="display:block;"'; ?>><?php _e("You forgot to enter your message.", "site5framework");?></span>
			            </div>
			            </fieldset>
			            <span style="display:block;">Fields marked with an asterisk (*) are mandatory.</span>
			            <input type="hidden" name="submitted" id="submitted" value="true" />
			             <input type="submit" value="<?php _e('Send', 'site5framework'); ?>" id="submit" name="submit" />
			        </form>
			        <!-- END .contact-form -->
			</div>
			<!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>