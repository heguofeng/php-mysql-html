//<?php
//include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件
//use EasyWeChat\Foundation\Application;
//$options = [
//  'debug'  => true,
//  'app_id' => 'wx63d8ca8951469f17',
//  'secret' => '35ca68e49cb0961f2bb0231a7806265c',
//  'token'  => 'easywechat',
//];
//$app = new Application($options);
//$menu = $app->menu;
//$buttons = [
//  [
//      "type" => "click",
//      "name" => "今日歌曲",
//      "key"  => "V1001_TODAY_MUSIC"
//  ],
//  [
//      "name"       => "菜单",
//      "sub_button" => [
//          [
//              "type" => "view",
//              "name" => "搜索",
//              "url"  => "http://www.soso.com/"
//          ],
//          [
//              "type" => "view",
//              "name" => "视频",
//              "url"  => "http://v.qq.com/"
//          ],
//          [
//              "type" => "click",
//              "name" => "赞一下我们",
//              "key" => "V1001_GOOD"
//          ],
//      ],
//  ],
//];
//$menu->add($buttons);