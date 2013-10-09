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
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/service/download/layout.tpl");
        break;
    // 获取列表数据
    case "doGetList" :
        $download = new Download;
        $download->title = $_REQUEST["title"];
        $download->display = $_REQUEST["display"];
        $download->path = $_REQUEST["path"];
        $download->name = $_REQUEST["name"];
        $download->totalCount = $download->selectCount();

        $downloadList = $download->select($download->getLimit());

        jsonEncode($download->totalCount, $downloadList, $db->log, "dhtmlx");
        break;
    case "edit":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $download = new Download;
            $download->id = $id;
            $downloadList = $download->select();
            $tpl->assign("downloadList", $downloadList);
        }
        $tpl->display($ROOT . "/php/View/admin/service/download/edit.tpl");
        break;
    case "del":
        $tpl = new Smarty;
        $download = new Download;
        $download->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $download->delete();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $download = new Download;

        $download->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $download->path = isset($_REQUEST["path"]) && !empty($_REQUEST["path"]) ? $_REQUEST["path"] : "";
        $download->name = isset($_REQUEST["name"]) && !empty($_REQUEST["name"]) ? $_REQUEST["name"] : "";
        $download->display = isset($_REQUEST["display"]) && !empty($_REQUEST["display"]) ? $_REQUEST["display"] : "";
        $download->time = date("Y-m-d H:i:s", time());

        try {
            if (empty($download->id)) {
                $download->insert();
            } else {
                $download->update();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        }

        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

