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
 * Description of hr
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Hr extends Page {
    /*
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(100) DEFAULT NULL COMMENT '职位要求',
      `education` varchar(100) DEFAULT NULL COMMENT '学历要求',
      `description` text COMMENT '职位描述',
      `welfare` text COMMENT '主要福利',
      `display` varchar(10) DEFAULT '0' COMMENT '是否显示',
     */

    public $id;
    public $title;

    /**
     * 要求学历
     * @var type
     */
    public $education;

    /**
     * 岗位职责
     * @var type
     */
    public $description;

    /**
     * 福利
     * @var type
     */
    public $welfare;
    public $display;
    public $time;

    function __construct($id = "", $title = "", $education = "", $description = "", $welfare = "", $display = "", $time = "") {
        $this->id = $id;
        $this->title = $title;
        $this->education = $education;
        $this->description = $description;
        $this->welfare = $welfare;
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
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'hr', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global type $db
     * @return type
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'hr', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'hr', array(
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
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'hr', '*', $sqlwhere, "time desc" . $limit);
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
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'hr', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {

        return array(
            "title='" . $this->title . "'",
            "education='" . $this->education . "'",
            "description='" . $this->description . "'",
            "welfare='" . $this->welfare . "'",
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
        $title = empty($this->title) ? "" : " and title like '%{$this->title}%'";
        $education = empty($this->education) ? "" : " and education like '%{$this->education}%'";
        $description = empty($this->description) ? "" : " and description like '%{$this->description}%'";
        $welfare = empty($this->welfare) ? "" : " and welfare like '%{$this->welfare}%'";
        $display = 0 == strlen($this->display) ? "" : " and display = '{$this->display}'";
        $time = empty($this->time) ? "" : " and time = '{$this->time}'";
        return $id . $title . $education . $description . $welfare . $display . $time;
    }

}

?>
