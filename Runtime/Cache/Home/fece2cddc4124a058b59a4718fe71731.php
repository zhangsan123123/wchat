<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="/Public/Home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Home/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .main{margin-bottom: 60px;}
            .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
        </style>
    </head>

<body>

<div class="main">
    
        <!--导航部分-->
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid text-center">
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="fuwu.html" class="navbar-link">服务</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="my.html" class="navbar-link">我的</a></p>
                </div>
            </div>
        </nav>
        <!--导航结束-->
    
    
    <div class="container-fluid">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$estate): $mod = ($i % 2 );++$i;?><h3 class="noticeDetailTitle"><strong><?php echo ($estate["title"]); ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo ($estate["name"]); ?></div>
        <div class="noticeDetailtime">发布时间：<?php echo (date('Y-m-d H:i:s',$estate["create_time"])); ?></div>
        <div class="noticeDetailContent"><?php echo ($estate["description"]); ?></div>
            <div class="col-xs-2">
                <img class="noticeImg" src="<?php echo (get_cover($estate["cover_id"],'path')); ?>" />
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/Home/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>




</body>
</html>