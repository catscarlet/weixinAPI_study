<?php

if (isset($_GET['echostr'])) {
    include 'wx_sample.20140819.php';
} else {
    include 'passiveReplyObj.php';
}

$receiveHttpRawPostData = $GLOBALS['HTTP_RAW_POST_DATA'];

if (empty($receiveHttpRawPostData)) {
    die('No HTTP_RAW_POST_DATA RECEIVED !');
}

libxml_disable_entity_loader(true);
$receiveHttpRawPostObj = simplexml_load_string($receiveHttpRawPostData, 'SimpleXMLElement', LIBXML_NOCDATA);
$msgtype = $receiveHttpRawPostObj->MsgType;

switch ($msgtype) {
case 'text':
replyText($receiveHttpRawPostObj);
break;

default:
replyReject($receiveHttpRawPostObj);
break;
}

function replyReject($receiveHttpRawPostObj)
{
    $reply = new textMessage();

    $reply->ToUserName = $receiveHttpRawPostObj->FromUserName;
    $reply->FromUserName = $receiveHttpRawPostObj->ToUserName;
    $reply->CreateTime = time();
    $reply->Content = 'Unsupport message type .';
    $reply->sprintfXML();
    exit();
}

function replyText($receiveHttpRawPostObj)
{
    $reply = new textMessage();

    $reply->ToUserName = $receiveHttpRawPostObj->FromUserName;
    $reply->FromUserName = $receiveHttpRawPostObj->ToUserName;
    $reply->CreateTime = time();
    $reply->Content = 'Welcome to wechat world!';
    $reply->sprintfXML();
    exit();
}

function saveImage($receiveHttpRawPostObj)
{

}
