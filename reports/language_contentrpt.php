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
if (!isset($language_content_rpt))
	$language_content_rpt = new language_content_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$language_content_rpt;

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
var flanguage_contentrpt = currentForm = new ew.Form("flanguage_contentrpt");

// Validate method
flanguage_contentrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
flanguage_contentrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
flanguage_contentrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
flanguage_contentrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
flanguage_contentrpt.lists["x_Language_Name"] = <?php echo $language_content_rpt->Language_Name->Lookup->toClientList() ?>;
flanguage_contentrpt.lists["x_Language_Name"].popupValues = <?php echo json_encode($language_content_rpt->Language_Name->SelectionList) ?>;
flanguage_contentrpt.lists["x_Language_Name"].popupOptions = <?php echo JsonEncode($language_content_rpt->Language_Name->popupOptions()) ?>;
flanguage_contentrpt.lists["x_Language_Name"].options = <?php echo JsonEncode($language_content_rpt->Language_Name->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $language_content_rpt->CenterContentClass ?>">
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
<form name="flanguage_contentrpt" id="flanguage_contentrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="flanguage_contentrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Language_Name" class="ew-cell form-group">
	<label for="x_Language_Name" class="ew-search-caption ew-label"><?php echo $Page->Language_Name->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->Language_Name->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->Language_Name->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="language_content" data-field="x_Language_Name" data-value-separator="<?php echo $Page->Language_Name->displayValueSeparatorAttribute() ?>" id="x_Language_Name" name="x_Language_Name"<?php echo $Page->Language_Name->editAttributes() ?>>
		<?php echo $Page->Language_Name->selectOptionListHtml("x_Language_Name") ?>
	</select>
</div>
<?php echo $Page->Language_Name->Lookup->getParamTag("p_x_Language_Name") ?>
</span>
</div>
</div>
</div>
</form>
<script>
flanguage_contentrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_language_content" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Subtitle_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Subtitle_id"><div class="language_content_Subtitle_id"><span class="ew-table-header-caption"><?php echo $Page->Subtitle_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Subtitle_id">
<?php if ($Page->sortUrl($Page->Subtitle_id) == "") { ?>
		<div class="ew-table-header-btn language_content_Subtitle_id">
			<span class="ew-table-header-caption"><?php echo $Page->Subtitle_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer language_content_Subtitle_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Subtitle_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Subtitle_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Subtitle_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Subtitle_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Subtitle->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Subtitle"><div class="language_content_Subtitle"><span class="ew-table-header-caption"><?php echo $Page->Subtitle->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Subtitle">
<?php if ($Page->sortUrl($Page->Subtitle) == "") { ?>
		<div class="ew-table-header-btn language_content_Subtitle">
			<span class="ew-table-header-caption"><?php echo $Page->Subtitle->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer language_content_Subtitle" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Subtitle) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Subtitle->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Subtitle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Subtitle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Title_Name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Title_Name"><div class="language_content_Title_Name"><span class="ew-table-header-caption"><?php echo $Page->Title_Name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Title_Name">
<?php if ($Page->sortUrl($Page->Title_Name) == "") { ?>
		<div class="ew-table-header-btn language_content_Title_Name">
			<span class="ew-table-header-caption"><?php echo $Page->Title_Name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer language_content_Title_Name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Title_Name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Title_Name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Title_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Title_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Language_Name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Language_Name"><div class="language_content_Language_Name"><span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Language_Name">
<?php if ($Page->sortUrl($Page->Language_Name) == "") { ?>
		<div class="ew-table-header-btn language_content_Language_Name">
			<span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Language_Name', form: 'flanguage_contentrpt', name: 'language_content_Language_Name', range: false, from: '<?php echo $Page->Language_Name->RangeFrom; ?>', to: '<?php echo $Page->Language_Name->RangeTo; ?>' });" id="x_Language_Name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer language_content_Language_Name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Language_Name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Language_Name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Language_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Language_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Language_Name', form: 'flanguage_contentrpt', name: 'language_content_Language_Name', range: false, from: '<?php echo $Page->Language_Name->RangeFrom; ?>', to: '<?php echo $Page->Language_Name->RangeTo; ?>' });" id="x_Language_Name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
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
<?php if ($Page->Subtitle_id->Visible) { ?>
		<td data-field="Subtitle_id"<?php echo $Page->Subtitle_id->cellAttributes() ?>>
<span<?php echo $Page->Subtitle_id->viewAttributes() ?>><?php echo $Page->Subtitle_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Subtitle->Visible) { ?>
		<td data-field="Subtitle"<?php echo $Page->Subtitle->cellAttributes() ?>>
<span<?php echo $Page->Subtitle->viewAttributes() ?>><?php echo $Page->Subtitle->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Title_Name->Visible) { ?>
		<td data-field="Title_Name"<?php echo $Page->Title_Name->cellAttributes() ?>>
<span<?php echo $Page->Title_Name->viewAttributes() ?>><?php echo $Page->Title_Name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Language_Name->Visible) { ?>
		<td data-field="Language_Name"<?php echo $Page->Language_Name->cellAttributes() ?>>
<span<?php echo $Page->Language_Name->viewAttributes() ?>><?php echo $Page->Language_Name->getViewValue() ?></span></td>
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
<div id="gmp_language_content" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "language_content_pager.php" ?>
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