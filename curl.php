
<style>
    #page-top{ height: 100px; background: #f00;}
    #page-center{ height: 200px; background: #0f0;}
    #page-footer{ height: 100px; background: #000;}

    .page-width{ width: 1000px; margin: auto; background: #aaa;}

    .logo{ height: 81px; width: 100px; background: #0b92e4; float: left;}
    .meau{ height: 81px; width: 500px; background: #f6f; float: right;}
        .meau ul{}
            .meau ul li{ float: left;  background: #000000; color: #fff; margin-right: 10px;}
                .meau ul li a{ line-height: 47px; display: block; padding: 0 10px; position: relative;}
                    .meau ul li a i{
                        position: absolute; top:-10px; right: -10px;
                        display: block; width: 20px; height: 20px; background: #f01f5a; border-radius: 100%;
                    }

</style>
<div id="page-top">
    <div class="page-width" style=" height: 81px; padding:10px 0;">
        <div class="logo"></div>
        <div class="meau">
            <ul><li><a>首页</a></li><li><a>产品<i></i></a></li><li><a>关于我们</a></li></ul>
        </div>
    </div>
</div>
<div id="page-center">

    <div class="page-width"></div>
</div>
<div id="page-footer">

    <div class="page-width"></div>
</div>

<script>

//    var a= '.swiper-container';
//    var b = {grabCursor : true}
//
//    var mySwiper = new Swiper(a,b);

    var c = {
        d:function () {
            alert();
        }
    }

    c.d();




    </script>



<?php

return;



function mysteel()
{

}
$error = array(
    1 => '错误的协议', 2 => '初始化代码失败', 3 => 'URL格式不正确', 4 => '请求协议错误', 5 => '无法解析代理', 6 => '无法解析主机地址', 7 => '主机或代理失败', 8 => '远程服务器不可用', 9 => '访问资源错误',
    11 => 'FTP密码错误', 13 => '结果错误', 14 => 'FTP回应PASV命令', 15 => '内部故障', 17 => '设置传输模式为二进制', 18 => '文件传输短或大于预期', 19 => 'RETR命令传输完成',
    21 => '命令成功完成', 22 => '返回正常', 23 => '数据写入失败', 25 => '无法启动上传', 26 => '回调错误', 27 => '内存分配请求失败', 28 => '访问超时',
    30 => 'FTP端口错误', 31 => 'FTP错误', 33 => '不支持请求', 34 => '内部发生错误', 35 => 'SSL/TLS握手失败', 36 => '下载无法恢复', 37 => '文件权限错误', 38 => 'LDAP可没有约束力', 39 => 'LDAP搜索失败',
    41 => '函数没有找到', 42 => '中止的回调', 43 => '内部错误', 45 => '接口错误', 47 => '过多的重定向', 48 => '无法识别选项', 49 => 'TELNET格式错误',
    51 => '远程服务器的SSL证书', 52 => '服务器无返回内容', 53 => '加密引擎未找到', 54 => '设定默认SSL加密失败', 55 => '无法发送网络数据', 56 => '衰竭接收网络数据', 57 => ' 	 ', 58 => '本地客户端证书', 59 => '无法使用密码',
    60 => '凭证无法验证', 61 => '无法识别的传输编码', 62 => '无效的LDAP URL', 63 => '文件超过最大大小', 64 => 'FTP失败', 65 => '倒带操作失败', 66 => 'SSL引擎失败', 67 => '服务器拒绝登录', 68 => '未找到文件', 69 => '无权限',
    70 => '超出服务器磁盘空间', 71 => '非法TFTP操作', 72 => '未知TFTP传输的ID', 73 => '文件已经存在', 74 => '错误TFTP服务器', 75 => '字符转换失败', 76 => '必须记录回调', 77 => 'CA证书权限', 78 => 'URL中引用资源不存在', 79 => '错误发生在SSH会话',
    80 => '无法关闭SSL连接', 81 => '服务未准备', 82 => '无法载入CRL文件', 83 => '发行人检查失败',
);


//curl获取源代码

$mysteel = mysteel();

$string = '';
for ($i = 1; $i <= 10; $i++) {
    $url = 'http://list1.mysteel.com/market/p-245-----03-0--------' . $i . '.html';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch); // 已经获取到内容，没有输出到页面上。
    curl_close($ch);

    //转义字符串
    $output = mb_convert_encoding($output, "utf-8", "gb2312");

    //正则语句提取区域
    //<ul class="nlist"></ul>
    $pattern = "/<ul class=\"nlist\">([\s\S]*)<div class=\"page\">/";
    preg_match_all($pattern, $output, $matches);
    $string .= $matches[0][0];
}

//var_dump($string);return;

$list = $string;


//替换字符串让它更加规则
//$list = str_replace("<a href=","\n<a href=",$list);
//$list = str_replace("</a></li>","</a>\n</li>",$list);


//var_dump($list);//return;
//提取列表 获取网址以及标题
$pattern = "/<a href=\"([0-9][a-z][A-Z][/]*)\" title=\"/";
preg_match_all("'<\s*a\s.*?href\s*=\s*([\"\'])?(?(1)(.*?)\\1|([^\s\>]+))[^>]*>?(.*?)</a>'isx", $list, $matches_A);
preg_match_all("'>(\d{4}-\d{2}-\d{2}\s\d{2}:\d*?)</span>'isx", $list, $matches_B);
//var_dump($matches_A[4]);
//var_dump($matches_B[1]);
//return;
//preg_match_all($pattern, $list, $matches);

//var_dump($matches[2]);
//var_dump($matches[4]);

//存储成标准格式
$list = array();
foreach ($matches_A[2] as $key => $value) {
    $list[$key]['href'] = $value;
    $list[$key]['title'] = $matches_A[4][$key];
    $list[$key]['time'] = $matches_B[1][$key];
}

//var_dump($list);


foreach ($list as $value) {
    echo '<a href="' . $value['href'] . '">' . $value['title'] . ' - ' . $value['time'] . '</a>' . '<br>';
}


return;


$pattern = "/<a href=\"http([\s\S]*)\" title=\"/";
preg_match($pattern, $list, $matches);

var_dump($matches);

echo '结束';

//echo $output;
return;