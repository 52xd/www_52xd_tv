<?php
//跨域
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta charset="UTF-8">
<title>小刀影院 - 超仿bilibili播放器</title>
<link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/css/aiblog.css">
<style> 
.aiblog-full-icon span svg,.aiblog-fulloff-icon span svg{display: none;}
.aiblog-full-icon span,.aiblog-fulloff-icon span{background-size:contain!important;float: left;width: 22px;height: 22px;}
.aiblog-full-icon span{background: url(https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/img/full.png) center no-repeat;}
.aiblog-fulloff-icon span{background: url(https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/img/fulloff.webp) center no-repeat;}
#loading-box {background: #<?php echo($_GET['color']);?>!important;}
#vod-title{overflow: unset;width: 285px;white-space: normal;color: #fb7299;}
#vod-title e{padding: 2px;}
.layui-layer-dialog{text-align: center;font-size: 16px;padding-bottom: 10px;}
.layui-layer-btn.layui-layer-btn-{padding: 15px 5px !important;text-align: center;}
.layui-layer-btn a{font-size: 12px;padding: 0 11px !important;}
.layui-layer-btn a:hover{border-color: #00a1d6 !important;background-color:#00a1d6 !important;color: #fff !important;}
.aiblog-controller .aiblog-icons .aiblog-toggle input+label.checked:after {left: 17px;}
.aiblog-setting-jlast:hover #jumptime,.aiblog-setting-jfrist:hover #fristtime{
    display: block;outline-style: none
}
#player_pause .tip{
    color: #f4f4f4;
    position: absolute;
    font-size: 14px;
    background-color: hsla(0, 0%, 0%, 0.42);
    padding: 2px 4px;
    margin: 4px;
    border-radius: 3px;
    right: 0;
}
#player_pause{
    position: absolute;
    z-index: 9999;
    top: 50%;
    left: 50%;
    border-radius: 5px;
    -webkit-transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    max-width: 80%;
    max-height: 80%;
}
#player_pause img{
    width: 100%;
    height: 100%;
}
#jumptime::-webkit-input-placeholder,#fristtime::-webkit-input-placeholder{color: #ddd;opacity: .5;border: 0;}
#jumptime::-moz-placeholder{color: #ddd;}
#jumptime:-ms-input-placeholder{color: #ddd;}
#jumptime, #fristtime {
    width: 50px;
    border: 0;
    background-color: #414141;
    font-size: 12px;
    padding: 3px 3px 3px 3px;
    margin: 2px;
    border-radius: 12px;
    color: #fff;
    position: absolute;
    left: 5px;
    top: 3px;
    display: none;
    text-align: center;
}
#link {
    display: inline-block;
    width: 100px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    font-size: 14px;
    border-radius: 22px;
    margin: 0px 10px;
    color: #fff;
    overflow: hidden;
    box-shadow: 0px 2px 3px rgba(0,0,0,.3);
    background: rgb(0, 161, 214);
    position: absolute;
    z-index: 9999;
    top: 20px;
    right: 35px;
}
#close c{
    float: left;
    display: none;
}
.dmlink,.playlink,.palycon{
    float: left;
    width: 400px;
}
#link3-error{
   display: none;
}

</style>

<?php
if(strpos($_GET['url'],'m3u8')){
echo'<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/hls.min.js"></script>';
} elseif(strpos($_GET['url'],'flv')){
echo'<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/flv.min.js"></script>';
}
?>

<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/aiblog.js"></script>
<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/setting-www.52xd.tv破解.js"></script>
<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/aiblog/js/layer.js"></script>

<script>
var css ='<style type="text/css">';
var d, s ;
d = new Date();
s = d.getHours();
if(s<17 || s>23){
css+='#loading-box{background: #fff;}';//白天
}else{
css+='#loading-box{background: #000;}';//晚上
}
css+='</style>';
$('head').append(css).addClass("");
</script>
</head>
<body>
<div id="player"></div>
<div id="ADplayer"></div>
<div id="ADtip"></div>
<script>
var up = {
    "usernum":"<?php include("tj.php"); ?>",//在线人数
	"mylink":"<?php echo($_GET['mylink']);?>",//修改域名
	}
var config = {
	"api":'<?php echo($_GET['api']);?>',//修改弹幕接口
	"av":'<?php echo($_GET['av']);?>',//B站弹幕id
	"url":"<?php echo($_GET['url']);?>",//视频链接
	"id":"<?php echo($_GET['name']);?>",//视频id
	"sid":"<?php echo($_GET['sid']);?>",//集数id
	"pic":"<?php echo($_GET['pic']);?>",//视频封面
	"title":"<?php echo($_GET['name']);?>",//视频标题
	"next":"<?php echo($_GET['next']);?>",//下一集链接
	"user": '<?php echo($_GET['user']);?>',//用户名
	"group": "<?php echo($_GET['group']);?>",//用户组
	}
aibk.start()
</script>
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
console.log("%c 小刀影院播放器 v2.0 官方正版！", "color: #fadfa3; background: #030307; padding:5px 0;");
console.log("%c 小刀影院播放器下载 %c https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/ ", "color: #fadfa3; background: #030307; padding:5px 0;", "background: #fadfa3; padding:5px 0;");
console.log('%c页面加载完毕消耗了' + Math.round(performance.now() * 100) / 100 + 'ms', 'background:#fff;color:#333;text-shadow:0 0 2px #eee,0 0 3px #eee,0 0 3px #eee,0 0 2px #eee,0 0 3px #eee;');
</script>
</body>
</html>