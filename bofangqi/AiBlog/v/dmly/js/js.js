/*!
 * jquery.scrollLoading.js
 * by zhangxinxu http://www.zhangxinxu.com/wordpress/?p=1259
 * 轻度魔改不适合他人，需要代码请进↑链接处获取纯净源码
*/
(function(a){a.fn.scrollLoading=function(b){var c={attr:"data-url",type:"data-type",container:a(window),callback:a.noop};var d=a.extend({},c,b||{});d.cache=[];a(this).each(function(){var h=this.nodeName.toLowerCase(),g=a(this).attr(d.attr);t=a(this).attr(d.type);var i={obj:a(this),tag:h,type:t,url:g};d.cache.push(i)});var f=function(g){if(a.isFunction(d.callback)){d.callback.call(g.get(0))}};var e=function(){var g=d.container.height();if(d.container.get(0)===window){contop=a(window).scrollTop()}else{contop=d.container.offset().top}a.each(d.cache,function(m,n){var p=n.obj,j=n.tag,k=n.url,t=n.type,l,h;if(p){l=p.offset().top-contop,h=l+p.height();if((l>=0&&l<g)||(h>0&&h<=g)){if(k){if(j==="img"){if(t=="qqtx"){$.get(k,function(result){var k=jQuery.parseJSON(result).url;f(p.attr("src",k))})}else{var oI = new Image();oI.src = k;oI.onload = function() {f(p.attr("src",oI.src));};}}else{p.load(k,{},function(){f(p)})}}else{f(p)}n.obj=null}}})};e();d.container.bind("scroll",e)}})(jQuery);

jQuery(document).ready(function($) {
if(!$("#nojia").length > 0){
    //点击下一页的链接(即那个a标签)
    $('.next span').click(function() {
        $this = $(this);
        $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
        var href =  $('li.next a').attr('href');
        if (href != undefined) { //如果地址存在
            $.ajax({ //发起ajax请求
                url: href,
                //请求的地址就是下一页的链接
                type: 'get',
                //请求类型是get
                error: function(request) {
                    //如果发生错误怎么处理
                },
                success: function(data) { //请求成功
                    $this.removeClass('loading').text('点击加载更多'); //移除loading属性
                    var $res = $(data).find('.hang'); //从数据中挑出文章数据，请根据实际情况更改
                    $('#comments > .comment-list').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
$(".b-lazy").scrollLoading({callback: function() {$(this).removeAttr("data-type");$(this).removeAttr("data-url");$(this).addClass("ojbk");}});//重载头像懒加载
                    var newhref = $(data).find('li.next a').attr('href');
                    if (newhref != undefined) {
 $('li.next a').attr('href', newhref);
                    } else {
                        $('.next').remove(); //如果没有下一页了，隐藏
                    }
                }
            });
        }
        return false;
    });
}
});


$("#flsou").bind("change",function(){
var bq=$(this).find("option:selected").val();
        $("#scbar_mod").val(bq);

    });

if(fancybox==1){
$(".post img,.page img").each(function() {
  var element = document.createElement("a");
  $(element).attr("data-fancybox", "gallery");
  $(element).attr("href", $(this).attr("src"));
$(element).attr("data-caption", $(this).attr("alt"));
  $(this).wrap(element);
});
}





$(function () {
/*图片滚动加载*/
$(".b-lazy").scrollLoading({callback: function() {$(this).removeAttr("data-type");$(this).removeAttr("data-url");$(this).addClass("ojbk");}
});


/*评论表情配置*/
if($(".OwO").length > 0) {
var OwO_demo = new OwO({
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '/usr/themes/Violet/assets/OwO.json',
            position: 'down',
            width: '66vw',
            maxHeight: '250px'
});
}
  
/*ajax评论*/
//监听评论表单提交
$('#comment-form').submit(function(){
        var form = $(this), params = form.serialize();
        // 添加functions.php中定义的判断参数
        params += '&themeAction=comment';
        
        // 解析新评论并附加到评论列表
        var appendComment = function(comment){
            // 评论列表
            var el = $('#comments > .comment-list');
            var pl = " comment-parent";
            if(0 != comment.parent){var pl = "";
                // 子评论则重新定位评论列表
                var el = $('#li-comment-'+comment.parent);
                // 父评论不存在子评论时
                if(el.find('.comment-children').length < 1){
                    $('<div class="comment-children"><ol class="comment-list"></ol></div>').appendTo(el);
                }else if(el.find('.comment-children > .comment-list').length <1){
                    $('<ol class="comment-list"></ol>').appendTo(el.find('.comment-children'));
                }
                el = $('#li-comment-'+comment.parent).find('.comment-children').find('.comment-list');
            }
            if(0 == el.length){
                $('<ol class="comment-list"></ol>').appendTo($('#comments'));
                el = $('#comments > .comment-list');
            }
                        // 评论html模板，根据具体主题定制
            var html = '<div id="li-comment-{coid}" class="comment-body'+pl+' comment-ajax"><div class="media mt-2"><img class="mr-3 avatar-sm rounded-circle b-lazy ojbk" src="{avatar}" alt="Generic placeholder image"><div class="media-body"><div id="comment-2"><h5 class="mt-0"><a href="{permalink}" target="_blank" rel="external nofollow">{author}</a>  {status}</h5>{content}<p class="text-muted mb-0"><span class="mr-1">{sf}</span><span class="mr-1">{os}</span><span class="mr-1"><i class="mdi mdi-timer"></i> 刚刚</span></p></div></div></div></div>';
            $.each(comment,function(k,v){
                regExp = new RegExp('{'+k+'}', 'g');
                html = html.replace(regExp, v);
            });
if($(".reply2view").length > 0) {
            $.ajax({ 
                url: url,
                type: 'get',
                error: function(request) {$.NotificationApp.send("警告!","回复可见内容需要刷新页面后可见！","top-center","rgba(0,0,0,0.2)","warning");},
                success: function(data) {
                    if($(data).find('.reply2view-ok').length>0){
                    var $res = $(data).find('.reply2view-ok'); 
                    $('.reply2view').after($res.fadeIn(500));
                    $(".reply2view").remove();$.NotificationApp.send("提示!","回复可见内容已成功为您显示！","top-center","rgba(0,0,0,0.2)","success");
                   }}
            });
}
            $(html).prependTo(el);
        };
        // ajax提交评论
        $.ajax({
            url: url,
            type: 'POST',
            data: params,
            dataType: 'json',
            beforeSend: function() { form.find('#misubmit').addClass('loading').html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>提交中...').attr('disabled','disabled');},
            complete: function() { form.find('#misubmit').removeClass('loading').html('提交').removeAttr('disabled');},
            success: function(result){
                if(1 == result.status){
                    // 新评论附加到评论列表
                    appendComment(result.comment);
                    form.find('textarea').val('');
TypechoComment.cancelReply();
                }else{
                    // 提醒错误消息
                    var tishi=undefined === result.msg ? '评论出错!' : result.msg;
$.NotificationApp.send("警告!",tishi,"top-center","rgba(0,0,0,0.2)","warning");
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
if(xhr.responseJSON.status==0){
$.NotificationApp.send("警告!",xhr.responseJSON.msg,"top-center","rgba(0,0,0,0.2)","warning");
}else{
$.NotificationApp.send("提示!","评论提交失败请重试","top-center","rgba(0,0,0,0.2)","error");}
            }
        });
return false;
});

});