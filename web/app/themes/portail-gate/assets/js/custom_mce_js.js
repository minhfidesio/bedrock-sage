(function() {
    tinymce.PluginManager.add('custom_mce_button', function(editor, url) {
        editor.addButton('custom_mce_button', {
            icon: false,
            text: 'Add Button',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Insert Button',
                    body: [{
                        type: 'textbox',
                        name: 'title',
                        label: 'Title',
                        value: ''
                    },{
                        type: 'textbox',
                        name: 'link',
                        label: 'Button Link',
                        value: ''
                    },{
                        type: 'textbox',
                        name: 'icon',
                        label: 'Icon Button',
                        value: 'download'
                    },{
                        type: 'textbox',
                        name: 'target',
                        label: 'Target Button',
                        value: '_blank'
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[button_link  title="' +
                            e.data.title +
                            '" link="' +
                            e.data.link +
                            '" icon="' +
                            e.data.icon +
                            '" target="' +
                            e.data.target +
                            '"][/button_link]'
                        );
                    }
                });
            }
        });
    });
})();
