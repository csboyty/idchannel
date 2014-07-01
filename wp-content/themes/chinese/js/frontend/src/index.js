/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-30
 * Time: 下午5:39
 * To change this template use File | Settings | File Templates.
 */
var main=(function(){
    var interVal=null;//记录setInterval的返回值
    var currentPlayer=null;

    return {
        currentPlayer:null,
        roll:function(){
            interVal=setInterval(function(){
                /*if(currentNumber>topVideoCount){
                    currentNumber=1;
                }*/
                var topVideosList=$("#topVideosList");
                topVideosList.animate({
                    "left":"-75%"
                },800,function(){
                    //var videoItem=$(".videoItem:eq("+(currentNumber-1)+")");
                    //me.currentPlayer.remove();

                    /*me.currentPlayer=config.createPlayer(videoItem.find(".playerContainer").attr("id"),
                        videoItem.data("video-url"));*/

                    topVideosList.append($(".videoItem:eq(0)"));
                    topVideosList.css("left","0");

                    //currentNumber++;
                })
            },5000);
        },
        init:function(){
            //var firstVideoItem=$(".videoItem:eq(0)");
            //this.currentPlayer=this.createPlayer(firstVideoItem.find(".playerContainer").attr("id"),firstVideoItem.data("video-url"));
            this.roll();
        }
    }
})();
$(document).ready(function(){
    main.init();

    /*$(".videoPlayIcon").click(function(){
        main.currentPlayer.play();
        $(this).parent().addClass("hidden");
    });*/
});