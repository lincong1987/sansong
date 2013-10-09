<?php

/* !
 * Copyright (c) 2012 Lincong All rights reserved.
 * Mail lincong1987@gmail.com
 * QQ 159257119
 * This software is the confidential and proprietary information of Lincong.
 * You shall not disclose such Confidential
 * Information and shall use it only in accordance with the terms of the license
 * agreement you entered into with Lincong.
 */
/**
 * 错误报告配置，开发请使用E_ALL, 生产环境建议使用0
 */
//禁用错误报告
//error_reporting(0);
//报告运行时错误
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//报告所有错误
//error_reporting(0);
//启动会话
session_start();

//+8
date_default_timezone_set('Asia/Shanghai');

//设置PHP执行时间为30秒（单位秒）
//set_time_limit(30);
//系统版本,改动本配置将会清除js、css等资源缓存
$version = "1.0.0.1";

// 默认语言包，语言切换策略是
//
$defaultLanguage = "en-US";

// 开发者模式配置
$debug = true;

// 使用SEA数据库配置
$sinaAppEngine = false;

/**
 * 数据库相关配置
 * @author Lincong <lincong1987@gmail.com>
 * @date 2013-1-29 16:33:43
 */
$db_type = 'mysql'; //mysql表示Mysql库, 目前使用PDO
$db_host = '127.0.0.1:3306';
$db_user = 'root'; //数据库用户名
$db_pass = ''; //数据库密码
$db_name = 'sansong'; //数据库名
$db_charset = 'utf8'; //编码
$db_prefix = "ss_"; // 前缀

$error_trace = "/php/Action/flow/exceptionAction.php?ac=errorTrace&id=";

$uploadPath = "upload/";
$downloadPath = "download/";
///////////////////请不要改动以下代码/////////////////////////

if ($sinaAppEngine == true) {
    $db_host = SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT;
    $db_user = SAE_MYSQL_USER; //数据库用户名
    $db_pass = SAE_MYSQL_PASS; //数据库密码
    $db_name = SAE_MYSQL_DB; //数据库名
}

/**
  用户名　 :  SAE_MYSQL_USER
  密　　码 :  SAE_MYSQL_PASS
  主库域名 :  SAE_MYSQL_HOST_M
  从库域名 :  SAE_MYSQL_HOST_S
  端　　口 :  SAE_MYSQL_PORT
  数据库名 :  SAE_MYSQL_DB
 */
// SEO 相关
$web_description = "三颂广告,Mr.L design";
$web_keywords = "三颂广告,Mr.L design";

// 统计相关
// GA
$ga_account = "UA-38196639-1";

define('Q_GA_ACCOUNT', $ga_account);

define('Q_VERSION', $version);

define('Q_DEBUG', $debug);

define('Q_DB_TYPE', $db_type);
define('Q_DB_HOST', $db_host);
define('Q_DB_USER', $db_user);
define('Q_DB_PASS', $db_pass);
define('Q_DB_NAME', $db_name);
define('Q_DB_CHARSET', $db_charset);
define('Q_DB_PREFIX', $db_prefix);

define('Q_UPLOAD_PATH', $uploadPath);
define('Q_DOWNLOAD_PATH', $downloadPath);

define('Q_WEB_DESCRIPTION', $web_description);
define('Q_WEB_KEYWORDS', $web_keywords);


define('WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/');
//define('WEB_HOST', 'http://' . "www.foxhis.com" . '/');

define('Q_ERROR_TRACE', WEB_HOST . $error_trace);

define('APP_PATH', WEB_HOST . 'app');

define('Q_ROOT', $_SERVER["DOCUMENT_ROOT"]);
define('Q_Action', Q_ROOT . '/php/Action/');
define('Q_Impl', Q_ROOT . '/php/Impl/');
define('Q_View', Q_ROOT . '/php/View/');
define('Q_Smarty', Q_ROOT . '/include/Smarty/');
define('Q_BASE_CACHE', Q_ROOT . '/cache/');
define('Q_SMS_ROOT', Q_ROOT . '/sms/');
define('Q_SMS_CACHE', Q_SMS_ROOT . 'cache/');
define('Q_RE_ROOT', Q_ROOT . '/re/');
define('Q_FWD_ROOT', Q_ROOT . '/fwd/');
define('Q_BASE_SETTINGS', Q_BASE_CACHE . 'settings.php');

?>
