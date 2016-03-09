// 自定义插件 begin
KindEditor.plugin('savehttpfiles', function(K) {
    var editor = this, name = 'savehttpfiles', lang = editor.lang(name + '.');
	var mapWidth = K.undef(editor.mapWidth, 558);
	var mapHeight = K.undef(editor.mapHeight, 360);
	editor.plugin.savehttpfiles = {
        edit: function() {
			var html = ['<div style="padding:10px 20px;">',
			'<iframe class="ke-textarea" frameborder="0" ',
			'src="' + editor.pluginsPath + 'savehttpfiles/allfiles.php" style="width:' + mapWidth , 
			'px;height:' + mapHeight + 'px;"></iframe></div>'].join('');
			var dialog = editor.createDialog({
				width : mapWidth + 42,
				title : '保存远程图片到本地',
				body : html,
				yesBtn : {
					name : '确定',
					click : function(e) {
						//editor.insertHtml(this.value);
						//editor.hideDialog();
						return;
					}
				},
			});
        }
    };
    // 加载控件
    editor.clickToolbar(name, editor.plugin.savehttpfiles.edit);
});
// 自定义插件 end