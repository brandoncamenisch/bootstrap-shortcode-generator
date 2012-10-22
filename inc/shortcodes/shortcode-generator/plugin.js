(function ()
{
	// create tzShortcodes plugin
	tinymce.create("tinymce.plugins.tzShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("tzPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "thmchf_button" )
			{	
				var a = this;
					
				// adds the tinymce button
				btn = e.createMenuButton("thmchf_button",
				{
					title: "Insert Shortcode",
					image: "" + thm_chf_templateDir + "/inc/shortcodes/shortcode-generator/images/icon.png",
					icons: false
				});
				
				// adds the dropdown to the button
				btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Icons", "icon" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Accordion", "alert" );
					a.addWithPopup( b, "Toggle Content", "toggle" );
					a.addWithPopup( b, "Tabbed Content", "tabs" );
				});
				
				return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("tzPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'ThemeChief Shortcode Generator',
				author: 'ThemeChief',
				authorurl: 'http://themechief.com/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add tzShortcodes plugin
	tinymce.PluginManager.add("tzShortcodes", tinymce.plugins.tzShortcodes);
})();