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
 * 用户类
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class User {
    /*
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(50) NOT NULL,
      `password` varchar(50) NOT NULL,
      `nickname` varchar(200) DEFAULT NULL,
      `email` varchar(200) DEFAULT NULL,
     */

    /**
     *
     * @var type
     */
    public $id;

    /**
     *
     * @var type
     */
    public $username;

    /**
     *
     * @var type
     */
    public $password;

    /**
     *
     * @var type
     */
    public $nickname;

    /**
     *
     * @var type
     */
    public $email;

    /**
     * 构造器
     * @param type $id
     * @param type $username
     * @param type $password
     * @param type $nickname
     * @param type $email
     */
    function __construct($id = "", $username = "", $password = "", $nickname = "", $email = "") {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->nickname = $nickname;
        $this->email = $email;
    }

    /**
     * 插入用户
     * @global {DB} $db
     * @return type
     */
    public function insertUser() {
        global $db;
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'user', $this->setClause());
        return $rs;
    }

    /**
     * 更新用户
     * @global {DB} $db
     * @return type
     * @see db.class.php
     */
    function updateUser() {
        global $db;
        $rs = $db->update(0, 2, $db->Config["Q_DB_PREFIX"] . 'user', $this->setClause());
        return $rs;
    }

    /**
     * 查找用户
     * @global {DB} $db
     * @return {Array}
     */
    public function selectUser() {
        global $db;
        $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'user', '*', $sqlwhere, "id desc");
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function deleteUser() {
        global $db;
        $sqlwhere = " id = " . $this->id;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'user', '*', $sqlwhere);
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function selectUserCount() {
        global $db;
        $sqlwhere = $this->whereClause();
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'user', '*', $sqlwhere, "id desc");
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {
        return array(
            "username='" . $this->username . "'",
            "password='" . $this->password . "'",
            "nickname='" . $this->nickname . "'",
            "email='" . $this->email . "'"
        );
    }

    /**
     * 条件子句
     * @return {String}
     */
    function whereClause() {
        $id = empty($this->id) ? "" : " and id = {$id}";
        $username = empty($this->username) ? "" : " and username = '{$this->username}'";
        $password = empty($this->password) ? "" : " and password = '{$this->password}'";
        $nickname = empty($this->nickname) ? "" : " and nickname = '{$this->nickname}'";
        $email = empty($this->email) ? "" : " and email like '%{$this->email}%'";
        return $id . $username . $password . $nickname . $email;
    }

}

?>
