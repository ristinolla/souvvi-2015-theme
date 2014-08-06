/* ========================================================================
 * Follower
 *
 * ========================================================================
 * Copyright 2014 Perttu Ristimella
 * Licensed under MIT
 * ======================================================================== */

(function($) {

  'use strict';

  var Follower = function (element, options) {
    this.options = $.extend({}, Follower.DEFAULTS, options);

    this.$window = $(window)
      .on('scroll.follower', $.proxy(this.checkPosition,this));

    this.$element = $(element);

  };

  Follower.prototype.checkPosition = function() {
    var top = this.$window.scrollTop(),
        position = this.options.offset + this.$element.context.offsetTop,
        offsetTop = this.$element.context.offsetTop;

    if(!this.$element.context.lastScrollTop) {
      var lastScrollTop = 0;
    } else {
      var lastScrollTop = this.$element.context.lastScrollTop;
    }
    //console.log( "position: ", position, "top: ", this.$window.scrollTop() );
    /*
    if (top >= position) {
        this.$element.removeClass('down');
    } else {
        this.$element.addClass('down');
    }
    */
      //console.log( "lastScrollTop: ", lastScrollTop, "top: ", top );

     if(top > offsetTop) {

       if (top > lastScrollTop){
           this.$element.addClass('up').removeClass('down');
       } else {
           this.$element.addClass('down').removeClass('up');
       }

    } else {
      if(!this.$element.hasClass('down')){
        this.$element.addClass('down').removeClass('up');
      }
    }

    this.$element.context.lastScrollTop = top;


  };





  // FOLLOWER PLUGIN DEFINITION
  // ==========================


  $.fn.follower = function (option) {
    return this.each(function() {
      var $this = $(this);
      var data = $this.data('offset');
      var options = typeof option == 'object' && option;
      console.log(options);

      new Follower(this, options);

    });

  };

  $.fn.follower.Constructor = Follower;


  // FOLLOWER DATA-API
  // =================

  $(window).on('load', function() {
    $('[data-spy="follower"]').each(function() {
      var $this = $(this);
      var data = $this.data();
      data.position = $this.scrollTop();
      data.offset = data.offset || {};
      data.lastScrollTop = 0;
      $this.follower(data);
    });
  });


  $(window).scroll(function () {
    $(document).trigger('scroll.follower');
  });

})(window.jQuery);
