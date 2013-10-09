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
 * Description of case
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Cases extends Page {

    public $id;

    /**
     * 案例名称
     * @var type
     */
    public $name;

    /**
     * 案例描述
     * @var type
     */
    public $description;

    /**
     * 排序
     * @var type
     */
    public $sort;

    /**
     * 是否显示
     * @var type
     */
    public $display;

    /**
     * 添加时间
     * @var type
     */
    public $time;

    /**
     * 构造器
     * @param type $id
     * @param type $name
     * @param type $description
     * @param type $sort
     * @param type $display
     * @param type $time
     */
    function __construct($id = "", $name = "", $description = "", $sort = "", $display = "", $time = "") {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->sort = $sort;
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
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'case', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global type $db
     * @return type
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'case', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'case', array(
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
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'case', '*', $sqlwhere, "sort desc " . $limit);
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
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'case', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {

        return array(
            "name='" . $this->name . "'",
            "description='" . $this->description . "'",
            "sort='" . $this->sort . "'",
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
        $name = empty($this->name) ? "" : " and name like '%{$this->name}%'";
        $description = empty($this->description) ? "" : " and description like '%{$this->description}%'";
        $sort = 0 == strlen($this->sort) ? "" : " and sort = '{$this->sort}'";
        $display = 0 == strlen($this->display) ? "" : " and display = '{$this->display}'";
        $time = empty($this->time) ? "" : " and time = '{$this->time}'";
        return $id . $name . $description . $sort . $display . $time;
    }

}

?>
