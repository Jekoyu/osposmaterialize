<?php $this->load->view('themes/header2') ?>
<?php $this->load->view('themes/aside') ?>
<?php $this->load->view('themes/topbar2') ?>


<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
		<div class="row">
			<div class="col-md-12">
				<!-- Basic Bootstrap Table -->
				<div class="card">
					<div class="card-datatable table-responsive pt-0">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
							<div class="card-header flex-column flex-md-row">
								<div class="head-label text-center">
									<h5 class="card-title mb-0">DataTable with Buttons</h5>
								</div>
								<div class="dt-action-buttons text-end pt-3 pt-md-0">
									<div class="dt-buttons"> <button class="dt-button buttons-collection dropdown-toggle btn btn-label-primary me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="mdi mdi-export-variant me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></span><span class="dt-down-arrow">▼</span></button> <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
												<option value="7">7</option>
												<option value="10">10</option>
												<option value="25">25</option>
												<option value="50">50</option>
												<option value="75">75</option>
												<option value="100">100</option>
											</select> entries</label></div>
								</div>
								<div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
									<div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div>
								</div>
							</div>
							<table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1395px;">
								<thead>
									<tr>
										<th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 47.6939px; display: none;" aria-label=""></th>
										<th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 49.6939px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 142.694px;" aria-label="Name: activate to sort column ascending">Name</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 146.694px;" aria-label="Email: activate to sort column ascending">Email</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132.694px;" aria-label="Date: activate to sort column ascending">Date</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 172.694px;" aria-label="Salary: activate to sort column ascending">Salary</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 170.694px;" aria-label="Status: activate to sort column ascending">Status</th>
										<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 176px;" aria-label="Actions">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd">
										<td valign="top" colspan="7" class="dataTables_empty">Loading...</td>
									</tr>
								</tbody>
							</table>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
										<ul class="pagination">
											<li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
											<li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('themes/footer2') ?>