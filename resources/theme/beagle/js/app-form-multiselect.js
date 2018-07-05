var App = (function () {
	'use strict';

	App.formMultiselect = function( ){

    //Multiselect init

    $('#my-select').multiSelect()
    $('#pre-selected-options').multiSelect();
    $('#callbacks').multiSelect({
      afterSelect: function(values){
        alert("Select value: "+values);
      },
      afterDeselect: function(values){
        alert("Deselect value: "+values);
      }
    });
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    $('#disabled-attribute').multiSelect();
    $('#custom-headers').multiSelect({
      selectableHeader: "<div class='custom-header'>Selectable items</div>",
      selectionHeader: "<div class='custom-header'>Selection items</div>",
    });
    $('#searchable').multiSelect({
      selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
      selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
      afterInit: function(ms){
        var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
        .on('keydown', function(e){
          if (e.which === 40){
            that.$selectableUl.focus();
            return false;
          }
        });

        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
        .on('keydown', function(e){
          if (e.which == 40){
            that.$selectionUl.focus();
            return false;
          }
        });
      },
      afterSelect: function(){
        this.qs1.cache();
        this.qs2.cache();
      },
      afterDeselect: function(){
        this.qs1.cache();
        this.qs2.cache();
      }
    });
	};

  return App;
})(App || {});