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
require $ROOT . '/php/Impl/hr.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "index":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/client/hr/index.tpl");
        break;
    case "offer":
        $tpl = new Smarty;
        $hr = new Hr;
        $hr->display = 1;
        $hr->totalCount = $hr->selectCount();
        $hrList = $hr->select($hr->getLimit());
        if (count($hrList) === 0) {
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        } else {
            $tpl->assign("hrList", $hrList);
            $tpl->assign("page", $hr->getPage());
            $tpl->display($ROOT . "/php/View/client/hr/offer.tpl");
        }
        break;
    case "career":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $hr = new Hr;
            $hr->id = $id;
            $hr->display = 1;
            $hrList = $hr->select();
            if (count($hrList) == 0) {
                $tpl->display($ROOT . "/php/View/result/error.tpl");
            } else {
                $tpl->assign("hrList", $hrList);
                $tpl->display($ROOT . "/php/View/client/hr/career.tpl");
            }
        }
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

