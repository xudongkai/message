<?php 
// var_dump($data);die;
    $list = array();
    foreach ($res as  $v) {
        $list=$v;
    }
    // var_dump($arr);die;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="Public/Admin//favicon.ico" >
    <link rel="Shortcut Icon" href="Public/Admin//favicon.ico" />
    <link rel="stylesheet" type="text/css" href="Public/Admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="Public/Admin/static/h-ui.admin/css/style.css" />
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    <title>修改</title>
 </head>
 <body>
      <form  action="index.php?c=Article&a=update" method="post" >
      <input type="hidden" name='id' value="<?php echo $list['id']; ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['title']; ?>" placeholder="" id="articletitle" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['title2']?>" placeholder="" id="title2" name="title2">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select name="column" class="select">
                    <option value="0">全部栏目</option>
                     <?php foreach ($arr as $v) { ?>
                    <option value="<?php echo $v['column_id'] ?>"><?php echo $v['type'] ?></option>
                    <?php } ?>
                </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章类型：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select name="type" class="select">
                    <option value="0">全部类型</option>
                     <?php foreach ($data as $val) { ?>
                    <option value="<?php echo $val['id'] ?>"><?php echo $val['type'] ?></option>
                    <?php } ?>
                </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">排序值：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['sort']?>" placeholder="" id="sort" name="sort">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">关键词：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['keyword']?>" placeholder="" id="keyword" name="keyword">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="act" id="" cols="30" rows="10"><?php echo $list['act']?></textarea>
                <!-- <textarea name="act" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea> -->
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章作者：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['author']?>" placeholder="" id="author" name="author">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章来源：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $list['sources']?>" placeholder="" id="sources" name="sources">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input type="submit" value="提交">
            </div>
        </div>
    </form>
 </body>
 </html>