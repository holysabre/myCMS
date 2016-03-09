/**
 * <div id="container_filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
 * <div id="container">
 *     <input type="button" id="pickfiles" class="btn btn-info" value="上传图片">  
 * </div>
 */
;(function($){
    var uploaders = {};
    $.fn.pluploadQueue = function(settings) {
        var uploader, target, id;
        
        target = $(this);
        id = target.attr('id');
        
        settings = $.extend({
            browse_button: id+'_filelist',
            //container: id,
            filters: {
                mime_types: [
                    {title: "Image files", extensions: "jpg,gif,png"}
                ],
                max_file_size: '1mb'
            },
            flash_swf_url: 'Moxie.swf',
            silverlight_xap_url: 'Moxie.xap'
        }, settings);
        
        uploaders[id] = uploader = new plupload.Uploader(settings);

        // ID
        function Gid(id) {
            return document.getElementById(id);
        }
        
        // 销毁
        function destroy() {
            delete uploaders[id];
            uploader.destroy();
            uploader = target = null;
        }
        
        // 当Plupload初始化完成后触发
        uploader.bind('Init', function(up, file) {
            Gid(id).title = 'Using runtime: ' + file.runtime;
        });
        
        // 当Init事件发生后触发
        uploader.bind('PostInit', function(up) {
            Gid(id+'_filelist').innerHTML = '';
        });
        
        // 当上传队列中某一个文件开始上传后触发
        uploader.bind('UploadFile', function(up, file) {
            if (settings.callUploadFile) {
                settings.callUploadFile(up.settings.multipart_params);
            }
        });
        
        // 当上传队列的状态发生改变时触发
        uploader.bind('StateChanged', function(up) {
            if (settings.callChanged) {
                settings.callChanged(up, settings);
            }
        });
        
        // 当文件添加到上传队列后触发
        uploader.bind('FilesAdded', function(up, file) {
            if (settings.callAdded) {
                settings.callAdded(up);
            }
            uploader.start();
        });
        
        // 当文件从上传队列移除后触发
        uploader.bind('FilesRemoved', function(up, file) {
            if (settings.callRemoved) {
                settings.callRemoved(up, file);
            }
        });
        
        // 会在文件上传过程中不断触发，可以用此事件来显示上传进度
        uploader.bind('UploadProgress', function(up, file) {
            if (settings.callProgress) {
                settings.callProgress(up, file, target);
            }
        });
        
        // 当队列中的某一个文件上传完成后触发
        uploader.bind('FileUploaded', function(up, file, Object) {
            var response    = Object.response;
            var data        = eval('('+response+')');
            if (settings.callSuccess) {
                settings.callSuccess(data);
            } 
        });
        
        // 当发生错误时触发
        uploader.bind('Error', function(up, err) {
            var file = err.file, message;

            if (file) {
            	message = err.message;

            	if (err.details) {
            		message += " (" + err.details + ")";
            	}

            	if (err.code == plupload.FILE_SIZE_ERROR) {
            		alert("文件太大: " + file.name);
            	}

            	if (err.code == plupload.FILE_EXTENSION_ERROR) {
            		alert("无效的文件扩展名: " + file.name);
            	}
            	
            	file.hint = message;
            }

            if (err.code === plupload.INIT_ERROR) {
            	setTimeout(function() { destroy(); }, 1);
            }
        });
        
        uploader.init();
        
        return this;
    };
})(jQuery);