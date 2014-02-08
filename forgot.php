<?php	
$headerValues = array(
	'user' => array(
		'authenticate' => false,
	),
	'language' => 'preferred',
	'title' => array(
		'first' => 'Forgot Password',
		'second' => '{{BRAND}}'
	),
	'stylesheet' => array(
		'css/login.css'
	),
);
include 'include/header.php';
?>
<body id="forgot" class="external default">

<!-- messages -->
<input id="msg-sending" value="<?php print _("Sending..."); ?>" type="hidden">
<input id="msg-sent" value="<?php print _("Email sent"); ?>" type="hidden">
<input id="msg-email-invalid" value="<?php print _("We could not find your email in the system"); ?>" type="hidden">
<input id="msg-match-error" value="<?php print _("The password and retype must match"); ?>" type="hidden">
<input id="msg-resetting" value="<?php print _("Resetting..."); ?>" type="hidden">
<input id="msg-reset" value="<?php print _("Password successfully reset"); ?>" type="hidden">
<input id="msg-denied" value="<?php print _("Access denied"); ?>" type="hidden">

<!-- begin content -->
<div class="content">

	<h1><?php print BRAND; ?></h1>
	
	<fieldset class="forgot" data-bind="visible:hasToken()==false">
	
		<p><?php print _("Type your email address and we will send you a link to reset your password."); ?></p>
		
		<div class="form-group">
			<label for="email"><?php print _("Email:"); ?></label>
			<input id="email" type="text" value="" placeholder="you@yourlogin.com" class="form-control input-lg">	
		</div>
		
		<span class="actions">
			<button type="submit" class="primary-button" data-bind="click:forgot"><?php print _("Send Email"); ?> <i class="fa fa-envelope-o"></i></button>
		</span>
		
	</fieldset>
	<!-- /.forgot -->
		
	<fieldset class="reset" data-bind="visible:hasToken()==true">
		
		<p>
			<?php print _("Welcome back. Type a new password for your account."); ?>
		</p>

		<div class="control-group">
			<label for="password"><?php print _("Password:"); ?></label>
			<input id="password" type="password" placeholder="New Password" class="form-control">
		</div>
		
		<div class="control-group">
			<label for="retype"><?php print _("Retype Password:"); ?></label>
			<input id="retype" type="password" placeholder="Retype New Password" class="form-control input-lg">
		</div>
		
		<span class="actions">
			<button type="submit" class="primary-button" data-bind="click:reset"><?php print _("Change Password"); ?></button>
		</span>
			
	</fieldset>
	<!-- /.reset -->

	<p  class="alternate">
		<a href="/"><?php print _("Return to Login"); ?></a>
	</p>

	<small><?php print COPY; ?></small>

</div>
<!-- /.content -->


</body>

<!-- include js -->
<script type="text/javascript" src="<?php print JQUERY_JS; ?>"></script>
<script type="text/javascript" src="<?php print JQUERYUI_JS; ?>"></script>
<script type="text/javascript" src="<?php print BOOTSTRAP_JS; ?>"></script>
<script type="text/javascript" src="<?php print KNOCKOUT_JS; ?>"></script>
<script type="text/javascript" src="js/helper/moment.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/global.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/messages.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/forgotModel.js?v=<?php print VERSION; ?>"></script>

</html>