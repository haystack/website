<?php 
// include.php  - Handles options for subscribe2
// DO NOT EDIT THIS FILE AS IT IS SET BY THE OPTIONS PAGE

if (!isset($this->subscribe2_options['autosub'])) { 
	$this->subscribe2_options['autosub'] = "no"; 
} // option to autosubscribe registered users to new categories

if (!isset($this->subscribe2_options['wpregdef'])) {
	$this->subscribe2_options['wpregdef'] = "no";
} // option to check registration form box by default

if (!isset($this->subscribe2_options['autoformat'])) {
	$this->subscribe2_options['autoformat'] = "text";
} // option for default auto-subscription email format

if (!isset($this->subscribe2_options['autosub_def'])) {
	$this->subscribe2_options['autosub_def'] = "yes";
} // option for user default auto-subscription to new categories

if(!isset($this->subscribe2_options['bcclimit'])) {
	$this->subscribe2_options['bcclimit'] = 0;
} // option for default bcc limit on email notifications

if(!isset($this->subscribe2_options['s2page'])) {
	$this->subscribe2_options['s2page'] = 0;
} // option for default WordPress page for Subscribe2 to use

if (!isset($this->subscribe2_options['pages'])) {
	$this->subscribe2_options['pages'] = "no";
} // option for sending notifications for WordPress pages

if (!isset($this->subscribe2_options['password'])) {
	$this->subscribe2_options['password'] = "no";
} // option for sending notifications for posts that are password protected

if (!isset($this->subscribe2_options['private'])) {
	$this->subscribe2_options['private'] = "no";
} // option for sending notifications for posts that are private

if (!isset($this->subscribe2_options['email_freq'])) {
	$this->subscribe2_options['email_freq'] = "never";
} // option for sending emails per-post or as a digest email on a cron schedule

if (!isset($this->subscribe2_options['exclude'])) {
	$this->subscribe2_options['exclude'] = "";
} // option for excluded categories

if (!isset($this->subscribe2_options['sender'])) {
	$this->subscribe2_options['sender'] = "author";
} // option for email notification sender

// reg_override : allow registered users to subscribed to excluded cats
if (!isset($this->subscribe2_options['reg_override'])) {
	$this->subscribe2_options['reg_override'] = "1";
} // option for excluded categories to be overriden for registered users

if (!isset($this->subscribe2_options['show_button'])) {
	$this->subscribe2_options['show_button'] = "1";
} // option to show Subscribe2 button on Write page

if (!isset($this->subscribe2_options['widget'])) {
	$this->subscribe2_options['widget'] = "0";
} // option to enable Subscribe2 Widget

if (!isset($this->subscribe2_options['barred'])) {
	$this->subscribe2_options['barred'] = '';
} // option containing domains barred from public registration

if (!isset($this->subscribe2_options['mailtext'])) {
	$this->subscribe2_options['mailtext'] = __("BLOGNAME has posted a new item, 'TITLE'\n\nPOST\n\nYou may view the latest post at\nPERMALINK\n\nYou received this e-mail because you asked to be notified when new updates are posted.\nBest regards,\nMYNAME\nEMAIL", "subscribe2");
} // Default notification email text

if (!isset($this->subscribe2_options['confirm_email'])) {
	$this->subscribe2_options['confirm_email'] = __("BLOGNAME has received a request to ACTION for this email address. To complete your request please click on the link below:\n\nLINK\n\nIf you did not request this, please feel free to disregard this notice!\n\nThank you,\nMYNAME.", "subscribe2");
} // Default confirmation email text

if (!isset($this->subscribe2_options['remind_email'])) {
	$this->subscribe2_options['remind_email'] = __("This email address was subscribed for notifications at BLOGNAME (BLOGLINK) but the subscription remains incomplete.\n\nIf you wish to complete your subscription please click on the link below:\n\nLINK\n\nIf you do not wish to complete your subscription please ignore this email and your address will be removed from our database.\n\nRegards,\nMYNAME", "subscribe2");
} // Default reminder email text
?>