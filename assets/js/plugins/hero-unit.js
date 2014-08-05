/* ========================================================================
 * Hero-unit
 * 
 * ========================================================================
 * Copyright 2014 Perttu Ristimella
 * Licensed under MIT
 * ======================================================================== */

(function($) {

  'use strict';

  function herofy(elem) {
    // body...
    var $elem = $(elem),
        data = $elem.data(),
        wh = window.innerHeight;

    var height = data.heroMax;

    if (data.heroMax + data.heroTreshold > wh) {
      height = wh - data.heroTreshold;
    }
    if (height > data.heroMax ) {
      height = data.heroMax;
    }
    $elem.css('height', height);
  }

  // herounit DATA-API
  // =================

  $(window).on('load', function() {
    $('[data-spy="pr-herounit"]').each(function() {
      herofy(this);
    });
  });

})(window.jQuery);