<?php
// prepare extension types
global $ALLOWED_IMAGETYPES,$ALLOWED_FILETYPES;
$__ImageExtensions = $ALLOWED_IMAGETYPES;
$__FilesExtensions = $ALLOWED_FILETYPES;
array_walk($__ImageExtensions, function(&$e) {$e = "extension == '$e'";});
array_walk($__FilesExtensions, function(&$e) {$e = "extension == '$e'";});
?>
<div class="modal fade" id="filesDialog">

	<!-- messages -->
	<input id="msg-files-dialog-download" value="<?php print _("Download"); ?>" type="hidden">
	<input id="msg-files-dialog-desc" value="<?php print _("File Description"); ?>" type="hidden">

	<div class="modal-dialog">
	
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><?php print _("Add File"); ?></h3>
			</div>
			
			<div class="modal-body">
			
				<div id="selectFile" class="select select-lg">
				
				    <ul data-bind="foreach: files">
				      <li>
				        <i class="fa fa-file-alt" data-bind="visible: (<?php print implode(' || ', $__FilesExtensions); ?>)"></i>
				        <i class="fa fa-picture" data-bind="visible: (<?php print implode(' || ', $__ImageExtensions); ?>)"></i>
				        <a data-bind="attr:{'data-filename':filename, 'data-fullurl':fullUrl, 'data-extension':extension}, text:filename"></a>
				      </li>
				    </ul>
				
				    <p data-bind="visible: filesLoading()" class="inline-status"><i class="fa fa-spinner fa fa-spin"></i> <?php print _("Loading..."); ?></p>
				
				</div>
				
			</div>
				
			<div class="modal-footer">
				<button class="secondary-button" data-dismiss="modal"><?php print _("Close"); ?></button>
				<button class="primary-button" data-bind="click: addFile"><?php print _("Add File"); ?></a>
			</div>  
			<!-- /.modal-footer -->
		
		</div>
		<!-- /.modal-content -->
		
	</div>
	<!-- /.modal-dialog -->

  </div>
  <!-- /.modal-body -->
  
</div>
<!-- /.modal -->