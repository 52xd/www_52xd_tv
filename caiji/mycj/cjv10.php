<?php 
/**
 *  『小刀影院』多功能综合资源采集插件
 * 
 * 官方网站    www.52xd.tv
 * @version    v10.3.3
 * @time       2020.04.29
 * @说明	   请勿擅自修改文件内容，否则可能无法正常使用！
 */
header("Content-Type: text/html;charset=utf-8");
if(!@$_SERVER['HTTP_REFERER']||!$_COOKIE["admin_name"]) header('location:/');
$my = @require('../../application/extra/maccms.php');
$mac_ver = @require('../../application/extra/version.php'); 
$path = $my['site']['install_dir'];
$unionfile = '../../application/admin/view/collect/union.html';
$union = './config/union.html';
@copy($union,$unionfile);
if(empty($path) || !$mac_ver){
	echo show_tips('苹果cmsV10主程序文件缺失','请检测苹果cms主程序文件，或者重新安装主程序<br><a href="https://github.com/magicblack/maccms10" target="_blank">点此下载新版程序</a>');
	die;	
}
if (strpos($_SERVER['HTTP_REFERER'], 'load.html?flag=vod')) {
	echo show_tips('未检测到断点数据','程序中没有断点记录，无法执行断点采集！<br>如果你清理过程序缓存，也会将断点记录清除掉！<br>你可以点击采集全部，点击多线程采集，<br>指定从某一页开始采集');
	die;	
}
if (!is_writable('./')) {
  echo show_tips('/addons/mycj/ 没有写入权限','请开放mycj文件夹的读取写入权限');
  die;
} 
if(!is_writable('./cache')){
	echo show_tips('文件夹写入权限不足','请调整 mycj/cache/ 文件夹的写入权限');
	die;
}
if(!file_exists('create.php') || !file_exists('set_player.php') || !file_exists('close.php') || !file_exists('./cache/data.php') || !file_exists('./cache/faves.php') || !file_exists('./cache/user.txt')){
	require('install.php');
    die;
}

$mac_info = '../../application/admin/view/collect/info.html';
if(file_exists($mac_info) && $mac_ver["code"]>'2019.1000.1010'){
	$info_file = './config/info.html';
	$aa = file_get_contents($mac_info);
	$bb = file_get_contents($info_file);
	if($aa!==$bb){
		copy($info_file,$mac_info);
	}
}
$Collect2 = '../../application/admin/controller/Collect2.php';
if(!file_exists($Collect2)){
	$Collect_file = './config/Collect2.php';
	copy($Collect_file,$Collect2);
}
$faves = array();
if(file_exists('./cache/data.php')){
	include './cache/data.php';
}
if(PHP_VERSION< '5.5'){
	echo show_tips('PHP版本不符合插件运行要求，当前PHP版本'.PHP_VERSION.'','推荐使用php7.0以上环境！');
	die;
}
if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') || stristr($_SERVER['HTTP_USER_AGENT'], 'Trident')){
	echo show_tips('插件不支持在IE内核下使用','请调整浏览器内核，或者使用谷歌浏览器、360浏览器等极速模式');
	die;	
}
$userid = '';
if(file_exists('./cache/user.txt')){
	$userid = file_get_contents('./cache/user.txt'); 
}
$player_path = '../../static/js/player.js';
$playerjs = 0;
if(file_exists($player_path)){
	$player_html = file_get_contents($player_path); 
	if(strpos($player_html,'eval(function') !==false){
		$playerjs = 1;
	}
}
function show_tips($title,$content)
{
	global $path;
	$html = '<title>小刀资源采集插件 - 小刀影院</title>'; 
	$html .= '<link href="'.$path.'static/layui/css/layui.css" rel="stylesheet" type="text/css" />';
	$html .= '<link href="css/tips.css" rel="stylesheet" type="text/css" />';
	$html .= '<div class="wrapper">';
	$html .= '<div class="main">';
	$html .= '<div class="title">提示信息</div>';   
	$html .= '<div class="content">';
	$html .= '<h3><font color=red>'.$title.'</font></h3>';
	$html .= '<p>'.$content.'</p>';
	$html .= '</div>';
	$html .= '<div class="footer"><a target="_blank" href="https://www.52xd.tv/">小刀影院 www.52xd.tv</a>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	return $html;
}
$ver = 'v10.3.3';
$v = date('H').ceil((date('i')/ 10));
?>
<!DOCTYPE html>
<html>
<head>
<title>小刀资源采集 <?php echo $ver;?></title>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $path; ?>static/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $path; ?>static/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $path; ?>static/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<style>.footer{padding: 30px 0; line-height: 30px; text-align: center; color: #666; font-weight: 300;}
@media screen and (max-width:900px){.sjhide,#tips{display: none;}.layui-table td, .layui-table th{padding: 8px 10px;}}
.business-edition{padding:10px;}.price-compare-item{float:left;width:370px;border:#ECECFB 1px solid;background-color:#fcfcfc;}.price-header{background-color:#20a53a;height:70px;text-align:center;font-size:24px;color:#fff;line-height:70px;position:relative;}.title-wrap{text-align:center;padding:30px 0;margin:0 50px 20px;border-bottom:#ECECFB 1px solid;}.title-wrap .title-info{font-size:18px;font-family:"微软雅黑";}.title-desc{height:182px;margin:0 70px;font-size:13px;color:#646472;line-height:26px;}.price-wrap{margin:40px 60px 20px;height:36px;color:#FF6232;}.price-compare-item .btn-price{width:240px;height:44px;line-height:42px;text-align:center;background-color:#20a53a;font-size:16px;color:#fff;border-radius:3px;border:0 none;margin:0 60px 30px;}.price-wrap .month{float:left;}.price-wrap .price-unit{font-size:18px;}.price-wrap .price-value{font-size:26px;}.price-wrap .price-ext{font-size:16px;}.price-wrap .div-line{float:left;height:24px;width:1px;background-color:#eee;margin:7px 0 0 30px;}.price-wrap .year{float:right;}.myads{border:1px solid #e6e6e6;text-align:center;font-size: 15px;}	
</style>
<script type="text/javascript">var my = {'name':'<?php echo $_COOKIE["admin_name"];?>',mac_version:'v10',mac_ver:'<?php echo $mac_ver["code"];?>',userid:'<?php echo $userid;?>',playerjs:'<?php echo $playerjs;?>'}; var verv10 = '<?php echo $ver;?>';var collect = [];<?php if(file_exists($Collect2)){ ?>path = parent.ADMIN_PATH+'/admin/collect2/index';document.writeln('<script  src="'+path+'"><\/script>');<?php } ?></script>
</head>
<body>
<div class="layui-row">
<ul class="layui-nav layui-bg-green">
  <li class="layui-nav-item">
    <a href="javascript:;" id="step1">常见<b style="color:#e7f70e;">采集问题</b></a>
    <dl class="layui-nav-child cj-help"></dl>
  </li>
  <li class="layui-nav-item" id="step2">
    <a href="javascript:;">常见<b style="color:#e7f70e;">播放问题</b></a>
    <dl class="layui-nav-child play-help"></dl>
  </li>
  <li class="layui-nav-item addzyz">
    <a href="javascript:;" target="_blank"><i class="layui-icon">&#xe641;</i>资源站分享</a>
  </li>
  <li class="layui-nav-item" id="mycjv10">
	 <a href="javascript:;" class="update"><span id="is_vip">免费版</span> <span style="color: #e7f70e;font-weight: bold;"><?php echo $ver;?></span></a>
  </li>
  <li class="layui-nav-item" id="open_vip">
    <a href="javascript:;" style="color:#FFB800" class="update"></i>检测更新</a>
  </li>
  <li class="layui-nav-item" id="user_login">
    <a href="#" class="login"><i class="layui-icon">&#xe612;</i><span >已破解</span></a>
  </li>
</ul>
</div>
<form class="layui-form">
    <div class="layui-tab">	
        <div class="layui-btn-group">
			<p class="layui-btn layui-bg-red duandian"><i class="layui-icon">&#xe631;</i>断点采集</p>
            <p class="layui-btn layui-btn-normal alljx"><i class="layui-icon">&#xe620;</i>批量设置播放器</p>	
			<a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=admin@52xd.tv" class="layui-btn layui-bg-red"><i class="layui-icon">&#xe63a;</i>反馈邮箱</a>
			<p class="layui-btn pic-slide"><i class="layui-icon">&#xe64a;</i>幻灯图片</p>
			<p class="layui-btn layui-btn-warm cj-iframe" data-path="parent" data-href="/admin/collect/info.html" data-title="添加资源站"><i class="layui-icon">&#xe608;</i>添加资源站(失效)</p>
        </div>
        <div class="layui-tab" id="removepc"></div>		
		<div class="layui-input-inline" style="width:130px">
			<select name="collect" lay-verify="required">
			    <?php if(count($faves)>0){echo '<option value="faves" selected>我的收藏专区</option>'.chr(10);}?>
				<option value="m3u8">切片资源专区</option>
				<option value="yun">云播资源专区</option>
				<option value="zonghe">综合资源专区</option>	
				<option value="offi">视频独立采集</option>				
				<option value="fuck">叉站资源专区</option>		
			</select>
		</div>	
		<div class="layui-input-inline searchwd" style="width:130px">
			<input type="text" required lay-verify="required" placeholder="请输入关键字" autocomplete="off" class="layui-input layui-input-search">
		</div>
		<div class="layui-input-inline">
			<button type="button" class="layui-btn searchs">立即搜索</button>
			<input type="text" required lay-verify="required" placeholder="搜索间隔" autocomplete="off" class="layui-input interval" value="3" style="width:38px;display:inline-block">
			<span>秒间隔</span>
		</div>		
	</div>
</form>
<div class="layui-tab layui-collect"><center>数据加载中，请稍后....<br>如果长时间加载不出来，请刷新重试<br>或者联系邮箱：admin@52xd.tv反馈</center></div>
<div class="layui-footer footer">
  <div class="layui-main">
    <p>免责申明：本插件收集整理的资源站均来源于网络，所提供的内容仅供观摩学习交流之用，</p>
	<p>本插件不存储视频链接、不提供视频数据，不对资源站提供的数据负责！</p>
	<p>采集添加任何数据均是用户个人行为！请在遵守法律的前提下使用插件，否则后果自负！</p>
	<p>如果侵犯了您的权益请联系邮箱：admin@52xd.tv，我们将在24小时内删除</p>
  </div>
</div>
<script type="text/javascript" charset="utf-8" src="./js/core.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/enc-base64.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/cipher-core.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/aes.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/md5.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/md5.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./jspojie/main.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" charset="utf-8" src="./js/myad.js?v=<?php echo $v; ?>"></script>
<?php if(count($faves)>0){echo '<script type="text/javascript" src="./cache/faves.php?v='.time().'"></script>'.chr(10);}?>
<script type="text/javascript" charset="utf-8" src="./js/data.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" charset="utf-8" src="./jspojie/mycj.min.js?v=<?php echo $ver; ?>"></script>
<script type="text/javascript" charset="utf-8" src="./js/update.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" charset="utf-8" src="./jspojie/mycjv10.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279013674'%3E%3C/span%3E%3Cscript src='https://s4.cnzz.com/z_stat.php%3Fid%3D1279013674%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>
<br />
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?aa94b05365e2686b0d54ffaa5919d68d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script>
console.log("%c 小刀影院资源采集插件 官方正版破解！", "color: #fadfa3; background: #030307; padding:5px 0;");
console.log("%c 小刀影院资源采集插件下载 %c https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/caiji/mycj/ ", "color: #fadfa3; background: #030307; padding:5px 0;", "background: #fadfa3; padding:5px 0;");
console.log('%c页面加载完毕消耗了' + Math.round(performance.now() * 100) / 100 + 'ms', 'background:#fff;color:#333;text-shadow:0 0 2px #eee,0 0 3px #eee,0 0 3px #eee,0 0 2px #eee,0 0 3px #eee;');
</script>
</body>
</html>