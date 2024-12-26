# akile-checkin-php
一个使用 PHP 编写的 AkileCloud 签到程序
## 环境要求
- 服务器或者虚拟主机
- PHP 版本 7.0 及以上
- 安装了 PHP cURL 拓展
## 如何安装
1、下载这个仓库；  
2、如果你安装了 composer ，请在仓库所在文件夹运行 `composer install` ，如果没有，请[安装 composer](https://www.runoob.com/w3cnote/composer-install-and-usage.html) 或者去 [Releases 页面](https://github.com/yucho123987/akile-checkin-php/releases)下载完整版并解压；  
3、使用任意文本编辑器打开 `akile-checkin.php` ，将 `someone@163.com` 修改为你的邮箱地址，`your_password` 改成你的密码；  
4、如果你将这个仓库下载到了你的服务器上，运行 `php akile-checkin.php` ；如果是虚拟主机，访问 `akile-checkin.php` 所在页面，检查是否正常运行。
## 如何配置自动签到
如果你使用服务器，可使用计划任务每天运行一次 `akile-checkin.php` 文件；  
如果你使用虚拟主机，可借助 https://cron-job.org/en/ 每天请求一次 `akile-checkin.php` 文件
## 免责声明
仅供学习交流，使用此程序造成的任何后果自负。