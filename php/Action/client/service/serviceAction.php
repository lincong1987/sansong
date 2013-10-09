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
require $ROOT . '/php/Impl/download.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "index":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/service/index.tpl");
        break;
    case "aftersale":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/service/aftersale.tpl");
        break;
    case "download":
        $tpl = new Smarty;

        $download = new Download();
        $download->url = "?ac={$ac}&page=";
        $download->display = 1;
        $download->totalCount = $download->selectCount();
        $downloadList = $download->select($download->getLimit());
        if (count($downloadList) === 0) {
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        } else {
            $tpl->assign("downloadList", $downloadList);
            $tpl->assign("page", $download->getPage());
            $tpl->display($ROOT . "/php/View/client/service/download.tpl");
        }

        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

