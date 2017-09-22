<extend name="Common/basepage"/>

<block name="title">油气经纪人-专注油气行业人才猎聘</block>
<block name="description">油气经纪人，专注于油气行业中高端人才招聘服务。对求职者，提供油气行业上、中、下游最真实的招聘信息，24小时极速反馈让您的求职不再“石沉大海”。对企业，提供网络招聘,猎头,培训咨询,测评和人事外包等一站式专业人力资源服务。找对人，油气经纪人！</block>
<block name="keywords">油气经纪人,专注油气行业人才猎聘</block>
<block name="body">
<style>
    body{
        background: #ffffff;
    }

    @media (max-width:970px) {
      
        #myCarousel1{
            display: none;
        }
        .hot{
            height: 106px;
            background: #f5f5f5;
            width:100%;
            margin-right: 30px;
            border: solid 1px #ffffff;


        }
        #pc{
            display: none;
        }
        .logopc{
            display: none;
        }
        
    
    }
    @media (min-width:970px) {
        .logophoto{
            display: none;
        }
        #myCarousel2{
            display: none;
        }
        .hot{
            height: 106px;
            background: #f5f5f5;
            width: 386px;
            margin-right: 20px;
            border: solid 1px #ffffff;
            padding-left: 20px;
            padding-right:20px;


        }
        #phone{
            display:none;
        }
        .position{
            display: none;
        }
      
    }
    .header{
        margin-bottom: 0px;
        height: 120px;
    }
    /*热门推荐*/
   
    .hot-img{
        padding: 0px;
        margin: 0px;
        line-height: 106px;
    }
    a:hover .hot{
        border: solid 1px #2ecc71;
       
     
        
    }
    .job{
        position: relative;
      
    }
    .jobNow{
        text-indent: 10px;
        font-size: 14px;
        background: #27ae60;
        width: 150px;
        color: #ffffff;
        line-height: 30px;
        position: absolute;
        top:20px;
        left: 10px;
        z-index: 10;
    }
    .jobFinish{
        text-indent: 10px;
        font-size: 14px;
        background: #2ecc71;
        width: 111px;
        color: #ffffff;
        line-height: 30px;
        position: absolute;
        top:60px;
        left: 10px;
        z-index:10;
      
    }
    .person{
        height: 80px;
        position: absolute;
        bottom: 0px;
        width: 377px;
        background:rgba(255,255,255,0.85) none repeat scroll !important;
        background: #e9e8e8;
        text-align: center;
        left: 20px;
      
    }
   
    
    .weiphoto{
        width: 377px;
        height: 300px;
        position: absolute;
        top:0px;
        left: 20px;
        opacity: 0.8;
        display:none ;
    }
    .jobNow-p{
        text-indent: 10px;
        font-size: 14px;
        background: #27ae60;
        width: 150px;
        color: #ffffff;
        line-height: 30px;
        position: absolute;
        top:20px;
        z-index: 10;
    }
    .jobFinish-p{
        text-indent: 10px;
        font-size: 14px;
        background: #2ecc71;
        width: 111px;
        color: #ffffff;
        line-height: 30px;
        position: absolute;
        top:60px;
        z-index:10;

    }
    .person-p{
        height: 80px;
        position: absolute;
        bottom: 0px;
        width: 377px;
        background:rgba(255,255,255,0.85) none repeat scroll !important;
        background: #e9e8e8;
        text-align: center;
        left: 10px;

    }


    .weiphoto-p{
        width: 377px;
        height: 300px;
        position: absolute;
        top:0px;
        left: 10px;
        opacity: 0.8;
        display:none ;
    }
    .log{
        text-align: left;
        position: absolute;
        top:12px;
        height: 15px;
    }
    .log li{
        background-color: #555;
        border: 1px solid #31708f;
    }
    .name{
        width: 260px;
        height: 46px;
        text-indent: 20px;
        float: left;
        border: none;
       
    }
    .phone{
        margin-left: 10px;
        width: 300px;
        height: 46px;
        text-indent: 20px;
        border: none;
        float: left;
    }
    .submit{
        width: 128px;
        height: 46px;
        background: #3b3b3b;
        border:none;
        padding: 0px;
        color: #ffffff;
        float: left;
    }
    .phone-phone{
        height: 46px;
    }
    .phone-name{
        height: 46px;
    }
    .phone-submit{
        height: 46px;
        background: #3b3b3b;
        border:none;
        color: #ffffff;
    }
  
</style>


<?php

$firstImg=$img[0];
unset($img[0]);
$otherImg=$img;
$count=count($otherImg);

?>

<div style="width: 100%">
    <div  class="carousel slide " data-ride="carousel" id="myCarousel" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php
            for ($i=1;$i<=$count;$i++){
                echo "<li data-target='#myCarousel' data-slide-to=".$i.'></li>&nbsp;';
            }
            ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner " role="listbox">
            
            
            <div class="item active" >
                <img src="__UPLOAD__/{$firstImg.img}" alt="..."  class="img-responsive center-block">
            </div>
            <foreach name='otherImg' item='v'>
                <div class="item text-center" >
                   <img src="__UPLOAD__/{$v.img}" alt="..."  class="img-responsive center-block" >
                
                </div>
            </foreach>
         
        </div>
        
     
    </div>
</div>

<script>

    //        停止轮播
    $(function(){
//            $('#myCarousel2').carousel({
//                pause: true,
//                interval: false
///           });
           
        $('#myCarousel1').carousel({
                pause: true,
                interval: false
        });
    });
    //        修改轮播时间
    //        $(function(){
    //        $('#myCarousel').carousel({
    //        interval: 100
    //        });
    //});
</script>

<div class="container " style="background: #ffffff;margin-top: 60px;">
    <div class="col-md-12" style="margin-bottom: 10px;font-size: 18px;color: #000000;padding: 0px;" >
        <h4 style="font-weight: 600"><span style="border: 2px solid #33ae67"></span><span style="margin-left: 27px;">热门岗位</span></h4>
    </div>
    <foreach name='newest' item='v'>
        <a href="{:U('Home/Index/detail',array('id'=>$v[id]))}" class="hotJob" >
            <if condition="$key==2||$key==5">
                <div class="col-md-4 col-xs-12 hot" style="margin-top: 20px;margin-right: 0px" >
                    <div class="col-xs-2 hot-img">
                        <img src="__IMG__/{$key}{$key}.png">
                    </div>
                    <div class="col-xs-10" style="margin-top: 33px;padding: 0px">
                        <div class="col-xs-12">
                            <div style="padding: 0px;margin: 0px;color: #27ae60;font-size: 18px">
                                <span><?php echo substring($v['title'],10)?></span>
                                <span  style="color: #3b3b3b;font-size: 14px ;line-height: 28px;margin-left: 10px;">
                                <?php echo substring($v['outside_location'],8)?>
                            </span>
                            </div>
                          
                        </div>
                        <div class="col-xs-12" style="margin-top: 5px;">
                            <div style=" color: #169bd4;font-size: 14px"><span>{$v.year}</span><span style="padding: 0px;margin: 0px;font-size: 14px;color: #a9a9a9;margin-left: 10px;"> <?php echo substring($v['company'],10)?></span></div>
                        </div>


                    </div>

                </div>
                <else/>
                <div class="col-md-4 col-xs-12 hot" style="margin-top: 20px;" >
                    <div class="col-xs-2 hot-img">
                        <img src="__IMG__/{$key}{$key}.png">
                    </div>
                    <div class="col-xs-10" style="margin-top: 33px;padding: 0px">
                        <div class="col-xs-12">
                            <div  style="padding: 0px;margin: 0px;color: #27ae60;font-size: 18px">
                               <span><?php echo substring($v['title'],10)?></span>
                                <span style="color: #3b3b3b;font-size: 14px ;line-height: 28px;margin-left: 10px;">
                                <?php echo substring($v['outside_location'],8)?>
                            </span>
                            </div>
                          
                        </div>
                        <div class="col-xs-12" style="margin-top: 5px;">
                            <div  style="padding: 0px;margin: 0px; color: #169bd4;font-size: 14px"><span>{$v.year}</span><span style="font-size: 14px;color: #a9a9a9;margin-left: 10px;"> <?php echo substring($v['company'],10)?></span></div>
                            
                        </div>


                    </div>

                </div>
            </if>
            
        </a>
    
    </foreach>


</div>

<?php

$firstPerson=array_slice($person,0,3);
array_splice($person,0,3);
$otherPerson=$person;
$information=array();
foreach ($otherPerson as $k=>$v){
    if($k==0){
        $information[$k][$k]=$otherPerson[$k];
        $information[$k][$k+1]=$otherPerson[$k+1];
        $information[$k][$k+2]=$otherPerson[$k+2];
    }else if($k%3==0 ){
        $information[$k][$k]=$otherPerson[$k];
        $information[$k][$k+1]=$otherPerson[$k+1];
        $information[$k][$k+2]=$otherPerson[$k+2];
    }
    
}

foreach($information as $k=>$v){
    foreach ($v as $t=>$p){
        if($p==NULL){
            unset($information[$k][$t]);
        }
    }
    $number=count($information);
}

?>
<!--    推荐-->
<div class="container" style="background: #ffffff;margin-top: 60px;">
    <div class="col-md-12" style="margin-bottom: 40px;padding: 0px;">
        <h4 style="font-weight: 600"><span style="border: 2px solid #33ae67"></span><span style="margin-left: 27px;">推荐顾问</span></h4>
    </div>
    <!-- 电脑屏幕-->
    <div id="myCarousel1" class="carousel slide" data-ride="carousel" >
        <!-- Indicators -->
        <ol class="carousel-indicators log">
            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
            <?php
            for ($i=1;$i<=$number;$i++){
                echo "<li data-target='#myCarousel1' data-slide-to=".$i.'></li>&nbsp;';
            }
            ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <foreach name='firstPerson' item='v'>
                       <div class="col-sm-12 col-md-4 photo" style="margin: 0px;padding: 0px;" >
                        <div class="col-sm-12 job" style="margin: 0px;padding: 0px;" >
                          
                            <a href="{:U('Home/User/index',array('id'=>$v[uid]))}"><img src="__UPLOAD__/{$v.photo}" alt="" style="max-width: 377px;max-height: 300px;margin-left: 20px;" ></a>
                            <div class="jobNow">发布中的职位&nbsp;{$v.nowCount}</div>
                            <div class="jobFinish">完成的职位&nbsp;{$v.count}</div>
                            <div class="person" style="text-align: left;">
                                <div class="col-sm-12" style="font-size: 18px;color: #3b3b3b;margin-top: 15px;padding-left: 20px;">{$v.name}</div>
                                <div class="col-sm-12" style="font-size: 14px;color: #999999;padding-left: 20px;"><div class="col-sm-8" style="padding: 0px;line-height: 28px;"><?php echo substring($v['detail'],15)?></div> <div class="col-sm-4"><a href="{$v.linkin}" target="_blank"><img src="__IMG__/in.png"></a>&nbsp;&nbsp;<a href="javascript:;" class="weixin"><img src="__IMG__/weixin.png"></a></div> </div>
                            </div>
                            <div class="weiphoto" >
                                <img src="__UPLOAD__/{$v.logo}">
                            </div>
                        </div>
                      
                    </div>
                </foreach>
            
            
            
            </div>
            <if condition="$otherPerson!=NULL">
                <foreach name='information' item='v'>
                    <div class="item">
                        <foreach name='v' item='k'>
                            <div class="col-sm-12 col-md-4 photo" style="margin: 0px;padding: 0px;" >
                                <div class="col-sm-12 job" style="margin: 0px;padding: 0px;" >

                                   <a href="{:U('Home/User/index',array('id'=>$k[uid]))}"><img src="__UPLOAD__/{$k.photo}" alt="" style="max-width: 377px;max-height: 300px;margin-left: 20px" ></a>
                                    <div class="jobNow">发布中的职位&nbsp;{$k.nowCount}</div>
                                    <div class="jobFinish">完成的职位&nbsp;{$k.count}</div>
                                    <div class="person" style="text-align: left;">
                                        <div class="col-sm-12" style="font-size: 18px;color: #3b3b3b;margin-top: 15px;padding-left: 20px;">{$k.name}</div>
                                        <div class="col-sm-12" style="font-size: 14px;color: #999999;padding-left: 20px;"><div class="col-sm-8" style="padding: 0px;line-height: 28px;"><?php echo substring($k['detail'],15)?></div> <div class="col-sm-4"><a href="{$k.linkin}" target="_blank"><img src="__IMG__/in.png"></a>&nbsp;&nbsp;<a href="javascript:;" class="weixin"><img src="__IMG__/weixin.png"></a></div> </div>
                                    </div>
                                    <div class="weiphoto" >
                                        <img src="__UPLOAD__/{$k.logo}">
                                    </div>
                                </div>

                            </div>
                        </foreach>
                    
                    
                    </div>
                
                </foreach>
            
            
            </if>
        
        </div>
        
        
    </div>
    
    
    <!--        手机端屏幕-->
    <?php
    foreach ( $personInfo as $k => $v ) {
        //            已完成的职位
        $where['user_id'] =$v['uid'];
        $where['status']=1;
        $where['is_active']=1;
        $count=M('jobs')->where($where)->count();
        if($count>0){
            $personInfo[$k]['count']=$count;
        }else{
            $personInfo[$k]['count']=0;
        }
        //            进行中的职位
        $nowCount['user_id']=$v['uid'];
        $nowCount['status']=0;
        $nowCount['is_active']=1;
        $now=M('jobs')->where($nowCount)->count();
        if($now>0){
            $personInfo[$k]['nowCount']=$now;
        }else{
            $personInfo[$k]['nowCount']=0;
        }
        
    }
    $phone=$personInfo[0];
    unset($personInfo[0]);
    
    ?>
    <div id="myCarousel2" class="carousel slide" data-ride="carousel" style="margin-top: 40px">
        <!-- Indicators -->
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">

                <div class="col-sm-12 col-md-4 photo" style="margin: 0px;padding: 0px;" >
                    <div class="col-sm-12 job" style="margin: 0px;padding: 0px;" >

                        <a href="{:U('Home/User/index',array('id'=>$phone[uid]))}"><img src="__UPLOAD__/{$phone.photo}" alt="" style="max-width: 377px;max-height: 300px;margin-left: 10px;" ></a>
                        <div class="jobNow-p">发布中的职位&nbsp;{$phone.nowCount}</div>
                        <div class="jobFinish-p">完成的职位&nbsp;{$phone.count}</div>
                        <div class="person-p" style="text-align: center;">
                            <div class="col-sm-12" style="font-size: 20px;color: #0f0f0f;">{$phone.name}</div>
                            <div class="col-sm-12" style="font-size: 14px;color: #a9a9a9;"><?php echo substring($v['detail'],15)?> </div>
                            <div class="col-sm-12" ><a href="{$v.linkin}" target="_blank"><img src="__IMG__/in.png"></a></div>
                        </div>
                        <div class="weiphoto-p">
                            <img src="__IMG__/img.gif">
                        </div>
                    </div>

                </div>
            
            
            
            </div>
            <if condition="$person!=NULL">
                <foreach name='personInfo' item='v'>
                    <div class="item">
                        <div class="col-sm-12 col-md-4 photo" style="margin: 0px;padding: 0px;" >
                            <div class="col-sm-12 job" style="margin: 0px;padding: 0px;" >

                                <a href="{:U('Home/User/index',array('id'=>$v[uid]))}"><img src="__UPLOAD__/{$v.photo}" alt="" style="max-width: 377px;max-height: 300px;margin-left: 10px;" ></a>
                                <div class="jobNow-p">发布中的职位&nbsp;{$v.nowCount}</div>
                                <div class="jobFinish-p">完成的职位&nbsp;{$v.count}</div>
                                <div class="person-p" style="text-align: center;">
                                    <div class="col-sm-12" style="font-size: 20px;color: #0f0f0f;">{$v.name}</div>
                                    <div class="col-sm-12" style="font-size: 14px;color: #a9a9a9;"><?php echo substring($v['detail'],15)?> </div>
                                    <div class="col-sm-12" ><a href="{$v.linkin}" target="_blank"><img src="__IMG__/in.png"></a></div>
                                </div>
                                <div class="weiphoto-p">
                                    <img src="__IMG__/img.gif">
                                </div>
                            </div>

                        </div>
                    
                    
                    </div>
                
                </foreach>
            
            
            </if>
        
        </div>
        
        <!-- Controls -->
     
    </div>
</div>
<!--提交联系方式-->
<div id="pc" class="logoImage" style="position: relative;margin-top: 100px;">
    <div class="container " style="margin-top: 10px; height: 244px;">
        <div class="col-md-12" style="margin-bottom: 20px;text-align: center">
            <div class="col-md-12" style="font-size: 16px;color: #ffffff;text-indent: 20px;margin-top: 78px;">如果您正在寻求新的工作机会,留下您的联系方式</div>
        </div>
        <div class="col-md-12" >
                <form method="post" class="One" style="margin-left: 252px;">
                    <input type="text" name="name" placeholder="您的姓名"  class="name" id="user">
                    <input type="text" name="phone" placeholder="您的联系电话"  class="phone" id="telephone">
                    <input  type="submit" value="提交" class="submit">
                </form>
        </div>
    </div>
</div>
<!--手机端-->
<div style="background: #35af69;height: 244px;" id="phone">
    <div class="container" style="background: #35af69;margin-top: 50px;padding: 10px">
        <div class="col-xs-12" style="margin-top: 70px;text-align: center">
            <div style="font-size: 14px;color: #ffffff;">如果您正在寻求新的工作机会,留下您的联系方式</div>
        </div>
        <div class="col-xs-12" style="margin-top: 30px;padding: 0px;">
            <div class="col-xs-12" style="padding: 0px;">
                <form method="post" class="Two">
                    <input type="text" name="name" placeholder="您的姓名"class="col-xs-5 phone-name">
                    <input type="text" name="phone" placeholder="您的联系电话"  class="col-xs-5 phone-phone">
                    <input  type="submit" value="提交" class="col-xs-2 phone-submit" >
                </form>
            </div>
        </div>
    </div>
</div>
<!--    推荐公司-->
<div class="container" style="background: #ffffff;margin-top: 50px;padding: 10px;margin-bottom: 60px;">
    <div class="col-md-12" style="padding: 0px;">
        <h4 style="font-weight: 600"><span style="border: 2px solid #33ae67"></span><span style="margin-left: 27px;">成功案例</span></h4>
    </div>
<?php
    //    $firstCompany=array_slice($company,0,5);
    //    array_splice($company,0,5);
    //    $twoCompany=$company;
?>
<!--    手机端显示-->
    <div class="col-sm-12 logophoto" style="margin-top: 35px;" >
      
        <foreach name='company' item='v'>
            <div class="col-sm-3 col-xs-6" style="padding: 30px" >
                <div class="col-sm-12 logoCompany " style=" max-height:100px;text-align: center;line-height: 100px;max-width: 200px">
                    <img src="__UPLOAD__/{$v.logo}" alt="">
                </div>
            </div>
        </foreach>
    </div>
<!--   电脑端显示-->
    <div style="margin-top: 35px;" class="logopc">

        <foreach name='company' item='v'>
            <div style="width: 236px;float: left;text-align: center;margin-top: 20px;height: 120px;line-height: 120px;">
                    <img src="__UPLOAD__/{$v.logo}" alt="" style="max-width: 160px;max-height: 120px;">
            </div>
        </foreach>
    </div>

 <script>
     $(function(){

         $('.weixin').click(function(){
             $(this).parents('.job').find('.weiphoto').css('display','block');
             $(this).parents('.job').find('.person').css('display','none');
         });
         $('.job').mouseleave(function(){
             $(this).find('.weiphoto').css('display','none');
             $(this).find('.person').css('display','block');
         })
         
     })
 </script>
    
    <script>
        function jump() {
            location.href = '{:U("Index/index")}';
        }
        $(function(){
            $('.One').submit(function(){
                var username=$('#user').val();
                var telephone=$('#telephone').val();

                if(username.length<1){

                    modalAlert('请输入您的姓名');
                    return false;
                }
                if(telephone.length<1){
                    modalAlert('请输入您的电话');
                    return false;
                }

                var info=$(this).serialize();
                $.ajax({
                    type:"post",
                    url:"{:U('Index/getPc')}",
                    data:info,
                    dataType:'json',
                    success:function(data){
                        if (data==1) {
                            modalAlert('提交成功');
                            setTimeout('jump()',2000);

                        } else {
                            modalAlert('提交失败');
                        }
                    }

                });
                return false;
            })
        })
        $(function(){
            $('.Two').submit(function(){
                var username=$('.phone-name').val();
                var telephone=$('.phone-phone').val();

                if(username.length<1){

                    modalAlert('请输入您的姓名');
                    return false;
                }
                if(telephone.length<1){
                    modalAlert('请输入您的电话');
                    return false;
                }

                var info=$(this).serialize();
                $.ajax({
                    type:"post",
                    url:"{:U('Index/getPc')}",
                    data:info,
                    dataType:'json',
                    success:function(data){
                        if (data==1) {
                            modalAlert('提交成功');
                            setTimeout('jump()',2000);

                        } else {
                            modalAlert('提交失败');
                        }
                    }

                });
                return false;
            })
        })
    </script>

</div>
</block>



