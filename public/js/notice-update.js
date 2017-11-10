jQuery(document).on( 'click', '.my-acf-notice .notice-dismiss', function() {

  var data = {
        action: 'my_action',
    };

    jQuery.post(ajaxurl, data, function(response) {} );

});