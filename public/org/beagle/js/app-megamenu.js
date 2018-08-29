/*!
 * Beagle v1.5.1
 * https://foxythemes.net
 *
 * Copyright (c) 2018 Foxy Themes
 */

var App = (function () {
  'use strict';

  App.megaMenu = function( ){

    var config = {
      megaMenuSectionClass: 'be-mega-menu-section',
      navTabsClass: 'be-nav-tabs',
      subNavClass: 'be-sub-nav'
    };

    var megaMenu, navTabs;

    //Main tabs active state sync
    function tabSync() {
      var tabs = $( '.navbar-nav > .nav-item', navTabs );
      var openTabs = tabs.filter( '.open' );

      if( !openTabs.length ) {
        tabs.filter( ':first-child' ).addClass( 'open' );
      }
    }

    //Wait for final event on window resize
    var waitForFinalEvent = (function () {
      var timers = {};
      return function (callback, ms, uniqueId) {
        if (!uniqueId) {
          uniqueId = "x1x2x3x4";
        }
        if (timers[uniqueId]) {
          clearTimeout (timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
      };
    })();

    //Sub navigation interaction
    function subNav(){
      $('.be-sub-header .nav-link, .be-sub-header .dropdown-item', navTabs).on('click',function( e ){
        var _this = $( this );
        var parent = _this.parent();
        var openElements = parent.siblings( '.open' );
        var subNav = _this.next( '.' + config.subNavClass );
        var slideSpeed = config.leftSidebarSlideSpeed;

        function closeSubMenu( subMenu ){
          var _parent = $( subMenu ).parent();
          var openChildren = $( '.nav-item.open, .' + config.megaMenuSectionClass + '.open', _parent );

          subMenu.slideUp({ duration: slideSpeed, complete: function(){
            _parent.removeClass( 'open' );
            openChildren.removeClass( 'open' );
            $( this ).removeAttr( 'style' );
          }});
        }

        function openSubMenu( subMenu ){
          var _parent = subMenu.parent();
          var openSubMenus = false;

          // Get the open sub menus
          openSubMenus = _parent.siblings( '.open' );

          if( _parent.hasClass( config.megaMenuSectionClass ) ) {
            var megaColumn = _parent.parent();
            openSubMenus = openSubMenus.add( megaColumn.siblings().find( '.' + config.megaMenuSectionClass + '.open' ) );
          }
          // If there are open sub menus close them
          if( openSubMenus ) {
            closeSubMenu( $( '> .' + config.subNavClass, openSubMenus ) );
          }

          subMenu.slideDown({ duration: slideSpeed, complete: function(){
            _parent.addClass( 'open' );
            $( this ).removeAttr( 'style' );
          }});
        }

        // Check if the event is fired from mobile
        if( $.isSm() ) {
          if( subNav.length ) {
            if( parent.hasClass( 'open' ) ) {
              closeSubMenu( subNav );
            } else {
              openSubMenu( subNav );
            }
            e.preventDefault();
          }

          // Stop default bootstrap dropdown interaction
          e.stopPropagation();
        } else if ( parent.parent().hasClass('navbar-nav') ) {
          if ( subNav.length ) {
            openElements.removeClass( 'open' );
            parent.addClass( 'open' );

            e.preventDefault();
          }
        }
      });

      // Sync tabs when resize between mobile and desktop resolutions
      $(window).resize(function() {
        waitForFinalEvent(function() {
          if( !$.isSm() ) {
            tabSync();
          }
        }, 100, "sync_tabs");
      });
    }

    /*Navigation tabs*/
    subNav();
  };

  return App;
})(App || {});
