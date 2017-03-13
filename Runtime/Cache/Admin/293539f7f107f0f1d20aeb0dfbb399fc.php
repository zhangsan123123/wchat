<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|OneThink管理平台</title>
    <link href="/wwwroot/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/wwwroot/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/wwwroot/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/wwwroot/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/wwwroot/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/wwwroot/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/wwwroot/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/wwwroot/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/wwwroot/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->

        <div id="subnav" class="subnav">
            <!-- 子导航 -->
            <h3><i class="icon icon-unfold"></i>管理中心</h3>                        <ul class="side-sub-menu">
            <li>
                <a class="item" href="<?php echo U('Property/index');?>">报修管理</a>
            </li><li>
            <a class="item" href="/admin.php/center/activity.html">活动管理</a>
        </li><li>
            <a class="item" href="/admin.php/sale/index.html">小区租售</a>
        </li><li>
            <a class="item" href="/admin.php/owner/index.html">业主认证</a>
        </li><li>
            <a class="item" href="/admin.php/score/log.html">签到日志</a>
        </li><li>
            <a class="item" href="/admin.php/questionnaire/index.html">调查问卷</a>
        </li>                        </ul>                    <!-- /子导航 -->            </div>

        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->


    <div class="main-title">
        <h2>报修管理</h2>
    </div>
    <div class="cf">
        <div class="fl">
            <a class="btn confirm" href="<?php echo U('Property/repairadd');?>">添加</a>
            <button class="btn ajax-post confirm" url="/admin.php/repair/delete.html" target-form="ids">删 除</button>
        </div>

        <!-- 高级搜索 -->
        <div class="search-form fr cf">
            <div class="sleft">
                <input type="text" name="keywords" class="search-input" value="" placeholder="请输入报修人姓名或者报修单号">
                <a class="sch-btn" href="javascript:;" id="search" url="/admin.php/center/index.html"><i class="btn-search"></i></a>
            </div>
        </div>
    </div>
    <!-- 数据列表 -->
    <div class="data-table table-striped">
        <table class="">
            <thead>
            <tr>
                <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
                <th class="">报修单号</th>
                <th class="">报修人</th>
                <th class="">电话</th>
                <th class="">地址</th>
                <th class="">问题</th>
                <th class="">报修时间</th>
                <th class="">状态</th>
                <th class="">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input class="ids" type="checkbox" name="id[]" value="10" /></td>
                <td>IT58c4eacae0e562017MarSun142930</td>
                <td>哒哒哒大</td>
                <td>12345678901</td>
                <td><span>中安徽</span></td>
                <td><span>萨达</span></td>
                <td>2017-03-12 14:29</td>
                <td>处理中</td>
                <td>
                    <a href="/admin.php/repair/changestatus/id/10/status/2.html" class="btn btn-info ajax-get">处理完成</a>
                    <a class="text-info" href="/admin.php/repair/detail/id/10.html">查看详情</a>
                    <a class="ajax-get" href="/admin.php/repair/delete/id/10.html">删除</a>
                </td>
            </tr><tr>
                <td><input class="ids" type="checkbox" name="id[]" value="9" /></td>
                <td>IT58c4e8b7313542017MarSun142039</td>
                <td>源代码</td>
                <td>13800138000</td>
                <td><span>熊猫基地</span></td>
                <td><span>原子弹</span></td>
                <td>2017-03-12 14:20</td>
                <td>未处理</td>
                <td>
                    <a class="btn btn-info ajax-get" href="/admin.php/repair/changestatus/id/9/status/1.html">接受处理</a>							<a class="text-info" href="/admin.php/repair/detail/id/9.html">查看详情</a>
                    <a class="ajax-get" href="/admin.php/repair/delete/id/9.html">删除</a>
                </td>
            </tr><tr>
                <td><input class="ids" type="checkbox" name="id[]" value="6" /></td>
                <td>IT58c0bc8faabb22017MarThu102311</td>
                <td>小子</td>
                <td>13456565656</td>
                <td><span>天府新谷</span></td>
                <td><span>天府新谷</span></td>
                <td>2017-03-09 10:23</td>
                <td>未处理</td>
                <td>
                    <a class="btn btn-info ajax-get" href="/admin.php/repair/changestatus/id/6/status/1.html">接受处理</a>							<a class="text-info" href="/admin.php/repair/detail/id/6.html">查看详情</a>
                    <a class="ajax-get" href="/admin.php/repair/delete/id/6.html">删除</a>
                </td>
            </tr><tr>
                <td><input class="ids" type="checkbox" name="id[]" value="5" /></td>
                <td>IT58bd1d8478df42017MarMon160th</td>
                <td>wqeqw</td>
                <td>12222222222</td>
                <td><span>wqedasda</span></td>
                <td><span>发发发</span></td>
                <td>2017-03-06 16:27</td>
                <td>未处理</td>
                <td>
                    <a class="btn btn-info ajax-get" href="/admin.php/repair/changestatus/id/5/status/1.html">接受处理</a>							<a class="text-info" href="/admin.php/repair/detail/id/5.html">查看详情</a>
                    <a class="ajax-get" href="/admin.php/repair/delete/id/5.html">删除</a>
                </td>
            </tr><tr>
                <td><input class="ids" type="checkbox" name="id[]" value="4" /></td>
                <td>1488788820</td>
                <td>wqeqw</td>
                <td>12222222222</td>
                <td><span>wqedasda</span></td>
                <td><span>发发发</span></td>
                <td>2017-03-06 16:27</td>
                <td>处理完成</td>
                <td>
                    <a class="text-info" href="/admin.php/repair/detail/id/4.html">查看详情</a>
                    <a class="ajax-get" href="/admin.php/repair/delete/id/4.html">删除</a>
                </td>
            </tr>							</tbody>
        </table>
    </div>
    <div class="page">
        <div>    </div>	</div>

    </div>
    <div class="cont-ft">
        <div class="copyright">
            <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank">OneThink</a>管理平台</div>
            <div class="fr">V1.1.141101</div>
        </div>
    </div>
    </div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank">OneThink</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/wwwroot", //当前网站地址
            "APP"    : "/wwwroot/index.php?s=", //当前项目地址
            "PUBLIC" : "/wwwroot/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/wwwroot/Public/static/think.js"></script>
    <script type="text/javascript" src="/wwwroot/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script src="/wwwroot/Public/static/thinkbox/jquery.thinkbox.js"></script>

    <script type="text/javascript">
        //搜索功能
        $("#search").click(function(){
            var url = $(this).attr('url');
            var query  = $('.search-form').find('input').serialize();
            query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
            query = query.replace(/^&/g,'');
            if( url.indexOf('?')>0 ){
                url += '&' + query;
            }else{
                url += '?' + query;
            }
            window.location.href = url;
        });
        //回车搜索
        $(".search-input").keyup(function(e){
            if(e.keyCode === 13){
                $("#search").click();
                return false;
            }
        });
        //导航高亮
        highlight_subnav('<?php echo U('User/index');?>');
    </script>

</body>
</html>