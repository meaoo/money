<extend name="Common/basepage"/>

<block name="title">【招聘】石油行业_换工作_跳槽_兼职选油气经纪人</block>
<block name="description">油气经纪人，专注于油气行业中高端人才招聘服务。对求职者，提供油气行业上、中、下游最真实的招聘信息，24小时极速反馈让您的求职不再“石沉大海”。对企业，提供网络招聘,猎头,培训咨询,测评和人事外包等一站式专业人力资源服务。找对人，油气经纪人！</block>
<block name="keywords">招聘,石油行业,换工作,跳槽,兼职,油气经纪人</block>
<block name="body">
    <style>

        body{
            background: #ffffff;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 0px solid #ddd;
        }
        .table>thead>tr>th{
            border: 0px;
        }

        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #f8fafc;
        }
        .table-striped > tbody > tr:nth-child(2n) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #ffffff;
        }
    </style>
    <div class="container">
        <div class="col-md-3 col-xs-12" style="padding: 0px;border:solid 1px #eaeaea;border-right: 0px;position: relative">


            <div class="col-md-12" style="text-align: center;padding-top: 30px;background: #fcfcfc;">
                <img src="__UPLOAD__/{$userInfo.personlogo}" style="width: 110px;border-radius: 50%;height: 110px;">
            </div>
            <div class="col-md-12" style="text-align: center;position: absolute;top:120px;"><span style="padding: 2px 15px ;background: #1db152;;color: #ffffff;border-radius: 25px;">{$userInfo.name}</span></div>
            <div class="col-md-12" style="text-align: center;font-size: 14px;color: #333333;font-weight: 600;background: #fcfcfc;padding-bottom: 20px;border-bottom: solid 1px #eaeaea;padding-top: 5px;">{$userInfo.detail}</div>



            <div class="col-md-12" style="margin-top: 40px;text-indent: 25px;color: #9d9d9c;font-size: 14px;line-height: 24px;">Tel:</div>
            <div class="col-md-12" style="text-indent: 25px;line-height: 24px;margin-bottom: 20px;">{$userInfo.tel}</div>
            <div class="col-md-12" style="text-indent: 25px;color: #9d9d9c;font-size: 14px;line-height: 24px;">LinkedIn:</div>
            <div class="col-md-12" style="line-height: 24px;margin-bottom: 20px;word-break:break-all;padding-left: 40px;">
                <a href="{$userInfo.linkin}" target="_blank">{$userInfo.linkin}</a>
            </div>
        <div class="col-md-12" style="text-indent: 25px;color: #9d9d9c;font-size: 14px;line-height: 24px;">Wechat:</div>
            <div class="col-md-12" style="text-indent: 25px;line-height: 24px;margin-bottom: 20px;">{$userInfo.weixin}</div>
            <div class="col-md-12" style="text-indent: 25px;color: #9d9d9c;font-size: 14px;line-height: 24px;">E-mail:</div>
            <div class="col-md-12" style="text-indent: 25px;line-height: 24px;margin-bottom: 40px;">{$user.email}</div>
            <div class="col-md-12" style="text-indent: 25px;color: #9d9d9c;font-size: 14px;line-height: 24px;">扫描关注推荐顾问</div>
            <div class="col-md-12" style="margin-left: 25px;padding-bottom: 20px;">
                <img src="__UPLOAD__/{$userInfo.person}" style="width: 112px;height: 112px;">
            </div>
        </div>
        <div class="col-md-9 col-xs-12" style="padding-top: 50px;padding: 0px;border: solid 1px #eaeaea; padding-bottom: 100px;margin-bottom: 20px;">
            <div class="col-md-12 col-xs-12" style="margin-top: 45px;">
                <div class="col-md-1" style="color: #333333;line-height: 20px;padding: 0px;margin-left: 25px;">
                    擅长领域:
                </div>
                <div class="col-md-9" style="text-indent: 10px;color: #333333;line-height: 20px;padding: 0px;text-indent: 25px;">
                    {$userInfo.perfect}
                </div>
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 20px;position: relative">
                <div class="col-md-1" style="color: #333333;line-height: 20px;padding: 0px;margin-left: 25px;">
                    最近30天:
                </div>
                <div class="col-md-8" style="text-indent: 10px;color: #333333;line-height: 20px;padding: 0px;background: #f8fafc;height: 36px;line-height: 36px;position: absolute;top:-8px;left: 110px;border: solid 1px #eaeaea;">
                    <span>上岗&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['job']==NULL">0<else/>{$recommend.job}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>客户offer数&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['customer']==NULL">0<else/>{$recommend.customer}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>客户面试&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['interview']==NULL">0<else/>{$recommend.interview}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>推荐&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['referee']==NULL">0<else/>{$recommend.referee}</if>&nbsp;</span>人</span>
                </div>
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 20px;position: relative;border-bottom: solid 1px #eaeaea;padding-bottom: 40px;">
                <div class="col-md-1" style="color: #333333;line-height: 20px;padding: 0px;margin-left: 25px;">
                    全部业绩:
                </div>
                <div class="col-md-8" style="text-indent: 10px;color: #333333;line-height: 20px;padding: 0px;background: #f8fafc;height: 36px;line-height: 36px;position: absolute;top:-8px;left: 110px;border: solid 1px #eaeaea;">
                    <span>上岗&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['job-p']==NULL">0<else/>{$recommend.job-p}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>客户offer数&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['customer-p']==NULL">0<else/>{$recommend.customer-p}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>客户面试&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['interview-p']==NULL">0<else/>{$recommend.interview-p}</if>&nbsp;</span>人</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>推荐&nbsp;<span style="color: #00a73c;font-weight: 600;"><if condition="$recommend['referee-p']==NULL">0<else/>{$recommend.referee-p}</if>&nbsp;</span>人</span>
                </div>
            </div>
            <?php $uid=$_GET['id'];?>
            <div class="col-md-12" style="background: #fcfcfc;padding: 0px;">
                <div class="col-md-12" style="padding-top: 40px;text-indent: 25px;font-size: 16px;color: #333333;padding-bottom: 20px;position: relative;"><p style="border: solid 2px #333333;height: 14px;width: 1px;position: absolute;left: 40px;top:43px;"></p>&nbsp;&nbsp;<span style="font-weight: 700">运作中的岗位</span></div>
                <div class="col-md-12" style="padding-left: 40px;padding-right: 40px;">
                    <table class="table table-striped" style="text-indent: 25px;border: solid 1px #eaeaea;">
                        <thead>
                        <tr style="background: #ffffff;border: 0px;">
                            <th style="padding-top: 20px;padding-bottom: 20px;">职位名称</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">职位年薪</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">招聘企业</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">工作地点</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">更新时间</th>
                        </tr>
                        </thead>
                        <?php
                         $jobCounts=count($jobCount);
                         $finishCounts=count($finishCount);
                        ?>
                        <tbody>
                        <foreach name="jobNow" item="vo" key="k">
                            <if condition="$k%2==0">
                                <tr style="background: #ffffff;">
                                    <td><a href="{:U('Home/Index/detail',array('id'=>$vo[id]))}" target="_blank">{$vo.title}</a></td>
                                    <td>{$vo.year}</td>
                                    <td>{$vo.company}</td>
                                    <td>{$vo.outside_location}</td>
                                    <td><?php
                                        if(empty($vo['update_time'])){
                                            
                                        }else{
                                            echo date('Y-m-d',strtotime($vo['update_time']));
                                        }
                                 
                                        ?></td>

                                </tr>
                                <else/>
                                <tr>
                                    <td><a href="{:U('Home/Index/detail',array('id'=>$vo[id]))}" target="_blank">{$vo.title}</a></td>
                                    <td>{$vo.year}</td>
                                    <td>{$vo.company}</td>
                                    <td>{$vo.outside_location}</td>
                                    <td><?php
                                        if(empty($vo['update_time'])){
            
                                        }else{
                                            echo date('Y-m-d',strtotime($vo['update_time']));
                                        }
        
                                        ?></td>

                                </tr>
                            </if>

                        </foreach>
                    
                       
                  
                        </tbody>
                    </table>
                    <?php
                        if($jobCounts>5){
                    ?>
                        <div class="col-md-12" style="text-align: center"><a href="{:U('Home/User/getJob',array('id'=>$uid,'status'=>0))}"><button type="button" class="btn btn-success">查看更多</button></a></div>
                    <?php }?>
                    
                    
                </div>
<!--                成功运作的岗位-->
                <div class="col-md-12" style="padding-top: 40px;text-indent: 25px;font-size: 16px;color: #333333;padding-bottom: 20px;position: relative"><p style="border: solid 2px #333333;height: 14px;width: 1px;position: absolute;left: 40px;top:43px;"></p>&nbsp;&nbsp;<span style="font-weight: 700;">成功运作的岗位</span></div>
                <div class="col-md-12" style="padding-left: 40px;padding-right: 40px;">
                    <table class="table table-striped" style="text-indent: 25px;border: solid 1px #eaeaea;">
                        <thead>
                        
                        <tr style="background: #ffffff;border: 0px;">
                            <th style="padding-top: 20px;padding-bottom: 20px;">职位名称</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">职位年薪</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">招聘企业</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">工作地点</th>
                            <th style="padding-top: 20px;padding-bottom: 20px;">推荐状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <foreach name="jobFinish" item="vo" key="k">
                            <if condition="$k%2==0">
                                <tr style="background:#ffffff;">
                                    <td><a href="{:U('Home/Index/detail',array('id'=>$vo[id]))}" target="_blank">{$vo.title}</a></td>
                                    <td>{$vo.year}</td>
                                    <td>{$vo.company}</td>
                                    <td>{$vo.outside_location}</td>
                                    <td>成功入职</td>

                                </tr>
                                <else/>
                                <tr>
                                    <td><a href="{:U('Home/Index/detail',array('id'=>$vo[id]))}" target="_blank">{$vo.title}</a></td>
                                    <td>{$vo.year}</td>
                                    <td>{$vo.company}</td>
                                    <td>{$vo.outside_location}</td>
                                    <td>成功入职</td>

                                </tr>
                            </if>
                           
                        </foreach>
                       
                       
                        </tbody>
                    </table>
                          <?php
                             if($finishCounts>5) {
                          ?>

                          <div class="col-md-12" style="text-align: center"><a
                                      href="{:U('Home/User/getJob',array('id'=>$uid,'status'=>1))}">
                                  <button type="button" class="btn btn-success">查看更多</button>
                              </a></div>
                          <?php
                             }
                          ?>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</block>