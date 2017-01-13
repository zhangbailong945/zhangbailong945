<?php
header('Content-Type: text/xml');

define("TOKEN", "weixin");
class WeiXin extends CI_Controller{
	  
	function __construct(){
		parent::__construct();
		$this->load->library('wxapi');
		$this->load->database();
                  $this->wxapi->valid();
		
	}


	
	function index()
	{
/*
		 $curl=curl_init(); 
		 curl_setopt($curl,CURLOPT_POST,'http://www.zhangbailong.com/index.php/weixin/weixin/index');
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
		 $data =(array)curl_exec($curl); 
		 curl_close($curl);
		 var_dump($data);

		 $this->load->view('weixin/test.php');
*/
              $postStr=file_get_contents('php://input');
              $data=array();
	     if (!empty($postStr)){
                libxml_disable_entity_loader(true);
                $postObj =simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $data['FromUserName'] = $postObj->FromUserName;
                $data['ToUserName'] = $postObj->ToUserName;
                $data['Content']= trim($postObj->Content);
                $data['CreateTime']= time();
                 if(!empty($postObj->Content))
                {
                    $this->load-view('weixin/valid_view',$data);

                }else{
                     $data['FromUserName']='zhangbailong945';
                     $data['ToUserName'] ='ssss';
                     $data['Content']= 'sssss';
                     $data['CreateTime']= time();

                     $this->load-view('weixin/valid_view',$data);
               	echo "111";
                }

        }else {
        	echo "222";
        	exit;
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
    	/*
    	$ch = curl_init(); 
		$timeout = 5; curl_setopt ($ch, CURLOPT_URL,$api_address);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
		$file_contents = curl_exec($ch);
		curl_close($ch); 
		*/
        $array=json_decode(file_get_contents($api_address),true);   
    	return $array['text'];	

    }		
		
}


?>