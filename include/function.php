<?php

/*!
 * Copyright (c) 2012 Lincong All rights reserved.
 * Mail lincong1987@gmail.com
 * QQ 159257119
 * This software is the confidential and proprietary information of Lincong.
 * You shall not disclose such Confidential
 * Information and shall use it only in accordance with the terms of the license
 * agreement you entered into with Lincong.
 */
require $_SERVER["DOCUMENT_ROOT"] . "/inc/config.php";
require Q_Impl . "common/page.class.php";
require Q_Impl . "common/db.class.php";

// 入口
$ac = isset($_REQUEST["ac"]) ? (!empty($_REQUEST["ac"]) ? $_REQUEST["ac"] : "") : "";

// 数据库
$db = new DB();

//try {
//    $conn = mysql_connect(Q_DB_HOST, Q_DB_USER, Q_DB_PASS) or error("Can Not Connect MySQL Server " . Q_DB_HOST . ". " . getMysqlError());
//    mysql_select_db(Q_DB_NAME, $conn) or error("Can Not Connect Database " . Q_DB_NAME . ". " . getMysqlError());
//} catch (Exception $exc) {
//    echo $exc->getTraceAsString();
//}

/**
 * 获取Mysql异常
 * @return type
 */
function getMysqlError() {
    return Q_DEBUG == false ? "" : mysql_error();
}

function jsonError($str = "", $id = "") {
    error($str, $id, "json", "die");
}

function isLogin() {
    return isset($_SESSION["Q_SESSION_IS_LOGIN"]) && $_SESSION["Q_SESSION_IS_LOGIN"] === true ? true : false;
}

/**
 * 输出友好的错误信息
 * @param type $str
 * @param type $id
 * @param type $type
 * @param type $show
 * @return type
 */
function error($str = "", $id = "", $type = "html", $show = "die") {

    $debug = debug_backtrace();
    $d = array(
        "file" => "",
        "line" => "",
        "function" => "",
        "args" => ""
    );
    $_d = "";
    if (Q_DEBUG == true && count($debug) > 0) {
        $d = $debug[0];
        $d = array(
            "file" => $d["file"],
            "line" => $d["line"],
            "function" => $d["function"],
            "args" => $d["args"]
        );
        $_d = "trace:
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<b>[file:]</b>{$d["file"]}
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<b>[line:]</b>{$d["line"]}
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<b>[function:]</b>{$d["function"]}
        ";
    }

    $t = date("Y-m-d H:i:s", time());
    $str = !empty($str) ? $str : "Unknow Error";
    $ROOT = "";
    $json_err_id = $id;
    $id = empty($id) ? "" : "<br><b>Visit For More:</b><a target='_blank' style='font-size:12px; color:#357dce' href='{$ROOT}'>{$id}</a>";
    if ($type == "html") {
        if ($show == "echo") {
            echo("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body><div style='font-family:Verdana; background:url(http://" . $_SERVER["HTTP_HOST"] . "/src/img/error.gif) #F6FBFF no-repeat 0px 0px; height:117px; width:550px; overflow-x: hidden; overflow-y: auto; padding-left:140px;font-size:12px; border:1px solid #8cb7d7; margin:10px; color:#369'><br><b>Error:</b>{$str}{$id}<br><b>Time:{$t}</b><br>{$_d}</div></body></html></body>");
            return;
        } elseif ($show == "button") {
            die("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body><div style='font-family:Verdana;background:url(http://" . $_SERVER["HTTP_HOST"] . "/src/img/error.gif) #F6FBFF no-repeat 0px 0px; height:117px; width:550px; overflow-x: hidden; overflow-y: auto; padding-left:140px;font-size:12px; border:1px solid #8cb7d7; margin:10px; color:#369'><br><b>Error:</b>{$str}{$id}<br><b>Time:{$t}</b><br>{$_d}<br><input type='button' onclick='window.close();' value='关闭'></div></body></html></body>");
            return;
        } else {
            die("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body><div style='font-family:Verdana;background:url(http://" . $_SERVER["HTTP_HOST"] . "/src/img/error.gif) #F6FBFF no-repeat 0px 0px; height:117px; overflow-x: hidden; overflow-y: auto; width:550px; padding-left:140px; font-size:12px; border:1px solid #8cb7d7; margin:10px; color:#369'><br><b>Error:</b>{$str}{$id}<br><b>Time:</b>{$t}<br>{$_d}</div></body></html>");
        }
    }
    if ($type == "json") {
        $ROOT = empty($json_err_id) ? "" : "for the error, visit <a  style='display:block;font-size:12px; ' target='_blank'>this -> {$json_err_id}</a>";
        jsonEncode("fail", $str . "{$ROOT} @" . $t, $debug);
    }

    if ($show == "echo") {
        echo($str . " " . $id . " @" . $t . $_d);
    } else {
        die($str . " " . $id . " @" . $t);
    }
}

/**
 * 输出json
 *
 * @param string $state
 * @param string $msg
 * @param string $error
 * @param string $type
 * @return string | json
 * @author Lincong lincong1987@gmail.com
 * @copyright (c) 2013, Lincong
 */
function jsonEncode($state = "undefined", $msg = "undefined", $error = "undefined", $type = 'json') {
    header('Content-type: application/json; charset=UTF-8');
    $tmp = array("state" => $state, "msg" => $msg, "error" => $error);
    switch ($type) {
        case "easyui" :
            $tmp = array("rows" => $msg, "total" => $state, "debug" => $error);
            header('Content-type: application/json; charset=UTF-8');
            die(json_encode($tmp));
            exit();
            break;
        case "dhtmlx" :
            $tmp = array("rows" => $msg, "total" => $state, "debug" => $error);
            header('Content-type: application/json; charset=UTF-8');
            die(json_encode($tmp));
            exit();
            break;
        case "return" :
//$tmp = array("state" => $state, "msg" => $msg, "error" => $error);
            return (json_encode($tmp));
            break;
    }
    $jsoncallback = isset($_GET["jsoncallback"]) ? $_GET["jsoncallback"] : "";
    if (empty($jsoncallback)) {
        die(json_encode($tmp));
    } else {
        die($jsoncallback . "(" . json_encode($tmp) . ")");
    }
}

/**
 * 执行SQL
 *
 * @param string $sql
 * @param string $msg
 * @param string $type
 * @return bolean
 */
function getResult($sql, $msg = "", $type = "html") {
    $msg = !empty($msg) ? $msg : "";
    @mysql_query("set names " . Q_DB_CHARSET);
    $result = mysql_query($sql) or error("getResult Filed<br><span style='font-size:12px; font-family:Verdana;'>{$msg}<br>{$sql}<br>" . getMysqlError() . "<BR>PROJECT_VERSION:" . Q_VERSION . "</span>", $msg, $type);
    return $result;
    @mysql_free_result($result);
}

/**
 * 执行SQL
 *
 * @param string $sql
 * @param string $msg
 * @param string $type
 * @return bolean
 */
function sqlExecute($sql, $msg = "", $type = "html") {
    $msg = empty($msg) ? "" : $msg;
    @mysql_query("set names " . Q_DB_CHARSET);
    $bool = @mysql_query($sql) or error("sqlExecute Filed<br><span style='font-size:12px; font-family:Verdana;'>{$msg}<br>{$sql}<br>" . getMysqlError() . "<BR>PROJECT_VERSION:" . Q_VERSION . "</span>", $msg, $type);
    return $bool;
}

/**
 * 执行SQL
 *
 * @param string $sql
 * @param string $msg
 * @param string $type
 * @return array
 */
function sqlArray($sql, $msg = "", $type = "html") {
    $record = array();
    $result = getResult($sql, "sqlArray Filed,Message:{$msg}", $type);
    while ($tmp_info = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $record[] = $tmp_info;
    }
    return $record;
}

/**
 * 执行SQL
 *
 * @param string $sql
 * @param string $msg
 * @param string $type
 * @param string $countField
 * @return array
 */
function sqlRow($sql, $msg = "", $type = "html") {
    $res = getResult($sql, $msg, $type);
    $row = mysql_fetch_array($res, MYSQL_ASSOC);
    return $row;
}

/**
 * 执行SQL
 *
 * @param string $sql
 * @param string $msg
 * @param string $type
 * @param string $countField
 * @return int
 */
function sqlCount($sql, $msg = "", $type = "html", $countField = '*') {
    $sql = $countField != "" ? @stristr($sql, "select t.* from") == false ? "select count(*) from (" . @str_ireplace("select * from", "select {$countField} from", $sql) . ") as _count_" : "select count(*) from (" . @str_ireplace("select t.* from", "select {$countField} from", $sql) . ") as _count_"  : $sql;
    $res = getResult($sql, $msg, $type);
    $row = @mysql_fetch_row($res);
    return $row[0];
}

function clearHtml($str) {
    $str = trim($str);
    $str = strip_tags($str, "");
    $str = ereg_replace("\t", "", $str);
    $str = ereg_replace("\r\n", "", $str);
    $str = ereg_replace("\r", "", $str);
    $str = ereg_replace("\n", "", $str);
    $str = ereg_replace(" ", " ", $str);
    return trim($str);
}

?>
