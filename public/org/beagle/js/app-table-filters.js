/*!
 * Beagle v1.5.1
 * https://foxythemes.net
 *
 * Copyright (c) 2018 Foxy Themes
 */

var App = (function () {
  'use strict';

  App.tableFilters = function( ){ 

    //Select2 init
    $('.select2').select2({
      width: '100%'
    });
    
    //Select2 tags init
    $('.tags').select2({tags: true, width: '100%'});

    //Bootstrap Slider init
    $('.bslider').bootstrapSlider();    

    //Date Picker init
    $(".datetimepicker").datetimepicker({
      autoclose: true,
      componentIcon: '.mdi.mdi-calendar',
      format: 'mm/dd/yyyy',
      navIcons:{
        rightIcon: 'mdi mdi-chevron-right',
        leftIcon: 'mdi mdi-chevron-left'
      }
    });

    //Filters
    $.fn.dataTable.ext.search.push(
      function( settings, searchData, index, rowData, counter ) {

        //Milestone slider
        var filter_progress = $('#milestone_slider').val().split(',');
        var progress = $(settings.aoData[index].anCells[3]).data('progress').split(',');

        //Select2        
        var filter_project = $('.select2').val();
        var project = $(settings.aoData[index].anCells[2]).data('project');

        //Date
        var filter_date_since = $('#dateSince').val() !== '' ? new Date($('#dateSince').val()) : new Date('01/01/1999');
        var filter_date_to = $('#dateTo').val() !== '' ? new Date($('#dateTo').val()) : new Date('01/01/2099');
        var date = new Date($('.date', settings.aoData[index].anCells[5]).html());

        //Status
        var filter_to_do = $('#toDo').is(':checked');
        var filter_in_progress = $('#inProgress').is(':checked');
        var filter_in_review = $('#inReview').is(':checked');
        var filter_done = $('#done').is(':checked');
        var status = $(settings.aoData[index].nTr).attr('class').split(" ");

        //Conditional filters
        if( !(parseInt(progress[1]) >= parseInt(filter_progress[0]) && parseInt(progress[1]) <= parseInt(filter_progress[1])) ){ return false; }
        if( !(filter_project == project || filter_project == 'All') ){ return false; }
        if( !(date >= filter_date_since && date <= filter_date_to) ){ return false; }
        if( !(filter_to_do == false && filter_in_progress == false && filter_in_review == false && filter_done == false || filter_to_do == true && status[1] == 'to-do' || filter_in_progress == true && status[1] == 'in-progress' || filter_in_review == true && status[1] == 'in-review' || filter_done == true && status[1] == 'done') ){ return false; }

        return true;

      }
    );
    
    //Table init
    var table = $('#table1').DataTable({
      pageLength: 5,
      dom:  "<'row be-datatable-body'<'col-sm-12'tr>>" +
            "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    });

    //Slider event
    $('#milestone_slider').slider().on('slide',function(e){
      var v1 = e.value[0];
      var v2 = e.value[1];

      $('#slider-value').html( v1 + '%' + ' - ' + v2 + '%');
      table.draw();
    });

    //Select2 event
    $('.select2').on('change', function() {
      table.draw();
    });

    //Date since-to
    $('#dateSince, #dateTo').on('change', function(){
      table.draw();
    });

    //Status
    $('#toDo, #inProgress, #inReview, #done').on('click', function(){
      table.draw();
    });
  };

  return App;
})(App || {});
