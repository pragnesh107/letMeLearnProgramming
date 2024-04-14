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
if (!isset($query_report_rpt))
	$query_report_rpt = new query_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$query_report_rpt;

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
var fquery_reportrpt = currentForm = new ew.Form("fquery_reportrpt");

// Validate method
fquery_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_Date_Time");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->Date_Time->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_Date_Time");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->Date_Time->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fquery_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fquery_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fquery_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fquery_reportrpt.lists["x_Language_Name"] = <?php echo $query_report_rpt->Language_Name->Lookup->toClientList() ?>;
fquery_reportrpt.lists["x_Language_Name"].popupValues = <?php echo json_encode($query_report_rpt->Language_Name->SelectionList) ?>;
fquery_reportrpt.lists["x_Language_Name"].popupOptions = <?php echo JsonEncode($query_report_rpt->Language_Name->popupOptions()) ?>;
fquery_reportrpt.lists["x_Language_Name"].options = <?php echo JsonEncode($query_report_rpt->Language_Name->lookupOptions()) ?>;
fquery_reportrpt.lists["x_Date_Time"] = <?php echo $query_report_rpt->Date_Time->Lookup->toClientList() ?>;
fquery_reportrpt.lists["x_Date_Time"].popupValues = <?php echo json_encode($query_report_rpt->Date_Time->SelectionList) ?>;
fquery_reportrpt.lists["x_Date_Time"].popupOptions = <?php echo JsonEncode($query_report_rpt->Date_Time->popupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $query_report_rpt->CenterContentClass ?>">
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
<form name="fquery_reportrpt" id="fquery_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fquery_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Language_Name" class="ew-cell form-group">
	<label for="x_Language_Name" class="ew-search-caption ew-label"><?php echo $Page->Language_Name->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="query_report" data-field="x_Language_Name" data-value-separator="<?php echo $Page->Language_Name->displayValueSeparatorAttribute() ?>" id="x_Language_Name" name="x_Language_Name"<?php echo $Page->Language_Name->editAttributes() ?>>
		<?php echo $Page->Language_Name->selectOptionListHtml("x_Language_Name") ?>
	</select>
</div>
<?php echo $Page->Language_Name->Lookup->getParamTag("p_x_Language_Name") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_Date_Time" class="ew-cell form-group">
	<label for="x_Date_Time" class="ew-search-caption ew-label"><?php echo $Page->Date_Time->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_Date_Time" id="z_Date_Time" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Date_Time->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="query_report" data-field="x_Date_Time" id="x_Date_Time" name="x_Date_Time" placeholder="<?php echo HtmlEncode($Page->Date_Time->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Date_Time->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Date_Time->editAttributes() ?>>
<?php if (!$query_report_base->Date_Time->ReadOnly && !$query_report_base->Date_Time->Disabled && !isset($query_report_base->Date_Time->EditAttrs["readonly"]) && !isset($query_report_base->Date_Time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fquery_reportrpt", "x_Date_Time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_Date_Time"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_Date_Time">
<?php PrependClass($Page->Date_Time->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="query_report" data-field="x_Date_Time" id="y_Date_Time" name="y_Date_Time" placeholder="<?php echo HtmlEncode($Page->Date_Time->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Date_Time->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->Date_Time->editAttributes() ?>>
<?php if (!$query_report_base->Date_Time->ReadOnly && !$query_report_base->Date_Time->Disabled && !isset($query_report_base->Date_Time->EditAttrs["readonly"]) && !isset($query_report_base->Date_Time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fquery_reportrpt", "y_Date_Time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fquery_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_query_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Query_Id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Query_Id"><div class="query_report_Query_Id"><span class="ew-table-header-caption"><?php echo $Page->Query_Id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Query_Id">
<?php if ($Page->sortUrl($Page->Query_Id) == "") { ?>
		<div class="ew-table-header-btn query_report_Query_Id">
			<span class="ew-table-header-caption"><?php echo $Page->Query_Id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer query_report_Query_Id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Query_Id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Query_Id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Query_Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Query_Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="query_report_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn query_report_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer query_report_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Language_Name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Language_Name"><div class="query_report_Language_Name"><span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Language_Name">
<?php if ($Page->sortUrl($Page->Language_Name) == "") { ?>
		<div class="ew-table-header-btn query_report_Language_Name">
			<span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Language_Name', form: 'fquery_reportrpt', name: 'query_report_Language_Name', range: false, from: '<?php echo $Page->Language_Name->RangeFrom; ?>', to: '<?php echo $Page->Language_Name->RangeTo; ?>' });" id="x_Language_Name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer query_report_Language_Name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Language_Name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Language_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Language_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Language_Name', form: 'fquery_reportrpt', name: 'query_report_Language_Name', range: false, from: '<?php echo $Page->Language_Name->RangeFrom; ?>', to: '<?php echo $Page->Language_Name->RangeTo; ?>' });" id="x_Language_Name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Description->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Description"><div class="query_report_Description"><span class="ew-table-header-caption"><?php echo $Page->Description->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Description">
<?php if ($Page->sortUrl($Page->Description) == "") { ?>
		<div class="ew-table-header-btn query_report_Description">
			<span class="ew-table-header-caption"><?php echo $Page->Description->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer query_report_Description" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Description) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Description->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Date_Time->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Date_Time"><div class="query_report_Date_Time"><span class="ew-table-header-caption"><?php echo $Page->Date_Time->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Date_Time">
<?php if ($Page->sortUrl($Page->Date_Time) == "") { ?>
		<div class="ew-table-header-btn query_report_Date_Time">
			<span class="ew-table-header-caption"><?php echo $Page->Date_Time->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Date_Time', form: 'fquery_reportrpt', name: 'query_report_Date_Time', range: false, from: '<?php echo $Page->Date_Time->RangeFrom; ?>', to: '<?php echo $Page->Date_Time->RangeTo; ?>' });" id="x_Date_Time<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer query_report_Date_Time" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Date_Time) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Date_Time->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Date_Time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Date_Time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Date_Time', form: 'fquery_reportrpt', name: 'query_report_Date_Time', range: false, from: '<?php echo $Page->Date_Time->RangeFrom; ?>', to: '<?php echo $Page->Date_Time->RangeTo; ?>' });" id="x_Date_Time<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
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
<?php if ($Page->Query_Id->Visible) { ?>
		<td data-field="Query_Id"<?php echo $Page->Query_Id->cellAttributes() ?>>
<span<?php echo $Page->Query_Id->viewAttributes() ?>><?php echo $Page->Query_Id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>>
<span<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Language_Name->Visible) { ?>
		<td data-field="Language_Name"<?php echo $Page->Language_Name->cellAttributes() ?>>
<span<?php echo $Page->Language_Name->viewAttributes() ?>><?php echo $Page->Language_Name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Description->Visible) { ?>
		<td data-field="Description"<?php echo $Page->Description->cellAttributes() ?>>
<span<?php echo $Page->Description->viewAttributes() ?>><?php echo $Page->Description->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Date_Time->Visible) { ?>
		<td data-field="Date_Time"<?php echo $Page->Date_Time->cellAttributes() ?>>
<span<?php echo $Page->Date_Time->viewAttributes() ?>><?php echo $Page->Date_Time->getViewValue() ?></span></td>
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
<div id="gmp_query_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "query_report_pager.php" ?>
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