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
 * CaseParam Class
 * @version 1.0
 * @since 2013-4-28 11:09:37
 * @author Lincong <lincong1987@gmail.com>
 */
class CaseParam {

    /**
     * 截止到年
     * @var caseyear
     */
    public $caseyear;

    /**
     * 截止到月
     * @var caseyear
     */
    public $casemonth;

    /**
     * 截止到日
     * @var caseyear
     */
    public $casedate;

    /**
     * 西软酒店总用户
     * @var caseyear
     */
    public $casetotalcount;

    /**
     * 高星级酒店
     * @var caseyear
     */
    public $casehighstardate;

    /**
     * 构造器
     * @param caseyear $caseyear
     * @param caseyear $casemonth
     * @param caseyear $casedate
     * @param caseyear $casetotalcount
     * @param caseyear $casehighstardate
     */
    function __construct($caseyear = "", $casemonth = "", $casedate = "", $casetotalcount = "", $casehighstardate = "") {
        $this->caseyear = $caseyear;
        $this->casemonth = $casemonth;
        $this->casedate = $casedate;
        $this->casetotalcount = $casetotalcount;
        $this->casehighstardate = $casehighstardate;
    }

    /**
     *
     * @global caseyear $db
     * @return caseyear
     */
    function insert() {
        global $db;
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'caseparam', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global caseyear $db
     * @return caseyear
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'caseparam', $this->setClause());
        return $rs;
    }

    /**
     *
     * @global caseyear $db
     * @return caseyear
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'caseparam');
        return $rs;
    }

    /**
     *
     * @global caseyear $db
     * @return caseyear
     */
    function select($limit = "") {
        global $db;
        $sqlwhere = $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'caseparam', '*', $sqlwhere, "caseyear desc", $limit);
        return $rs;
    }

    /**
     *
     * @global caseyear $db
     * @return caseyear
     */
    function selectCount($limit = "") {
        global $db;
        $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'caseparam', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {
        return array(
            "caseyear='" . $this->caseyear . "'",
            "casemonth='" . $this->casemonth . "'",
            "casedate='" . $this->casedate . "'",
            "casetotalcount='" . $this->casetotalcount . "'",
            "casehighstardate='" . $this->casehighstardate . "'",
        );
    }

    /**
     * 条件子句
     * @return {String}
     */
    function whereClause() {
        $caseyear = empty($this->caseyear) ? "" : " and caseyear = '{$this->caseyear}'";
        $casemonth = empty($this->casemonth) ? "" : " and casemonth like '{$this->casemonth}'";
        $casedate = empty($this->casedate) ? "" : " and casedate = '{$this->casedate}'";
        $casetotalcount = empty($this->casetotalcount) ? "" : " and casetotalcount = '{$this->casetotalcount}'";
        $casehighstardate = empty($this->casehighstardate) ? "" : " and casehighstardate = '{$this->casehighstardate}'";
        return $caseyear . $casemonth . $casedate . $casetotalcount . $casehighstardate;
    }

}

?>
