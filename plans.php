<?php	
$headerValues = array(
	'user' => array(
		'user' => 'SuperAdmin',
	),
	'stylesheet' => array(
		'css/list.css',
	),
);
include 'include/header.php';
?>
<body data-currpage="sites">

<?php include 'modules/menu.php'; ?>

<!-- messages -->
<input id="msg-allrequired" value="<?php print _("All fields are required"); ?>" type="hidden">
<input id="msg-adding" value="<?php print _("Adding..."); ?>" type="hidden">
<input id="msg-added" value="<?php print _("Plan added successfully"); ?>" type="hidden">
<input id="msg-updating" value="<?php print _("Updating..."); ?>" type="hidden">
<input id="msg-updated" value="<?php print _("Plan updated successfully"); ?>" type="hidden">

<section class="main">

    <nav>
        <a class="show-menu"><i class="fa fa-bars fa-lg"></i></a>
    
        <ul>
            <li><a href="admin"><?php print _("Sites"); ?></a></li>
            <li class="static active"><a href="plans"><?php print _("Plans"); ?></a></li>
        </ul>
        
        <a class="primary-action" data-bind="click: showAddDialog"><i class="fa fa-plus-circle fa-lg"></i> <?php print _("Add Plan"); ?></a>
        
    </nav>

    <div class="container">
	    <table  class="table table-striped table-bordered">
        	<col>
    		<col>
    		<col width="15%">
    		<thead>
    			<tr>
	    			<th><?php print _("Id"); ?></th>
	    			<th><?php print _("Name"); ?></th>
	    			<th class="number"><?php print _("Amount"); ?></th>
	    			<th><?php print _("Interval"); ?></th>
	    			<th><?php print _("Currency"); ?></th>
	    			<th class="number"><?php print _("Trial"); ?></th>
    			</tr>
    		</thead>
    		<tbody data-bind="foreach:plans">
                <tr>
                    <td><a data-bind="text:id, click:$parent.showEditDialog"></a></td>
                    <td>
	                    <span data-bind="text:name"></span><br>
	                    <small data-bind="text:readable"></small>
                    </td>
                    <td data-bind="text:amount" class="number"></td>
                    <td data-bind="text:interval"></td>
                    <td data-bind="text:currency.toUpperCase()"></td>
                    <td data-bind="text:trial" class="number"></td>
                </tr>
    		</tbody>
    	</table>
	</div>

</section>
<!-- /.main -->

<div class="modal fade" id="addEditDialog">

	<div class="modal-dialog">
	
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="add"><?php print _("Add Plan"); ?></h3>
				<h3 class="edit"><?php print _("Update Plan"); ?></h3>
			</div>
			<div class="modal-body">
			
				<div class="form-group">
					<label for="plan-id" class="control-label"><?php print _("Id:"); ?></label>
					<input id="plan-id" type="text" maxlength="128" value=""class="form-control">
				</div>
				
				<div class="form-group">
					<label for="plan-name" class="control-label"><?php print _("Name:"); ?></label>
					<input id="plan-name" type="text" value="" maxlength="255" class="form-control">
				</div>
				
				
				<div id="amount-group" class="form-group">
					<label for="plan-amount" class="control-label"><?php print _("Amount (in cents):"); ?></label>
					<input id="plan-amount" type="number" maxlength="10" value=""class="form-control">
					<span class="help-block"><?php print _("e.g. 2500 = $25.00"); ?></span>
				</div>
				
				<div id="interval-group"  class="form-group">
					<label for="plan-interval" class="control-label"><?php print _("Interval:"); ?></label>
					<select id="plan-interval" class="form-control">
						<option value="week"><?php print _("Week"); ?></option>
						<option value="month"><?php print _("Month"); ?></option>
						<option value="year"><?php print _("Year"); ?></option>
					</select>
				</div>
				
				<div id="currency-group"  class="form-group">
					<label for="plan-currency" class="control-label"><?php print _("Currency:"); ?></label>
					<select id="plan-currency" class="form-control">
						<option value="usd">USD</option>
					</select>
				</div>
				
				<div id="trial-group" class="form-group">
					<label for="plan-trial" class="control-label"><?php print _("Trial Days:"); ?></label>
					<input id="plan-trial" type="number" maxlength="10" value=""class="form-control">
				</div>
				
			</div>
			
			<div class="modal-footer">
				<button class="secondary-button" data-dismiss="modal"><?php print _("Close"); ?></button>
				<button class="primary-button add" data-bind="click: addPlan"><?php print _("Add Plan"); ?></button>
				<button class="primary-button edit" data-bind="click: editPlan"><?php print _("Update Plan"); ?></button>
			</div>
			<!-- /.modal-footer -->
			
		</div>
		<!-- /.modal-content -->
		
	</div>
	<!-- /.modal-dialog -->

</div>
<!-- /.modal -->

</body>

<!-- include js -->
<script type="text/javascript" src="<?php print JQUERY_JS; ?>"></script>
<script type="text/javascript" src="<?php print JQUERYUI_JS; ?>"></script>
<script type="text/javascript" src="<?php print BOOTSTRAP_JS; ?>"></script>
<script type="text/javascript" src="<?php print KNOCKOUT_JS; ?>"></script>
<script type="text/javascript" src="js/helper/moment.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/global.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/messages.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/models.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/plansModel.js?v=<?php print VERSION; ?>"></script>


</html>