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
require $ROOT . '/php/Impl/news.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/news/layout.tpl");
        break;
    // 获取列表数据
    case "doGetList" :
        $news = new News;
        $news->title = $_REQUEST["title"];
        $news->display = $_REQUEST["display"];
        $news->type = $_REQUEST["type"];
        $news->totalCount = $news->selectCount();

        $newsList = $news->select($news->getLimit());

        jsonEncode($news->totalCount, $newsList, $db->log, "dhtmlx");
        break;
    case "doViewList":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/news/layout.tpl");
        break;
    case "edit":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $news = new News;
            $news->id = $id;
            $newsList = $news->select();
            $tpl->assign("newsList", $newsList);
        }
        $tpl->display($ROOT . "/php/View/admin/news/edit.tpl");
        break;
    case "del":
        $tpl = new Smarty;
        $news = new News;
        $news->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $news->delete();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $news = new News;

        $news->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $news->type = isset($_REQUEST["type"]) && !empty($_REQUEST["type"]) ? $_REQUEST["type"] : "";
        $news->title = isset($_REQUEST["title"]) && !empty($_REQUEST["title"]) ? $_REQUEST["title"] : "";
        $news->content = isset($_REQUEST["content"]) && !empty($_REQUEST["content"]) ? $_REQUEST["content"] : "";
        $news->pic = isset($_REQUEST["pic"]) && !empty($_REQUEST["pic"]) ? $_REQUEST["pic"] : "";
        $news->source = isset($_REQUEST["source"]) && !empty($_REQUEST["source"]) ? $_REQUEST["source"] : "";
        $news->display = isset($_REQUEST["display"]) && !empty($_REQUEST["display"]) ? $_REQUEST["display"] : "";
        $news->time = date("Y-m-d H:i:s", time());

        try {
            if (empty($news->id)) {
                $news->insert();
            } else {
                $news->update();
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

