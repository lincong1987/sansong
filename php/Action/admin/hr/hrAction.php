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
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/hr/layout.tpl");
        break;
    // 获取列表数据
    case "doGetList" :
        $hr = new Hr;
        $hr->title = $_REQUEST["title"];
        $hr->education = $_REQUEST["education"];
        $hr->description = $_REQUEST["description"];
        $hr->welfare = $_REQUEST["welfare"];
        $hr->display = $_REQUEST["display"];

        $hr->totalCount = $hr->selectCount();

        $hrList = $hr->select($hr->getLimit());
        jsonEncode($hr->totalCount, $hrList, $db->log, "dhtmlx");
        break;
    case "edit":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $hr = new Hr;
            $hr->id = $id;
            $hrList = $hr->select();
            //$tpl->assign("hrList", $hrList);
        }
        $tpl->display($ROOT . "/php/View/admin/hr/edit.tpl");
        break;
    case "del":
        $tpl = new Smarty;
        $hr = new Hr;
        $hr->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $hr->delete();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $hr = new Hr;

        $hr->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $hr->title = isset($_REQUEST["title"]) && !empty($_REQUEST["title"]) ? $_REQUEST["title"] : "";
        $hr->education = isset($_REQUEST["education"]) && !empty($_REQUEST["education"]) ? $_REQUEST["education"] : "";
        $hr->description = isset($_REQUEST["description"]) && !empty($_REQUEST["description"]) ? $_REQUEST["description"] : "";
        $hr->welfare = isset($_REQUEST["welfare"]) && !empty($_REQUEST["welfare"]) ? $_REQUEST["welfare"] : "";
        $hr->display = isset($_REQUEST["display"]) && !empty($_REQUEST["display"]) ? $_REQUEST["display"] : "";
        $hr->time = date("Y-m-d H:i:s", time());

        try {
            if (empty($hr->id)) {
                $hr->insert();
            } else {
                $hr->update();
            }
            $tpl->display($ROOT . "/php/View/result/succ.tpl");
        } catch (Exception $exc) {
            $tpl->assign("actionError", $exc);
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        }
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

