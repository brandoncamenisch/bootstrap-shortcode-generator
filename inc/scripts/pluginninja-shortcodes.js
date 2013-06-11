 (function(){

  // Create Shortcodes plugin
  tinymce.create("tinymce.plugins.pluginninjaShortcodes",{
    init: function ( ed, url ) {
      ed.addCommand("pluginninjaPopup", function ( a, params){
        var popup = params.identifier;

        // load thickbox
        tb_show("Insert Pluginninja Shortcode", pluginninja_helper.framework_url + "inc/popup.php?popup=" + popup + "&width=" + 800);
      });
    },
    createControl: function ( btn, e ){
      if( btn == "pluginninja_button" ) {
        var a   = this;

        var btn = e.createSplitButton('pluginninja_button', {
            title: "Insert Pluginninja Shortcode",
            image: pluginninja_helper.framework_url + "/inc/img/icon.png",
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
          a.addWithPopup( b, "Progresss Bars", "progress" );
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
          tinyMCE.activeEditor.execCommand("pluginninjaPopup", false, {
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

  // Add pluginninjaShortcodes plugin
  tinymce.PluginManager.add("pluginninjaShortcodes", tinymce.plugins.pluginninjaShortcodes);

})();