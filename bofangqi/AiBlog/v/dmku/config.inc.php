<?php return [
    'adminpass'=> 'Sqh19980220',
	'tips' => [
	    'time' => '6',
        'color' => '#fb7299',
        'text' => '文明发弹幕否则会被拉黑不能观看了哦，最下面（弹）字那里可以关闭',
	],
    '防窥' => '0',
    
    '数据库' => [
        '类型' => 'mysql',
        '方式' => 'pdo',
        '地址' => 'localhost',
        '用户名' => '1',
        '密码' => '1',   
        '名称' => '1',
    ],
    
    'is_cdn' => 0,  //是否用了cdn
    '限制时间' => 60, //单位s
    '限制次数' => 20, //在限制时间内可以发送多少条弹幕
    '允许url' => [],  //跨域  格式['https://abc.com','http://cba.com']   要加协议
    '安装' => 0
];