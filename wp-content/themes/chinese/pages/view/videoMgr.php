<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-26
 * Time: 上午8:51
 * To change this template use File | Settings | File Templates.
 */

//include("../controller/videoController.php");
$types=array("1"=>"视频","2"=>"Flash相关");
$status=array(0=>"成功",2=>"正在处理流媒体",3=>"处理流媒体失败，请重新上传");
$perLoad=10;
$videoController=new videoController();
if(isset($_GET["option"])){
    $videoId=$_GET["videoId"];
    if($videoController->deleteVideo($videoId)===false){
        die("删除数据出错，请联系开发人员zyhndesign@zyhndesign.com！");
    }else{
        echo "<p>删除成功，请继续其他操作！</p>";
    }
}
$offset=isset($_GET["paged"])?$_GET["paged"]*$perLoad:0;

$videoCount=$videoController->getVideosCount();
$videos=$videoController->getVideos($offset);

?>
<script>
    var maxPage=<?php echo $videoCount/$perLoad?$videoCount/$perLoad:1; ?>;
    var currentPage=<?php echo isset($_GET["paged"])?$_GET["paged"]:1; ?>;
    var url="<?php echo admin_url("upload.php?page=videoMgr"); ?>";
</script>
<h2 class="title">视频管理</h2>
<a class="addBtn" href="<?php menu_page_url("addVideo") ; ?>">添加视频</a>
<table>
    <thead>
    <tr>
        <th>文件名</th>
        <th>源文件地址</th>
        <th>流媒体地址</th>
        <th>类型</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($videos as $value){
            ?>
            <tr>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->url; ?></td>
                <td><?php echo $value->m3u8Url; ?></td>
                <td><?php echo $types[$value->type]; ?></td>
                <td><?php echo $status[$value->status]; ?></td>
                <td><a href="<?php echo admin_url("upload.php?page=videoMgr")."&option=delete&videoId=$value->id"; ?>" class="delete">删除</a></td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>
<div id="ownPagination" class="ownPagination">
    <a href="#" class="first" data-action="first">首页</a>
    <a href="#" class="previous" data-action="previous">上一页</a>
    <input type="text" readonly="readonly" class="showPageInfo"/>
    <a href="#" class="next" data-action="next">下一页</a>
    <a href="#" class="last" data-action="last">末页</a>
</div>