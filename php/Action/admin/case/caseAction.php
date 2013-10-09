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
require $ROOT . '/php/Impl/cases.class.php';
require $ROOT . '/php/Impl/caseParam.class.php';
require $ROOT . '/include/Smarty/Smarty.class.php';

// 分配
switch ($ac) {
    // 页面容器
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/admin/case/layout.tpl");
        break;
    case "editCaseParam":
        $tpl = new Smarty;
        $caseParam = new CaseParam;
        $caseParamList = $caseParam->select("limit 1");
        $tpl->assign("caseParamList", $caseParamList);
        $tpl->display($ROOT . "/php/View/admin/case/editCaseParam.tpl");
        break;
    case "doCommitCaseParam":
        try {
            $tpl = new Smarty;
            $caseParam = new CaseParam;
            $caseParam->delete();
            $caseParam->casedate = isset($_REQUEST["casedate"]) && !empty($_REQUEST["casedate"]) ? $_REQUEST["casedate"] : "";
            $caseParam->caseyear = isset($_REQUEST["caseyear"]) && !empty($_REQUEST["caseyear"]) ? $_REQUEST["caseyear"] : "";
            $caseParam->casemonth = isset($_REQUEST["casemonth"]) && !empty($_REQUEST["casemonth"]) ? $_REQUEST["casemonth"] : "";
            $caseParam->casetotalcount = isset($_REQUEST["casetotalcount"]) && !empty($_REQUEST["casetotalcount"]) ? $_REQUEST["casetotalcount"] : "";
            $caseParam->casehighstardate = isset($_REQUEST["casehighstardate"]) && !empty($_REQUEST["casehighstardate"]) ? $_REQUEST["casehighstardate"] : "";
            $caseParam->insert();
            $caseParamList = $caseParam->select();
            $tpl->assign("caseParamList", $caseParamList);
            $tpl->assign("actionMessage", "modi_success");
            $tpl->display($ROOT . "/php/View/admin/case/editCaseParam.tpl");
        } catch (Exception $exc) {
            $tpl->assign("actionError", $exc);
            $tpl->display($ROOT . "/php/View/admin/case/editCaseParam.tpl");
        }
        break;
    // 获取列表数据
    case "doGetList" :
        $case = new Cases;
        $case->name = $_REQUEST["name"];
        $case->display = $_REQUEST["display"];
        $case->description = $_REQUEST["description"];
        $case->totalCount = $case->selectCount();
        $caseList = $case->select($case->getLimit());
        jsonEncode($case->totalCount, $caseList, $db->log, "dhtmlx");
        break;
    case "edit":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $case = new Cases;
            $case->id = $id;
            $caseList = $case->select();
            $tpl->assign("caseList", $caseList);
        }
        $tpl->display($ROOT . "/php/View/admin/case/edit.tpl");
        break;
    case "del":
        $tpl = new Smarty;
        $case = new Cases;
        $case->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $case->delete();
        $tpl->display($ROOT . "/php/View/result/succ.tpl");
        break;
    case "doCommit":
        $tpl = new Smarty;
        $case = new Cases;

        $case->id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        $case->name = isset($_REQUEST["name"]) && !empty($_REQUEST["name"]) ? $_REQUEST["name"] : "";
        $case->description = isset($_REQUEST["description"]) && !empty($_REQUEST["description"]) ? $_REQUEST["description"] : "";
        $case->sort = isset($_REQUEST["sort"]) && !empty($_REQUEST["sort"]) ? $_REQUEST["sort"] : "";
        $case->display = isset($_REQUEST["display"]) && !empty($_REQUEST["display"]) ? $_REQUEST["display"] : "";
        $case->time = date("Y-m-d H:i:s", time());

        try {
            if (empty($case->id)) {
                $case->insert();
            } else {
                $case->update();
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

