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
require $ROOT . '/include/Smarty/Smarty.class.php';
//require $ROOT . '/include/upload.class.php';
// 分配
switch ($ac) {
    // 页面容器
    case "doLayout":
        $tpl = new Smarty;
        $tpl->display($ROOT . "/php/View/common/upload.tpl");
        break;
    case "doUploadImage" :
        $targetFolder = '/upload';
        /*
          array(1) {
          ["upfile"]=>
          array(5) {
          ["name"]=>
          string(14) "Hydrangeas.jpg"
          ["type"]=>
          string(24) "application/octet-stream"
          ["tmp_name"]=>
          string(51) "C:\Program Files (x86)\EasyPHP-12.1\tmp\phpCFC7.tmp"
          ["error"]=>
          int(0)
          ["size"]=>
          int(595284)
          }
          }
         */
        if (isset($_FILES['upfile']) && !empty($_FILES['upfile'])) {
            $tempFile = $_FILES['upfile']['tmp_name'];
            $targetName = sha1_file($tempFile);
            $pathinfo = pathinfo($_FILES['upfile']['name']);
            //$extension = $pathinfo["extension"];

            $targetPath = $ROOT . $targetFolder;
            $webPath = str_replace("//", "/", WEB_HOST . $targetFolder); //
            $targetFile = rtrim($targetPath, '/') . '/' . $targetName . $pathinfo["dirname"] . $pathinfo["extension"]; //$_FILES['Filedata']['name'];
            move_uploaded_file($tempFile, $targetFile);
            jsonEncode("succ", array(
                "host" => $webPath,
                "name" => $targetName . $pathinfo["dirname"] . $pathinfo["extension"]
            ));
        } else {
            jsonEncode("fail", "no such images found");
        }
        break;

    case "doUploadFile" :
        $targetFolder = '/download';
        /*
          array(1) {
          ["upfile"]=>
          array(5) {
          ["name"]=>
          string(14) "Hydrangeas.jpg"
          ["type"]=>
          string(24) "application/octet-stream"
          ["tmp_name"]=>
          string(51) "C:\Program Files (x86)\EasyPHP-12.1\tmp\phpCFC7.tmp"
          ["error"]=>
          int(0)
          ["size"]=>
          int(595284)
          }
          }
         */
        if (isset($_FILES['upfile']) && !empty($_FILES['upfile'])) {
            $tempFile = $_FILES['upfile']['tmp_name'];
            $targetName = sha1_file($tempFile);
            $pathinfo = pathinfo($_FILES['upfile']['name']);
            //$extension = $pathinfo["extension"];

            $targetPath = $ROOT . $targetFolder;
            $webPath = str_replace("//", "/", WEB_HOST . $targetFolder); //
            $targetFile = rtrim($targetPath, '/') . '/' . $targetName . $pathinfo["dirname"] . $pathinfo["extension"]; //$_FILES['Filedata']['name'];
            move_uploaded_file($tempFile, $targetFile);
            jsonEncode("succ", array(
                "host" => $webPath,
                "name" => $targetName . $pathinfo["dirname"] . $pathinfo["extension"]
            ));
        } else {
            jsonEncode("fail", "no such images found");
        }
        break;
    default :
        error("There is no Action mapped for action name [{$ac}]", "", "text");
        break;
}
?>

