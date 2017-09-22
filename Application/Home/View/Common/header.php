<style>
    @media (min-width: 1200px){
        .container {
            width: 1200px;
        }
    }
       
</style>
</style>
<header class="header hidden-xs hidden-sm">
    <div class="container">
        <div class="row" style="height: 70px;line-height: 70px;">
            <div class="col-md-3" style="padding: 0;">
                <a href="{:U('/')}">
                    <img src="__IMG__/logo_job.png" style="height: auto;">
                </a>
            </div>
            <div class="col-md-6">
                <div class="site-search-con" style="color: #000000; padding: 0;font-size:18px;">
                    <a href="{:U('/')}">首页</a>
                    <a href="{:U('Home/Index/job')}">招聘岗位</a>
                    <a href="{:U('Home/Index/solve')}" style="margin-right:30px;">解决方案</a>
                  
                </div>
            </div>
            <div class="col-md-3" style="padding-right: 0px">
                <div class="search col-md-offset-1" style="margin-left:0px;">
                    <form method='get' action="{:U('Home/Index/search')}">
                        <div style="margin-top: 15px;">
                            <div class="input-group">
                                <input type="text" class="form-control" style="padding: 0 10px;border-right: none;"
                                       placeholder="输入关键词进行搜索" name="k"
                                       value="{:I('k')}">
                                <span class="input-group-btn" style="line-height: normal;">
                                            <button class="btn btn-default" type="submit" style="background:#333333">
                                                <i class="fa fa-search"></i>
                                            </button>
                                          </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="topbar" style="margin-right:-6px;">
                <ul class="site-nav topmenu">
                    <li><a href="http://www.oilsns.com" target="_blank">石油圈</a></li>
                    <li><a href="http://chain.oilsns.com" target="_blank">石油链</a></li>
                    <li><a href="http://www.oilsns.com/contactus" target="_blank">联系我们</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<header class="mob_header visible-sm visible-xs">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header" style="background-color: #fff;">
                <div class="row">
                    <div class="col-sm-2 col-xs-2">
<!--                        <button type="button" class="navbar-toggle collapsed fa fa-bars"-->
<!--                                onclick="menu()"-->
<!--                                style="float: left;margin-left: 10px;border: none;font-size: 20px;color: #999;">-->
<!--                        </button>-->
                    </div>
                    <div class="col-sm-8 col-xs-8 text-center">
                        <div style="margin-top: 2px;">
                            <h1 style="margin: 0;">
                                <a href="{:U('/')}">
                                    <img src="__IMG__/logo_job_m.png" >
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                        <button type="button" class="navbar-toggle collapsed fa fa-search" data-toggle="collapse"
                                data-target="#nav_job_search" style="border: none;font-size: 20px;color: #999;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="nav_job_search">
                <form class="navbar-form navbar-left" role="search" method='post' action="{:U('Home/Index/search')}">
                    <div class="input-group col-xs-12 col-sm-12">
                        <input type="text" class="form-control" style="padding: 0 10px;border-right: none;"
                               placeholder="地区,企业名称,业务&职位信息" name="k" value="{:I('k')}">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit"
                                                    style="line-height: 38px;padding: 0 12px;background-color: #00a73c;color: #fff;">
                                                <i class="fa fa-search"></i>
                                            </button>
                                          </span>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>