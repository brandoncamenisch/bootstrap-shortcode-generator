
// start the popup specefic scripts
jQuery(document).ready(function($){

  var mountaininja_popup = {

    /* 
    * Function for when shortcode options change 
    * 
    */
    loadVals: function() {
      var shortcode   = $('#_mountaininja_shortcode').text(),
          uShortcode  = shortcode;

      // fill in the gaps eg {{param}}
      $('.mountaininja-input').each(function() {
        var input = $(this),
            id    = input.attr('id'),
            id    = id.replace('mountaininja_', ''),    // gets rid of the mountaininja_ prefix
            re    = new RegExp("{{"+id+"}}","g"),
            val   = input.val();
        
        // If input is radio
        if( input.is(':checkbox') ) {
          val = input.is(':checked');
        }

        uShortcode = uShortcode.replace(re, val);

        // adds the filled-in shortcode as hidden input
        $('#_mountaininja_ushortcode').remove();
        $('#mountaininja-sc-form-table').prepend('<div id="_mountaininja_ushortcode" class="hidden">' + uShortcode + '</div>');
      });
    },


    /* 
     * Function for when children shortcode options change 
     * 
     */
    cLoadVals: function() {
      var shortcode = $('#_mountaininja_cshortcode').text(),
          pShortcode = '';
          shortcodes = '';

      // fill in the gaps eg {{param}}
      $('.child-clone-row').each(function() {
        var row = $(this),
            rShortcode = shortcode;

        $('.mountaininja-cinput', this).each(function() {
          var input = $(this),
            id = input.attr('id'),
            id = id.replace('mountaininja_', '')   // gets rid of the mountaininja_ prefix
            re = new RegExp("{{"+id+"}}","g");
            
          rShortcode = rShortcode.replace(re, input.val());
        });

        shortcodes = shortcodes + rShortcode + "\n";
      });

      // adds the filled-in shortcode as hidden input
      $('#_mountaininja_cshortcodes').remove();
      $('.child-clone-rows').prepend('<div id="_mountaininja_cshortcodes" class="hidden">' + shortcodes + '</div>');

      // add to parent shortcode
      this.loadVals();
      pShortcode = $('#_mountaininja_shortcode').text().replace('{{child_shortcode}}', shortcodes);

      // add updated parent shortcode
      $('#_mountaininja_ushortcode').remove();
      $('#mountaininja-sc-form-table').prepend('<div id="_mountaininja_ushortcode" class="hidden">' + pShortcode + '</div>');
    },


    /**
     * Function for cloning children shortcode
     * 
     */
    children: function() {
      // assign the cloning plugin
      $('.child-clone-rows').appendo({
        subSelect: '> div.child-clone-row:last-child',
        allowDelete: false,
        focusFirst: false
      });

      // remove button
      $('.child-clone-row-remove').live('click', function() {
        var btn = $(this),
            row = btn.parent().parent();

        if( $('.child-clone-row').size() > 1 ) {
          row.remove();
        } else {
          alert('You need a minimum of one row');
        }

        return false;
      });

      // assign jQuery UI sortable
      $( ".child-clone-rows" ).sortable({
        placeholder: "sortable-placeholder",
        items: '.child-clone-row'
      });
    },


    /**
     * Resize thickbox size
     * 
     */
    resizeTB: function() {
      var ajaxCont = $('#TB_ajaxContent'),
          tbWindow = $('#TB_window'),
          mountaininjaPopup = $('#mountaininja-popup'),
          windowHeight = $(window).height(),
          tbWindowHeight = mountaininjaPopup.outerHeight() + 50;

      // Check if popup height greater than window height
      if( tbWindowHeight > (windowHeight - 48*2 ) ) {
        tbWindowHeight = windowHeight - 100;
      }

      tbWindow.css({
        height: tbWindowHeight,
        width: mountaininjaPopup.outerWidth(),
        marginLeft: -(mountaininjaPopup.outerWidth()/2)
      });

      ajaxCont.css({
        paddingTop: 0,
        paddingLeft: 0,
        paddingRight: 0,
        height: (tbWindow.outerHeight()-47),
        overflowX: 'hidden',
        overflowY: 'auto', // IMPORTANT
        width: mountaininjaPopup.outerWidth()
      });

      $('#mountaininja-popup').addClass('no_preview');
    },


    /**
     * This function will fire when thicbox loaded
     * 
     */
    load: function() {
      var mountaininja = this,
          popup = $('#mountaininja-popup'),
          form = $('#mountaininja-sc-form', popup),
          shortcode = $('#_mountaininja_shortcode', form).text(),
          popupType = $('#_mountaininja_popup', form).text(),
          uShortcode = '';

      // resize TB
      mountaininja.resizeTB();
      $(window).resize(function() { mountaininja.resizeTB() });

      // initialise
      mountaininja.loadVals();
      mountaininja.children();
      mountaininja.cLoadVals();

      // update on children value change
      $('.mountaininja-cinput', form).live('change', function() {
        mountaininja.cLoadVals();
      });

      // update on value change
      $('.mountaininja-input', form).change(function() {
        mountaininja.loadVals();
      });

      // Collapsible children shortcode options
      $('.child-clone-row .handle, .child-clone-row .handlediv').live('click', function(){
        $(this).parent().toggleClass('closed');
        mountaininja.resizeTB()
      });

      // Collapsible block 
      $('.mountaininja-collapse-button', form).children().change(function(){
        var target = $(this).attr('rel');
        console.log( $(this).attr('rel') );
        $('[class*="'+ target +'"]', form).parents('.mountaininja-collapsible').toggle();
      });

      // Icon selector
      $('.the-icons', form).find('li').live('click', function(){
        var $el = $(this),
            icon_name = $el.children().attr('class');

        $el.addClass('selected').siblings().removeClass('selected');

        $el.parents('.the-icons').next().val( icon_name );

        if( $el.parents('.the-icons').next().hasClass('mountaininja-input') ) {
          mountaininja.loadVals();
        } else {
          mountaininja.cLoadVals();
        }

      });

      // when insert is clicked
      $('.mountaininja-insert', form).click(function() {             
        if(window.tinyMCE) {
          window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_mountaininja_ushortcode', form).html());
          tb_remove();
        }
      });
    }

  } // End mountaininja_popup object

  // run
  $('#mountaininja-popup').livequery( function() { mountaininja_popup.load(); } );

});