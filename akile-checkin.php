<?php
$email = 'someone@163.com'; // 登录邮箱
$password = 'your_password'; // 登录密码
require_once './vendor/autoload.php';
use Curl\Curl;
date_default_timezone_set('Asia/Shanghai');
function println($content) {
  $time = date('Y-m-d H:i:s');
  echo "[{$time}]{$content}".PHP_EOL;
}
function error($content) {
  println($content);
  die();
}
println('尝试登录...');
$login = new Curl();
$post_data = array(
  'email' => $email,
  'password' => $password,
  'token' => '',
  'verifyCode' => '',
  'remember' => true
);
$login->setHeader('Accept', 'application/json, text/plain, */*');
$login->setHeader('Content-Type', 'application/json');
$login->setUserAgent('Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36');
$login->post('https://api.akile.io/api/v1/user/login', json_encode($post_data));
$login->close();
if ($login->error) {
  error('请求失败：'.$login->errorMessage);
}
if($login->response->status_code == 1) {
  error('邮箱地址或密码错误，登录失败');
}
println('登录成功，正在签到...');
$checkin = new Curl();
$checkin->setHeader('Accept', 'application/json, text/plain, */*');
$checkin->setHeader('Authorization', $login->response->data->token);
$checkin->setUserAgent('Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36');
$checkin->get('https://api.akile.io/api/v1/user/Checkin');
$checkin->close();
if ($checkin->error) {
  error('请求失败：'.$checkin->errorMessage);
}
if(!isset($checkin->response->data)) {
  error('签到失败：'.$checkin->response->status_msg);
}
println('签到成功，当前 AK 币数量：'.$checkin->response->data);
?>