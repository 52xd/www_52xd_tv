var update_url = 'http://caiji-api.oss-cn-shanghai.aliyuncs.com/V10/update.v10.3.3.zip';
var install_url = 'http://caiji-api.oss-cn-shanghai.aliyuncs.com/V10/mycj.v10.3.3.zip';
var complete_url = 'https://vrecf.lanzous.com/b02h1bich';
var update = {
		'vers': 'v10.3.3',
		'init': function() {
			if(verv10 == this.vers){
				layer.alert('当前已经是最新版了，无需更新！');				
			}else{
				var output = '<ul>';
					output += '<li class="layui-text">2020-04-29 更新日志</li>';
				    output += '<li class="layui-text">1、修复使用邮箱号登陆验证VIP失败的问题</li>';
					output += '<li class="layui-text">2、修复上个版本部分苹果cms用户出错的问题</li>';
				    output += '<li class="layui-text">3、解除收藏限制，VIP版可以无限制收藏插件内的资源站</li>';
				    output += '</ul>';						
				layer.confirm(output, {
						area: '300px',
						title: '最新版本：'+this.vers,
						btn: ['立即升级','取消']
					}, function() {
						var index = layer.msg('正在更新，请稍等片刻...',{icon: 16,time:false});
						$.ajax({
							url: 'update.php?name='+my.name, 
							type: 'POST',
							data: {downurl:update_url},
							dataType: 'json',
							success: function(res){
								if (res.code=='200') {
									layer.alert(res.msg, {title:'更新成功',icon: 6,closeBtn: 0},function(index) {
										location.reload();
									});
								}else{
								    layer.alert(res.msg, {title:'更新失败，请手动下载离线安装包覆盖更新！',icon: 5,closeBtn: 0},function(index) {
					                    top.location.href = update_url;
				                    });
								}
							},
							error: function(res){
								layer.alert(res.msg, {title:'更新失败，请手动下载离线安装包覆盖更新！',icon: 5,closeBtn: 0},function(index) {
					                top.location.href = update_url;
				                });
							}
					});						
				});	
			}	
		},
		'install':function() {
			var index = layer.msg('正在安装中，请稍后...',{icon: 16,time:10000});
			$.ajax({
				url: 'update.php?name='+my.name, 
				type: 'POST',
                timeout:10000,
				data: {downurl:install_url},
				dataType: 'json',
				success: function(res){
					if (res.code=='200') {
						layer.alert('安装成功！', {icon: 6,closeBtn: 0},function(index) {
							location.reload();
					    });
				    }else{
					    layer.alert('您的服务器不支持一键在线安装，请手动下载离线安装包覆盖安装！', {icon: 5,closeBtn: 0},function(index) {
					        window.open(complete_url);
				        });
				    }
			    },
                complete: function (XMLHttpRequest, textStatus) {
                    if(textStatus == 'timeout'){
                        layer.alert("在线安装失败，请重新下载离线安装包覆盖安装！", {icon: 5},function(index) {
                         window.open(complete_url);
                        });
                    }
                },
				error: function(res){
					layer.alert('网络故障，请手动下载离线安装包覆盖安装！', {icon: 5,closeBtn: 0},function(index) {
					    window.open(complete_url);
				    });
				}
			});			
		}
	}