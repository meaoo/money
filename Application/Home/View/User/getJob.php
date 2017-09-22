<extend name="Common/basepage"/>

<block name="title">【招聘】石油行业_换工作_跳槽_兼职选油气经纪人</block>
<block name="description">油气经纪人，专注于油气行业中高端人才招聘服务。对求职者，提供油气行业上、中、下游最真实的招聘信息，24小时极速反馈让您的求职不再“石沉大海”。对企业，提供网络招聘,猎头,培训咨询,测评和人事外包等一站式专业人力资源服务。找对人，油气经纪人！</block>
<block name="keywords">招聘,石油行业,换工作,跳槽,兼职,油气经纪人</block>

<block name="body">
    
    <section class="container">
        <div class="content-wrap">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-9 col-sm-12" style="padding: 0;">
                    
                    
                    <div style="background-color: #fff;border:solid 1px #e3e3e3;">
                        <if condition="$status==1">
                            <div class="msg_bar">{$name}成功运作的岗位</div>
                            <else/>
                            <div class="msg_bar">{$name}运作中的岗位</div>
                        </if>
                        
                        <div class="content-fluid">
                            <div class="content  company_content">
                                <div id="accordion" style="background-color: #fff;margin: 0;" class="row">
                                    <volist name="data" id="v">
                                        <ul class="content_job">
                                            <li class="col-md-5 col-xs-12 col-sm-12">
                                                <a href="{:U('Home/Index/detail',array('id'=>$v[id]))}"
                                                   class="job_title" target="_blank">{$v.title}</a>
                                                <span>[&nbsp;{$v.type}&nbsp;]</span></li>
                                            <li class="col-md-3 col-xs-6 col-sm-6">
                                                <?php
                                                $city_id = explode ( ',' , $v[ 'city_id' ] );
                                                $num = 0;
                                                foreach ( $city as $k => $value ) {
                                                    if ( $num == 2 ) {
                                                        break;
                                                    }
                                                    
                                                    if ( in_array ( $value[ 'id' ] , $city_id ) ) {
                                                        echo $value[ 'name' ] . '&nbsp;&nbsp;';
                                                        $num++;
                                                    }
                                                }
                                                ?>
                                            
                                            </li>
                                            <li class="col-md-2 col-xs-6 col-sm-6 job_company">{$v.company}</li>
                                            <li class="col-md-2 job_year visible-md visible-lg text-right">
                                                {$v.year}
                                            </li>
                                            <li class="col-xs-12 col-sm-12 visible-sm visible-xs job_year">
                                                {$v.year}
                                            </li>
                                            <li class="col-xs-12 col-md-12 col-sm-12" style="padding-right: 0;">
                                                <ul class="row" style="margin: 0 -20px;">
                                                    <li class="col-md-10 col-xs-6 col-sm-6 job_content_footbar">
                                                        <?php
                                                        if(empty($v['summary'])){
                                                            echo '&nbsp;';
                                                        }
                                                        $summer = explode ( ',' , $v[ 'summary' ] );
                                                        $num = 0;
                                                        foreach ( $list as $k => $value ) {
                                                            if ( $num == 2 ) {
                                                                break;
                                                            }
                                                            
                                                            if ( in_array ( $value[ 'id' ] , $summer ) ) {
                                                                echo $value[ 'content' ] . '&nbsp;&nbsp;';
                                                                $num++;
                                                            }
                                                        }
                                                        ?>
                                                    </li>
                                                    <li class="col-md-2 col-xs-6  col-sm-6 job_content_footbar text-right" >
                                                        <?php
                                                        $time = strtotime ( $v[ 'created_on' ] );
                                                        echo date ( 'Y-m-d' , $time );
                                                        ?>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </volist>
                                    <empty name="data">
                                        <div  class="data-nan">
                                            <p class="text-center">没有数据
                                                <a href="{:U('/')}">返回首页</a>
                                            </p>
                                        </div>
                                    </empty>
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            {$page}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-xs hidden-sm"  >
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