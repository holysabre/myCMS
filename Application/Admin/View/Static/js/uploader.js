$(function(){
	$(".upload_img").delegate("a.close_btn", "click", function() {
		$(this).parent('li').remove();
	});
	$(".upload_img").delegate("a.close_one_btn", "click", function() {
		$(this).siblings('img').attr('src','');
		$(this).siblings('input').val('');
	});
	$(".upload_img ul").dragsort({
		dragSelector: "li",
		dragBetween: true,
		placeHolderTemplate: "<li class='placeHolder'></li>"
	});
})
function upload_img(img_path){
	$('.upload_img_con ul').append('<li><img src="'+img_path+'" width="100" height="100" class="showimg"/>'+
	'<a href="javascript:;" class="close_btn">X</a><input type="hidden" name="imgdata[]" value="' + img_path + '"/></li>')
}
function upload_one_img(img_path,id){
	var _img_path = '.upload_img' + id;
	$(_img_path + ' ul li').find('img').attr('src',img_path);
	$(_img_path + ' ul li').find('input').val(img_path);
}
function upload_single_img(img_path){
	$('.upload_img ul li').find('img').attr('src',img_path);
	$('.upload_img ul li').find('input').val(img_path);
}
function upload_custom_img(img_path,lang){
	$('.showimg'+lang).attr('src',img_path);
	$('.showinput'+lang).val(img_path);
}
