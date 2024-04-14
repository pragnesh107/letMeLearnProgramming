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
if (!isset($package_report_rpt))
	$package_report_rpt = new package_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$package_report_rpt;

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
var fpackage_reportrpt = currentForm = new ew.Form("fpackage_reportrpt");

// Validate method
fpackage_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fpackage_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fpackage_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fpackage_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fpackage_reportrpt.lists["x_Duration"] = <?php echo $package_report_rpt->Duration->Lookup->toClientList() ?>;
fpackage_reportrpt.lists["x_Duration"].popupValues = <?php echo json_encode($package_report_rpt->Duration->SelectionList) ?>;
fpackage_reportrpt.lists["x_Duration"].popupOptions = <?php echo JsonEncode($package_report_rpt->Duration->popupOptions()) ?>;
fpackage_reportrpt.lists["x_Duration"].options = <?php echo JsonEncode($package_report_rpt->Duration->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $package_report_rpt->CenterContentClass ?>">
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
<form name="fpackage_reportrpt" id="fpackage_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fpackage_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Duration" class="ew-cell form-group">
	<label for="x_Duration" class="ew-search-caption ew-label"><?php echo $Page->Duration->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->Duration->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->Duration->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="package_report" data-field="x_Duration" data-value-separator="<?php echo $Page->Duration->displayValueSeparatorAttribute() ?>" id="x_Duration" name="x_Duration"<?php echo $Page->Duration->editAttributes() ?>>
		<?php echo $Page->Duration->selectOptionListHtml("x_Duration") ?>
	</select>
</div>
<?php echo $Page->Duration->Lookup->getParamTag("p_x_Duration") ?>
</span>
</div>
</div>
</div>
</form>
<script>
fpackage_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_package_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Package_Id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Package_Id"><div class="package_report_Package_Id"><span class="ew-table-header-caption"><?php echo $Page->Package_Id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Package_Id">
<?php if ($Page->sortUrl($Page->Package_Id) == "") { ?>
		<div class="ew-table-header-btn package_report_Package_Id">
			<span class="ew-table-header-caption"><?php echo $Page->Package_Id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer package_report_Package_Id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Package_Id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Package_Id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Package_Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Package_Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Package_Desc->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Package_Desc"><div class="package_report_Package_Desc"><span class="ew-table-header-caption"><?php echo $Page->Package_Desc->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Package_Desc">
<?php if ($Page->sortUrl($Page->Package_Desc) == "") { ?>
		<div class="ew-table-header-btn package_report_Package_Desc">
			<span class="ew-table-header-caption"><?php echo $Page->Package_Desc->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer package_report_Package_Desc" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Package_Desc) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Package_Desc->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Package_Desc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Package_Desc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Price->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Price"><div class="package_report_Price"><span class="ew-table-header-caption"><?php echo $Page->Price->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Price">
<?php if ($Page->sortUrl($Page->Price) == "") { ?>
		<div class="ew-table-header-btn package_report_Price">
			<span class="ew-table-header-caption"><?php echo $Page->Price->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer package_report_Price" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Price) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Price->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Duration->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Duration"><div class="package_report_Duration"><span class="ew-table-header-caption"><?php echo $Page->Duration->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Duration">
<?php if ($Page->sortUrl($Page->Duration) == "") { ?>
		<div class="ew-table-header-btn package_report_Duration">
			<span class="ew-table-header-caption"><?php echo $Page->Duration->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Duration', form: 'fpackage_reportrpt', name: 'package_report_Duration', range: false, from: '<?php echo $Page->Duration->RangeFrom; ?>', to: '<?php echo $Page->Duration->RangeTo; ?>' });" id="x_Duration<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer package_report_Duration" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Duration) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Duration->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Duration', form: 'fpackage_reportrpt', name: 'package_report_Duration', range: false, from: '<?php echo $Page->Duration->RangeFrom; ?>', to: '<?php echo $Page->Duration->RangeTo; ?>' });" id="x_Duration<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Title->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Title"><div class="package_report_Title"><span class="ew-table-header-caption"><?php echo $Page->Title->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Title">
<?php if ($Page->sortUrl($Page->Title) == "") { ?>
		<div class="ew-table-header-btn package_report_Title">
			<span class="ew-table-header-caption"><?php echo $Page->Title->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer package_report_Title" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Title) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Title->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->Package_Id->Visible) { ?>
		<td data-field="Package_Id"<?php echo $Page->Package_Id->cellAttributes() ?>>
<span<?php echo $Page->Package_Id->viewAttributes() ?>><?php echo $Page->Package_Id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Package_Desc->Visible) { ?>
		<td data-field="Package_Desc"<?php echo $Page->Package_Desc->cellAttributes() ?>>
<span<?php echo $Page->Package_Desc->viewAttributes() ?>><?php echo $Page->Package_Desc->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Price->Visible) { ?>
		<td data-field="Price"<?php echo $Page->Price->cellAttributes() ?>>
<span<?php echo $Page->Price->viewAttributes() ?>><?php echo $Page->Price->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Duration->Visible) { ?>
		<td data-field="Duration"<?php echo $Page->Duration->cellAttributes() ?>>
<span<?php echo $Page->Duration->viewAttributes() ?>><?php echo $Page->Duration->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Title->Visible) { ?>
		<td data-field="Title"<?php echo $Page->Title->cellAttributes() ?>>
<span<?php echo $Page->Title->viewAttributes() ?>><?php echo $Page->Title->getViewValue() ?></span></td>
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
<div id="gmp_package_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "package_report_pager.php" ?>
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