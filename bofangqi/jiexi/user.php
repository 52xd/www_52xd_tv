<?php 
//-----------------------请修改以下配置------------------------------------

//防盗链域名，多个用|隔开，（不设置盗链请留空，请填写授权是顶级域名的二级域名）
define('REFERER_URL', ''); //如：define('REFERER_URL', 'www.8090.la|jiexi.8090.la|8090.la');

//此处设置防盗信息及错误提示
define('ERROR', '<html><meta name="robots" content="noarchive"><head><title>小刀影院 - 全网官方资源播放器•VIP无广告</title></head><style>h1{color:#C7636C; text-align:center; font-family: Microsoft Jhenghei;}p{color:#f90; font-size: 1.2rem;text-align:center;font-family: Microsoft Jhenghei;}</style><body bgcolor="#000000"><table width="100%" height="100%" align="center"><td align="center"><h1>本站接口不对外开放</h1><p>如需使用，请联系本站管理员进行授权</p></table></body></html>');
//此处进行用户相关配置
$user = array(

		'uid' => '88883156', //这里填写你的UID信息,用户授权UID，在 http://user.seakee.cn 平台可以查看

		'token' => 'a9d8baaa467bcfefe63d5f0e4dbff526', //这里填写你的用户密匙信息,用户授权TOKEN，在 http://user.seakee.cn 平台可以查看

		'path' => '/addons/jiexi', //一般不用修改,除非你放置在其他目录，修改格式 '/jiexi' (修改二级目录一定看好格式)，如果放在根目录就请留空，格式：'path' => '' 

		'domain' => 'www.52xd.tv', //请设置您的解析域名（放解析客户端的域名），防止客户端被二开盗用数据（注意：此处不要添加 http:// 或 https://）
		
		'tiaodomain' => 'https://www.52xd.tv', //请设置客户端被二开盗用后跳转的域名地址，被盗用后直接跳转到您设置的地址。
		
		'hdd' => '3', //视频默认清晰度，1标清，2高清，3超清，如果没有高清会自动下降一级（请保持默认，无需修改）
  
  		'p2p' => '1', //P2P加速,默认关闭,1:开启,0:关闭（为了不影响观看，开启也不会显示任何信息，不影响加速效果）

		'autoplay' => '0', //电脑端autoplay是否自动播放：参数设置为：1,表示自动播放;参数设置为：0,表示不自动播放

		'h5' => '0', //手机端h5是否自动播放：参数设置为：1,表示自动播放;参数设置为：0,表示不自动播放

		'online' => '1', //当前无法解析的地址是否启动备用解析接口  默认开启,1:开启,0:关闭  开启时要在下面填入备用解析接口
  
		'ather' => 'https://www.8090g.cn/jiexi/?url=', //已为大家设置好备用接口,无特殊要求可以不用更改,备用接口有小gg,如果不需要删除即可.//填写实例：'ather' => 'https://www.8090g.cn/?url=',

		'dplayer' => '小刀影院,https://www.52xd.tv', //用户设置dplayer播放器右键,不设置请留空。填写实例:'dplayer' => '8090解析,https://www.8090.la'
		
		'title' => '小刀影院 - 全网官方资源播放器•VIP无广告', //设置解析页面title名称   例如：'title' => '8090视频解析',

		'tongji' => '', //用户统计代码.  例如:s6.cnzz.com/z_stat.php?id=xxxxx&web_id=xxxxx,百度统计与之类似.不会添加的话就直接把统计代码加到index.php底部!

		'ad' => '', //用户设置广告代码,例如:xxx.com/xxx.js,无需添加http,多个广告请用逗号分开!不会设置的也可以直接把广告代码加到index.php底部!
		
		'lotime' => '', //防盗验证时间,lotime参数单位：秒,数值为大于0的整数.设置多少秒后跳转设置:lolink参数（设置顶部防盗链域名后生效，如果其他人盗用，会在指定时间跳转）  填写实例:'lotime' => '100',

		'lolink' => '', //用户设置防盗跳转,设置防盗验证时间lotime参数后才生效（设置顶部防盗链域名后生效，如果其他人盗用，会在指定时间跳转）  //填写实例:'lolink' => 'https://www.8090.la', 		

		'cklogo' => 'https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/jiexi/logo2.png', //ckplayer播放器右上角logo标志,请填写完整绝对地址.例如:https://www.8090.la/logo.png ,不用请留空
        
        'ckfont' => '', //ckplayer播放器设置控制栏上方漂浮字体，不需要请留空
        
        'ckhref' => '', //ckplayer播放器设置控制栏上方漂浮字体的点击跳转地址,需设置ckfont参数后才生效，不需要请留空

		'skin' => '4', //ckplayer播放器样式共4种,修改参数后更换播放器样式. 参数说明：1,2,3,4

		'hand' => '小刀影院,https://www.52xd.tv', //ckplayer播放器右键,例如:'hand'=>'8090解析,https://www.8090.la'

) 			
//-----------------------修改区域结束---------------------------------------
?>