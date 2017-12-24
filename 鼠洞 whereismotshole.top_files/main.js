$(document).ready(function(){
  $("#qq,#qq").mouseover(function(){
    $("#qq,#qq").css("background-color","lightblue");
  });
  $("#qq,#qq").mouseout(function(){
    $("#qq,#qq").css("background-color","");
  });
});
// 联系鼠变色
$(document).ready(function(){
  $("#qq1").mouseover(function(){
    $("#qq1").css("background-color","lightblue");
  });
  $("#qq1").mouseout(function(){
    $("#qq1").css("background-color","");
  });
});
// 捐助鼠变色
$(document).ready(function(){
  $("#click1").click(function(){
    $("#saoma").toggle();
  });
});
// 联系鼠点击
$(document).ready(function(){
  $("#click2").click(function(){
    $("#saoma2").toggle();
  });
});
// 捐助鼠点击
window.onload=function(){
  if (window.Notification) {
      var button = document.getElementById('button'), text = document.getElementById('text');

      var popNotice = function() {
          if (Notification.permission == "granted") {
              var notification = new Notification("Hi，帅哥：", {
                  body: '可以加你为好友吗？',
                  icon: 'http://image.zhangxinxu.com/image/study/s/s128/mm1.jpg'
              });

              notification.onclick = function() {
                  text.innerHTML = '张小姐已于' + new Date().toTimeString().split(' ')[0] + '加你为好友！';
                  notification.close();
              };
          }
      };

      button.onclick = function() {
          if (Notification.permission == "granted") {
              popNotice();
          } else if (Notification.permission != "denied") {
              Notification.requestPermission(function (permission) {
                popNotice();
              });
          }
      };
  } else {
      // alert('浏览器不支持Notification');
  }
  // 浏览器弹出窗口

}
/**
------------------访问数量--------------------
 * vlstat 浏览器统计脚本
 */
var statIdName = "vlstatId";
var xmlHttp;
/**
 * 设置cookieId
 */
function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString()) + ";path=/;domain=cecb2b.com";
}
/**
 * 获取cookieId
 */
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}
/**
 * 获取当前时间戳
 */
function getTimestamp() {
    var timestamp = Date.parse(new Date());
    return timestamp;
}
/**
 * 生成statId
 */
function genStatId() {
    var cookieId = getTimestamp();
    cookieId = "vlstat" + "-" + cookieId + "-" + Math.round(Math.random() * 3000000000);
    return cookieId;
}
/**
 * 设置StatId
 */
function setStatId() {
    var cookieId = genStatId();
    setCookie(statIdName, cookieId, 365);
}
/**
 * 获取StatId
 */
function getStatId() {
    var statId = getCookie(statIdName);
    if (statId != null && statId.length > 0) {
        return statId;
    } else {
        setStatId();
        return getStatId();
    }
}
/**
 * 获取UA
 */
function getUA() {
    var ua = navigator.userAgent;
    if (ua.length > 250) {
        ua = ua.substring(0, 250);
    }
    return ua;
}
// --------------------
var caution = false
function setCookie(name, value, expires, path, domain, secure) {
var curCookie = name + "=" + escape(value) +
((expires) ? "; expires=" + expires.toGMTString() : "") +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
((secure) ? "; secure" : "")
if (!caution || (name + "=" + escape(value)).length <= 4000)
document.cookie = curCookie
else
if (confirm("Cookie exceeds 4KB and will be cut!"))
document.cookie = curCookie
}
function getCookie(name) {
var prefix = name + "="
var cookieStartIndex = document.cookie.indexOf(prefix)
if (cookieStartIndex == -1)
return null
var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
if (cookieEndIndex == -1)
cookieEndIndex = document.cookie.length
return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
}
function deleteCookie(name, path, domain) {
if (getCookie(name)) {
document.cookie = name + "=" +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
"; expires=Thu, 01-Jan-70 00:00:01 GMT"
}
}
function fixDate(date) {
var base = new Date(0)
var skew = base.getTime()
if (skew > 0)
date.setTime(date.getTime() - skew)
}
var now = new Date()
fixDate(now)
now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000)
var visits = getCookie("counter")
if (!visits)
visits = 1
else
visits = parseInt(visits) + 1
setCookie("counter", visits, now)
var people = 0;

function changeLink(){
	document.getElementById('myAnchor').innerHTML="您是第" + visits + "位鼠洞访客⊙▽⊙";
}
	 setTimeout("changeLink()",500);
// ---------------------
