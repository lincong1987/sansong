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
require Q_Impl . 'news.class.php';
require Q_Smarty . 'Smarty.class.php';

try {
// 分配
    switch ($ac) {
        // 页面容器
        case "index":
            $tpl = new Smarty;

            $news = new News;
            $news->display = 1;
            $news->type = "company";
            $newsList = $news->select("limit 3");

            $industry = new News;
            $industry->display = 1;
            $industry->type = "industry";
            $industryList = $industry->select("limit 3");

            $tpl->assign("newsList", $newsList);
            $tpl->assign("industryList", $industryList);

            $tpl->display(Q_View . "client/index.tpl");
            break;
        case "thero":
            $tpl = new Smarty;



            $tpl->display(Q_View . "client/thero/thero.tpl");
            break;
        default :
            error("There is no Action mapped for action name [{$ac}]", "", "text");
            break;
    }
} catch (Exception $exc) {
    


    //echo $exc->getTraceAsString();
}
?>

