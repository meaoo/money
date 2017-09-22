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
                          <li><a class="" href="{:U('Admin/User/index')}">用户列表</a></li>
                          <li ><a class="" href="{:U('Admin/User/adduser')}">添加用户</a></li>
                         
                      </ul>
                  </li>
                  </if>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-dashboard"></i>
                          <span>个人资料</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{:U('Admin/Person/index')}">个人详情</a></li>
                          <li><a class="" href="{:U('Admin/Person/addPerson')}">编辑资料</a></li>
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
                      <ul class="sub" >
                         <li><a class="" href="{:U('Admin/Category/index')}">类型列表</a></li>
                          <li class="active"><a class="" href="{:U('Admin/Category/addcat')}">添加类型</a></li>
                         
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
                         <li><a class="" href="{:U('Admin/Job/index')}">分类列表</a></li>
                          <li class=""><a class="" href="{:U('Admin/Job/addjob')}">添加分类</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>常用城市</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{:U('Admin/City/index')}">城市列表</a></li>
                          <li><a class="" href="{:U('Admin/City/addcity')}">添加城市</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>发布职位</span>
                          <span class="arrow"></span>
                      </a>
                     <ul class="sub" style="display:block;">
                           <li><a class="" href="{:U('Admin/Position/index')}">职位列表</a></li>
                           <li><a class="" href="{:U('Admin/Position/addpost')}">发布信息</a></li>
                           <li class="active"><a class="" href="{:U('Admin/Position/detail')}">招聘详情</a></li>
                           <li><a class="" href="{:U('Admin/Position/linkuser')}">联系信息</a></li>
                           <li><a class="active" href="{:U('Admin/Position/person')}">顾问排序</a></li>
                           <li ><a  href="{:U('Admin/Position/release')}">发布中的职位</a></li>
                           <li ><a  href="{:U('Admin/Position/finishJob')}">完成职位</a></li>
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
                              招聘详情
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">职位名称</label>
                                          <div class="col-lg-10">
                                             {$data.title}
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">年薪范围</label>
                                          <div class="col-lg-10">
                                              {$data.year}
                                          </div>
                                      </div>
                                <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">职位类型</label>
                                      <div class="col-lg-10">
                                          {$data.type}
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">岗位</label>
                                      <div class="col-lg-10">
                                          {$data.postname}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">分类</label>
                                      <div class="col-lg-10">
                                       
                                              {$data.cat}
                                         
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">地点</label>
                                      <div class="col-lg-10">
                                         <?php
                                         $city_id=explode(',',$data['city_id']);
                                         foreach ($city as $k => $v) {
                                             if(in_array($v['id'],$city_id)){
                                                 echo $v['name'].'&nbsp;&nbsp;,';
                                             }
                                         }
                                         
                                         
                                         ?>
                                      
                                      </div>
                                  </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">描述</label>
                                          <div class="col-lg-10">
                                              {$data.description}
                                          </div>
                                      </div>
                                        <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">企业名称</label>
                                          <div class="col-lg-10">
                                              {$data.company}
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">福利待遇</label>
                                          <div class="col-lg-10">
                                         <?php
                                         $summer=explode(',',$data['summary']);
                                         foreach ($list as $k => $v) {
                                             if(in_array($v['id'],$summer)){
                                                 echo $v['content'].'&nbsp;&nbsp;,';
                                             }
                                         }
                                         
                                         
                                         ?>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">企业网址</label>
                                          <div class="col-lg-10">
                                              {$data.url}
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">经纪人</label>
                                          <div class="col-lg-10">
                                              {$data.username}
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">电子邮箱</label>
                                          <div class="col-lg-10">
                                               {$data.poster_email}
                                          </div>
                                      </div>
                                     
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

      
                 

                          

            

        
      </section>
      <!--main content end-->
  </section>

      <!-- js placed at the end of the document so the pages load faster -->
    <script src="__JS__/jquery.js"></script>
    <script src="__JS__/jquery-1.8.3.min.js"></script>
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