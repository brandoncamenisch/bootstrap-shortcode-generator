
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var tzs = {
    	loadVals: function()
    	{
    		var shortcode = $('#_thmchf_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.thmchf-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('thmchf_', ''),		// gets rid of the thmchf_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thmchf_ushortcode').remove();
    		$('#thmchf-sc-form-table').prepend('<div id="_thmchf_ushortcode" class="hidden">' + uShortcode + '</div>');
    		
    		// updates preview
    		tzs.updatePreview();
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_thmchf_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.thmchf-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('thmchf_', '')		// gets rid of the thmchf_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thmchf_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_thmchf_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_thmchf_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_thmchf_ushortcode').remove();
    		$('#thmchf-sc-form-table').prepend('<div id="_thmchf_ushortcode" class="hidden">' + pShortcode + '</div>');
    		
    		// updates preview
    		tzs.updatePreview();
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	updatePreview: function()
    	{
    		if( $('#thmchf-sc-preview').size() > 0 )
    		{
	    		var	shortcode = $('#_thmchf_ushortcode').html(),
	    			iframe = $('#thmchf-sc-preview'),
	    			iframeSrc = iframe.attr('src'),
	    			iframeSrc = iframeSrc.split('preview.php'),
	    			iframeSrc = iframeSrc[0] + 'preview.php';
    			
	    		// updates the src value
	    		iframe.attr( 'src', iframeSrc + '?sc=' + base64_encode( shortcode ) );
	    		
	    		// update the height
	    		$('#thmchf-sc-preview').height( $('#thmchf-popup').outerHeight()-42 );
    		}
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				tzPopup = $('#thmchf-popup'),
				no_preview = ($('#_thmchf_preview').text() == 'false') ? true : false;
			
			if( no_preview )
			{
				ajaxCont.css({
					paddingTop: 0,
					paddingLeft: 0,
					height: (tbWindow.outerHeight()-47),
					overflow: 'scroll', // IMPORTANT
					width: 560
				});
				
				tbWindow.css({
					width: ajaxCont.outerWidth(),
					marginLeft: -(ajaxCont.outerWidth()/2)
				});
				
				$('#thmchf-popup').addClass('no_preview');
			}
			else
			{
				ajaxCont.css({
					padding: 0,
					// height: (tbWindow.outerHeight()-47),
					height: tzPopup.outerHeight()-15,
					overflow: 'hidden' // IMPORTANT
				});
				
				tbWindow.css({
					width: ajaxCont.outerWidth(),
					height: (ajaxCont.outerHeight() + 30),
					marginLeft: -(ajaxCont.outerWidth()/2),
					marginTop: -((ajaxCont.outerHeight() + 47)/2),
					top: '50%'
				});
			}
    	},
    	load: function()
    	{
    		var	tzs = this,
    			popup = $('#thmchf-popup'),
    			form = $('#thmchf-sc-form', popup),
    			shortcode = $('#_thmchf_shortcode', form).text(),
    			popupType = $('#_thmchf_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		tzs.resizeTB();
    		$(window).resize(function() { tzs.resizeTB() });
    		
    		// initialise
    		tzs.loadVals();
    		tzs.children();
    		tzs.cLoadVals();
    		
    		// update on children value change
    		$('.thmchf-cinput', form).live('change', function() {
    			tzs.cLoadVals();
    		});
    		
    		// update on value change
    		$('.thmchf-input', form).change(function() {
    			tzs.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.thmchf-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_thmchf_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#thmchf-popup').livequery( function() { tzs.load(); } );
});