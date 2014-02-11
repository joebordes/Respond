<ul id="<?php print $listid; ?>" class="respond-list list-group" data-bind="foreach: <?php print $listid; ?>" 
	data-display="<?php print $el->display; ?>" 
	data-label="<?php print $el->label; ?>" 
	data-pagetypeid="<?php print $el->type; ?>" 
	data-length="<?php print $length; ?>" 
	data-orderby="<?php print $orderby; ?>" 
	data-category="<?php print $category; ?>">
        <li class="list-group-item">
        	<a class="pull-left thumbnail" data-bind="attr:{'href':url}, visible: hasImage">
	        	<img data-bind="attr: {'src': thumb}">
            </a>
            <h4><a data-bind="attr:{'href':url}, text:name"></a></h4>
			<small data-bind="visible: hasCallout, text: callout"></small>
			<p data-bind="text:desc"></p>
		</li>
</ul>

<?php if($pageresults == 'true'){ ?>
	<div class="page-results">
		<button id="pager-<?php print $listid; ?>" class="btn btn-default" data-id="<?php print $listid; ?>"><?php print '<?php print _("Next"); ?>'; ?></button>
	</div>
<?php } ?>