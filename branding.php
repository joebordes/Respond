<?php    
   	include 'app.php'; // import php files
	
	$authUser = new AuthUser(); // get auth user
	$authUser->Authenticate('Admin');
	
	Utilities::SetLanguage($authUser->Language); // set language
?>
<!DOCTYPE html>
<html lang="<?php print str_replace('_', '-', $authUser->Language) ?>">

<head>
	
<title><?php print _("Branding"); ?>&mdash;<?php print $authUser->SiteName; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- include css -->
<?php include 'modules/css.php'; ?>
<link type="text/css" href="css/dialog.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dropzone.css?v=<?php print VERSION; ?>" rel="stylesheet">

</head>

<body data-currpage="branding">

<!-- messages -->
<input id="msg-updating-branding" value="<?php print _("Updating..."); ?>" type="hidden">
<input id="msg-branding-updated" value="<?php print _("Branding successfully updated"); ?>" type="hidden">
<input id="msg-updating-logo" value="<?php print _("Updating..."); ?>" type="hidden">
<input id="msg-logo-updated" value="<?php print _("Logo successfully updated"); ?>" type="hidden">

<?php include 'modules/menu.php'; ?>

<section class="main">

    <nav>
        <a class="show-menu"><i class="fa fa-bars fa-lg"></i></a>
    
        <ul>
		    <li class="static active"><a href="branding"><?php print _("Branding"); ?></a></li>
        </ul>
        
        <a class="primary-action" data-bind="click: showImagesDialog"><i class="fa fa-plus-circle"></i> <?php print _("Update Logo"); ?></a>
    </nav>

  <div class="row-fluid">
    <div class="span12">
	
		<form class="form-horizontal">

		<div class="form-group">
			<label class="col-lg-2 control-label"><?php print _("Default Logo:"); ?></label>

			<div class="col-lg-10">
                <span id="logo">
                    <img data-bind="attr:{'src': fullUrl, 'logo-url': logoUrl}" style="max-width: 500px">
                </span>
			</div>
		</div>
	
		</form>
		<!-- /.form-horizontal -->
		
	</div>
	<!-- /.span12 -->	
	
  </div>
  <!-- /.row-fluid -->

</section>
<!-- /.main -->

<div id="overlay"></div>

<?php include 'modules/dialogs/imagesDialog.php'; ?>

</body>

<!-- include js -->
<?php include 'modules/js.php'; ?>
<script type="text/javascript" src="js/helper/dropzone.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/brandingModel.js?v=<?php print VERSION; ?>"></script>

</html>