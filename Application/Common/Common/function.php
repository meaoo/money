<?php
function p($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

 function QU($url, $args){
     if(!$args || empty($args))
         return $url;

     return add_url_args($url, $args);
 }
  function add_url_args($url, $args){
     $url .= (strpos($url, '?') > -1 ? '&': '?');
     $tag = '';
     if(is_array($args)){
         foreach($args as $key => $value){
			if(strpos($value, '=') > -1){
				$url .= ($tag.$value);
			}else{
				$url .= ($tag.$key.'='.$value);
			}
            $tag = '&'; 
         }
     }else{
         $url .= $args;
     }
     return $url;
 }
 function delDirAndFile( $dirName )
{
if ( $handle = opendir( "$dirName" ) ) {
while ( false !== ( $item = readdir( $handle ) ) ) {
if ( $item != "." && $item != ".." ) {
if ( is_dir( "$dirName/$item" ) ) {
delDirAndFile( "$dirName/$item" );
} else {
 unlink( "$dirName/$item" ) ;
}
}
}
closedir( $handle );
if( rmdir( $dirName ) ){
    return true;
}else{
    return false;
}
}
}
 /**
  * 获取当前页面完整URL地址
  */
 function get_url() {
     $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
     $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
     $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
     $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
     return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
 }
function substring($str, $len = 20){
    $len *= 2;
    $i = $j = 0;
    for($i = 0;$i < mb_strlen($str, 'utf-8'); $i++) {
        if (strlen(mb_substr($str, $i, 1, 'utf-8')) > 1) {
            $j += 2;
        } else {
            $j++;
        }
        if ($j >= $len) {
            break;
        }
    }
    $result = mb_substr($str, 0, ++$i, 'utf-8');
    if(strlen($str) != strlen($result)){
        $result .= '...';
    }
    return $result;
}













?>