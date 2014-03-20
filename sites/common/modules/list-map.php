<div class="respond-map" data-list="<?php print $listid; ?>">
	<div id="list-map-<?php print $listid; ?>" class="map-container"></div>
</div>

<ul id="<?php print $listid; ?>" class="respond-list list-group" data-bind="foreach: <?php print $listid; ?>" 
	data-display="<?php print $el->display; ?>" 
	data-label="<?php print $el->label; ?>" 
	data-pagetypeid="<?php print $pageTypeUniqId; ?>" 
	data-length="<?php print $length; ?>" 
	data-orderby="<?php print $orderby; ?>" 
	data-category="<?php print $category; ?>">
        <li class="list-group-item">
        	<a class="pull-left thumbnail" data-bind="attr:{'href':url}, visible: hasImage">
	        	<img data-bind="attr: {'src': thumb}">
            </a>
            <h4><a data-bind="attr:{'href':url}, text:name"></a></h4>
            <h5><i class="fa fa-map-marker"></i><span data-bind="text:location"></span></h5>
			<small data-bind="visible: hasCallout, text: callout"></small>
			<p data-bind="text:desc"></p>
		</li>
</ul>

<?php if($pageresults == 'true'){ ?>
	<div class="page-results">
		<button id="pager-<?php print $listid; ?>" class="btn btn-default" data-id="<?php print $listid; ?>"><?php print '<?php print _("Next"); ?>'; ?></button>
	</div>
<?php } ?>