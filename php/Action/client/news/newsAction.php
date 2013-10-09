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
    case "index":
        $tpl = new Smarty;
        $news = new News;
        $news->url = "?ac={$ac}&page=";
        $news->display = 1;
        $news->type = "company";
        $news->totalCount = $news->selectCount();
        $newsList = $news->select($news->getLimit());

        if (count($newsList) === 0) {
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        } else {
            $pics = explode(",", $newsList[0]["pic"]);
            $newsList[0]["pic_1"] = $pics[0];
            $newsList[0]["pic_2"] = $pics[1];

            $tpl->assign("newsList", $newsList);
            $tpl->assign("page", $news->getPage());
            $tpl->display($ROOT . "/php/View/client/news/index.tpl");
        }

        break;

    case "industry":
        $tpl = new Smarty;

        $news = new News;
        $news->url = "?ac={$ac}&page=";
        $news->display = 1;
        $news->type = "industry";
        $news->totalCount = $news->selectCount();

        $newsList = $news->select($news->getLimit());

        if (count($newsList) === 0) {
            $tpl->display($ROOT . "/php/View/result/error.tpl");
        } else {
            $tpl->assign("newsList", $newsList);
            $tpl->assign("page", $news->getPage());
            $tpl->display($ROOT . "/php/View/client/news/industry.tpl");
        }
        break;

    case "industry_news":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $news = new News;
            $news->id = $id;
            $news->display = 1;
            $news->type = "industry";
            $newsList = $news->select();
            if (count($newsList) == 0) {
                $tpl->display($ROOT . "/php/View/result/error.tpl");
            } else {
                $tpl->assign("newsList", $newsList);
                $tpl->display($ROOT . "/php/View/client/news/industry_news.tpl");
            }
        }
        break;

    case "company_news":
        $tpl = new Smarty;
        $id = isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
        if (!empty($id)) {
            $news = new News;
            $news->id = $id;
            $news->display = 1;
            $news->type = "company";
            $newsList = $news->select();
            if (count($newsList) == 0) {
                $tpl->display($ROOT . "/php/View/result/error.tpl");
            } else {
                $pics = explode(",", $newsList[0]["pic"]);

                $newsList[0]["pic_1"] = $pics[0];
                $newsList[0]["pic_2"] = $pics[1];

                $tpl->assign("newsList", $newsList);
                $tpl->display($ROOT . "/php/View/client/news/company_news.tpl");
            }
        }
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

