<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-25
 * Time: 下午2:33
 * To change this template use File | Settings | File Templates.
 */

?>
<h2>添加视频</h2>
<p>说明：请先选择类型，如果flash或者flash中调用到的视频请选择Flash相关文件,并且输入相关的flash文件夹名称</p>
<p>
    <label>类型</label>
    <select id="videoType" value="">
        <option value="">请选择</option>
        <option value="1">视频文件</option>
        <option value="2">Flash相关文件</option>
    </select>
</p>
<hr>
<div id="uploadContainer" class="hidden">
    <p id="FlashNameContainer" class="hidden">
        <label>Flash文件夹名称</label>
        <input type="text" id="FlashName">
    </p>
    <input type="button" id="uploadBtn" value="上传">
    <p id="uploadProgress"></p>
</div>