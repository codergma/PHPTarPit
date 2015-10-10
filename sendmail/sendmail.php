<!--
(1) php 内置mail()函数，但是要想使用这个函数需要安装邮件服务器sendmail.

安装sendmail及配置如下：
		sudo apt-get sendmail
		配置php.ini
		SMTP=localhost
		smtp_port=25
		sendmail_path=/usr/lib/sendmai -t -i

怎么是指发件人邮箱没搞明白，如果通过php发送邮件，默认发件人是www-data@163.com(为什么是163?)

发送邮件代码
		$to = 'codergma@gmail.com'
		$subject='this is subject';
		$msg = 'this is message';
		$result = mail($to, $subject, $msg);
		var_dump($result);

通过测试，发现这种方式发送邮件速度很慢，而且只有发送到gamail邮箱成功，但是
保存在垃圾邮件中，其他邮箱都失败，所以这种方式没有任何价值。

(2) 通过比较受欢迎的PHPMailer开源代码发送邮件,而且PHPMailer集成了sendmail，所以不需要自己安装了。

最小化安装：
	提取 class.phpmailer.php和class.smtp.php(如果你使用SMTP)
-->
<?php

require_once 'class.phpmailer.php';
require_once 'class.smtp.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // 0-4输出更详细的错误提示
$mail->isSMTP();                                       // 使用SMTP协议发送邮件
$mail->Host = 'smtp.163.com'; 		                   // 指定SMTP服务器地址
$mail->SMTPAuth = true;                                // Enable SMTP authentication
$mail->Username = 'xiatianliubin@163.com';             // SMTP username 确保此邮箱开通了SMTP服务,最好不要使用新申请的邮箱
$mail->Password = 'coder.gmail123';                    // SMTP password 可能是邮箱密码可能是客户端授权码,都试一下
$mail->SMTPSecure = 'ssl';                             // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                     // TCP port to connect to

$mail->setFrom('xiatianliubin@163.com', 'liubin');     // 发件人
$mail->addAddress('fortestaa@163.com', 'aa');          // 收件人
// $mail->addAddress('fortestac@163.com');             // 收件人姓名可选
$mail->addReplyTo('fortestab@163.com', 'ab');
$mail->addCC('fortestac@163.com');						//抄送人
$mail->addBCC('codergma@163.com');						//密送人

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
