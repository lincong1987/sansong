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
require $ROOT . '/php/Impl/menu.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/menu/menu.tpl");
        break;
    // 获取数据
    case "doGetMenu" :
        $menu = new Menu;
        $menuArray = $menu->selectMenu();
        jsonEncode("succ", $menuArray);
        break;
    case "doViewList":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/menu/menuList.tpl");
        break;
    case "editMenu":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $menu = new Menu;
            $menu->id = $id;
            $menuList = $menu->selectMenu();
            $tpl->assign("menuList", $menuList);
        }
        $tpl->display($ROOT . "/php/View/admin/menu/menuEdit.tpl");
        break;
    case "delMenu":
        $tpl = new Smarty;
        $menu = new Menu;
        $menu->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $menu->deleteMenu();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $menu = new Menu;

        $menu->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $menu->pid = isset($_REQUEST["pid"]) && !empty($_REQUEST["pid"]) ? $_REQUEST["pid"] : "";
        $menu->name = isset($_REQUEST["name"]) && !empty($_REQUEST["name"]) ? $_REQUEST["name"] : "";
        $menu->href = isset($_REQUEST["href"]) && !empty($_REQUEST["href"]) ? $_REQUEST["href"] : "";
        $menu->sort = isset($_REQUEST["sort"]) && !empty($_REQUEST["sort"]) ? $_REQUEST["sort"] : "";
        try {
            if (empty($menu->id)) {
                $menu->insertMenu();
            } else {
                $menu->updateMenu();
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
