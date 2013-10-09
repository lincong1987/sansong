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
 * 菜单类
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Menu {
    /*
      `id` int(11) NOT NULL,
      `pid` varchar(11) DEFAULT '0',
      `name` varchar(20) DEFAULT NULL,
      `href` varchar(120) DEFAULT '#',
      `sort` varchar(10) DEFAULT '0',
     */

    public $id;
    public $pid;
    public $name;
    public $href;
    public $sort;

    function __construct($id = "", $pid = "", $name = "", $href = "", $sort = "") {
        $this->id = $id;
        $this->pid = $pid;
        $this->name = $name;
        $this->href = $href;
        $this->sort = $sort;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function insertMenu() {
        global $db;
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'menu', $this->setClause());
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function updateMenu() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'menu', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function deleteMenu() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'menu', array(
            "id = " . $this->id
        ));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function selectMenu() {
        global $db;
        $sqlwhere = $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'menu', '*', $sqlwhere, "sort desc");
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function selectMenuCount() {
        global $db;
        $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'menu', '*', $sqlwhere);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {
        return array(
            "pid='" . $this->pid . "'",
            "name='" . $this->name . "'",
            "href='" . $this->href . "'",
            "sort='" . $this->sort . "'"
        );
    }

    /**
     * 条件子句
     * @return {String}
     */
    function whereClause() {
        $id = empty($this->id) ? "" : " and id = {$this->id}";
        $pid = empty($this->pid) ? "" : " and pid = '{$this->pid}'";
        $name = empty($this->name) ? "" : " and name = '{$this->name}'";
        $href = empty($this->href) ? "" : " and href like '%{$this->href}%'";
        $sort = empty($this->sort) ? "" : " and sort = '{$this->sort}'";
        return $id . $pid . $name . $href . $sort;
    }

}

?>
