<extend name="Common/basepage"/>

<block name="title">{$data.title} - 招聘详情</block>
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

                                    <div class="col-md-9">
                                        <h3 style="display: inline-block;margin-top: 10px;">{$data.title}</h3>
                                        <h5 style="display: inline-block;">
                                            <a href="{$data.url}" target="_blank">{$data.company}</a>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 text-right visible-lg visible-md" style="height: 46px;line-height: 56px;">
                                        <span style="font-size: 18px;">{$data.year}</span>
                                    </div>
                                </li>
                                <li>
                                    <ul class="row" style="line-height: 50px;margin: 0;">
                                        <li class="col-md-12" style="line-height: inherit;padding: 0; color: #898A89;">

                                            <div class="row">
                                                <ul class="col-md-12" >
                                                    <li style="display: inline-block">
                                                        <span>[{$data.type}]</span>
                                                        <span style="line-height: 25px;">
                                                        <?php
                                                           $city_id = explode ( ',' , $data[ 'city_id' ] );
                                                           foreach ( $city as $k => $value ) {
                                                             if ( in_array ( $value[ 'id' ] , $city_id ) ) {
                                                               echo $value[ 'name' ] . '&nbsp;&nbsp;';
                                                             }
                                                           }
                                                        ?>
                                                        </span>
                                                    </li>
                                                    <li style="display: inline-block">
                                                        <span style="color:#333;">发布时间：</span>
                                                        <span style="color: #898A89;">
                                                            {:date('Y-m-d', strtotime($data['created_on']))}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </li>
                                        <li class="col-xs-12 visible-xs visible-sm">
                                            <span style="font-size: 18px;">{$data.year}</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="description">
                            <p class="desctitle">岗位职责：</p>
                            <p class="desclist">
                                <?php echo nl2br ( $data[ 'description' ] , true ); ?>
                            </p>
                            <p class="desctitle">任职要求：</p>
                            <p class="desclist">
                                <?php echo nl2br ( $data[ 'request' ] , true ); ?>
                            </p>
                            <p class="desctitle">进一步了解职位信息：</p>
                            <p>
                                1.简历投递：<a href="mailto:hunterdu@fonchan.com">hunterdu@fonchan.com</a><br>
                            <p class="hidden-xs hidden-sm">
                                2.微信咨询：<a href="javascript:void(0)" data-placement="bottom" data-toggle="popover"  data-trigger="hover" data-content="<img src='__IMG__/wechat.jpg' />">15122437573</a>
                            </p>
                            <p class="visible-xs visible-sm">
                                2.微信咨询：<a href="tel:15122437573">15122437573</a>
                            </p>
                            </p>
                            <p class="desctitle">福利待遇：</p>
                            <p>
                                <?php
                                $summer = explode ( ',' , $data[ 'summary' ] );
                                foreach ( $list as $k => $value ) {
                                    if ( in_array ( $value[ 'id' ] , $summer ) ) {
                                        echo $value[ 'content' ] . '&nbsp;&nbsp;';
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="job_apply" style="padding-left: 20px;">
                            <button type="button" class="btn btn-default">马上申请该职位</button>
                        </div>
                        <div class="job_sub row" style="color: #323332;display: none;">
                            <form action="" class="submit form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="username" class="col-md-2 col-xs-4 col-sm-4 control-label"
                                           style="font-weight: normal;">您的名称<span style="color: #f00;">*</span></label>
                                    <div class="col-md-8 col-xs-8 col-sm-8 form-inline">
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="您的名称">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telephone" class="col-md-2 col-xs-4 col-sm-4 control-label"
                                           style="font-weight: normal;">联系电话<span style="color: #f00;">*</span></label>
                                    <div class="col-md-8 col-xs-8 col-sm-8 form-inline">
                                        <input type="email" class="form-control" id="telephone" name="telephone"
                                               placeholder="联系电话">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-2 col-xs-4 col-sm-4 control-label"
                                           style="font-weight: normal;">电子邮件</label>
                                    <div class="col-md-8 col-xs-8 col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="电子邮件">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="message" class="col-md-2 col-xs-4 col-sm-4 control-label"
                                           style="font-weight: normal;">留言</label>
                                    <div class="col-md-8 col-xs-8 col-sm-8">
                                        <textarea name="message" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telphone" class="col-md-2 col-xs-4 col-sm-4 control-label"></label>
                                    <div class="col-md-8 col-xs-8 col-sm-8">
                                        <div class="input-box">
                                            <div class="files"></div>
                                            <div class="input-file"
                                            <if condition="$tender['attachment'] neq  '' "> style="display:none;"</if>
                                            >
                                            上传简历附件<input type="file" name="license" id="license">
                                        </div>
                                        <p style="color:#989998; ">最大5MB，支持的格式是:PDF、RTF、DOC、ODT。</p>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                        <button type="button" class="btn btn-default" id="sub_job">提交</button>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                        <button type="button" class="btn btn-default" id="cancel">
                                            取消
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
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

    <script type="text/javascript" src="__JS__/ajaxfileupload.js"></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="popover"]').popover({html: true});
//		提交信息
            $('#sub_job').click(function () {
                var id = '{$data.id}';
                var license = $('#license-src').val();
                var username = $('#username').val();
                var telephone = $('#telephone').val();
                var email = $('#email').val();
//                if (license == undefined || license == '') {
//                    modalAlert('请上传简历');
//                    return false;
//                }
                if (username.length < 1) {
                    modalAlert('请输入您的名称');
                    return false;
                }
                var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                if (email.length > 1) {
                    if (!isEmail.test(email)) {
                        modalAlert('请输入正确的Email');
                        return false;
                    }
                }

                if (telephone.length < 1) {
                    modalAlert('请输入您的联系电话');
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: "{:U('Home/Index/upload')}",
                    data: {license: license, username: username, telephone: telephone, email: email, id: id},
                    dataType: 'json',
                    success: function (data) {
                        modalAlert(data.msg);
                        if (data.status) {
                            setTimeout('gohistory()', 3000);
                        }
                    }
                });
                return false;
            });

            $(document).on('change', '#license', function () {
                loadingEle = 'license';
                $.ajaxFileUpload({
                    url: siteIndex + 'Home/Api/upload',
                    type: 'post',
                    secureuri: false, //一般设置为false
                    fileElementId: 'license', // 上传文件的id、name属性名
                    dataType: 'JSON', //返回值类型，一般设置为json、application/json
                    data: {uploader: 'license'}, //传递参数到服务器
                    success: function (data, status) {
                        if (data.Result) {
                            $('#license-src').val(data.Data);
                            $('.files').append(
                                '<div><span>' + data.Name + '</span><input type="hidden"  id="license-src" class="onefile" value="' + data.Data + '" /><span class="glyphicon glyphicon-remove file-remove"></span></div>' +
                                "<input type='hidden' name='oldname' value='" + data.Name + "'>"
                            );

                            $('#license-upload-tips').css('display', 'none');
                            $('.input-file').hide();
                        } else {
                            modalAlert(data.Message);
                        }
                    },
                    error: function (data, status, e) {
                        modalAlert(e);
                    }
                });
            });

            $('.files').on('click', '.file-remove', function () {
                $(this).parent().remove();
                $('.input-file').show();
            });

            $('.job_apply button').click(function () {
                $('.job_sub').show();
            });
            $("#cancel").click(function () {
                $('.job_sub').hide();
            });
        });

        function gohistory() {
            $('.job_apply').hide();
            $('.job_sub').hide();
        }
    </script>
</block>