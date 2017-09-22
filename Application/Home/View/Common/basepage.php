<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><block name="title"></block></title>
    <meta name="description" content="<block name="description"></block>">
    <meta name="keywords" content="<block name="keywords"></block>">
    <link rel="shortcut icon" href="__STATIC__/favicon.ico">
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css" rel="stylesheet">
    <block name="style"></block>
    <link href="__CSS__/new_home.css?v={:C('SITE_VERSION')}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="__JS__/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="__JS__/html5.min.js"></script>
	<script type="text/javascript" src="__JS__/respond.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="__JS__/jquery-2.0.3.min.js"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="__JS__/bootstrap.min.js"></script>
    <script type="text/javascript">
        var siteRoot = '__ROOT__';
        var siteIndex = '{:U("/")}';
        var uploadUrl = '__UPLOAD__/';
        var imgUrl = '__IMG__/';
    </script>
</head>
<body>

    <!-- 头部 -->
	<include file="Common/header"/>
	<!-- /头部 -->
	


<!--    <div class="container">-->
      <block name="body"></block>
<!--    </div>-->



	<!-- 底部 -->
	<include file="Common/footer"/>
	<!-- /底部 -->

    <script type="text/javascript" src="__JS__/common.js?v={:C('SITE_VERSION')}"></script>
    
    <block name="script"></block>

    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	    <block name="hidden"></block>
    </div>

    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="{$Think.lang.alert_close}"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" aria-label="信息提示"></h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
          </div>
        </div>
      </div>
    </div>

    <include file="Common/__stats"/>

</body>
</html>
