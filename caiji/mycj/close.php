<?php  
require ('main.class.php');
$userid = @$_GET["id"];
if($userid){
	$user = mac_write_file('./cache/user.txt',$userid);
	if($user===false){
		$tips = '/addons/mycj/cache/user.txt 的写入权限不足，请开放写入权限，否则无法使用VIP版功能';
		echo '<script type="text/javascript">parent.layer.alert("'.$tips.'");</script> ';
		exit;
	}
}
?>
<html>  
 <head>  
  <meta http-equiv="content-type" content="text/html; charset=utf-8">  
  <title> exec main function </title>  
 </head>  
 <body>  
    <script type="text/javascript">
    var userid = '<?php echo $userid;?>';
	var code = '<?php echo @$_GET["code"];?>';
	if(userid!='' && code==402){
	    parent.layer.msg('验证成功，欢迎使用VIP版采集插件！',{icon:5,time:1000},function(){
		    var index = parent.layer.getFrameIndex(window.name);
		    parent.location.reload();
		    parent.layer.close(index);
	    });			
	}else if(code==401){
	    parent.layer.alert('您的QQ还未在萌芽模板网注册，请先注册或者更换其他已注册的QQ登陆',{icon:5},function(){
			parent.layer.close(index);
		});		
	}else if(code==200){
	    parent.layer.alert('账号登陆成功，但是没有购买记录，请核对是否用的这个QQ号登陆购买的！',{icon:6},function(){
			parent.layer.close(index);
		});		
	}else if(code==403){
	    parent.layer.alert('当前账号状态异常，已被系统封禁！',{icon:5},function(){
			parent.layer.close(index);
		});		
	}else{
		alert('验证错误！参数不合法！');
	}
    </script> 
 </body>  
</html>  
