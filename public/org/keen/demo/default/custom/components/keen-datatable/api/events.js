"use strict";
// Class definition

var DefaultDatatableDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		var datatable = $('.k_datatable').KDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'https://keenthemes.com/keen/themes/themes/keen/dist/preview/inc/api/datatables/demos/default.php',
					},
				},
				pageSize: 5, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				height: 'auto', // datatable's body's fixed height
				footer: false, // display/hide footer
			},

			// column sorting
			sortable: true,

			// toolbar
			toolbar: {
				// toolbar placement can be at top or bottom or both top and bottom repeated
				placement: ['bottom'],

				// toolbar items
				items: {
					// pagination
					pagination: {
						// page size select
						pageSizeSelect: [5, 10, 20, 30, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
					},
				},
			},

			search: {
				input: $('#generalSearch'),
			},

			// columns definition
			columns: [
				{
					field: 'id',
					title: '#',
					sortable: 'asc',
					width: 30,
					type: 'number',
					selector: false,
					textAlign: 'center',
				}, {
					field: 'employee_id',
					title: 'Employee ID',
				}, {
					field: 'name',
					title: 'Name',
					template: function(row) {
						return row.first_name + ' ' + row.last_name;
					},
				}, {
					field: 'hire_date',
					title: 'Hire Date',
					type: 'date',
					format: 'MM/DD/YYYY',
				}, {
					field: 'gender',
					title: 'Gender',
				}, {
					field: 'status',
					title: 'Status',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Pending', 'class': 'k-badge--brand'},
							2: {'title': 'Delivered', 'class': ' k-badge--metal'},
							3: {'title': 'Canceled', 'class': ' k-badge--primary'},
							4: {'title': 'Success', 'class': ' k-badge--success'},
							5: {'title': 'Info', 'class': ' k-badge--info'},
							6: {'title': 'Danger', 'class': ' k-badge--danger'},
							7: {'title': 'Warning', 'class': ' k-badge--warning'},
						};
						return '<span class="k-badge ' + status[row.status].class + ' k-badge--inline k-badge--pill">' + status[row.status].title + '</span>';
					},
				}, {
					field: 'type',
					title: 'Type',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'accent'},
						};
						return '<span class="k-badge k-badge--' + status[row.type].state + ' k-badge--dot"></span>&nbsp;<span class="k-font-bold k-font-' + status[row.type].state + '">' +
							status[row.type].title + '</span>';
					},
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 100,
					overflow: 'visible',
					textAlign: 'left',
					autoHide: false,
					template: function() {
						return '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
						  	</div>\
						</div>\
						<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';
					},
				}],

		});

		$('#k_datatable_clear').on('click', function() {
			$('#k_datatable_console').html('');
		});

		$('#k_datatable_reload').on('click', function() {
			datatable.reload();
		});
	};

	var eventsCapture = function() {
		$('.k_datatable').on('k-datatable--on-init', function() {
			eventsWriter('Datatable init');
		}).on('k-datatable--on-layout-updated', function() {
			eventsWriter('Layout render updated');
		}).on('k-datatable--on-ajax-done', function() {
			eventsWriter('Ajax data successfully updated');
		}).on('k-datatable--on-ajax-fail', function(e, jqXHR) {
			eventsWriter('Ajax error');
		}).on('k-datatable--on-goto-page', function(e, args) {
			eventsWriter('Goto to pagination: ' + args.page);
		}).on('k-datatable--on-update-perpage', function(e, args) {
			eventsWriter('Update page size: ' + args.perpage);
		}).on('k-datatable--on-reloaded', function(e) {
			eventsWriter('Datatable reloaded');
		}).on('k-datatable--on-check', function(e, args) {
			eventsWriter('Checkbox active: ' + args.toString());
		}).on('k-datatable--on-uncheck', function(e, args) {
			eventsWriter('Checkbox inactive: ' + args.toString());
		}).on('k-datatable--on-sort', function(e, args) {
			eventsWriter('Datatable sorted by ' + args.field + ' ' + args.sort);
		});
	};

	var eventsWriter = function(string) {
		var console = $('#k_datatable_console').append(string + '\t\n');
		$(console).scrollTop(console[0].scrollHeight - $(console).height());
	};

	return {
		// public functions
		init: function() {
			demo();
			eventsCapture();
		},
	};
}();

jQuery(document).ready(function() {
	DefaultDatatableDemo.init();
});