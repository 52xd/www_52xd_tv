<?php
error_reporting(0);
require ('main.class.php');
header('Content-type:text/json'); 
if(empty($_COOKIE['admin_name']) || $_COOKIE['admin_name']!==$_GET['name']){header("location:/");exit();}
$id = $_GET['id'];
if($id=='sea'){ 
    $name = $_POST['name'];
    $apis = $_POST['apis'];
	echo SearchKeyword($apis,$name);
}else if($id=='tim'){ 
    $name = $_POST['name'];
    $flag = $_POST['flag'];
    $param = $_POST['param'];
    $tim_path = '../../application/extra/timming.php';
	$tim = require ($tim_path);
    if(!is_array($tim) || !$tim){
	    $timming = './config/timming.php';
	    copy($timming,$tim_path);
    }
	echo timming($name,$flag,$param);
}else if($id=='play'){
	$arr = $_POST['play'];
	echo AddPlayer($arr);
}else if($id=='down'){
    $down_path = '../../application/extra/voddowner.php';
	$down = require ($down_path);
    if(!is_array($down) || !$down){
	    $voddowner = './config/voddowner.php';
	    copy($voddowner,$down_path);
    }
	$flag = $_POST['flag'];
	echo AddDowner($flag);
}else if($id=='all_player'){
	$type = $_POST['type'];
	$ids = $_POST['ids'];
	echo AllPlayer($ids,$type);
}else if($id=='login'){
	$username = trim($_GET['username']);
	$user = mac_write_file('./cache/user.txt',$username);
	if($user===false){
		$info['code'] = 0;
		$info['msg'] = '/addons/mycj/cache/user.txt 的写入权限不足，请开放写入权限，否则无法记录登陆信息！';
	}else{
		$info['code'] = 1;
		$info['msg'] = '保存成功';
	}
	echo json_encode($info,true);die;
}else if($id=='all_jiekou'){
	$value = $_POST['value'];
	$ids = $_POST['ids'];
	$col = $_POST['col'];
	echo AllJiekou($ids,$value,$col);
}else if($id=='playerjs'){
    $player_path = '../../static/js/player.js';
	$playerjs = './config/player.js';
    if(copy($playerjs,$player_path)){
		exit(json_encode(array('code' => 200,'msg'=>'修复成功','icon'=>6),true));
	}else{
		exit(json_encode(array('code' => 200,'msg'=>'修复失败，写入权限不足！','icon'=>5),true));
	}
}else if($id=='faves'){
	$cj_data = './cache/data.php';
	include $cj_data;
	$apis = $_POST["apis"];
	foreach($faves as $key=>$value){
		if($value['apis']==$apis){
			exit(json_encode(array('code' => 201, 'msg' => "您已经收藏过这个采集API，请勿重复收藏！")));
		}
	}
    $faves[] = array(
        'flag' => $_POST["flag"],
        'name' =>  $_POST["name"],
        'rema' => $_POST["rema"],
        'apis' => $apis,
		'tips' => '<span class="layui-badge layui-bg-green">我的收藏</span>',
		'coll' => $_POST["coll"],
		'zylink' => $_POST["zylink"],
        'filter' => '0', 
		'filter_from' => '', 
		'opt' => '0',		
    );
	if (Main_db::save($cj_data)) {
		exit(json_encode(array('code' => 200, 'msg' => "收藏成功")));
	}else{
		exit(json_encode(array('code' => 202, 'msg' => "收藏失败!请检查/addons/mycj/cache/文件权限")));
	}
} else if($id=='del_faves'){
	include './cache/data.php';
	$id = $_POST["id"];
	unset($faves[$id]);
	$num = count($faves);
	if($num==0){
		$fav = array();
	}else{
	    foreach($faves as $v){
		   $fav[] = $v;
	    }
	    array_values($fav);		
	}
	$faves = $fav;
	if (Main_db::save('./cache/data.php')) {
		exit(json_encode(array('code' => 200, 'msg' => "取消收藏成功")));
	}else{
		exit(json_encode(array('code' => 202, 'msg' => "取消失败，读写权限不足！")));
	}
} else if($id=='filter'){
	include './cache/data.php';
	$id = $_POST['collect_id'];
	$faves[$id]['name'] = $_POST['collect_name'];
	$faves[$id]['opt'] = $_POST['collect_opt'];
	$faves[$id]['filter'] = $_POST['collect_filter'];
	$faves[$id]['filter_from'] = $_POST['collect_filter_from'];
	if (Main_db::save('./cache/data.php')) {
		exit(json_encode(array('code' => 200, 'msg' => "保存成功")));
	}else{
		exit(json_encode(array('code' => 202, 'msg' => "保存失败，读写权限不足！")));
	}	
}else {
	exit(json_encode(array('code' => 404,'msg'=>'参数错误'),true));
}


function AllJiekou($ids,$value,$col){
    $vodplayer = '../../application/extra/vodplayer.php';
	$list = require ($vodplayer);	
	if(strpos($ids,',') !== false){
	    $ids = explode(",",$ids);
	}else{
		$ids = array($ids);
	}
	$code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"".$value."'+MacPlayer.PlayUrl+'\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();";
	foreach($ids as $id){
		$list[$id]['ps'] = 1;
		$list[$id][$col] = $value;		
		$player = fwrite(fopen('../../static/player/' . $id.'.js','wb'),$code);
	}
	if(!file_exists('../../static/player/parse.js') || $list[$id]['ps'] == 1){
		$parse_code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"'+MacPlayer.Parse+MacPlayer.PlayUrl+'\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();"; 
		$parsejs = fwrite(fopen('../../static/player/parse.js','wb'),$parse_code);
	}	
	$res = mac_arr2file($vodplayer, $list);
    if($res===false){
        return json_encode(array('code' => 201,'msg'=>'修改失败，文件写入权限不足'),true);
    } else{
	    return json_encode(array('code' => 200,'msg'=>'修改成功！'),true);
    }	
}

function AllPlayer($ids,$type){
	if(strpos($ids,',') !== false){
	    $ids = explode(",",$ids);
	}	
	$code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"'+maccms.path+'/static/player/".$type.".html\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();";
	if(is_array($ids)){
	    foreach($ids as $id){
		    $player = fwrite(fopen('../../static/player/' . $id.'.js','wb'),$code);
	    }		
	}else{
		$player = fwrite(fopen('../../static/player/' . $ids.'.js','wb'),$code);
	}
    if($player===false){
        return json_encode(array('code' => 201,'msg'=>'安装失败，文件写入权限不足'),true);
    } else{
	    return json_encode(array('code' => 200,'msg'=>'安装成功！'),true);
    }	
}

function AddPlayer($arr){
    $vodplayer = '../../application/extra/vodplayer.php';
	$list = require ($vodplayer);
	$num = count($arr['from']);
	for($i=0; $i<$num; $i++){
		$ps = 1;
		$parse = $arr['apis'][$i];
		if(strpos($arr['apis'][$i],'/static/player/') !==false){
			$ps = 0;
			$parse = '';
			$code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"".$arr['apis'][$i]."\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();";
		}else{
			if($arr['apis'][$i]==''){ $ps = 0; $parse = ''; }
		    $code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"".$arr['apis'][$i]."'+MacPlayer.PlayUrl+'\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();";			
		}
		$play[] = array(
		  $arr['from'][$i] => array(
            'status' => '1',
            'from' => $arr['from'][$i],
            'show' => $arr['name'][$i],
            'des' => $arr['des'][$i],
			'target' => '_self',
            'ps' => $ps,
            'parse' => $parse,
            'sort' => $arr['sort'][$i],
            'tip' => $arr['tip'][$i],
            'id' => $arr['from'][$i],
			)	
		);
		$player = fwrite(fopen('../../static/player/' . $arr['from'][$i].'.js','wb'),$code);
	}
	if(!file_exists('../../static/player/parse.js') || $ps==1){
		$parse_code = "MacPlayer.Html='<iframe width=\"100%\" height=\"'+MacPlayer.Height+'\" src=\"'+MacPlayer.Parse+MacPlayer.PlayUrl+'\" frameborder=\"0\" allowfullscreen=\"true\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\"></iframe>';MacPlayer.Show();"; 
		$player = fwrite(fopen('../../static/player/parse.js','wb'),$parse_code);
	}
    foreach($play as $data){
        $list = array_merge($list,$data);
    }
    foreach ($list as $k=>&$v){
      $sorts[] = $v['sort'];
    }	  
	array_multisort($sorts, SORT_DESC, SORT_FLAG_CASE , $list); 
	$res = mac_arr2file($vodplayer, $list);
    if($res===false){
      return json_encode(array('code' => 201,'msg'=>'添加失败，文件写入权限不足'),true);
    } else{
	  return json_encode(array('code' => 200,'msg'=>'添加成功！'),true);
    }	
}

function AddDowner($flag)
{
	$desc = 'des提示信息';
	$tips = 'tip提示信息';
	$list = require ('../../application/extra/voddowner.php');
    if(strpos($flag,'|') !== false){
      $flag = explode("|",$flag);
      foreach($flag as $fl){
        $fla = explode(",",$fl);
        $flags[] = $fla;
      }
      foreach($flags as $from){
        $show = $from[0];
        $playfrom = $from[1];
        $sort = $from[2];
        $data[] = array (
               $playfrom => array (
                  'status' => '1',
                  'from' => $playfrom,
                  'show' => $show,
                  'des' => $desc,
                  'ps' => '0',
                  'parse' => '',
                  'sort' => $sort,
                  'tip' => $tips,
                  'id' => $playfrom,
                ),  
              );
      }
      foreach($data as $data){
        $list = array_merge($list,$data);
      }
    } else{
      $flag = explode(",",$flag);
      $data[] = array (
         $flag[1] => array (
            'status' => '1',
            'from' => $flag[1],
            'show' => $flag[0],
            'des' => $desc,
            'ps' => '0',
            'parse' => '',
            'sort' => $flag[2],
            'tip' => $tips,
            'id' => $flag[1],
          ),
        );
      $list = array_merge($list,$data[0]);
    }	
    foreach ($list as $k=>&$v){
      $sorts[] = $v['sort'];
    }
    array_multisort($sorts, SORT_DESC, SORT_FLAG_CASE , $list);
    $res = mac_arr2file( '../../application/extra/voddowner.php', $list);	
    if($res===false){
        return json_encode(array('code' => 201,'msg'=>'添加失败，文件写入权限不足'),true);
    } else{
	    return json_encode(array('code' => 200,'msg'=>'添加成功'),true);
    }
}

function timming($name,$flag,$param)
{
    $list = require ('../../application/extra/timming.php');
      $data[] = array (
         $flag => array (
            'id' => $flag,
            'status' => '1',
            'name' => $flag,
            'des' => $name,
            'file' => 'collect',
            'param' => $param,
            'weeks' => '1,2,3,4,5,6,0',
            'hours' => '00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23',
          ),
        );
    $list = array_merge($list,$data[0]);
	$res = mac_arr2file( '../../application/extra/timming.php', $list);
	if($res===false){
      return json_encode(array('code' => 201,'msg'=>'添加失败，定时任务配置写入权限不足'),true);
    } else{
	  return json_encode(array('code' => 200,'msg'=>'添加成功'),true);
    }
}	

function SearchKeyword($apis,$name) 
{
	$html = geturl($apis."?wd=".$name);
	if(empty($html)){ return json_encode(array(),true);exit();}
    $xml = simplexml_load_string($html, 'SimpleXMLElement', LIBXML_NOCDATA); 
    if(empty($xml)){  return json_encode(array(),true);exit(); }
    $xml = json_decode(json_encode($xml),true); 
    $recordcount = $xml['list']['@attributes']['recordcount']; 
	if($recordcount==0){ return json_encode(array(),true);exit(); }	
	if($recordcount ==1 ){
		$data =  array(
		  $xml['list']['video']
		); 
	}else{
		$data = $xml['list']['video'];
	}
	return json_encode($data,true);
}


?>
