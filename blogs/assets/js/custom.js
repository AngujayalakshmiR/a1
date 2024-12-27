jQuery(document).ready(function($) {

  $('.accordion').on('show', function(e) {
    $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
    $(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
    $(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
  });

  $('.accordion').on('hide', function(e) {
    $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
    $(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
    $(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
  });


  // Create the dropdown base
  $("<select />").appendTo("nav");
  // Create default option "Go to..."
  $("<option />", {
    "selected": "selected",
    "value": "",
    "text": "Go to..."
  }).appendTo("nav select");

  // Populate dropdown with menu items
  $("nav a").each(function() {
    var el = $(this);
    $("<option />", {
      "value": el.attr("href"),
      "text": el.text()
    }).appendTo("nav select");
  });

  // To make dropdown actually work
  // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
  $("nav select").change(function() {
    window.location = $(this).find("option:selected").val();
  });

  $("a[data-pretty^='prettyPhoto']").prettyPhoto();
  $(".gallery:first a[data-pretty^='prettyPhoto']").prettyPhoto({
    animation_speed: 'normal',
    theme: 'pp_default',
    slideshow: 3000,
    autoplay_slideshow: false
  });
  $(".gallery:gt(0) a[data-pretty^='prettyPhoto']").prettyPhoto({
    animation_speed: 'fast',
    slideshow: 10000,
    hideflash: true
  });

  $("#custom_content a[data-pretty^='prettyPhoto']:first").prettyPhoto({
    custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
    changepicturecallback: function() {
      initialize();
    }
  });

  $("#custom_content a[data-pretty^='prettyPhoto']:last").prettyPhoto({
    custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
    changepicturecallback: function() {
      _bsap.exec();
    }
  });


  $('iframe').each(function() { /*fix youtube z-index*/
    var url = $(this).attr("src");
    if (url.indexOf("youtube.com") >= 0) {
      if (url.indexOf("?") >= 0) {
        $(this).attr("src", url + "&wmode=transparent");
      } else {
        $(this).attr("src", url + "?wmode=transparent");
      }
    }
  });

  $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
  });

  // tooltip demo
  $('.tooltip').tooltip()


  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: true
  });

  /* ---------------------------------------------------------------------- */
  /*	Projects Carousel & Post Carousel
  /* ---------------------------------------------------------------------- */

  (function() {

    var $carousel = $('.post-carousel');

    if ($carousel.length) {

      var scrollCount;

      function getWindowWidth() {

        if ($(window).width() < 480) {
          scrollCount = 1;
        } else if ($(window).width() < 768) {
          scrollCount = 2;
        } else if ($(window).width() < 960) {
          scrollCount = 3;
        } else {
          scrollCount = 4;
        }

      }

      function initCarousel(carousels) {

        carousels.each(function() {

          var $this = $(this);

          $this.jcarousel({
            animation: 600,
            easing: 'easeOutCubic',
            scroll: scrollCount,
            itemVisibleInCallback: function() {
              onBeforeAnimation: resetPosition($this);
              onAfterAnimation: resetPosition($this);
            },
            auto: ($this.data('auto') ? parseInt($this.data('auto')) : 0),
            wrap: ($this.data('auto') ? 'both' : null)
          });

        });

      }

      function adjustCarousel() {

        $carousel.each(function() {

          var $this = $(this),
            $lis = $this.children('li')
          newWidth = $lis.length * $lis.first().outerWidth(true) + 100;

          getWindowWidth();

          // Resize only if width has changed
          if ($this.width() !== newWidth) {

            $this.css('width', newWidth)
              .data('resize', 'true');

            initCarousel($this);

            $this.jcarousel('scroll', 1);

            var timer = window.setTimeout(function() {
              window.clearTimeout(timer);
              $this.data('resize', null);
            }, 600);

          }

        });

      }

      function resetPosition(elem, resizeEvent) {
        if (elem.data('resize'))
          elem.css('left', '0');
      }

      getWindowWidth();

      initCarousel($carousel);

      // Detect swipe gestures support
      if (Modernizr.touch) {

        function swipeFunc(e, dir) {

          var $carousel = $(e.currentTarget);

          if (dir === 'left')
            $carousel.parent('.jcarousel-clip').siblings('.jcarousel-next').trigger('click');

          if (dir === 'right')
            $carousel.parent('.jcarousel-clip').siblings('.jcarousel-prev').trigger('click');

        }

        $carousel.swipe({
          swipeLeft: swipeFunc,
          swipeRight: swipeFunc,
          allowPageScroll: 'auto'
        });

      }

      // Window resize
      $(window).on('resize', function() {

        var timer = window.setTimeout(function() {
          window.clearTimeout(timer);
          adjustCarousel();
        }, 30);

      });

    }

  })();

  /* end Projects Carousel & Post Carousel */

});
