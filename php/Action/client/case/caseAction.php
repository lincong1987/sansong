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
    case "index":
        $tpl = new Smarty;

        $case = new Cases;
        $case->display = 1;
        $caseList = $case->select("limit 24");

        $caseParam = new CaseParam;
        $caseParamList = $caseParam->select();

        $tpl->assign("caseParamList", $caseParamList);
        $tpl->assign("caseList", $caseList);

        $tpl->display($ROOT . "/php/View/client/case/index.tpl");
        break;

    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

