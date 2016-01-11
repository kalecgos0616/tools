<?php

    /**
     * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
     * 1. 用户名和密码是否正确；
     * 2. 检查邮箱设置是否启用了smtp服务；
     * 3. 是否是php环境的问题导致；
     * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
     * 5. 如果还是不能解决，可以访问：http://www.daixiaorui.com/read/16.html#viewpl 
     *    下面的评论中，可能有你要找的答案。
     */
    error_reporting(0);
    // test_account@sina.com
    // test_account1@sina.com
    // test_account2@sina.com 
    $arr = array(1=>"test_account@sina.com",2=>"test_account1@sina.com",3=>"test_account2@sina.com",4=>"test_account3@sina.com");
    //$fromEmail = $arr[rand(1,3)];
    // echo $fromEmail;die;

    require_once "email.class.php";
    //******************** 配置信息 ********************************
    //$smtpserver = "smtp.126.com";//SMTP服务器
    $smtpserver = "smtp.sina.com";//SMTP服务器
    $smtpserverport =25;//SMTP服务器端口
    //$smtpusermail = "test_account@126.com";//SMTP服务器的用户邮箱
    $smtpusermail = $fromEmail;//SMTP服务器的用户邮箱
    $smtpemailto = $argv[1];//发送给谁
    //$smtpuser = "test_account@126.com";//SMTP服务器的用户帐号
    $smtpuser = $fromEmail;//SMTP服务器的用户帐号
    $smtppass = "email_password";//SMTP服务器的用户密码
    $mailtitle = "邮件主题";//邮件主题
    $captcha = rand(0,9999);
    $mailcontent = "您的提现验证码为：【".str_pad($captcha, 4, '0', STR_PAD_LEFT)."]";//邮件内容
    $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    //************************ 配置信息 ****************************
    //
    for($i=0;$i<1;$i++){
        $fromEmail = $arr[rand(1,4)];
        $smtp = new smtp($smtpserver,$smtpserverport,true,$fromEmail,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp->debug = false;//是否显示发送的调试信息
        $state = $smtp->sendmail($smtpemailto, $fromEmail, $mailtitle, $mailcontent, $mailtype);
    }
    

    echo "<div style='width:300px; margin:36px auto;'>";
    if($state==""){
        echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
        echo "<a href='index.php'>点此返回</a>";
        exit();
    }
    echo "恭喜！邮件发送成功！！";
    echo "<a href='index.php'>点此返回</a>";
    echo "</div>";

?>