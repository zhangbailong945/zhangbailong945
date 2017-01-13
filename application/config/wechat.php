<?php
$config['wechat'] = array(

 'token'=>'zhangbailong', //填写你设定的key
 'appid'=>'wx69e6b1424f2f23d7', //填写高级调用功能的app id
 'appsecret'=>'3853cc93e42440c452a35c19c07b482c', //
 
 'partnerid'=>'88888888', //财付通商户身份标识
 'partnerkey'=>'', //财付通商户权限密钥Key
 'paysignkey'=>'', //商户签名密钥Key
 'debug'=>true
);

$config['wechat_menu'] = array(
 "button"=>array(
   array(
    "type"=>"pic_photo_or_album",
    "name"=>"我卖",
    "key"=>"upload_pics"
     ),
     array(
    "type"=>"view",
    "name"=>"逛逛",
    "url"=> site_url('product/discovery')
     ),
     array(
      "name"=>"我的",
      "sub_button"=>array(
     array(
        "type"=>"view",
        "name"=>"正在出售",
        "url"=>site_url('user/product/index')
     ),
     array(
        "type"=>"view",
        "name"=>"个人中心",
        "url"=>site_url('user/home/index')
     ),
     array(
        "type"=>"view",
        "name"=>"帮助",
        "url"=>site_url('home/weixin_help')
     )
    )
      )
  )
);