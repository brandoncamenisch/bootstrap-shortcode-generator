(function(){

  // Create Shortcodes plugin
  tinymce.create("tinymce.plugins.pluginchiefShortcodes",{
    init: function ( ed, url ) {
      ed.addCommand("pluginchiefPopup", function ( a, params){
        var popup = params.identifier;

        // load thickbox
        tb_show("Insert Pluginchief Shortcode", pluginchief_helper.framework_url + "inc/popup.php?popup=" + popup + "&width=" + 800);
      });
    },
    createControl: function ( btn, e ){
      if( btn == "pluginchief_button" ) {
        var a   = this;

        var btn = e.createSplitButton('pluginchief_button', {
            title: "Insert Pluginchief Shortcode",
            image: pluginchief_helper.framework_url + "/inc/img/icon.png",
            icons: false
        });

        btn.onRenderMenu.add(function (c, b){
          a.addWithPopup( b, "Alerts", "alert" );
          a.addWithPopup( b, "Button", "button" );
          a.addWithPopup( b, "Button Group", "buttons_group" );
          a.addWithPopup( b, "Inline label", "label" );
          a.addWithPopup( b, "Tabs", "tabs" );
          a.addWithPopup( b, "Badge", "badge" );
          a.addWithPopup( b, "Toggle", "toggle" );
          a.addWithPopup( b, "Accordion", "accordion" );
          a.addWithPopup( b, "Columns", "columns" );
          a.addWithPopup( b, "Well", "well" );
          a.addImmediate( b, "Horizontal Rule", "[hr]" );
        });

        return btn;
      }

      return null;
    },
    addWithPopup: function ( ed, title, id ) {
      ed.add({
        title: title,
        onclick: function() {
          tinyMCE.activeEditor.execCommand("pluginchiefPopup", false, {
            title: title,
            identifier: id
          })
        }
      })
    },
    addImmediate: function ( ed, title, sc ) {
      ed.add({
        title: title,
        onclick: function () {
          tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
        }
      })
    }
  });

  // Add pluginchiefShortcodes plugin
  tinymce.PluginManager.add("pluginchiefShortcodes", tinymce.plugins.pluginchiefShortcodes);

})();