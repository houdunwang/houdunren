(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module unless amdModuleId is set
    define('simditor-fullscreen', ["jquery","simditor"], function (a0,b1) {
      return (root['SimditorFullscreen'] = factory(a0,b1));
    });
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like environments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"),require("simditor"));
  } else {
    root['SimditorFullscreen'] = factory(jQuery,Simditor);
  }
}(this, function ($, Simditor) {

var SimditorFullscreen,
  extend = function(child, parent) { for (var key in parent) { if (hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
  hasProp = {}.hasOwnProperty;

SimditorFullscreen = (function(superClass) {
  extend(SimditorFullscreen, superClass);

  function SimditorFullscreen() {
    return SimditorFullscreen.__super__.constructor.apply(this, arguments);
  }

  SimditorFullscreen.cls = 'simditor-fullscreen';

  SimditorFullscreen.i18n = {
    'zh-CN': {
      fullscreen: '全屏'
    }
  };

  SimditorFullscreen.prototype.name = 'fullscreen';

  SimditorFullscreen.prototype.needFocus = false;

  SimditorFullscreen.prototype.iconClassOf = function() {
    return 'icon-fullscreen';
  };

  SimditorFullscreen.prototype._init = function() {
    SimditorFullscreen.__super__._init.call(this);
    this.window = $(window);
    this.body = $('body');
    this.editable = this.editor.body;
    return this.toolbar = this.editor.toolbar.wrapper;
  };

  SimditorFullscreen.prototype.status = function() {
    return this.setActive(this.body.hasClass(this.constructor.cls));
  };

  SimditorFullscreen.prototype.command = function() {
    var editablePadding, isFullscreen;
    this.body.toggleClass(this.constructor.cls);
    isFullscreen = this.body.hasClass(this.constructor.cls);
    if (isFullscreen) {
      editablePadding = this.editable.outerHeight() - this.editable.height();
      this.window.on("resize.simditor-fullscreen-" + this.editor.id, (function(_this) {
        return function() {
          return _this._resize({
            height: _this.window.height() - _this.toolbar.outerHeight() - editablePadding
          });
        };
      })(this)).resize();
    } else {
      this.window.off("resize.simditor-fullscreen-" + this.editor.id).resize();
      this._resize({
        height: 'auto'
      });
    }
    return this.setActive(isFullscreen);
  };

  SimditorFullscreen.prototype._resize = function(size) {
    return this.editable.height(size.height);
  };

  return SimditorFullscreen;

})(Simditor.Button);

Simditor.Toolbar.addButton(SimditorFullscreen);

return SimditorFullscreen;

}));
