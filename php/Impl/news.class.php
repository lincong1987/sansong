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
class News extends Page {
    /*
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `type` varchar(50) DEFAULT 'company',
      `title` varchar(200) DEFAULT '',
      `pic` varchar(200) DEFAULT '',
      `pic_2` varchar(200) DEFAULT '',
      `content` text,
      `typek` varchar(10) DEFAULT '1',
      `source` varchar(200) DEFAULT NULL,
      `display` varchar(11) DEFAULT '0',
      `time` datetime DEFAULT NULL,
     */

    public $id;
    public $type;
    public $title;
    public $pic;
    public $pic_2;
    public $content;
    public $source;
    public $display;
    public $time;

    function __construct($id = "", $type = "", $title = "", $pic = "", $pic_2 = "", $content = "", $source = "", $display = "", $time = "") {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->pic = $pic;
        $this->pic_2 = $pic_2;
        $this->content = $content;
        $this->source = $source;
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
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'news', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global type $db
     * @return type
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'news', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'news', array(
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
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'news', '*', $sqlwhere, "time desc " . $limit);
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
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'news', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {

        return array(
            "type='" . $this->type . "'",
            "title='" . $this->title . "'",
            "pic='" . $this->pic . "'",
            "pic_2='" . $this->pic_2 . "'",
            "content='" . $this->content . "'",
            "source='" . $this->source . "'",
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
        $type = empty($this->type) ? "" : " and type = '{$this->type}'";
        $title = empty($this->title) ? "" : " and title like '%{$this->title}%'";
        $pic = empty($this->pic) ? "" : " and pic like '%{$this->pic}%'";
        $pic_2 = empty($this->pic_2) ? "" : " and pic_2 like '%{$this->pic_2}%'";
        $content = empty($this->content) ? "" : " and content like '%{$this->content}%'";
        $source = empty($this->source) ? "" : " and source like '%{$this->source}%'";
        $display = 0 == strlen($this->display) ? "" : " and display = '{$this->display}'";
        $time = empty($this->time) ? "" : " and time = '{$this->time}'";
        return $id . $type . $title . $pic . $pic_2 . $content . $source . $display . $time;
    }

}

?>
