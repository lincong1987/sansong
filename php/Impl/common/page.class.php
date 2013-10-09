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

/**
 * 分页类
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Page {

    public $page = 1;
    public $pageSize = 10;
    public $totalCount = 0;
    public $pageCount = 0;
    public $url = "";
    public $limit = "";

    function __construct($page = 1, $pageSize = 10, $totalCount = 0, $url = "") {
        $this->page = isset($_REQUEST["page"]) && !empty($_REQUEST["page"]) ? intval($_REQUEST["page"]) : $page;
        $this->pageSize = isset($_REQUEST["pageSize"]) && !empty($_REQUEST["pageSize"]) ? intval($_REQUEST["pageSize"]) : $pageSize;
        $this->setPage();
    }

    function setPage($page = 1, $pageSize = 10, $totalCount = 0, $url = "") {
        $this->page = isset($_REQUEST["page"]) && !empty($_REQUEST["page"]) ? intval($_REQUEST["page"]) : $page;
        $this->pageSize = isset($_REQUEST["pageSize"]) && !empty($_REQUEST["pageSize"]) ? intval($_REQUEST["pageSize"]) : $pageSize;
    }

    function getPage() {
        return array(
            "page" => $this->page,
            "totalCount" => $this->totalCount,
            "pageSize" => $this->pageSize,
            "pageCount" => $this->pageCount,
            "url" => $this->url,
            "limit" => $this->limit
        );
    }

    function getLimit() {
        $this->setPage();
        $this->pageCount = ceil($this->totalCount / $this->pageSize);
        $this->limit = " limit " . ($this->page - 1) * $this->pageSize . " , " . $this->pageSize;
        return $this->limit;
    }

}

?>
