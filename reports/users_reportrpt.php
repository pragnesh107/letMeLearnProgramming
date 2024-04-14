<?php
namespace PHPReportMaker12\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($users_report_rpt))
	$users_report_rpt = new users_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$users_report_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fusers_reportrpt = currentForm = new ew.Form("fusers_reportrpt");

// Validate method
fusers_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fusers_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fusers_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fusers_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fusers_reportrpt.lists["x_User_Type"] = <?php echo $users_report_rpt->User_Type->Lookup->toClientList() ?>;
fusers_reportrpt.lists["x_User_Type"].popupValues = <?php echo json_encode($users_report_rpt->User_Type->SelectionList) ?>;
fusers_reportrpt.lists["x_User_Type"].popupOptions = <?php echo JsonEncode($users_report_rpt->User_Type->popupOptions()) ?>;
fusers_reportrpt.lists["x_User_Type"].options = <?php echo JsonEncode($users_report_rpt->User_Type->lookupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $users_report_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fusers_reportrpt" id="fusers_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fusers_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_User_Type" class="ew-cell form-group">
	<label for="x_User_Type" class="ew-search-caption ew-label"><?php echo $Page->User_Type->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->User_Type->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->User_Type->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="users_report" data-field="x_User_Type" data-value-separator="<?php echo $Page->User_Type->displayValueSeparatorAttribute() ?>" id="x_User_Type" name="x_User_Type"<?php echo $Page->User_Type->editAttributes() ?>>
		<?php echo $Page->User_Type->selectOptionListHtml("x_User_Type") ?>
	</select>
</div>
<?php echo $Page->User_Type->Lookup->getParamTag("p_x_User_Type") ?>
</span>
</div>
</div>
</div>
</form>
<script>
fusers_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_users_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->user_Id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="user_Id"><div class="users_report_user_Id"><span class="ew-table-header-caption"><?php echo $Page->user_Id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="user_Id">
<?php if ($Page->sortUrl($Page->user_Id) == "") { ?>
		<div class="ew-table-header-btn users_report_user_Id">
			<span class="ew-table-header-caption"><?php echo $Page->user_Id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer users_report_user_Id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->user_Id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->user_Id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->user_Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->user_Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->User_Type->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="User_Type"><div class="users_report_User_Type"><span class="ew-table-header-caption"><?php echo $Page->User_Type->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="User_Type">
<?php if ($Page->sortUrl($Page->User_Type) == "") { ?>
		<div class="ew-table-header-btn users_report_User_Type">
			<span class="ew-table-header-caption"><?php echo $Page->User_Type->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_User_Type', form: 'fusers_reportrpt', name: 'users_report_User_Type', range: false, from: '<?php echo $Page->User_Type->RangeFrom; ?>', to: '<?php echo $Page->User_Type->RangeTo; ?>' });" id="x_User_Type<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer users_report_User_Type" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->User_Type) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->User_Type->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->User_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->User_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_User_Type', form: 'fusers_reportrpt', name: 'users_report_User_Type', range: false, from: '<?php echo $Page->User_Type->RangeFrom; ?>', to: '<?php echo $Page->User_Type->RangeTo; ?>' });" id="x_User_Type<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="users_report_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn users_report_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer users_report_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->last_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="last_name"><div class="users_report_last_name"><span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="last_name">
<?php if ($Page->sortUrl($Page->last_name) == "") { ?>
		<div class="ew-table-header-btn users_report_last_name">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer users_report_last_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->last_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->email_Id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="email_Id"><div class="users_report_email_Id"><span class="ew-table-header-caption"><?php echo $Page->email_Id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="email_Id">
<?php if ($Page->sortUrl($Page->email_Id) == "") { ?>
		<div class="ew-table-header-btn users_report_email_Id">
			<span class="ew-table-header-caption"><?php echo $Page->email_Id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer users_report_email_Id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->email_Id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->email_Id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->email_Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->email_Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->user_Id->Visible) { ?>
		<td data-field="user_Id"<?php echo $Page->user_Id->cellAttributes() ?>>
<span<?php echo $Page->user_Id->viewAttributes() ?>><?php echo $Page->user_Id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->User_Type->Visible) { ?>
		<td data-field="User_Type"<?php echo $Page->User_Type->cellAttributes() ?>>
<span<?php echo $Page->User_Type->viewAttributes() ?>><?php echo $Page->User_Type->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>>
<span<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->last_name->Visible) { ?>
		<td data-field="last_name"<?php echo $Page->last_name->cellAttributes() ?>>
<span<?php echo $Page->last_name->viewAttributes() ?>><?php echo $Page->last_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->email_Id->Visible) { ?>
		<td data-field="email_Id"<?php echo $Page->email_Id->cellAttributes() ?>>
<span<?php echo $Page->email_Id->viewAttributes() ?>><?php echo $Page->email_Id->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_users_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "users_report_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>