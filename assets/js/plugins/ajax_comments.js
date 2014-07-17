(function($) {
  "use strict";
  // Fetch comments to frontpage
  // ===========================

  function get_comments($this, url) {
    // body...
    $this.data('selector');
  }

  $("body").on('click', ".show-comments-btn", function(e){
    //codehere
    e.preventDefault();
    var $this = $(this),
        url =  $this.data('url');
    $this.next('div').load(url, function() {
      $this
        .attr('disabled', 'disabled')
        .next('div').removeClass('closed');
    });
  });

  // Hightlight errors
  // =================
  function highlightErrors ($form, errors) {




  }


  // Validate Form
  // =============
  function validateForm ($form) {
    var $name = $form.find('input[name="author"]'),
        $email = $form.find('input[name="email"]'),
        $url = $form.find('input[name="url"]'),
        $text = $form.find('textarea[name="comment"]'),
        errors = false;

    $name.parent().removeClass('has-error');
    $email.parent().removeClass('has-error');
    $url.parent().removeClass('has-error');
    $text.parent().removeClass('has-error');

    if ( $name.val() === "" && $name.attr("aria-required")  ) {
        $name.parent().addClass('has-error');
        errors = true;
    }

    if ($email.attr('aria-required') ){
      // http://www.sitepoint.com/javascript-validate-email-address-regex/
      var re = /^(([^<>()[]\.,;:s@"]+(.[^<>()[]\.,;:s@"]+)*)|(".+"))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
      if ( $email.val() === "" || re.test($email.val()) ) {
        $email.parent().addClass('has-error');
        errors = true;
      }
    }

    if ( $url.val() === "" && $url.attr("aria-required") ) {
      $url.parent().addClass('has-error');
      errors = true;
    }

    if ( $text.val() === "") {
      $text.parent().addClass('has-error');
      errors = true;
    }


    return errors;

  }

  // Post comments
  // ==============
  $('.commentform').each(function() {
    var $this = $(this),
        $button = $this.children('button[type="submit"]');


    $this.on('submit', function(e) {
      e.preventDefault();

      if(!validateForm($this)){

        var data  = $this.serialize(),
            url   = $this.attr('action');



        //Post Form with data
        $.ajax({
          type: 'post',
          url: url,
          data: data,
          error: function(XMLHttpRequest, textStatus, errorThrown){
            $button.addClass('button-error');
            setTimeout(function() {
              $button.removeClass('button-error');
            }, 2000);
          },
          success: function(data, textStatus){
            console.log(data);
            $button.addClass('button-success');

          }
        }); // ajax
      } else {
        $button.addClass('button-error');
        setTimeout(function() {
          $button.removeClass('button-error');
        }, 2000);

      }
      return false;

    }); // event
  }); // each

})(jQuery); // Fully reference jQuery after this point.
