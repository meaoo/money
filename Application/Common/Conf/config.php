<?php
return array(
	//开启分组
	'APP_GROUP_LIST'=>'Home,Admin',

    //系统版本
    'SITE_VERSION' => APP_DEBUG ? time() : '0.1',


    //模板文件 后缀
	'TMPL_TEMPLATE_SUFFIX'  =>  '.php',

    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public',
        '__IMG__'    => __ROOT__ . '/Public/images',
        '__CSS__'    => __ROOT__ . '/Public/css',
        '__JS__'     => __ROOT__ . '/Public/js',
        '__UPLOAD__' => __ROOT__ . '/Public/upload',
     
    ),

    //上传文件的根目录
    'UPLOAD_PATH' =>  './Public/upload/',
   

    /* Cookie 存储 Key */
    'COOKIE_USER_ID' => 'uid',
    'COOKIE_USER_OPENID' => 'ck_us_oid',


     /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '192.168.1.10', // 服务器地址  192.168.1.10
    'DB_NAME'               =>  'jobberbase',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'Admin10',          // 密码 Admin10
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号


     /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  0,       // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',      // Cookie有效域名
    'COOKIE_PATH'           =>  '/',     // Cookie路径
    'COOKIE_PREFIX'         =>  '',      // Cookie前缀 避免冲突
    'COOKIE_SECURE'         =>  false,   // Cookie安全传输
    'COOKIE_HTTPONLY'       =>  '',      // Cookie httponly设置


    // URL 设置
    'URL_MODEL'            => 1,
    'VAR_MODULE'           => 'm_m', // 默认模块获取变量
    'VAR_CONTROLLER'       => 'm_c', // 默认控制器获取变量
    'VAR_ACTION'           => 'm_a', // 默认操作获取变量
    'URL_CASE_INSENSITIVE' => false, //关闭自动生成小写地址

    'URL_ROUTER_ON' => true,

    /* 日志设置 */
    'LOG_RECORD'            =>  true,   // 默认不记录日志
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR,WARN',// 允许记录的日志级别
    'LOG_FILE_SIZE'         =>  2097152,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  =>  false,    // 是否记录异常信息日志
    //缓存配置
    'REGISTER_URL' => 'http://localhost/shiyou/?page_id=8350',
    'LOGIN_URL' => 'http://localhost/shiyou/?page_id=8348',
    'LOGOUT_URL' => 'http://localhost/wp-login.php?action=logout&redirect_to=',
    'LOGIN_OAUTH2' => 'http://localhost/shiyou/wp-content/themes/dux/action/oauth2.php',
    'MODIFY_PASSWORD_URL' => 'http://localhost/shiyou/wp-content/themes/dux/action/user.php',
   
   
);