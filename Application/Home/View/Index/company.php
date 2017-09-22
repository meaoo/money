<extend name="Common/basepage"/>

<block name="title">{$company.company} - 公司详情</block>
<block name="description">油气经纪人，专注于油气行业中高端人才招聘服务。对求职者，提供油气行业上、中、下游最真实的招聘信息，24小时极速反馈让您的求职不再“石沉大海”。对企业，提供网络招聘,猎头,培训咨询,测评和人事外包等一站式专业人力资源服务。找对人，油气经纪人！</block>
<block name="keywords">油气经纪人,专注油气行业人才猎聘</block>

<block name="body">
    <section class="container">
        <div class="content-wrap">
            <div class="row" style="margin-bottom: 20px;padding: 0;">
                <div class="col-md-9 col-sm-12" style="background-color: #fff;">
                    <div style="padding:30px 20px;">
                        <div class="job_title">
                            <ul class="row" style="border-bottom: solid 1px #E3E4E3;">
                                
                                <li style="color: #323332;">
                                    
                                    <div class="col-md-12" style="text-align: center">
                                        <h3 style="display: inline-block;margin-top: 10px;">{$company.company}</h3>
                                    </div>
                                   
                               
                            </ul>
                        </div>
                        <div class="description">
                            <div class="col-md-12">
                                <img src="__UPLOAD__/{$company.logo}" alt="" style="max-height: 100px;height: 90px" class="img-responsive center-block">
                            </div>
                            <div class="col-md-12" style="margin-top:30px;color: #999999; ">
                               {$company.detail}
                            </div>
                            <div class="col-md-12" style="margin-top: 30px;padding-bottom: 10px">
                                {$company.company_detail}
                            </div>
                        </div>
                        
                       
                </div>
            </div>
            <div class="col-md-3 hidden-xs hidden-sm">
                <div style="width: 100%;height: auto;">
                    <div class="panel panel-default  hot_job">
                        <div class="panel-heading"><span>热门职位</span></div>
                        <div class="panel-body" style="padding: 0;">
                            <ul>
                                <volist name="newest" id="v">
                                    <li>
                                        <a href="{:U('Home/Index/detail',array('id'=>$v[id]))}" target="_blank">{$v.title}</a>
                                    </li>
                                </volist>
                            </ul>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        
        </div>
        </div>
    </section>
  
</block>