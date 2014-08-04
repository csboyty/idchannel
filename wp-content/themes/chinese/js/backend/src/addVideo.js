/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-26
 * Time: 上午11:55
 * To change this template use File | Settings | File Templates.
 */
var addVideo=(function($){
    var config={
        message:{
            uploadSuccess:"上传成功，请选择其他操作或继续上传！",
            uploadError:"保存数据库记录失败，请联系开发人员zyhndesign@zyhndesign.com！",
            flashHasNoDir:"请填写Flash文件夹名！",
            inHand:"处理中..."
        },
        uploadDomain:'http://qiniu-plupload.qiniudn.com/',
        srcDomain:"http://id-channel-1.qiniudn.com/"
    };

    function addVideoToBackend(param){
        $.ajax({
            url:ajaxurl,
            type:"post",
            dataType:"json",
            data:param,
            success:function(data){
                if(data.success){
                    $("#uploadProgress").html(config.message.uploadSuccess);
                }else{
                    alert(config.message.uploadError);
                }
            }
        })
    }

    return {
        up:null,
        createUploader:function(uploadToken,type){
            this.up = Qiniu.uploader({
                runtimes: 'html5,flash,html4',    //上传模式,依次退化
                browse_button: 'uploadBtn',       //上传选择的点选按钮，**必需**
                uptoken_url: ajaxurl+"?action=getUploadToken",
                videoType:type,
                multi_selection:false,
                domain: config.uploadDomain,
                container: 'uploadContainer',           //上传区域DOM ID，默认是browser_button的父元素，
                filters: {
                    mime_types : [
                        { title : "media files", extensions : "mp4,flv" },
                        { title : "flash files", extensions : "swf" }
                    ]
                    //max_file_size:'1m'
                },
                max_file_size: '4g',           //最大文件体积限制,qiniu中需要写在这里，而不是卸载filters中
                flash_swf_url: '../lib/Moxie.swf',  //引入flash,相对路径
                max_retries: 3,                   //上传失败最大重试次数
                chunk_size: '4mb',                //分块上传时，每片的体积
                auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
                init: {
                    'Init':function(up,info){
                        //console.log(up.getOption("max_file_size"));
                    },
                    'FilesAdded': function(up, files) {
                        var type=up.getOption("videoType");

                        //如果是Flash需要填写文件夹名称
                        if(type==2&&$("#FlashName").val()==""){
                            alert(config.message.flashHasNoDir);
                            up.stop();
                        }
                    },
                    'UploadProgress': function(up, file) {
                        // 每个文件上传时,处理相关的事情
                        $("#uploadProgress").html(file.name+"----"+file.percent+"%");
                    },
                    'FileUploaded': function(up, file, info) {

                        $("#uploadProgress").html(config.message.inHand);

                        var res = JSON.parse(info);
                        var sourceLink = config.srcDomain + res.key; //获取上传成功后的文件的Url
                        var type=up.getOption("videoType");

                        var param={
                            name:file.name,
                            key_name:res.key,
                            url:sourceLink,
                            type:type,
                            status:0,
                            action:"addVideo"
                        };

                        if(type==1){
                            param.status=2;
                        }

                        addVideoToBackend(param);


                    },
                    'Error': function(up, err, errTip) {
                        alert(errTip);

                        up.refresh();
                    },
                    'Key': function(up, file) {

                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在 unique_names: false , save_key: false 时才生效
                        var random=Math.floor(Math.random()*10+1)*(new Date().getTime());
                        var type=up.getOption("videoType");
                        var key=random+"-"+file.name;

                        if(type==2){
                            //如果是Flash需要加上路径
                            key=$("#FlashName").val()+"/"+key;
                        }


                        // do something with key here
                        return key
                    }
                }
            });
        },

        videoTypeChange:function(value){
            var uploadContainer=$("#uploadContainer");
            var FlashNameContainer=$("#FlashNameContainer");

            if(value){
                this.up.setOption("videoType",value);
                uploadContainer.removeClass("hidden");
                if(value==1){
                    FlashNameContainer.addClass("hidden");
                }else{
                    FlashNameContainer.removeClass("hidden");

                }
            }else{
                uploadContainer.addClass("hidden");
            }

            $("#FlashName").val("");
            $("#uploadProgress").html("");
        }
    }

})(jQuery);

jQuery(document).ready(function($){

    addVideo.createUploader();


    $("#videoType").change(function(){
        addVideo.videoTypeChange($(this).val());
    });
});
