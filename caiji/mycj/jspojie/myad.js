var ads = {
	'advs': {
		'head': '萌芽采集插件',
		'tips': '由萌芽模板网收集整理提供，数据均来源于资源站，本插件不对资源站提供的数据负责！',
		'rows': [{
			'urls': 'https://yun.vrecf.com/user/reg.html',
			'tips': '<b style="color:#01AAED">『天翼网盘』解析 视频超清无水印解析</b>',
			'tip1': '<b style="color:red">【带后台】Dplayer播放器 可设置前置暂停广告</b>',
			'url1': 'http://www.vrecf.com/a/223.html',
			'tip2': '<b style="color:blue">【带后台】Ckplayer播放器可设置前置暂停广告</b>',
			'url2': 'http://www.vrecf.com/a/225.html',
			'tip3': '<b style="color:#FF5722;">【带后台】Videojs播放器可设置前置暂停广告</b>',
			'url3': 'http://www.vrecf.com/a/240.html',
			'tip4': '<b style="color:#5FB878">苹果cms建站推荐主机 低至8元/月 免备案</b>',
			'url4': 'https://url.cn/5Vu8NA2'
		}, {
			'urls': 'http://www.8090.la/8090/index.php',
			'tips': '<b style="color:red">免费的无广告客户端解析 自己做解析</b>',
			'tip1': '<b style="color:#01AAED">『和彩云』网盘解析 播放下载解析不限速</b>',
			'url1': 'https://yun.vrecf.com/user/reg.html',
			'tip2': '',
			'url2': '',
			'tip3': '',
			'url3': '',
			'tip4': '',
			'url4': ''
		}]
	}	
}
var help = {
	'v10':[{
		'title':'<b><font color="red">[置顶]</font>V10采集插件使用视频教程</b>',
		'url':'https://www.vrecf.com/a/174.html',
	},{
		'title':'<b><font color="red">[置顶]</font>V10【定时配置】自动采集教程</b>',
		'url':'https://www.vrecf.com/a/128.html',		
	},{
		'title':'<b><font color="red">[置顶]</font>XML格式不正确 不支持采集是什么问题？</b>',
		'url':'https://www.vrecf.com/a/248.html',		
	},{
		'title':'<b><font color="red">[置顶]</font>服务器网络不稳定或者禁用了采集 怎么办？</b>',
		'url':'https://www.vrecf.com/a/248.html',		
	},{
		'title':'<b style="color:#FF5722">v10采集定时自动采集不生效检查教程</b>',
		'url':'https://www.vrecf.com/a/233.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【播放配置】教程</b>',
		'url':'https://www.vrecf.com/a/156.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【批量设置播放器】教程</b>',
		'url':'https://www.vrecf.com/a/245.html',		
	},{
		'title':'<b style="color:#FF5722">v10移动手机端播放器广告去除教程</b>',
		'url':'https://www.vrecf.com/a/234.html',		
	},{
		'title':'<b style="color:#FF5722">V10检查播放器是否已经更换教程</b>',
		'url':'https://www.vrecf.com/a/179.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【幻灯图】添加设置教程</b>',
		'url':'https://www.vrecf.com/a/159.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【一键搜索】全网资源教程</b>',
		'url':'https://www.vrecf.com/a/158.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【断点采集】数据教程</b>',
		'url':'https://www.vrecf.com/a/246.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【加入收藏】设置教程</b>',
		'url':'https://www.vrecf.com/a/247.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【多线程采集】设置教程</b>',
		'url':'https://www.vrecf.com/a/239.html',		
	},{
		'title':'<b style="color:#FF5722">V10采集【数据过滤】设置教程</b>',
		'url':'https://www.vrecf.com/a/249.html',		
	},{
		'title':'V10采集视频后无法播放？',
		'url':'https://www.vrecf.com/a/161.html',		
	},{
		'title':'V10采集之绑定分类、取消绑定教程',
		'url':'https://www.vrecf.com/a/157.html',		
	},{
		'title':'V10采集无法绑定分类的处理办法',
		'url':'https://www.vrecf.com/a/126.html',		
	},{
		'title':'采集后前台页面没有播放数据和列表？',
		'url':'https://www.vrecf.com/a/127.html',		
	},{
		'title':'采集的数据图片不显示怎么检测？',
		'url':'https://www.vrecf.com/a/160.html',		
	},{
		'title':'采集添加多个播放器设置教程',
		'url':'https://www.vrecf.com/a/242.html',		
	},{
		'title':'采集时如何合并重名数据教程',
		'url':'https://www.vrecf.com/a/242.html',		
	},{
		'title':'v10明星资源分类设置教程',
		'url':'https://www.vrecf.com/a/238.html',		
	},{
		'title':'v10采集之下载数据采集设置教程',
		'url':'https://www.vrecf.com/a/232.html',		
	},{
		'title':'',
		'url':'',		
	}]
}

layui.use('layer', function(){
    var layer = layui.layer;
	if(comm.cookie.get('tongzhi')!=1){
        /*var tongzhi = layer.confirm('<p>1、腾讯云618云聚惠年中大促活动又来了，<b style="color:red;">云服务器最低1核2G首年95元</b>，对于想搭建网站或者挂一些软件的小伙伴来说可以考虑入手一台！<a href="http://t.cn/A62f8ubz" target="_blank" class="layui-btn layui-btn-xs layui-btn-normal">查看腾讯云618活动</a></p><p>2、阿里云618活动低至0.9折，<b style="color:red;">云服务器最低1核2G首年91.8元</b>买了做挂机宝或者入门搭建网站练手都不错！<a href="https://www.aliyun.com/activity/618/index?userCode=97jncowc" target="_blank" class="layui-btn layui-btn-xs layui-btn-normal">查看阿里云618活动</a></p>', {
          title:'活动通知', 
		  offset: 'auto',
        }, function(index, layero){
          var btn = layero.find('.layui-layer-btn');
          btn.find('.layui-layer-btn0').attr({
            href: 'http://t.cn/A62f8ubz'
            ,target: '_blank'
          });
          layero.find('a').on('click', function(){
            layer.close(index);
          }); 
		  layer.close(tongzhi); 
           comm.cookie.set('tongzhi',1,1);	  
        }, function(index){
           layer.close(tongzhi); 
		   comm.cookie.set('tongzhi',1,1);
        });	*/
        var tongzhi = layer.confirm('<div style="padding:10px 10px; text-align:justify; line-height: 22px; text-indent:2em;border-bottom:1px solid #e2e2e2;"><p>1、腾讯云618云聚惠年中大促活动又来了，<b style="color:red;">云服务器最低1核2G首年95元</b>，对于想搭建网站或者挂一些软件的小伙伴来说可以考虑入手一台！<a href="http://t.cn/A62f8ubz" target="_blank" class="layui-btn layui-btn-xs layui-btn-normal" style="text-indent: 0;">查看腾讯云618活动</a></p><p>2、阿里云618活动低至0.9折，<b style="color:red;">云服务器最低1核2G首年91.8元</b>，买了做挂机宝或者入门搭建网站练手都不错！<a href="https://www.aliyun.com/activity/618/index?userCode=97jncowc" target="_blank" class="layui-btn layui-btn-xs layui-btn-normal" style="text-indent: 0;">查看阿里云618活动</a></p></div>', {
          title:'活动通知', 
		  btn:['关闭'],
		  offset: 'auto',
        }, function(index, layero){
		    layer.close(tongzhi);
            comm.cookie.set('tongzhi',1,1);
        });			
	}	
});