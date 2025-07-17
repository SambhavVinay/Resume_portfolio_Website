<?php
/**
 * Requires the "PHP Email Form" library
 * Available in the pro version from: https://bootstrapmade.com/php-email-form/
 * Place it in: assets/vendor/php-email-form/php-email-form.php
 */

// 1. Replace with your receiving email address
$receiving_email_address = 'sambhavbtech24@rvu.edu.in';

// 2. Load the email form library
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($php_email_form)) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

// 3. Create the email object
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'New Contact Form Submission';

// 4. SMTP settings (ONLY needed if using SMTP instead of mail())
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'sambhavbtech24@rvu.edu.in',
  'password' => 'qwqr pprg kvsm xjbj', // Use app password if 2FA is enabled
  'port' => 587,                        // 587 for TLS or 465 for SSL
  'encryption' => 'tls'                // or 'ssl' if using port 465
);

// 5. Add form messages
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// 6. Send the email and echo the response
echo $contact->send();
?>
