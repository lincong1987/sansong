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
require $ROOT . '/php/Impl/contact.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/contact/layout.tpl");
        break;
    // 获取列表数据
    case "doGetList" :
        $contact = new Contact;
        $contact->title = $_REQUEST["title"];
        $contact->content = $_REQUEST["content"];
        $contact->display = $_REQUEST["display"];

        $contact->totalCount = $contact->selectCount();

        $contactList = $contact->select($contact->getLimit());
        jsonEncode($contact->totalCount, $contactList, $db->log, "dhtmlx");
        break;
    case "edit":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $contact = new Contact;
            $contact->id = $id;
            $contactList = $contact->select();
            $tpl->assign("contactList", $contactList);
        }
        $tpl->display($ROOT . "/php/View/admin/contact/edit.tpl");
        break;
    case "del":
        $tpl = new Smarty;
        $contact = new Contact;
        $contact->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $contact->delete();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $contact = new Contact;

        $contact->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $contact->title = isset($_REQUEST["title"]) && !empty($_REQUEST["title"]) ? $_REQUEST["title"] : "";
        $contact->coords = isset($_REQUEST["coords"]) && !empty($_REQUEST["coords"]) ? $_REQUEST["coords"] : "";
        $contact->content = isset($_REQUEST["content"]) && !empty($_REQUEST["content"]) ? $_REQUEST["content"] : "";
        $contact->display = isset($_REQUEST["display"]) && !empty($_REQUEST["display"]) ? $_REQUEST["display"] : "";
        $contact->time = date("Y-m-d H:i:s", time());

        try {
            if (empty($contact->id)) {
                $contact->insert();
            } else {
                $contact->update();
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

