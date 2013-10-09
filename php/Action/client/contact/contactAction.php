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
    case "index":
        $tpl = new Smarty;
        $contact = new Contact;
        $contact->display = 1;
        $contactList = $contact->select();
        $tpl->assign("contactList", $contactList);
        $tpl->display($ROOT . "/php/View/client/contact/index.tpl");
        break;
    case "getContact":
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $contactList = array();
        if (!empty($id)) {
            $contact = new Contact;
            $contact->id = $id;
            $contactList = $contact->select();
        }
        jsonEncode("succ", $contactList, date("Y-m-d H:i:s", time()));
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "json");
        break;
}
?>

