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
 * Description of download
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Download extends Page {
    /*
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `path` varchar(200) DEFAULT NULL,
      `name` varchar(100) DEFAULT NULL,
      `size` varchar(100) DEFAULT NULL,
      `clickcount` varchar(100) DEFAULT NULL,
      `time` datetime DEFAULT NULL,
     */

    public $id;
    public $path;
    public $name;
    public $size;
    public $clickcount;
    public $display;
    public $time;

    function __construct($id = "", $path = "", $name = "", $size = "", $clickcount = "", $display = "", $time = "") {
        $this->id = $id;
        $this->path = $path;
        $this->name = $name;
        $this->size = $size;
        $this->clickcount = $clickcount;
        $this->display = $display;
        $this->time = $time;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function insert() {
        global $db;
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'download', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global type $db
     * @return type
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'download', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'download', array(
            "id = " . $this->id
        ));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function select($limit = "") {
        global $db;
        $sqlwhere = $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'download', '*', $sqlwhere, "time desc" . $limit);
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    function selectCount($limit = "") {
        global $db;
        $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'download', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {
        return array(
            "path='" . $this->path . "'",
            "name='" . $this->name . "'",
            "size='" . $this->size . "'",
            "clickcount='" . $this->clickcount . "'",
            "display='" . $this->display . "'",
            "time='" . $this->time . "'"
        );
    }

    /**
     * 条件子句
     * @return {String}
     */
    function whereClause() {
        $id = empty($this->id) ? "" : " and id = {$this->id}";
        $path = empty($this->path) ? "" : " and path = '{$this->path}'";
        $name = empty($this->name) ? "" : " and name like '%{$this->name}%'";
        $size = empty($this->size) ? "" : " and size like '%{$this->size}%'";
        $clickcount = empty($this->clickcount) ? "" : " and clickcount like '%{$this->clickcount}%'";
        $display = 0 == strlen($this->display) ? "" : " and display = '{$this->display}'";
        $time = empty($this->time) ? "" : " and time = '{$this->time}'";
        return $id . $path . $name . $size . $clickcount . $display . $time;
    }

}

?>
