<?php 
/**
 * 通过引用并调用 geetestlib 中的函数，进行服务器端验证，从而决定提交按钮后的行为
 * 本文件示例只是简单的输出 Yes or No
 */
require_once("../src/class.geetest.php");
$geetest = new Geetest();
$geetest->set_privatekey("b5264c506c2252e113e9a09a5e48485c");

if (isset($_POST['geetest_challenge']) && isset($_POST['geetest_validate']) && isset($_POST['geetest_seccode'])) {
	$result = $geetest->validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode']);
	if ($result == TRUE) {
		echo 'Yes!';
	} else if ($result == FALSE) {
		echo 'No';
	} else {
		echo 'FORBIDDEN';
	}

} else {
	echo "use your own captcha validate ";
	//网站原有验证码的验证
	//$result = your_own_captcha_validate()
}
?>