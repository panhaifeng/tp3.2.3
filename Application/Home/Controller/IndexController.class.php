<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

	        $signature = $_GET["signature"];//从用户端获取签名赋予变量signature
			$timestamp = $_GET["timestamp"];//从用户端获取时间戳赋予变量timestamp
			$nonce = $_GET["nonce"];    //从用户端获取随机数赋予变量nonce

			$token ='YoonPer';//将常量token赋予变量token
			$tmpArr = array($token, $timestamp, $nonce);//简历数组变量tmpArr
			sort($tmpArr, SORT_STRING);//新建排序
			$tmpStr = implode( $tmpArr );//字典排序
			$tmpStr = sha1( $tmpStr );//shal加密
			//tmpStr与signature值相同，返回真，否则返回假
			if( $tmpStr == $signature ){
			echo $_GET["echostr"];
			}else{
			return false;
			}
         /*$strP = file_get_contents("php://input");
         $postObj = simplexml_load_string($strP, 'SimpleXMLElement', LIBXML_NOCDATA);
         dump2file(1);*/
	}


}