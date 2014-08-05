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
        position = this.options.offset + this.$element.context.offsetTop;
    
    console.log( "position: ", position, "top: ", this.$window.scrollTop() );
    
    if (top >= position) {
        this.$element.addClass('navbar-fixed-top');
    } else {
        this.$element.removeClass('navbar-fixed-top');
    }

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
      $this.follower(data);
    });
  });


  $(window).scroll(function () {
    $(document).trigger('scroll.follower');
  });

})(window.jQuery);
