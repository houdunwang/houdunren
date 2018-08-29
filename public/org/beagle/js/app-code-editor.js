/*!
 * Beagle v1.5.1
 * https://foxythemes.net
 *
 * Copyright (c) 2018 Foxy Themes
 */

var App = (function () {
  'use strict';

  App.codeEditor = function( ){

    /*Codemirror*/
    var code = $("#code1").html();
    code = code.replace(/&lt;/g, '<');
    code = code.replace(/&gt;/g, '>');
    console.log(code);

    var myCodeMirror = CodeMirror($('#console')[0], {
      lineNumbers: true,
      theme: 'monokai',
      value: code,
      mode:  "text/html",
      tabSize: 2
    });
    
    setTimeout(function(){
      myCodeMirror.refresh();
    },200);
    
  };

  return App;
})(App || {});
