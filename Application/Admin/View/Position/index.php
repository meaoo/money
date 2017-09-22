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
                          <li><a class="" href="{:U('Admin/Job/index')}">分类列表</a></li>
                          <li><a class="" href="{:U('Admin/Job/addjob')}">添加分类</a></li>
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
                      <ul class="sub" style="display:block;">
                           <li class="active"><a class="" href="{:U('Admin/Position/index')}">职位列表</a></li>
                          <li><a class="" href="{:U('Admin/Position/addpost')}">发布信息</a></li>
                          <li><a class="" href="{:U('Admin/Position/parsepost')}">暂停招聘</a></li>
                          <li><a class="" href="{:U('Admin/Position/linkuser')}">联系信息</a></li>
                          <li><a class="" href="{:U('Admin/Position/person')}">顾问排序</a></li>
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
                              招聘列表
                          </header>
                          <header class="panel-heading">
                           <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{:U('Admin/Position/index')}">
                              <div class="form-group" >
                                      <div class="col-lg-2">
                                          <select class="form-control m-bot15" style="float:left;" name="category_id">
                                              <option value="">业务类型</option>
                                              <foreach name='cat' item='v'>
                                              <option value="{$v.id}"<if condition="$categoryid==$v['id']">selected</if>>{$v.name}</option>
                                              </foreach>
                                          </select>
                                      </div>
                                       <div class="col-lg-2">
                                          <select class="form-control m-bot15" style="float:left;" name="type_id">
                                              <option value="">职位类型</option>
                                                <foreach name='job' item='v'>
                                              <option value="{$v.id}"<if condition="$jobid==$v['id']">selected</if>>{$v.name}</option>
                                              </foreach>
                                          </select>

                                          
                                      </div>
                                      <div class="col-lg-2">
                                      <select class="form-control m-bot15" style="float:left;" name="user_id">
                                          <option value="">创建人</option>
                                          <foreach name='user' item='v'>
                                              <option value="{$v.id}"<if condition="$userid==$v['id']">selected</if>>{$v.username}</option>
                                          </foreach>
                                      </select>


                                       </div>
                                       <div class="col-lg-2">
                                      
                                          
                                              <button class="btn btn-danger" type="submit"  >提交</button>
                                          
                                      </div>
                                     
                                  </div>
                                  
                           </form>
                          </header>
                             <header class="panel-heading">
                           <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{:U('Admin/Position/index')}">
                              <div class="form-group" >
                                      <div class="col-lg-4" style="float:left;">
                                          <div class="col-lg-12">
                                              <input class="form-control " id="curl" type="text" name="search" placeholder="输入招聘名称"  value="{$search}"/>
                                          </div>
                                      </div>
                                     
                                    
                                       <div class="col-lg-1">
                                      
                                          
                                              <button class="btn btn-danger" type="submit"  >查询</button>
                                          
                                      </div>
                                     
                                  </div>
                                  
                           </form>
                          </header>
                         <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{:U('Admin/Position/newjob')}">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>选择职位</th>
                                  <th><i class="icon-bullhorn"></i> 招聘id</th>
                                  <th class="hidden-phone"><i class="icon-question-sign"></i> 招聘名称</th>
                                  <th><i class="icon-coffee"></i>投递人数</th>
                                  <th><i class="icon-bookmark"></i> 职位类型</th>
                                  <th><i class=" icon-briefcase"></i> 业务类型</th>
                                  <th><i class="icon-bookmark"></i> 创建人</th>
                                  <th><i class="icon-building"></i> 创建时间</th>
                                  <th>操作</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <if condition="count($data)!=0">
                              <foreach name='data' item='v'>
                              <tr>
                                 <td><input type="checkbox" name="box[]" value="{$v.id}"></td>
                                  <td><a href="#">{$v.id}</a></td>
                                  <td class="hidden-phone">{$v.title}</td>
                                   <td class="hidden-phone"><a style="color:red;font-size:14px;" href="{:U('Appliy/index',array(job_id=>$v['id']))}">{$v.number}</a></td>
                                  <td class="hidden-phone">{$v.type}</td>
                                  <td class="hidden-phone">{$v.cat}</td>
                                  <td class="hidden-phone">{$v.username}</td>
                                   <td class="hidden-phone">{$v.created_on}</td>
                                  <td>
                                     <a href="{:U('Position/detail',array(id=>$v['id']))}"><button class="btn btn-success btn-xs" type="button"><i class="icon-ok"></i></button></a>
                                      <if condition="$v['user_id']==$_SESSION['uid']||empty($v['user_id'])">
                                          <a href="{:U('Position/editpost',array(id=>$v['id']))}"><button class="btn btn-primary btn-xs" type="button"><i class="icon-pencil"></i></button></a>
                                      </if>
                                     <a href="{:U('Position/deletepost',array(id=>$v['id']))}"> <button class="btn btn-danger btn-xs" type="button"><i class="icon-trash "></i></button></a>
                                     
                                     <if condition="$v['top']==1">
                                     <a href="{:U('Position/gettop',array(id=>$v['id']))}"> <button class="btn btn-danger btn-xs" type="button"><i class="icon-arrow-up "></i></button></a>
                                     <else/>
                                      <a href="{:U('Position/gettop',array(id=>$v['id'],tid=>1))}"> <button class="btn btn-danger btn-xs" type="button"><i class=" icon-arrow-down "></i></button></a>
                                     </if>
                                  </td>
                              </tr>
                              </tbody>
                              </foreach>
                              <else/>
                               <td>无数据</td>
                               </if>
                          </table>
                          <input type="submit" value="更新职位" class="btn btn-danger">
                          </form>
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