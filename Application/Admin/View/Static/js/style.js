$(function() {
	var val;
	    edit_url = $('#data_table').attr('data-edit'),
	    del_url = $('#data_table').attr('data-del'),
	    change_url = $('#data_table').attr('data-change'),
	    _table = $('#data_table').attr('data-table');


	
	$('span[data-tdtype="edit"]').on('click',function(){
		var _id = $(this).attr('data-id'),
		    _name = $(this).attr('data-name'),
		    _text = $(this).text(),
		    _w = $(this).width()+50;
		$('<input type="text" value="'+_text+'" class="input-text" style="width:'+_w+'px" />').focusout(function(){
			var _val = $(this).val();
			$(this).prev('span').show().text(_val);
			if(_val != _text){
				var _str = "table=" + _table + "&id=" + _id + "&val=" + _val + "&name=" + _name;
				$.ajax({
					type:"get",
					url: edit_url,
					data: _str,
					async: true,
					success:function(data){
						console.log(data);
						layer.msg(data.message,{
							icon:6,
							time:1000
						});
					}
				});
			}
			$(this).remove();
		}).insertAfter($(this)).focus().select();
		$(this).hide();
	})
	

	/*显示缩略图*/
	$('.thumbnail img').hover(function() {
		$(this).parent().find('.thumb_pic').slideToggle();
	});

	$("#form-user-add").Validform({
		tiptype: 2,
		callback: function(form) {
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});


	//异步删除
	$('.del_btn').on('click', function() {
		var _id = $(this).attr('data-id');
		var _str = "table=" + _table + "&id=" + _id;
		layer.confirm('确认要删除吗？', {
			icon: 3,
			title: '提示'
		}, function(index) {
			if (index == 1) {
				$.ajax({
					type: "get",
					url: del_url,
					data: _str,
					async: true,
					success: function(data) {
						if (data.status == 1) {
							layer.msg(data.message, {
								icon: 6,
								time: 1000
							}, function() {
								location.reload();
							});
						} else {
							layer.msg(data.message, {
								icon: 5,
								time: 1000
							}, function() {
								location.reload();
							});
						}
					}
				});
			}
		});
	})


	//异步改变状态
	
	$('span[data-tdtype="toggle"]').on('click',function(){
		var _this = $(this),
		    _id = $(this).attr('data-id'),
			_val = $(this).attr('data-val') == 1 ? 0 : 1,
			_name = $(this).attr('data-name'),
		    _str = "table=" + _table + "&id=" + _id + "&val=" + _val + "&name=" + _name,
	    	_i = $(this).children('i').attr('class') == 'Hui-iconfont toggle_yes' ? _i = '<i class="Hui-iconfont toggle_no" >&#xe6a6;</i>' : '<i class="Hui-iconfont toggle_yes">&#xe6a7;</i>';
//	    console.log(_str);
		$.ajax({
			type:"get",
			url:change_url,
			async:true,
			data:_str,
			success:function(data){
				if(data.status == 1){
					layer.msg(data.message,{
						icon:6,
						time:500
					},function(){
						_this.attr('data-val', _val).text('').append(_i);
					});
				}
			}
		});
	})

	$('input.icheck').each(function(){
        var self = $(this),
            checked = self.attr("checked") ? self.attr("checked") : '',
            button = self.data("button"),
            _type = self.attr("type"),
            _name = self.attr("name"),
            _checkbox = 'checkbox',
            _radio = 'radio';
        
        var className = (_type == _checkbox ? 'i' + _checkbox : 'i' + _radio) + '_';
        var wrap = '<div class="'+className+_name+' iinline"></div>';
        self.wrap(wrap).after('<span class="button button-'+button+' '+checked+'" data-type='+_type+'></span>');
    });
    
    $('span.button').click(function(){
        var self = $(this),
            _type = self.data("type");
        if (_type == "radio") {
            var _class = self.parent().attr("class");
            _class = _class.replace('iinline','');
            //alert(_class)
            $("."+_class).find(".button").removeClass("checked");
            $("."+_class).find(".icheck").prop("checked", false);
            self.toggleClass("checked");
            self.prev().prop("checked", true);
        } else {
            self.toggleClass("checked");
            if (self.hasClass("checked")) {
                self.prev().prop("checked", true);
            } else {
                self.prev().prop("checked", false);
            }
        }
    });




})


function reflash_cache(url,action){
	$.ajax({
		type: "get",
		url: url,
		async: true,
		data: 'action=' + action,
		success: function(data){
			console.log(data);
			if (data.status == 1) {
				layer.msg(data.message, {
					icon: 6,
					time: 2000
				});
			} else {
				layer.msg(data.message, {
					icon: 5,
					time: 2000
				}, function() {
					location.reload();
				});
			}
		}
	})
}
