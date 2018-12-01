"use strict";
// Class definition

var DatatableJsonRemoteDemo = function () {
	// Private functions

	// basic demo
	var demo = function () {

		var datatable = $('.k_datatable').KDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: 'https://keenthemes.com/keen/themes/themes/keen/dist/preview/inc/api/datatables/datasource/employee.json',
				pageSize: 10,
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#generalSearch')
			},

			// columns definition
			columns: [
				{
					field: 'id',
					title: '#',
					sortable: false,
					width: 20,
					type: 'number',
					selector: {class: 'k-checkbox--solid k-checkbox--brand'},
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
					field: 'phone',
					title: 'Phone',
				}, {
					field: 'hire_date',
					title: 'Hire Date',
					type: 'date',
					format: 'MM/DD/YYYY',
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
					autoHide: false,
					overflow: 'visible',
					textAlign: 'left',
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

    $('#k_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'status');
    });

    $('#k_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'type');
    });

    $('#k_form_status,#k_form_type').selectpicker();

	};

	return {
		// public functions
		init: function () {
			demo();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableJsonRemoteDemo.init();
});