jQuery(document).ready(function ($) {
  // menu
  $(".navbar-toggler").on("click", function () {
    $(this).toggleClass("active");
    $(".mobile-menu").toggleClass("active");
    // $("html").toggleClass("menu-active");
  });

  // scrollbar
  customScrollOptions = {
    touchbehavior: true,
    overflowx: true,
    overflowy: false,
    autohidemode: "hidden",
  };
  $(".news-filter").niceScroll(customScrollOptions);

  // table scrollbar
  if ($(".stocks-table").length) {
    $(".stocks-table .table").clone().removeClass("table").addClass("clone").appendTo(".stocks-table");
    $(".stocks-table .table").clone().removeClass("table").addClass("invisible").appendTo(".stocks-table");
    var scrollCellNext = 2;
    var scrollCellPrev = 1;
    $(".stocks-table .scroller")
      .niceScroll({
        touchbehavior: true,
        overflowx: true,
        overflowy: false,
        autohidemode: "hidden",
        enablemousewheel: false,
      })
      .scrollend(function (info) {
        var x = info.end.x + 116;
        $(".invisible .stocks-table-head .cell").each(function () {
          if (x - $(this).position().left > 0 && x - $(this).position().left < 100) {
            scrollCellPrev = $(".invisible .stocks-table-head .cell").index($(this));
          }
          if ($(this).position().left - x > 0 && $(this).position().left - x < 100) {
            scrollCellNext = $(".invisible .stocks-table-head .cell").index($(this));
          }
        });
      });

    $(".scroller-left").on("click", function () {
      var scrollPosition = 0;
      for (var i = 1; i < scrollCellPrev; i++) {
        var wd = $(".invisible .stocks-table-head .cell").eq(i).outerWidth();
        scrollPosition = scrollPosition + wd;
      }
      $(".stocks-table .scroller").getNiceScroll(0).doScrollLeft(scrollPosition);
    });
    $(".scroller-right").on("click", function () {
      var scrollPosition = 0;
      for (var i = 1; i < scrollCellNext; i++) {
        var wd = $(".invisible .stocks-table-head .cell").eq(i).outerWidth();
        scrollPosition = scrollPosition + wd;
      }
      $(".stocks-table .scroller").getNiceScroll(0).doScrollLeft(scrollPosition, 1);
    });

    $(window).on("resize", function () {
      var scrollWd = $(".stocks-table .scroller").width();
      var tableWd = $(".stocks-table .scroller .table").width();

      if (tableWd <= scrollWd) {
        $(".scroller-controls").addClass("hidden");
      } else {
        $(".scroller-controls").removeClass("hidden");
      }
    });
  }

  // read more
  $(".read-more-btn").on("click", function (e) {
    e.preventDefault();
    if ($(this).prev().hasClass("read-more-text")) {
      $(this).prev(".read-more-text").toggleClass("active");
    } else {
      $(this).prev(".text-more").slideToggle(300);
    }
  });

  // news view switch
  $(".view-type button").on("click", function () {
    var c = $(this).attr("data-type");
    var cCurr = $(".post-list").attr("data-class");
    $(".post-list").removeClass(cCurr).addClass(c).attr("data-class", c);
  });

  // ratings
  $(".rate").each(function () {
    var rate = parseFloat($(this).attr("data-rating"));
    $(this)
      .find(".rate-inner")
      .width(rate + "%");
  });

  $("#rating").barrating({ showSelectedRating: false });

  // sliders
  if ($(".coins-slider").length) {
    swiper1 = new Swiper(".coins-slider", {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 5,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      breakpoints: {
        768: {
          spaceBetween: 8,
        },
      },
    });
  }

  if ($(".news-popular-slider").length) {
    swiper1 = new Swiper(".news-popular-slider .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      navigation: {
        nextEl: ".news-popular-slider .swiper-button-next",
        prevEl: ".news-popular-slider .swiper-button-prev",
      },
      pagination: {
        el: ".news-popular-slider .swiper-pagination",
        clickable: true,
      },
    });
  }

  if ($(".news-card-slider").length) {
    var newsSliders = document.querySelectorAll(".news-card-slider");
    newsSliders.forEach((slider) => {
      var sliderSwiper = slider.querySelector(".swiper"),
        sliderPagination = slider.querySelector(".swiper-pagination"),
        sliderNext = slider.querySelector(".swiper-button-next"),
        sliderPrev = slider.querySelector(".swiper-button-prev");
      swiper = new Swiper(sliderSwiper, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        effect: "fade",
        fadeEffect: {
          crossFade: true,
        },
        navigation: {
          nextEl: sliderNext,
          prevEl: sliderPrev,
        },
        pagination: {
          el: sliderPagination,
          clickable: true,
        },
      });
    });
  }

  if ($(".stock-slider").length) {
    swiper1 = new Swiper(".stock-slider .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 50,
      navigation: {
        nextEl: ".stock-slider .swiper-button-next",
        prevEl: ".stock-slider .swiper-button-prev",
      },
      pagination: {
        el: ".stock-slider .swiper-pagination",
        clickable: true,
      },
    });
  }

  // forms

  $.jStyling.createSelect($("select.select"));

  $("#profileForm input").on("blur", function () {
    if ($(this).attr("type") === "text") {
      var pattern;
      if ($(this).hasClass("text")) {
        pattern = /([A-Za-z])/;
      } else {
        pattern = /([\w\W])/;
      }
      if ($(this).val() !== "" && !pattern.test($(this).val())) {
        $(this).parent().removeClass("success");
        $(this).parent().addClass("error");
      } else {
        $(this).parent().removeClass("error");
        $(this).parent().addClass("success");
      }
    }
    if ($(this).attr("type") === "email") {
      var patternMail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
      if ($(this).val() !== "" && !patternMail.test($(this).val())) {
        $(this).parent().removeClass("success");
        $(this).parent().addClass("error");
      } else {
        $(this).parent().removeClass("error");
        $(this).parent().addClass("success");
      }
    }
  });

  //tabs

  var activeTab = $($(".tab-nav li.active a").attr("href"));
  activeTab.addClass("active");

  var activeTabInner = $($(".tab-nav-inner li.active a").attr("href"));
  activeTabInner.addClass("active").show();

  $(".tab-nav a").on("click", function (e) {
    e.preventDefault();

    if (!$(this).parent().hasClass("active")) {
      var $activeTab = $(".tab-panel.active");
      var $nextTab = $($(this).attr("href"));
      $(".tab-nav li.active").removeClass("active");
      $(this).parent().addClass("active");
      $activeTab.removeClass("active");
      $nextTab.addClass("active");
    }
  });

  $(".tab-nav-inner a").on("click", function (e) {
    e.preventDefault();

    if (!$(this).parent().hasClass("active")) {
      var $activeTab = $(".tab-panel-inner.active");
      var $nextTab = $($(this).attr("href"));
      $(".tab-nav-inner li.active").removeClass("active");
      $(this).parent().addClass("active");
      $activeTab.removeClass("active").hide();
      $nextTab.addClass("active").fadeIn(400);
    }
  });

  // accordion
  $(".accordion-toggler").on("click", function () {
    $(this).toggleClass("accordion-active").next(".accordion-panel").slideToggle(300);
  });

  // popups
  $(".btn-popup").on("click", function (e) {
    e.preventDefault();
    var popup = $($(this).attr("href"));

    popup.bPopup();
  });

  // popup forms
  $(".pass-switch").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).prev("input").attr("type", "password");
    } else {
      $(this).addClass("active");
      $(this).prev("input").attr("type", "text");
    }
  });

  $(".popup .form").on("submit", function (e) {
    var err = false;
    var req = $(this).find("[required]");

    req.each(function () {
      if ($(this).val() === "") {
        $(this).addClass("error");
        err = true;
      } else {
        $(this).removeClass("error");
      }
    });

    if (err) {
      e.preventDefault();
    }
  });
});
