/**
 * jStyling - jQuery plugin for styling HTML elements
 *
 * Copyright (c) 2010 Dmitry Avseyenko
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * @version 1.0
 * @author Dmitry Avseyenko <polsad@gmail.com>
 */
(function ($) {
  $.jStyling = function (a) {
    $.jStyling.main.init(a);
  };
  $.jStyling.createSelect = function (a, b) {
    $.jStyling.main.createSelect(a, b);
  };
  $.jStyling.updateSelect = function (a) {
    $.jStyling.main.updateSelect(a);
  };
  $.jStyling.destroySelect = function (a) {
    $.jStyling.main.destroySelect(a);
  };
  $.jStyling.createCheckbox = function (a, b) {
    $.jStyling.main.createCheckbox(a, b);
  };
  $.jStyling.updateCheckbox = function (a) {
    $.jStyling.main.updateCheckbox(a);
  };
  $.jStyling.destroyCheckbox = function (a) {
    $.jStyling.main.destroyCheckbox(a);
  };
  $.jStyling.createRadio = function (a, b) {
    $.jStyling.main.createRadio(a, b);
  };
  $.jStyling.updateRadio = function (a) {
    $.jStyling.main.updateRadio(a);
  };
  $.jStyling.destroyRadio = function (a) {
    $.jStyling.main.destroyRadio(a);
  };
  $.jStyling.createFileInput = function (a, b) {
    $.jStyling.main.createFileInput(a, b);
  };
  $.jStyling.destroyFileInput = function (a) {
    $.jStyling.main.destroyFileInput(a);
  };
  $.fn.jStyling = function (a) {
    return $.jStyling(a);
  };
  $.jStyling.settings = { selectClass: { w: "jstyling-select", s: "jstyling-select-s", l: "jstyling-select-l", t: "jstyling-select-t" }, checkboxClass: "jstyling-checkbox", radioClass: "jstyling-radio", fileClass: { w: "jstyling-file", f: "jstyling-file-f", b: "jstyling-file-b" }, fileButtonText: "Browse" };
  $.jStyling.customOptions = {};
  $.jStyling.main = {
    init: function (a) {
      $.extend($.jStyling.settings, a || {});
    },
    checkType: function (a, b) {
      var c = $(a).is(b) ? true : false;
      return c;
    },
    createSelect: function (m, n) {
      $.jStyling.customOptions = n ? n : {};
      return m.each(function () {
        if (!$.jStyling.main.checkType(this, "select")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.selectClass.w)
        ) {
          return false;
        }
        var d = this;
        var f = $("<div>").addClass($.jStyling.settings.selectClass.w);
        if ($(d).attr("disabled")) {
          f.addClass("disabled");
        }
        if ($.jStyling.customOptions.extraClass) {
          $(f).addClass($.jStyling.customOptions.extraClass);
        }
        var g = $("<div>").addClass($.jStyling.settings.selectClass.s);
        var h = $("<div>").addClass($.jStyling.settings.selectClass.t);
        var j = $(d).find("option");
        var k = '<div class="' + $.jStyling.settings.selectClass.l + '">';
        for (var i = 0; i < j.length; i++) {
          var l;
          if ($(j[i]).attr("disabled")) {
            l = "item-" + $(j[i]).val() + " disabled";
          } else if ($(j[i]).prop("selected")) {
            l = "item-" + $(j[i]).val() + " selected";
          } else {
            l = "item-" + $(j[i]).val();
          }
          k = k + '<div class="' + l + '"><span>' + $(j[i]).html() + "</span></div>";
        }
        k = k + "</div>";
        h.html($(d).find("option:selected").html());
        f.append(k).append(g);
        g.append(h);
        $(d).before(f).hide();
        $(f).append(d);
        $(f)
          .find("." + $.jStyling.settings.selectClass.l + " div")
          .bind("click", function () {
            if (!$(this).is(".disabled")) {
              var a = $(this).attr("class").replace("item-", "").replace(" disabled", "").replace(" selected", "");
              var b = $(d).find('option[value="' + a + '"]');
              $(d).get(0).selectedIndex = parseInt($(b).index());
              $(d).trigger("change");
              h.html($(b).html());
              $(f).find(".selected").removeClass("selected");
              $(this).addClass("selected");
            }
          });
        f.bind("click", function () {
          if (!$(this).find("select").attr("disabled")) {
            var c = $(this).is(" .active");
            if (false == c) {
              $("." + $.jStyling.settings.selectClass.l + ":visible")
                .parent()
                .removeClass("active");
            }
            $(this).toggleClass("active");
            if (false == c) {
              $(document)
                .unbind("click.closeSelect")
                .bind("click.closeSelect", function (e) {
                  var a = e.target;
                  var b = $("." + $.jStyling.settings.selectClass.l + ":visible")
                    .parent()
                    .find("*")
                    .addBack();
                  if ($.inArray(a, b) < 0) {
                    $("." + $.jStyling.settings.selectClass.w).removeClass("active");
                    $(document).unbind("click.closeSelect");
                  }
                });
            }
          }
        });
      });
    },
    updateSelect: function (k) {
      return k.each(function () {
        if (!$.jStyling.main.checkType(this, "select")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.selectClass.w)
        ) {
          var c = this;
          if ($(c).attr("disabled")) {
            $(c).parent().addClass("disabled");
          } else {
            $(c).parent().removeClass("disabled");
          }
          var d = $(c)
            .parent()
            .find("." + $.jStyling.settings.selectClass.s);
          var e = $(d).find("." + $.jStyling.settings.selectClass.t);
          var f = $(c)
            .parent()
            .find("." + $.jStyling.settings.selectClass.l);
          var g = $(c).find("option");
          var h = "";
          for (var i = 0; i < g.length; i++) {
            var j;
            if ($(g[i]).attr("disabled")) {
              j = "item-" + $(g[i]).val() + " disabled";
            } else if ($(g[i]).prop("selected")) {
              j = "item-" + $(g[i]).val() + " selected";
            } else {
              j = "item-" + $(g[i]).val();
            }
            h = h + '<div class="' + j + '"><span>' + $(g[i]).html() + "</span></div>";
          }
          $(f).html(h);
          $(f)
            .find(" div")
            .unbind("click")
            .bind("click", function () {
              if (!$(this).is(".disabled")) {
                var a = $(this).attr("class").replace("item-", "").replace(" disabled", "");
                var b = $(c).find('option[value="' + a + '"]');
                $(c).get(0).selectedIndex = parseInt($(b).index());
                $(c).trigger("change");
                $(e).html(b.html());
                $(f).find(".selected").removeClass("selected");
                $(this).addClass("selected");
              }
            });
          $(e).html($(c).find("option:selected").html());
        }
      });
    },
    destroySelect: function (c) {
      return c.each(function () {
        if (!$.jStyling.main.checkType(this, "select")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.selectClass.w)
        ) {
          var a = this;
          var b = $(a).parent();
          $(document).unbind("click.closeSelect");
          $(b).before($(a));
          $(b).remove();
          $(a).show();
        }
      });
    },
    createCheckbox: function (f, g) {
      $.jStyling.customOptions = g ? g : {};
      return f.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=checkbox]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.checkboxClass)
        ) {
          return false;
        }
        var a = this;
        var b = $(a).is(":checked") ? " active" : "";
        var c = $(a).attr("disabled") ? " disabled" : "";
        var d = $("<div>").addClass($.jStyling.settings.checkboxClass + b + c);
        if ($.jStyling.customOptions.extraClass) {
          $(d).addClass($.jStyling.customOptions.extraClass);
        }
        $(a).before(d);
        $(d).append(a);
        $(a).bind("click.checkboxClick", function (e) {
          $(a).parent().toggleClass("active");
        });
        $(d).bind("click", function (e) {
          if ($(this).is(".disabled") == false && !$(e.target).is("input[type=checkbox]")) {
            $(a).trigger("click");
          }
        });
      });
    },
    updateCheckbox: function (d) {
      return d.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=checkbox]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.checkboxClass)
        ) {
          var a = this;
          var b = $(a).is(" :checked") ? " active" : "";
          var c = $(a).attr("disabled") ? " disabled" : "";
          $(a)
            .parent()
            .removeClass("active disabled")
            .addClass(b + c);
        }
      });
    },
    destroyCheckbox: function (c) {
      return c.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=checkbox]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.checkboxClass)
        ) {
          var a = this;
          var b = $(a).parent();
          $(a).unbind("click.checkboxClick");
          $(b).before($(a));
          $(b).remove();
        }
      });
    },
    createRadio: function (f, g) {
      $.jStyling.customOptions = g ? g : {};
      return f.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=radio]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.radioClass)
        ) {
          return false;
        }
        var a = this;
        var b = $(a).is(":checked") ? " active" : "";
        var c = $(a).attr("disabled") ? " disabled" : "";
        var d = $("<div>").addClass($.jStyling.settings.radioClass + b + c);
        if ($.jStyling.customOptions.extraClass) {
          $(d).addClass($.jStyling.customOptions.extraClass);
        }
        $(a).before(d);
        $(d).append(a);
        $(a).bind("click.radioClick", function (e) {
          $("input[type=radio][name=" + $(a).attr("name") + "]")
            .parent()
            .removeClass("active");
          $(a).parent().addClass("active");
        });
        $(d).bind("click", function (e) {
          if ($(this).is(".disabled") == false && !$(e.target).is("input[type=radio]")) {
            $(a).trigger("click");
          }
        });
      });
    },
    updateRadio: function (d) {
      return d.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=radio]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.radioClass)
        ) {
          var a = this;
          var b = $(a).is(":checked") ? " active" : "";
          var c = $(a).attr("disabled") ? " disabled" : "";
          $(a)
            .parent()
            .removeClass("active disabled")
            .addClass(b + c);
        }
      });
    },
    destroyRadio: function (c) {
      return c.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=radio]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .is("." + $.jStyling.settings.radioClass)
        ) {
          var a = this;
          var b = $(a).parent();
          $(a).unbind("click.radioClick");
          $(b).before($(a));
          $(b).remove();
        }
      });
    },
    createFileInput: function (e, f) {
      $.jStyling.customOptions = f ? f : {};
      return e.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=file]")) {
          return false;
        }
        if (
          !$(this)
            .parent()
            .parent()
            .is("." + $.jStyling.settings.fileClass.w)
        ) {
          var a = this;
          var b = $("<div>").addClass($.jStyling.settings.fileClass.w);
          var c = $("<div>").addClass($.jStyling.settings.fileClass.f);
          var d = $("<div>").addClass($.jStyling.settings.fileClass.b);
          if ($.jStyling.customOptions.extraClass) {
            $(b).addClass($.jStyling.customOptions.extraClass);
          }
          if ($.jStyling.customOptions.fileButtonText) {
            $(d).html($.jStyling.customOptions.fileButtonText);
          } else {
            $(d).html($.jStyling.settings.fileButtonText);
          }
          if ($(a).val() != "") {
            $(c).html($(a).val());
          }
          $(b).append(c).append(d);
          $(a).before(b);
          $(d).append($(a));
          var h = $(d).outerHeight();
          $(a)
            .css({ height: h + "px", "font-size": h + "px" })
            .bind("change", function () {
              $(this).parent().prev().html($(a).val());
            });
        }
      });
    },
    destroyFileInput: function (c) {
      return c.each(function () {
        if (!$.jStyling.main.checkType(this, "input[type=file]")) {
          return false;
        }
        if (
          $(this)
            .parent()
            .parent()
            .is("." + $.jStyling.settings.fileClass.w)
        ) {
          var a = this;
          var b = $(a).parent().parent();
          $(b).before($(a));
          $(b).remove();
          $(a).removeAttr("style");
        }
      });
    },
  };
})(jQuery);
