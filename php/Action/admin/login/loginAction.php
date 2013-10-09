<?php

/*
 *  Copyright (c) 2013 Lincong All rights reserved.
 *  Mail lincong1987@gmail.com
 *  QQ 159257119
 *  This software is the confidential and proprietary information of Lincong,
 *  Inc. ("Confidential Information"). You shall not disclose such Confidential
 *  Information and shall use it only in accordance with the terms of the license
 *  agreement you entered into with Lincong.
 *  $Id$
 */
$ROOT = $_SERVER["DOCUMENT_ROOT"];
require $ROOT . '/include/function.php';
require $ROOT . '/php/Impl/user.class.php';
require $ROOT . '/include/Smarty/smarty.class.php';

// 分配
switch ($ac) {
    case "doLayout":
        $tpl = new Smarty;
        if (isLogin()) {
            $tpl->display($ROOT . "/php/View/admin/index.tpl");
        } else {
            $tpl->display($ROOT . "/php/View/admin/login/login.tpl");
        }
        break;
    case "doLogin" :
        $user = new USER;
        $user->username = $_REQUEST["username"];
        $user->password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
        if (empty($user->username)) {
            jsonEncode("fail");
        }
        if (empty($user->password)) {
            jsonEncode("fail");
        }
        $userArray = $user->selectUser();
        if (count($userArray) === 1) {
            $_SESSION["Q_SESSION_IS_LOGIN"] = true;
            $_SESSION["SESSION_USER"] = $userArray[0];
            jsonEncode("succ");
        } else {
            jsonEncode("fail");
        }
        break;
    case "doLogout":
        session_destroy();
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/login/login.tpl");
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>
