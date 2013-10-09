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

include $ROOT . '/include/function.php';
//require $ROOT . '/php/Impl/news.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "index":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/about/introduction.tpl");
        break;
    case "introduction":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/about/introduction.tpl");
        break;
    case "expansion":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/about/expansion.tpl");
        break;
    case "culture":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/about/culture.tpl");
        break;
    case "honor":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/about/honor.tpl");
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

