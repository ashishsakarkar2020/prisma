/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      
        // initiate page scroller plugin
        $('body').pageScroller({
          sectionClass: 'section',
        });

        // prev scroll button
        $('.prev-section').bind('click', function(){
            pageScroller.prev();
        });
        // next scroll button
        $('.next-section').bind('click', function(){
            pageScroller.next();
        });

        $('ul.sf-menu').superfish();

        $('.slider').slick({
          arrows: false
        });

        $('.slider-arrow').slick({
          arrows: true
        });

        $('.carousel').slick({
          arrows: true,
          slidesToShow: 6,
          centerMode: true,
          centerPadding: "200px"
        });

        $('.nav-slider .prev').click(function(){
                $('.slider').slickPrev();
        });
        $('.nav-slider .next').click(function(){
                $('.slider').slickNext();
        });

    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  },
  page_template_page_institutionnelle_php: {
    init: function() {
      // JavaScript to be fired on the contenu template page
    $('.slider').slick({
          arrows: true
        });
      
    }
  },
  single_services: {

  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
