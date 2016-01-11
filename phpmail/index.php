<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发送邮件</title>
</head>
<body>

<form action="sendmail.php" method="post">
	<p>发送人：<input type="text" name="toemail" /></p>
	<p>发送标题：<input type="text" name="title" /></p>
	<p>发送内容：<textarea name="content" cols="50" rows="5"></textarea></p>
	<p><input type="submit" value="确认"  /></p>
</form>
</body>
</html>
