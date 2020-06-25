<?php include ('login.php')?>
<?php include('data.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>小刀影院 - 超仿bilibili播放器后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/admin/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
<script type="text/javascript" src="https://www.layuicdn.com/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/admin/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/gh/52xd/www_52xd_tv/bofangqi/AiBlog/v/admin/js/config-www.52xd.tv破解.js" type="text/javascript" charset="utf-8"></script>

<style>
.layui-elem-field{
    border-color: #00bcd4;
}
.width{    width: 120px!important;
    text-align: center;}
.long{    width: 300px!important;
    text-align: center;}
	.smt {
    width: 75px!important;
    text-align: center;
}
	.sm {
    width: 50px!important;
    text-align: center;
}
.layui-textarea{
    min-height:60px;
    height: 38px;
}
#configSave{
    margin-bottom: 0;
    background-color: #00BCD4;
    color: #ffffff;
    height: 39px;
    border-radius: 2px 2px 0 0;
    width: 80px;
    border-width: 1px;
    border-style: solid;
    border-color: #00BCD4;
}
.layui-form-pane .layui-form-label {
    padding: 8px 5px;
}
</style>
</head>

<body>
<form class="layui-form layui-form-pane"  name="configform" id="configform" >
	<div class="layui-tab" overflow>
		<ul class="layui-tab-title">
				<li class="layui-this">基本设置</li>
				<li class="">广告设置</li>
				<li class="">弹幕管理</li>
				<li class="">后台管理</li>
		</ul>
 		<div class="layui-tab-content">
				<div class="layui-tab-item layui-show" name="基本设置">
						<div class="layui-form-item">
 						   <label class="layui-form-label">弹幕开关</label>
  						  <div class="layui-input-block">
  						    <input type="checkbox"  name="yzm[danmuon]" lay-skin="switch" lay-filter="switchTest"  lay-text="ON|OFF" <?php $t=$yzm['danmuon'];  if ($t=="on") { echo "checked";} ?>><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
  						  </div>
 						</div>
 						
 						<div class="layui-form-item">
 						   <label class="layui-form-label">自动下一集</label>
  						  <div class="layui-input-block">
  						    <input type="checkbox"  name="yzm[next]" lay-skin="switch" lay-filter="switchTest"  lay-text="ON|OFF" <?php $t=$yzm['next'];  if ($t=="on") { echo "checked";} ?>>
  						    
  						    <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i>
  						    
  						    </div>
  						  </div><div class="layui-form-mid layui-word-aux">自动下一集只支持 苹果CMS10 </div>
  						  
 						</div>
 						
 						
						<div class="layui-form-item">
						<label class="layui-form-label">主题颜色</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[color]" value="<?php echo $yzm['color']?>" size="30" class="layui-input upload-input"placeholder="颜色代码">
						</div>
						<div class="layui-form-mid layui-word-aux">颜色代码 例如：#00a1d6</div>
						</div>
						<div class="layui-form-item">
						<label class="layui-form-label">LOGO</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[logo]" value="<?php echo $yzm['logo']?>" size="30" class="layui-input upload-input"placeholder="图片地址">
						</div>
						<div class="layui-form-mid layui-word-aux">图片地址 例如：/aiblog/logo.png</div>
						</div>
						<div class="layui-form-item">
						<label class="layui-form-label">试看时间</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[trytime]" value="<?php echo $yzm['trytime']?>" size="30" class="layui-input upload-input"placeholder="单位/分">
						</div>
						<div class="layui-form-mid layui-word-aux">试看时间只在固定会员组有效，设置会员组请进入广告选项进行设置</div>
						</div>
						<!--播放器右键-->
						<div class="layui-form-item">
						<label class="layui-form-label">播放器右键</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[yjbt]" value="<?php echo $yzm['yjbt']?>" size="30" class="layui-input upload-input"placeholder="右键标题 例如：小刀影院">
						</div>
						<div class="layui-input-inline">
							<input type="text" name="yzm[yjurl]" value="<?php echo $yzm['yjurl']?>" size="30" class="layui-input upload-input"placeholder="标题url 如:https://www.52xd.tv">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器右键设置</div>
						</div>
						<!--播放器右键-->
						<div class="layui-form-item">
						<label class="layui-form-label">加载页等待时间</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[waittime]" value="<?php echo $yzm['waittime']?>" size="30" class="layui-input upload-input"placeholder="单位/秒">
						</div>
						<div class="layui-form-mid layui-word-aux">loading页等待时间</div>
						</div>
						<div class="layui-form-item">
						<label class="layui-form-label">弹幕发送间隔</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[sendtime]" value="<?php echo $yzm['sendtime']?>" size="30" class="layui-input upload-input"placeholder="单位/秒">
						</div>
						<div class="layui-form-mid layui-word-aux">指的是发送时间只能在设置时间后才能重新发送新弹幕</div>
						</div>
						
						<div class="layui-form-item">
                        <label class="layui-form-label">B站弹幕ID</label>
                        <div class="layui-input-inline">
                            <input id="av" type="text" name="yzm[av]" value="<?php echo $yzm['av']?>"  class="layui-input upload-input"placeholder="请输入B站弹幕ID">
                        </div>
                        <div class="layui-form-mid layui-word-aux">B站弹幕ID 例如：45520296</div>
                    </div>
						
						<div class="layui-form-item">
						<label class="layui-form-label">播放器域名</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[mylink]" value="<?php echo $yzm['mylink']?>" size="30" class="layui-input upload-input"placeholder="播放器路径">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器域名路径 例如：//www.52xd.tv/v/</div>
						</div>
						
						<div class="layui-form-item">
                        <label class="layui-form-label">弹幕接口地址</label>
                        <div class="layui-input-inline">
                            <input id="api" type="text" name="yzm[api]" value="<?php echo $yzm['api']?>"  class="layui-input upload-input"placeholder="请输入弹幕接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">播放器弹幕接口地址 例如：//www.52xd.tv/v/dmku/</div>
                    </div>
						
						<div class="layui-form-item">
						<label class="layui-form-label">弹幕礼仪链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[dmrule]" value="<?php echo $yzm['dmrule']?>" size="30" class="layui-input upload-input"placeholder="链接地址">
						</div>
						<div class="layui-form-mid layui-word-aux">弹幕框右边按钮链接 例如：//www.52xd.tv/v/dmly/</div>
						</div>
						<div class="layui-form-item">
						<label class="layui-form-label">弹幕关键字禁用</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[pbgjz]" value="<?php echo $yzm['pbgjz']?>" size="30" class="layui-input upload-input"placeholder="输入关键字以","隔开">
						</div>
						<div class="layui-form-mid layui-word-aux">输入关键字以","隔开</div>
						</div>
                		<div class="layui-form-item center">
						<div class="layui-input-block">
						<input name="edit" type="hidden" value="1" />
                        <button class="layui-btn" type="button" onclick="text()">保 存</button>
                        <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
					</div>
					</div>
					</div>
				<div class="layui-tab-item" name="广告设置">
						<div class="layui-form-item">
 						   <label class="layui-form-label">广告开关</label>
  						  <div class="layui-input-block">
  						    <input type="checkbox"  name="yzm[ads][state]" lay-skin="switch" lay-filter="switchTest"  lay-text="ON|OFF" <?php $t=$yzm['ads']['state'];  if ($t=="on") { echo "checked";} ?>><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
  						  </div>
 						 </div>
 						<div class="layui-form-item">
							<label class="layui-form-label">广告类型</label>
						<div class="layui-input-inline">
							<input type="radio" name="yzm[ads][set][state]" value="1" title="视频"<?php $t=$yzm['ads']['set']['state'];  if ($t=="1") { echo "checked";} ?>>
							<input type="radio" name="yzm[ads][set][state]" value="2" title="图片"<?php $t=$yzm['ads']['set']['state'];  if ($t=="2") { echo "checked";} ?>>
						</div>
						</div>				
					
						<div class="layui-form-item">
						<label class="layui-form-label">广告范围</label>
						<div class="layui-input-inline">
							<select name="yzm[ads][set][group]" lay-verify="required">
								<option value="null" <?php $t=$yzm['ads']['set']['group'];  if ($t=="null") { echo "selected";} ?>>无限制</option>
								<option value="2" <?php $t=$yzm['ads']['set']['group'];  if ($t=="2") { echo "selected";} ?>>游客</option>
								<option value="3" <?php $t=$yzm['ads']['set']['group'];  if ($t=="3") { echo "selected";} ?>>注册会员</option>
								<option value="4" <?php $t=$yzm['ads']['set']['group'];  if ($t=="4") { echo "selected";} ?>>充值会员</option>
							</select>
						</div>
						<div class="layui-form-mid layui-word-aux">当前会员及下级会员有效</div>
						</div>


					
					<div class="layui-form-item">
						<label class="layui-form-label">图片广告时间</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[ads][set][pic][time]" value="<?php echo $yzm['ads']['set']['pic']['time']?>" size="30" class="layui-input upload-input"placeholder="单位/秒">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">图片广告内容</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][set][pic][img]" value="<?php echo $yzm['ads']['set']['pic']['img']?>" size="30" class="layui-input upload-input"placeholder="图片地址">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">图片广告链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][set][pic][link]" value="<?php echo $yzm['ads']['set']['pic']['link']?>" size="30" class="layui-input upload-input"placeholder="点击链接地址">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">视频广告内容</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][set][vod][url]" value="<?php echo $yzm['ads']['set']['vod']['url']?>" size="30" class="layui-input upload-input"placeholder="视频地址">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">视频广告链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][set][vod][link]" value="<?php echo $yzm['ads']['set']['vod']['link']?>" size="30" class="layui-input upload-input"placeholder="点击链接地址">
						</div>
					</div>
						<div class="layui-form-item">
 						   <label class="layui-form-label">暂停广告开关</label>
  						  <div class="layui-input-block">
  						    <input type="checkbox"  name="yzm[ads][pause][state]" lay-skin="switch" lay-filter="switchTest"  lay-text="ON|OFF" <?php $t=$yzm['ads']['pause']['state'];  if ($t=="on") { echo "checked";} ?>><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
  						  </div>
 						 </div>
					<div class="layui-form-item">
						<label class="layui-form-label">暂停图片</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][pause][pic]" value="<?php echo $yzm['ads']['pause']['pic']?>" size="30" class="layui-input upload-input"placeholder="图片地址">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">暂停图片链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][pause][link]" value="<?php echo $yzm['ads']['pause']['link']?>" size="30" class="layui-input upload-input"placeholder="点击链接地址">
						</div>
					</div>
					<div class="layui-form-item center">
					<div class="layui-input-block">
                        <input name="edit" type="hidden" value="1" />
                        <button class="layui-btn" type="button" onclick="text()">保 存</button>
                        <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
                    </div>
                    </div>
				</div>
				<div class="layui-tab-item" name="弹幕设置">
					<div class="layui-tab" overflow>
						<ul class="layui-tab-title">
							<li class="layui-this">弹幕列表</li>
							<li class="">举报列表</li>
						</ul>
					<div class="layui-tab-content">
						<div class="layui-tab-item layui-show" name="弹幕列表">
							<div class="chu" style="margin-top:30px">
								<div class="demoTable layui-form-item">
									<div class="layui-inline">
									<label class="layui-form-label">搜索</label>
									<div class="layui-input-inline">
										<input class="layui-input"  id="textdemo" placeholder="请输入弹幕id或弹幕关键字">
									</div>
									<button class="layui-btn" lay-submit="search_submits" type="button" lay-filter="reloadlst_submit">搜索</button>
									</div>
								</div>
							</div>
								<table class="layui-hide" id="dmlist" lay-filter="dmlist">
								</table>
						</div>

					<div class="layui-tab-item" name="举报列表">
								<table class="layui-hide" id="dmreport" lay-filter="report">
								</table>
					</div>

					</div>
					</div>
				</div>
				<div class="layui-tab-item" name="后台管理">
				<div class="layui-form-item">
                        <label class="layui-form-label">修改密码</label>
                        <div class="layui-input-inline">
                            <input type="password"  name="yzm[adminpass]" value="<?php echo $yzm['adminpass']?>"  class="layui-input upload-input"placeholder="请输入新后台密码">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请输入新后台密码</div>
                       </div>
 							
					
						


					
					
					
					<!--保存-->
					<div class="layui-form-item center">
					<div class="layui-input-block">
                        <input name="edit" type="hidden" value="1" />
                        <button class="layui-btn" type="button" onclick="text()">保 存</button>
                        <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
                    </div>
                    </div>
				</div>
				
				</div>
		</div>
	</div>
</form>
<script type="text/html" id="listbar">
<a class="layui-btn layui-btn-xs" lay-event="dmedit" >编辑</a>
 <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" >删除</a>
</script>
<script type="text/html" id="reportbar">
<a class="layui-btn layui-btn-xs" lay-event="edit" >误报</a>
<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" >删除</a>
</script>

<script type="text/template" id="bondTemplateList">
    <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" lay-filter="component-form-group" id="submits" onsubmit="return false">
            <div class="layui-row layui-col-space10 layui-form-item">
                <input type="hidden" name="cid" value="{{ d[4] }}">
                <div class="layui-col-lg5">
                    <label class="layui-form-label">弹幕ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" placeholder="请输入名称" autocomplete="off"
                               lay-verify="required" class="layui-input"
                               value="{{ d[0]?d[0]:'' }}" {{# if(d[0]){ }}disabled{{# } }}>
                    </div>
                </div>
                <div class="layui-col-lg5">
                    <label class="layui-form-label">颜色：</label>
  						<div class="layui-input-block">
							<div class="layui-input-inline" style="width: 120px;">
								<input type="text" name="color" placeholder="请选择颜色" class="layui-input" id="test-form-input" value="{{ d[3]?d[3]:'' }}">
							</div>
						<div class="layui-inline" style="left: -11px;">
						<div id="test-form"></div>
					</div>
				</div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">弹幕内容</label>
                    <div class="layui-input-block">
                    <textarea name="text" placeholder="请输入内容" class="layui-textarea"
                              lay-verify="required">
                        {{ d[5] ? d[5]:'' }}
                    </textarea>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="bond_sumbit">立即提交</button>
                </div>
            </div>
        </form>
    </div>
</script>
	 <script type="text/javascript">
</script>


</body>
</html>
