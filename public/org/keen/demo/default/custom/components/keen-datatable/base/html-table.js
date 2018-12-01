"use strict";
// Class definition

var DatatableHtmlTableDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.k-datatable').KDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
					field: 'DepositPaid',
					type: 'number',
				},
				{
					field: 'OrderDate',
					type: 'date',
					format: 'YYYY-MM-DD',
				}, {
					field: 'Status',
					title: 'Status',
					autoHide: false,
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
						return '<span class="k-badge ' + status[row.Status].class + ' k-badge--inline k-badge--pill">' + status[row.Status].title + '</span>';
					},
				}, {
					field: 'Type',
					title: 'Type',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'accent'},
						};
						return '<span class="k-badge k-badge--' + status[row.Type].state + ' k-badge--dot"></span>&nbsp;<span class="k-font-bold k-font-' +status[row.Type].state + '">' +	status[row.Type].title + '</span>';
					},
				},
			],
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
		// Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	DatatableHtmlTableDemo.init();
});