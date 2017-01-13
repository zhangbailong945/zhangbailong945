<?php


class WeChat extends CI_Controller{

	const TOKEN = 'weixin';

	/** @var appID*/
	const APPID = 'wxbdb139da7f100808';

	/** @var appsecret*/
	const APPSECRET = 'e0afb069f16049de393f8792621a206e';

	/*access_token*/
	const ACCESS_TOKEN='bOInpetaIzunDn5CefXiCkCu74MRc4c2894XU2Nu7a-cC23CJly48RQsxmK6KI34SkvPw67gv1PijJBBNa53pyrOWez2PW70mFbRwBtftS2d89-zJH8Ise9os57aRdgaJRTeADAQYA';


	function __construct()
	{
		parent::__construct();


	}

    
	public function index()
	{
                   /* */
		//WeChat::_checkSigna();
		//$this->createMenu($data);
                   //$this->getAccessToken();
		$this->msg();

	}

	/**
	 *获取微信的ACCESSS_TOKEN
         * 微信ACCESS_TOKEN 两小时过期
         * 
	 */
	function getAccessToken()
	{
		$url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.WeChat::APPID.'&secret='.WeChat::APPSECRET.'';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$jsoninfo = json_decode($output, true);
		$access_token = $jsoninfo["access_token"];
		return $access_token;

	}
        
        /**
         * 设置
         */
        function setAccessToken()
        {
            
        }

	/**
	 *
	 *创建微信菜单 一级菜单不超过3个，二级菜单不超过5个
	 * @param $data
	 */
	function createMenu()
	{
/*设置微信菜单*/
		$data='{
     "button":[
     {	
           "name":"泥鳅博客",
           "sub_button":[
           {	
               "type":"view",
               "name":"首页",
               "url":"http://www.zhangbailong.com"
            },
            {
               "type":"view",
               "name":"笔记分类",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/category"
            },
            {
               "type":"view",
               "name":"时光轴",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/date"
            },
            {
               "type":"view",
               "name":"笔记归档",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/archives"
            },
            {
               "type":"view",
               "name":"时光轴",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/about"
            }]
      },
      {
           "name":"其他",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/search/"
            },
            {
               "type":"view",
               "name":"标签云",
               "url":"http://www.zhangbailong.com/LoachBlog/LoachBlog/tags"
            }]
       }]
 }';
		$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".WeChat::ACCESS_TOKEN;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
	}

	/**
	 * 获取微信菜单
	 */
	function getMenu()
	{
		return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);
	}


	/**
	 * 微信自动回复消息
	 * Enter description here ...
	 */
	public function msg(){
		$postStr=file_get_contents('php://input');
		if (!empty($postStr)){
			libxml_disable_entity_loader(true);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$fromUsername = $postObj->FromUserName;
			$toUsername = $postObj->ToUserName;
			$keyword = trim($postObj->Content);
			$type=$postObj->MsgType;
			$time = time();
			$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
			if(!empty( $keyword )&&$type=='text')
			{
				$msgType = "text";
				$contentStr =$this->tulingRebot($keyword, $fromUsername);
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
				echo $resultStr;
			}
			else if($type=='event')
			{
				//$userinfo=$this->Subscribe($postObj);//用户订阅公众号
				$msgType = "text";
				$access_token=$this->getAccessToken();
				$userinfo=$this->getInfo($access_token,$fromUsername);
				$contentStr =',欢迎关注laochblog'.$userinfo["nickname"].'的微信公众号！';
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
				echo $resultStr;
				
			}
			else{
				echo "Input something...";
			}

		}else {
			echo "";
			exit;
		}


	}
	
	
	/**
	 * 用户订阅公账号
	 * Enter description here ...
	 */
	function Subcribe($postObj)
	{
	    $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".WeChat::ACCESS_TOKEN;  
	    $result = https_request($url);  
	    $jsoninfo = json_decode($result);  // 默认false，为Object，若是True，为Array  
	    $userinfo=array();
	    $data = $jsoninfo -> data;      
	    $arr = $data -> openid;      // 获得所有用户的Openid  
	    
	    $temp = 0;  
	    while ($temp < count($arr)) {  
	        $openid = $arr[$temp];   
	        $userinfo=getInfo(WeChat::ACCESS_TOKEN,$openid);  
	        $temp++;  
	    }  
	    
	    return $userinfo;
	}
	
	 // 根据Openid获取单个用户信息，如nickname  
    function getInfo($access_token,$openid){  
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";        
        $userinfo = https_request($url);  
        return $userinfo;           
    }     
	

	/**
	 * 验证签名
	 */
	private function _checkSigna() {
		$echostr = $this->input->get('echostr');
		if(!empty($echostr)){
			$bol = $this->checkSignature();
			if($bol) echo $echostr;
			exit;
		}
	}

	/**
	 * @var 该方法为验证服务器地址的有效性只在最开始调用一次就没用了
	 */
	public function checkSignature() {
		$signature = $this->input->get("signature");
		$timestamp = $this->input->get("timestamp");
		$nonce = $this->input->get("nonce");

		$token = self::TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}


	/**
	 * 调用图灵机器人API
	 */
	public function tulingRebot($keyword,$fromUsername)
	{
		$keyword=urldecode($keyword); //用户输入的关键字
		$api_key="19931fc5a7715eaa43aa6d3f7f53cf8b"; //我的图灵机器人API key
		$api_address="http://www.tuling123.com/openapi/api?key=MIYAO&info=KEYWORD&userid=USERID"; //图灵机器人API地址
		$api_address=str_replace('MIYAO',$api_key,$api_address);
		$api_address=str_replace('KEYWORD',$keyword,$api_address);
		$api_address=str_replace('USERID',$fromUsername,$api_address);

		$array=json_decode(file_get_contents($api_address),true);
		return $array['text'];

	}
	
	/**
	 * 请求微信
	 * @param $url
	 */
	function https_request($url)  
    {         
       $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);  
		$data = json_decode($output, true);      
        return $data;  
    }  

}


?>