(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: '短代码',
			icon: false,
			type: 'menubutton',
			menu: [
				{
					text: 'box',
					menu: [
						{
							text: 'box-alert',
							onclick: function() {
								editor.insertContent('[box style="alert"][/box]\n');
							}
						},
						{
							text: 'box-warning',
							onclick: function() {
								editor.insertContent('[box style="warning"][/box]\n');
							}
						},
						{
							text: 'box-download',
							onclick: function() {
								editor.insertContent('[box style="download"][/box]\n');
							}
						},
						{
							text: 'box-info',
							onclick: function() {
								editor.insertContent('[box style="info"][/box]\n');
							}
						}
					]
				}
			]
		});
	});
})();