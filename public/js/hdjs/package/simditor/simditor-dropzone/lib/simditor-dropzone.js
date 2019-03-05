(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(["jquery",
      "simple-module",
      "simditor"], function ($, SimpleModule, Simditor) {
      return (root.returnExportsGlobal = factory($, SimpleModule, Simditor));
    });
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like enviroments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"),
      require("simple-module"),
      require("simditor"));
  } else {
    root['Simditor'] = factory(jQuery,
      SimpleModule,
      Simditor);
  }
}(this, function ($, SimpleModule, Simditor) {

var Dropzone,
  __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

Dropzone = (function(_super) {
  __extends(Dropzone, _super);

  function Dropzone() {
    return Dropzone.__super__.constructor.apply(this, arguments);
  }

  Dropzone.pluginName = "Dropzone";

  Dropzone.prototype._entered = 0;

  Dropzone.prototype._init = function() {
    this.editor = this._module;
    if (this.editor.uploader == null) {
      throw new Error("Can't work without 'simple-uploader' module");
      return;
    }
    $(document.body).on("dragover", function(e) {
      e.originalEvent.dataTransfer.dropEffect = "none";
      return e.preventDefault();
    });
    $(document.body).on('drop', function(e) {
      return e.preventDefault();
    });
    this.imageBtn = this.editor.toolbar.findButton("image");
    return this.editor.body.on("dragover", function(e) {
      e.originalEvent.dataTransfer.dropEffect = "copy";
      e.stopPropagation();
      return e.preventDefault();
    }).on("dragenter", (function(_this) {
      return function(e) {
        if ((_this._entered += 1) === 1) {
          _this.show();
        }
        e.preventDefault();
        return e.stopPropagation();
      };
    })(this)).on("dragleave", (function(_this) {
      return function(e) {
        if ((_this._entered -= 1) <= 0) {
          _this.hide();
        }
        e.preventDefault();
        return e.stopPropagation();
      };
    })(this)).on("drop", (function(_this) {
      return function(e) {
        var file, imageFiles, _i, _j, _len, _len1, _ref;
        imageFiles = [];
        _ref = e.originalEvent.dataTransfer.files;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          file = _ref[_i];
          if (!_this.validFile(file)) {
            alert("「" + file.name + "]」文件不是图片。");
            _this.hide();
            return false;
          }
          imageFiles.push(file);
        }
        for (_j = 0, _len1 = imageFiles.length; _j < _len1; _j++) {
          file = imageFiles[_j];
          _this.editor.uploader.upload(file, {
            inline: true
          });
        }
        _this.hide();
        e.stopPropagation();
        return e.preventDefault();
      };
    })(this));
  };

  Dropzone.prototype.show = function() {
    return this.imageBtn.setActive(true);
  };

  Dropzone.prototype.hide = function() {
    this.imageBtn.setActive(false);
    return this._entered = 0;
  };

  Dropzone.prototype.validFile = function(file) {
    return file.type.indexOf("image/") > -1;
  };

  return Dropzone;

})(SimpleModule);

Simditor.connect(Dropzone);


return Simditor;


}));
