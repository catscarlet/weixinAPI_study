<?php

/*
<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>1348831860</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<PicUrl><![CDATA[this is a url]]></PicUrl>
<MediaId><![CDATA[media_id]]></MediaId>
<MsgId>1234567890123456</MsgId>
</xml>
*/
$receiveHttpRawPostObj;
$imageName = $receiveHttpRawPostObj->FromUserName.$receiveHttpRawPostObj->CreateTime;
echo "success";
file_put_contents('tmp.txt',$imageName);
