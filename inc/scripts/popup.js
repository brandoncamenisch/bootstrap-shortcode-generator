
// start the popup specefic scripts
jQuery(document).ready(function($){

  var pluginninja_popup = {

    /* 
    * Function for when shortcode options change 
    * 
    */
    loadVals: function() {
      var shortcode   = $('#_pluginninja_shortcode').text(),
          uShortcode  = shortcode;

      // fill in the gaps eg {{param}}
      $('.pluginninja-input').each(function() {
        var input = $(this),
            id    = input.attr('id'),
            id    = id.replace('pluginninja_', ''),    // gets rid of the pluginninja_ prefix
            re    = new RegExp("{{"+id+"}}","g"),
            val   = input.val();
        
        // If input is radio
        if( input.is(':checkbox') ) {
          val = input.is(':checked');
        }

        uShortcode = uShortcode.replace(re, val);

        // adds the filled-in shortcode as hidden input
        $('#_pluginninja_ushortcode').remove();
        $('#pluginninja-sc-form-table').prepend('<div id="_pluginninja_ushortcode" class="hidden">' + uShortcode + '</div>');
      });
    },


    /* 
     * Function for when children shortcode options change 
     * 
     */
    cLoadVals: function() {
      var shortcode = $('#_pluginninja_cshortcode').text(),
          pShortcode = '';
          shortcodes = '';

      // fill in the gaps eg {{param}}
      $('.child-clone-row').each(function() {
        var row = $(this),
            rShortcode = shortcode;

        $('.pluginninja-cinput', this).each(function() {
          var input = $(this),
            id = input.attr('id'),
            id = id.replace('pluginninja_', '')   // gets rid of the pluginninja_ prefix
            re = new RegExp("{{"+id+"}}","g");
            
          rShortcode = rShortcode.replace(re, input.val());
        });

        shortcodes = shortcodes + rShortcode + "\n";
      });

      // adds the filled-in shortcode as hidden input
      $('#_pluginninja_cshortcodes').remove();
      $('.child-clone-rows').prepend('<div id="_pluginninja_cshortcodes" class="hidden">' + shortcodes + '</div>');

      // add to parent shortcode
      this.loadVals();
      pShortcode = $('#_pluginninja_shortcode').text().replace('{{child_shortcode}}', shortcodes);

      // add updated parent shortcode
      $('#_pluginninja_ushortcode').remove();
      $('#pluginninja-sc-form-table').prepend('<div id="_pluginninja_ushortcode" class="hidden">' + pShortcode + '</div>');
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
          pluginninjaPopup = $('#pluginninja-popup'),
          windowHeight = $(window).height(),
          tbWindowHeight = pluginninjaPopup.outerHeight() + 50;

      // Check if popup height greater than window height
      if( tbWindowHeight > (windowHeight - 48*2 ) ) {
        tbWindowHeight = windowHeight - 100;
      }

      tbWindow.css({
        height: tbWindowHeight,
        width: pluginninjaPopup.outerWidth(),
        marginLeft: -(pluginninjaPopup.outerWidth()/2)
      });

      ajaxCont.css({
        paddingTop: 0,
        paddingLeft: 0,
        paddingRight: 0,
        height: (tbWindow.outerHeight()-47),
        overflowX: 'hidden',
        overflowY: 'auto', // IMPORTANT
        width: pluginninjaPopup.outerWidth()
      });

      $('#pluginninja-popup').addClass('no_preview');
    },


    /**
     * This function will fire when thicbox loaded
     * 
     */
    load: function() {
      var pluginninja = this,
          popup = $('#pluginninja-popup'),
          form = $('#pluginninja-sc-form', popup),
          shortcode = $('#_pluginninja_shortcode', form).text(),
          popupType = $('#_pluginninja_popup', form).text(),
          uShortcode = '';

      // resize TB
      pluginninja.resizeTB();
      $(window).resize(function() { pluginninja.resizeTB() });

      // initialise
      pluginninja.loadVals();
      pluginninja.children();
      pluginninja.cLoadVals();

      // update on children value change
      $('.pluginninja-cinput', form).live('change', function() {
        pluginninja.cLoadVals();
      });

      // update on value change
      $('.pluginninja-input', form).change(function() {
        pluginninja.loadVals();
      });

      // Collapsible children shortcode options
      $('.child-clone-row .handle, .child-clone-row .handlediv').live('click', function(){
        $(this).parent().toggleClass('closed');
        pluginninja.resizeTB()
      });

      // Collapsible block 
      $('.pluginninja-collapse-button', form).children().change(function(){
        var target = $(this).attr('rel');
        console.log( $(this).attr('rel') );
        $('[class*="'+ target +'"]', form).parents('.pluginninja-collapsible').toggle();
      });

      // Icon selector
      $('.the-icons', form).find('li').live('click', function(){
        var $el = $(this),
            icon_name = $el.children().attr('class');

        $el.addClass('selected').siblings().removeClass('selected');

        $el.parents('.the-icons').next().val( icon_name );

        if( $el.parents('.the-icons').next().hasClass('pluginninja-input') ) {
          pluginninja.loadVals();
        } else {
          pluginninja.cLoadVals();
        }

      });

      // when insert is clicked
      $('.pluginninja-insert', form).click(function() {             
        if(window.tinyMCE) {
          window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_pluginninja_ushortcode', form).html());
          tb_remove();
        }
      });
    }

  } // End pluginninja_popup object

  // run
  $('#pluginninja-popup').livequery( function() { pluginninja_popup.load(); } );

});