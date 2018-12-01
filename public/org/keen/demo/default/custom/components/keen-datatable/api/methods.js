"use strict";
// Class definition

var DefaultDatatableDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		var options = {
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'https://keenthemes.com/keen/themes/themes/keen/dist/preview/inc/api/datatables/demos/default.php',
					},
				},
				pageSize: 20, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				height: 550, // datatable's body's fixed height
				footer: false, // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

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

		};

		var datatable = $('.k_datatable').KDatatable(options);

		// both methods are supported
		// datatable.methodName(args); or $(datatable).KDatatable(methodName, args);

		$('#k_datatable_destroy').on('click', function() {
			// datatable.destroy();
			$('.k_datatable').KDatatable('destroy');
		});

		$('#k_datatable_init').on('click', function() {
			datatable = $('.k_datatable').KDatatable(options);
		});

		$('#k_datatable_reload').on('click', function() {
			// datatable.reload();
			$('.k_datatable').KDatatable('reload');
		});

		$('#k_datatable_sort_asc').on('click', function() {
			datatable.sort('name', 'asc');
		});

		$('#k_datatable_sort_desc').on('click', function() {
			datatable.sort('name', 'desc');
		});

		// get checked record and get value by column name
		$('#k_datatable_get').on('click', function() {
			// select active rows
			datatable.rows('.k-datatable__row--active');
			// check selected nodes
			if (datatable.nodes().length > 0) {
				// get column by field name and get the column nodes
				var value = datatable.columns('name').nodes().text();
				$('#datatable_value').html(value);
			}
		});

		// record selection
		$('#k_datatable_check').on('click', function() {
			var input = $('#k_datatable_check_input').val();
			datatable.setActive(input);
		});

		$('#k_datatable_check_all').on('click', function() {
			// datatable.setActiveAll(true);
			$('.k_datatable').KDatatable('setActiveAll', true);
		});

		$('#k_datatable_uncheck_all').on('click', function() {
			// datatable.setActiveAll(false);
			$('.k_datatable').KDatatable('setActiveAll', false);
		});

		$('#k_datatable_hide_column').on('click', function() {
			datatable.columns('email').visible(false);
		});

		$('#k_datatable_show_column').on('click', function() {
			datatable.columns('email').visible(true);
		});

		$('#k_datatable_remove_row').on('click', function() {
			datatable.rows('.k-datatable__row--active').remove();
		});
	};

	return {
		// public functions
		init: function() {
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	DefaultDatatableDemo.init();
});