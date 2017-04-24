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
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $('.nav-trigger').on('click', function (e) {
          e.preventDefault();
          $('body').toggleClass('is-nav-active');
        });
        if($('.cta-bar').length > 0) {
          new Waypoint({
            element: $('.cta-bar')[0],
            handler: function() {
              //$(this.element).toggleClass('is-fixed')
            },
            offset: 10
          });
        }
        var contentPoints = document.getElementsByClassName('content-block');
        var currentPhoto =  false;

        $('.down').on('click',function (e) {
          e.preventDefault();
          var body = $("html, body");
          body.stop().animate({scrollTop:$(window).height()}, '1500');
        });

        var dlgtriggers = document.querySelectorAll('[data-dialog]');

        if(dlgtriggers) {
          [].forEach.call(dlgtriggers, function(dlgtrigger) {

            somedialog = document.getElementById(dlgtrigger.getAttribute('data-dialog')),
                dlg = new DialogFx(somedialog);

            dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));
          });
        }
        $('[data-clubplanner]').on('click', function() {
          var redirectUri = $(this).data('clubplanner');
          var redirectButton = $(this);
          var search = location.search.substring(1);
          ga('send', 'event', 'Dagpas', 'clubplanner-click', document.title);
          $.ajax({
               url: 'https://cloud3.clubplanner.be/heteiland/registration/registeruser',
               data: search?JSON.parse('{"' + search.replace(/&/g, '","').replace(/=/g,'":"') + '"}',
                      function(key, value) { return key===""?value:decodeURIComponent(value) }):{},
               type: 'GET',
               xhrFields: {
                  withCredentials: true
               },
               dataType : 'text'
           }).done(function( data, textStatus, jqXHR ) {
             if(!redirectUri){
               redirectUri = "https://cloud3.clubplanner.be/heteiland";
             }
             if(textStatus != 'success') {
               alert('Er is iets fout gelopen :(. Stuur een mailtje naar info@sportclubheteiland.be, we helpen je graag verder.');
             }

             if (data == 'Dit e-mail adres is reeds geregistreerd.') {
               redirectButton.replaceWith('<p style="color:red">Dit e-mail adres is reeds geregistreerd.</p>');
             } else {
               window.location.href = redirectUri;
               console.log('Good to go');
             }
           });
        });
        $('.gotoclubplanner').on(function(e) {
          e.preventDefault();
          var link = $(this).attr('href');
          window.top.location.href = link;
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

      }

    },
    // Sport specific
    'single_sport': {
      init: function() {
        $('.gallery').imagesLoaded(function(){
          $('.gallery').slick({
            lazyLoad: 'ondemand',
            initialSlide: 0
          }).on('lazyLoadError', function (e) {
            console.log('gaat nie');
          }).on('lazyLoaded', function (e) {
            console.log(e);
          });
        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'thank_you': {
      init: function() {


      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
