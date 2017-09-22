<include file="Common/header" />
<body>
<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo">油气经纪人后台管理</span></a>
        <!--logo end-->
        
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="__IMG__/avatar-mini4.jpg">
                        <span class="username">{$Think.session.username}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="{:U('Admin/Login/out')}"><i class="icon-key"></i>退出</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <if condition="$_SESSION['status']==1">
                    <li class="sub-menu">
                        <a class="javascript:;">
                            <i class="icon-dashboard"></i>
                            <span>用户列表</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li class="active"><a class="" href="{:U('Admin/User/index')}">用户列表</a></li>
                            <li><a class="" href="{:U('Admin/User/adduser')}">添加用户</a></li>
                        
                        </ul>
                    </li>
                </if>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-dashboard"></i>
                        <span>个人资料</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub" style="display: block">
                        <li class="active"><a class="" href="{:U('Admin/Person/index')}">个人详情</a></li>
                        <li><a class="" href="{:U('Admin/Person/addPerson')}">编辑资料</a></li>
                        <li><a class="" href="{:U('Admin/Person/logo')}">二维码</a></li>
                        <li><a class="" href="{:U('Admin/Person/recommend')}">我的业绩</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-dashboard"></i>
                        <span>成功案例</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Company/index')}">公司列表</a></li>
                        <li><a class="" href="{:U('Admin/Company/addCompany')}">添加公司</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-dashboard"></i>
                        <span>轮播图</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">

                        <li><a class="" href="{:U('Admin/Carousel/index')}">图片列表</a></li>
                        <li><a class="" href="{:U('Admin/Carousel/addCarousel')}">添加图片</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>职位类型</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Category/index')}">类型列表</a></li>
                        <li><a class="" href="{:U('Admin/Category/index')}">添加类型</a></li>
                    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>岗位类型</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Post/index')}">岗位列表</a></li>
                        <li><a class="" href="{:U('Admin/Post/addpost')}">添加岗位</a></li>
                    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-cogs"></i>
                        <span>职位分类</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a class="" href="{:U('Admin/Job/index')}">分类列表</a></li>
                        <li><a class="" href="{:U('Admin/Job/addjob')}">添加分类</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-tasks"></i>
                        <span>常用城市</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub" >
                        <li><a class="" href="{:U('Admin/City/index')}">城市列表</a></li>
                        <li><a class="" href="{:U('Admin/City/addcity')}">添加城市</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-beer"></i>
                        <span>福利待遇</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Welfare/index')}">标签列表</a></li>
                        <li><a class="" href="{:U('Admin/Welfare/addlist')}">添加标签</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-th"></i>
                        <span>发布职位</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Position/index')}">职位列表</a></li>
                        <li><a class="" href="{:U('Admin/Position/addpost')}">发布信息</a></li>
                        <li><a class="active" href="{:U('Admin/Position/parsepost')}">暂停招聘</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-glass"></i>
                        <span>工作申请</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{:U('Admin/Appliy/index')}">申请列表</a></li>
                    </ul>
                </li>
            
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            个人资料
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="" >
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">用户名称</label>
                                        <div class="col-lg-10">
                                            {$userInfo.username}
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">用户邮箱</label>
                                        <div class="col-lg-10">
                                            {$userInfo.email}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">用户简介</label>
                                        <div class="col-lg-10">
                                            {$userDetail.detail}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">擅长领域</label>
                                        <div class="col-lg-10">
                                            {$userDetail.perfect}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">微信号</label>
                                        <div class="col-lg-10">
                                            {$userDetail.weixin}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">电话号码</label>
                                        <div class="col-lg-10">
                                            {$userDetail.tel}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">经纪人名称</label>
                                        <div class="col-lg-10">
                                            {$userDetail.name}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">个人连接</label>
                                        <div class="col-lg-10">
                                            {$userDetail.linkin}

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">前台显示</label>
                                        <div class="col-lg-10">
                                            <if condition="$userDetail['status']==1">
                                                是
                                                <else/>
                                                否
                                            </if>
                                        </div>
                                    </div>
                                    <?php
                                    $path=$userDetail['photo'];
                                    $logo=$userDetail['logo'];
                                    $person=$userDetail['person'];
                                    $personLogo=$userDetail['personlogo'];
                                    
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">用户照片</label>
                                        <div class="col-lg-10">
                                            <if condition="$path!=NULL">
                                                <img src="__UPLOAD__/{$path}" style="max-width:200px;max-height:200px;">
                                            </if>
                                           
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">图片二维码</label>
                                        <div class="col-lg-10">
                                            <if condition="$logo!=NULL">
                                                <img src="__UPLOAD__/{$logo}" style="max-width:200px;max-height:200px;">
                                            </if>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">个人二维码</label>
                                        <div class="col-lg-10">
                                            <if condition="$person!=NULL">
                                                <img src="__UPLOAD__/{$person}" style="max-width:200px;max-height:200px;">
                                            </if>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">个人小图片</label>
                                        <div class="col-lg-10">
                                            <if condition="$personLogo!=NULL">
                                                <img src="__UPLOAD__/{$personLogo}" style="max-width:200px;max-height:200px;">
                                            </if>

                                        </div>
                                    </div>
                             
                                  
                
                                </form>
                            </div>
        
                        </div>
                        <?php
                          $uid=$_SESSION['uid'];
                        ?>
                        <div class="col-lg-12" style="margin-top: 30px;text-align: center;height: 30px;line-height: 30px;">
                            <a href="{:U('Person/addPerson',array(id=>$uid))}" style="color:#ffffff;background: indianred;padding: 10px">编辑个人资料</a>
                        </div>
                    </section>
                </div>
            </div>
            <div style="text-align:center;">{$page}</div>
            
            
            
            </footer>
        
        </section>
        <!--weather statement end-->
        </div>
        </div>
    
    </section>
</section>
<!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/jquery.scrollTo.min.js"></script>
<script src="__JS__/jquery.nicescroll.js" type="text/javascript"></script>
<script src="__JS__/jquery.sparkline.js" type="text/javascript"></script>
<script src="__STATIC__/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="__JS__/owl.carousel.js" ></script>
<script src="__JS__//jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="__JS__/common-scripts.js"></script>

<!--script for this page-->
<script src="__JS__/sparkline-chart.js"></script>
<script src="__JS__/easy-pie-chart.js"></script>
<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>


</body>
</html>