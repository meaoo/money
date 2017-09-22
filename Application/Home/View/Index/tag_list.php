<?php
$link_c = empty(I ( 'id' ))?"0":I('id'); // url中的分类参数
$link_d = empty(I ( 'cid' ))?"0":I('cid'); // url中的职位参数
$link_p = empty(I ( 'pid' ))?"0":I('pid'); // url中的职位参数
$link_k = I ( 'k' ); // 关键词
$cat_arr ='';
foreach($cate as $k){
    $cat_arr[$k['id']] = $k['name'];
}
$ty_arr ='';
foreach($type as $k){
    $ty_arr[$k['id']] = $k['name'];
}
$py_arr ='';
foreach($post as $k){
    $py_arr[$k['id']] = $k['postname'];
}

?>


<div style="background-color:#fff;" class="tag_content visible-md visible-lg">

    <ul class="row">
        <li class="tag_title col-md-3" style="width:auto;">
            <span>业务板块</span>
            <a href="{:QU(U('Home/Index/getcat',array('cid'=>$link_d,'pid'=>$link_p)), array('k' => $link_k) )}"
               class="tag_fir <if condition='$id == null'> active_fir </if>">全部</a>
        </li>
        <li class="tag_title col-md-9">
            <volist name="cate" id="ca">
                <if condition="$id==$ca['id']">
                    <a href="{:QU(U('Home/Index/getcat',array('id'=>$ca[id],'cid'=>$link_d,'pid'=>$link_p)), array('k' => $link_k) )}"
                       class="active">{$ca.name}</a>
                    <else/>
                    <a href="{:QU(U('Home/Index/getcat',array('id'=>$ca[id],'cid'=>$link_d,'pid'=>$link_p)), array('k' => $link_k) )}">{$ca.name}</a>
                </if>
                <i>|</i>
            </volist>
        </li>
    </ul>

    <hr>

    <ul class="row">
        <li class="tag_title col-md-3" style="width:auto;">
            <span>工作性质</span>
            <a href="{:QU(U('Home/Index/getcat', array('id'=>$link_c,'pid'=>$link_p)), array('k' => $link_k) )}"
               class=" tag_fir <if condition='$cid == null'> active_fir </if>">全部</a>
        </li>
        <li class="tag_title col-md-9">
            <volist name="type" id="ty">
                <if condition="$cid==$ty['id']">
                    <a href="{:QU(U('Home/Index/getcat', array('cid'=>$ty[id],'id'=>$link_c,'pid'=>$link_p)), array('k' => $link_k) )}"
                       class="active">{$ty.name}</a>
                    <else/>
                    <a href="{:QU(U('Home/Index/getcat',array('cid'=>$ty[id],'id'=>$link_c,'pid'=>$link_p)), array('k' => $link_k) )}">{$ty.name}</a>
                </if>
                <i>|</i>
            </volist>
        </li>
    </ul>
    <hr>
     <ul class="row">
        <li class="tag_title col-md-3" style="width:auto;">
            <span>岗位分类</span>
            <a href="{:QU(U('Home/Index/getcat', array('id'=>$link_c,'cid'=>$link_d)), array('k' => $link_k) )}"
               class=" tag_fir <if condition='$pid == null'> active_fir </if>">全部</a>
        </li>
        <li class="tag_title col-md-9">
            <volist name="post" id="ty">
                <if condition="$pid==$ty['id']">
                    <a href="{:QU(U('Home/Index/getcat', array('pid'=>$ty[id],'id'=>$link_c,'cid'=>$link_d)), array('k' => $link_k) )}"
                       class="active">{$ty.postname}</a>
                    <else/>
                    <a href="{:QU(U('Home/Index/getcat',array('pid'=>$ty[id],'id'=>$link_c,'cid'=>$link_d)), array('k' => $link_k) )}">{$ty.postname}</a>
                </if>
                <i>|</i>
            </volist>
        </li>
    </ul>
</div>

<div style="background-color:#fff;" class="tag_content visible-xs visible-sm mob-media">
    <ul class="row">
        <li class="tag_title col-xs-4">
           <button class="btn btn-default col-xs-12" onclick="getTree('business')">
               <span class="col-xs-12">
                   <if condition="$link_c == '0'">
                       业务板块
                       <else />
                       <if condition="mb_strlen($cat_arr[$id],'utf8') gt 6">
                           {:mb_substr($cat_arr[$id],0,6)}...
                           <else />
                           {$cat_arr[$id]}
                       </if>

                   </if>
               </span>
           </button>
        </li>
        <li class="tag_title col-xs-4">
            <button class="btn btn-default col-xs-12" onclick="getTree('work')">
                <span class="col-xs-12">
                    <if condition="$link_d == '0'">
                    全职/兼职
                        <else />
                        <if condition="mb_strlen($ty_arr[$cid],'utf8') gt 6">
                            {:mb_substr($ty_arr[$cid],0,6)}...
                            <else />
                            {$ty_arr[$cid]}
                        </if>
                    </if>
                </span>
            </button>
        </li>
        <li class="tag_title col-xs-4">
            <button class="btn btn-default col-xs-12" onclick="getTree('py')">
                <span class="col-xs-12">
                    <if condition="$link_p == '0'">
                        岗位分类
                        <else />
                        <if condition="mb_strlen($py_arr[$pid],'utf8') gt 6">
                            {:mb_substr($py_arr[$pid],0,6)}...
                            <else />
                            {$py_arr[$pid]}
                        </if>
                    </if>
                </span>
            </button>
        </li>
       
    </ul>
</div>

<div class="row float_menu float_menu_cat" id="float_menu_model" style="display: none;">
    <div class="col-xs-12" style="color:#fff;margin-top: 40px;">
        <ul>

        </ul>
    </div>
</div>

<div class="all_search">
    <span >相关结果：共 {$count} 个职位</span>
</div>
<block name="script">
    <script>
        var ca =$.parseJSON( '{:json_encode( $cate)}');
        var ty = $.parseJSON( '{:json_encode( $type)}');
        var py = $.parseJSON( '{:json_encode( $post)}');

        $("#float_menu_model").click(function(){
            $(this).hide();
        });

        function getTree(f){
            $("#float_menu_model > div > ul").html('');
            if('business' == f){
                ca.forEach(function (e) {
                    showTree(e,f);
                });

            }else if('work' == f){
                ty.forEach(function (e) {
                    showTree(e,f);
                });
            }else if('py' == f){
                py.forEach(function (e) {
                    showTree(e,f);
                });
            }

            var url, html='';
            if(f == 'business'){
                url = "__APP__/Home/index/getcat/id/0/cid/"+{$link_d}+"/pid/"+{$link_p}+".html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }else if(f == 'work'){
                url  = "__APP__/Home/index/getcat/id/"+{$link_c}+"/cid/0/pid/"+{$link_p}+".html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }else if(f == 'py'){
                url  = "__APP__/Home/index/getcat/id/"+{$link_c}+"/cid/"+{$link_d}+"/pid/0.html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }

            html += "<li class='col-xs-12'>";
            html += "<a class='col-xs-12'  href='"+url+"' >不限</a>";
            html += "</li>";

            $("#float_menu_model > div > ul").append(html);
            $("#float_menu_model").show();
        }

        function showTree(e,f){
            var url,html;
            if(f == 'business'){
                 url = "__APP__/Home/index/getcat/id/"+e['id']+"/cid/"+{$link_d}+"/pid/"+{$link_p}+".html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }else if(f == 'work'){
                 url = "__APP__/Home/index/getcat/id/"+{$link_c}+"/cid/"+e['id']+"/pid/"+{$link_p}+".html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }else if(f == 'py'){
                url  = "__APP__/Home/index/getcat/id/"+{$link_c}+"/cid/"+{$link_d}+"/pid/"+e['id']+".html?k=<?php echo  empty($link_k)? ' ':$link_k; ?> ";
            }
            html = "<li class='col-xs-12'>";
            if(f == 'py'){
                html += "<a class='col-xs-12'  href='"+url+"' >" + e['postname'] + "</a>";
            }else{
                html += "<a class='col-xs-12'  href='"+url+"' >" + e['name'] + "</a>";
            }
            html += "</li>";
            $("#float_menu_model > div > ul").append(html);
        }
    </script>
</block>