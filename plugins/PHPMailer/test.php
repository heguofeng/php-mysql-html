<?php
require_once "all_function.php";
$rander=rand(100000,999999);
//echo $rander;
$flag = sendMail('383491501@qq.com','温医养老院-找回密码','已为您重置密码，新密码为'.$rander);
if($flag){
    echo "发送邮件成功！";
}else{
    echo "发送邮件失败！";
}
?>