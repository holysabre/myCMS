<?php
header('content-type: text/html; charset=utf-8');

//设置图片保存绝对路径
$saveFilePath = $_SERVER['DOCUMENT_ROOT'] . '/userfiles/';

//设置显示的链接地址
//$displayUrl='http://'.$_SERVER['SERVER_NAME'].'/userfiles/';
$displayUrl = '/userfiles/';

$act = isset($_GET['act']) ? $_GET['act'] : '';
?>
<html>
<head>
<style>
<!--
* {font-size:9px;}
-->
</style>
<script language="javascript">
var dialog = window.parent;
function Ok() { return true; }  
</script> 
</head>

<body>
<?php 
if ($act=='')
{
?>
<span id="t"></span>
<script language="javascript">
<!--
document.getElementById("t").innerHTML="正在分析中...";
alert('[1] '+window.parent.EditorDocument.body.innerHTML);
function getfiles()
{
    var a = window.opener.FCK.EditorDocument.body.innerHTML;
    //var a = xEditor;
    var re = /http:\/\/(\w+\.)+(net|com|cn|org|cc|tv)(\S*\/)(\S)+\.(gif|jpg|png|bmp|jpeg)/gi;
    var url = a.match(re);
    if(url == null)
    {
        url="";
    }
    var ljflag = 0;
    var s = "";
    s = s+"<FORM METHOD=\"POST\" ACTION=\"?act=save\" name=\"allfiles\" id=\"allfiles\">";
    s = s+"<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">";
    s = s+"<tr height=\"20\"><td colspan=\"2\">请选择要保存的图片:<BR></td></tr>";
    for(var i = 0;i<url.length;i++)
    {
        for(var ljtemp = 0;ljtemp<i;ljtemp++)
        {
            if(url[i]==url[ljtemp])
            {
                ljflag = 1;
                break;
            }
            else
            {
                ljflag = 0;
            }
        }
        if(!ljflag)
        {
            s = s+"<tr bgcolor=\"#F1F1E3\" height=\"20\"><td><input type=\"checkbox\" "+
            "checked name=\"files[]\" value=\""+url[i]+"\"></td><td><a href=\""+url[i]+"\" "+
            "target=\"_blank\">"+url[i]+"</a></td></tr>";
        }
    }
    s = s+"<tr height=\"20\"><td colspan=\"2\"><BR><input type=\"submit\" style=\"color: #000000; "+
    "border: 1px solid #737357; background-color: #C7C78F\" name=\"button1\" value=\"保存到本地\">"+
    "<br/>保存文件可能需要较长时间，请单击保存后耐心等待......</td></tr>";
    s = s+"</table>";    
    s = s+"</FORM>";
    document.getElementById("t").innerHTML = s;
}
setTimeout("getfiles()",3000);
</script>
<?php
}
elseif ($act=='save')
{
    echo '<script language="javascript">';
    set_time_limit(0);
    $files = $_POST['files'];
    $fileNum = count($files);
    $realFileNum = 0;
    $imgArray = array('.gif','.jpg','.png','.jpeg','.bmp');

    $typeArray = array();
    ob_start();
    for($i=0;$i<$fileNum;$i++)
    {
        $type = strrchr(trim($files[$i]), ".");
        $type = strtolower($type);
        if($files[$i]!='' && in_array($type, $imgArray))
        {
            $suiji = rand(0,100000);
            $filename = date("Ymd") . $suiji . strrchr(trim($files[$i]), ".");
            $savetime = SaveHTTPFile(trim($files[$i]), $saveFilePath, $filename);
            echo "a = a.replace('".trim($files[$i])."', '".$displayUrl.$filename."');";
        }
    }
    ob_end_flush();
    echo "xEditor.SetHTML(a);</script><font clor=\"red\">文件已经保存成功<br/>
    点击“确认”完成图片上传。<br></font>";
}

function SaveHTTPFile($fFileHTTPPath,$fFileSavePath,$fFileSaveName)
{
    //记录程序开始的时间
    $BeginTime = getmicrotime();

    //取得文件名
    $fFileSaveName = $fFileSavePath . "/" . $fFileSaveName;

    //取得文件的内容
    ob_start();
    readfile($fFileHTTPPath);
    $img = ob_get_contents();
    ob_end_clean();
    //$size = strlen($img);

    //保存到本地
    $fp2 = @fopen($fFileSaveName, "a");
    fwrite($fp2, $img);
    fclose($fp2);

    //记录程序运行结束的时间
    $EndTime = getmicrotime();

    //返回运行时间
    return ($EndTime-$BeginTime);
}

function getmicrotime()
{
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}
?>
</body>
</html>