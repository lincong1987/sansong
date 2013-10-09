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
 * Description of contact
 *
 * @author Lincong <lincong1987@gmail.com>
 */
class Contact extends Page {
    /*


CREATE TABLE `xr_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `coords` varchar(32) DEFAULT NULL COMMENT '坐标',
  `content` text,
  `display` varchar(20) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (1, '浙江办事处', '425,275,10', '<dl>\r\n	<dt>\r\n		杭州西软科技有限公司\r\n	</dt>\r\n	<dd>\r\n		总部地址：杭州市文三路508号天苑大厦21层\r\n	</dd>\r\n	<dd>\r\n		总 机：0571-88231188\r\n	</dd>\r\n	<dd>\r\n		传 真：0571-88231177\r\n	</dd>\r\n	<dd>\r\n		邮 编：310013\r\n	</dd>\r\n	<dd>\r\n		维护传真：0571-88231179\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:service@foxhis.com\">service@foxhis.com</a> \r\n	</dd>\r\n</dl>\r\n<dl>\r\n	<dt>\r\n		浙江办事处\r\n	</dt>\r\n	<dd>\r\n		地 址：杭州市文三路508号天苑大厦21层\r\n	</dd>\r\n	<dd>\r\n		电 话：0571- 88231170\r\n	</dd>\r\n	<dd>\r\n		负责人：郑　敏 13355819090\r\n	</dd>\r\n	<dd>\r\n		王丽萍：0571-56771205\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:09:40');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (2, '安徽合肥办事处', '396,244,10', '<dl>\r\n	<dt>\r\n		安徽合肥办事处\r\n	</dt>\r\n	<dd>\r\n		地址：合肥市高新区天元路顶尖花园巴黎座401室\r\n	</dd>\r\n	<dd>\r\n		联系人：周国民\r\n	</dd>\r\n	<dd>\r\n		手机：13349200133 / 13856930333\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:zgm@foxhis.com\">zgm@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:09:10');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (3, '北京办事处', '379,157,10', '<dl>\r\n	<dt>\r\n		北京办事处\r\n	</dt>\r\n	<dd>\r\n		地址：北京市宣武区广安门内大街319号广信嘉园D-6E\r\n	</dd>\r\n	<dd>\r\n		邮编：100053\r\n	</dd>\r\n	<dd>\r\n		联系人：白艳文\r\n	</dd>\r\n	<dd>\r\n		电话：010-83131435 / 83131436\r\n	</dd>\r\n	<dd>\r\n		手机：13381218117\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:foxhis@163.com\">foxhis@163.com</a> \r\n	</dd>\r\n	<dd>\r\n		技术维护电话：010-52421360 / 52421362\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:08:10');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (4, '福建福州办事处', '416,306,10', '<dl>\r\n	<dt>\r\n		福建福州办事处\r\n	</dt>\r\n	<dd>\r\n		地址：福建福州市仓山区卢滨路639号美林湾3#204\r\n	</dd>\r\n	<dd>\r\n		联系人：尧妮\r\n	</dd>\r\n	<dd>\r\n		手机：18605021760（厦门） 15396000856(福州)\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:yn8@foxhis.com\">yn8@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:04:40');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (5, '甘肃兰州办事处', '262,199,10', '<dl>\r\n	<dt>\r\n		甘肃兰州办事处\r\n	</dt>\r\n	<dd>\r\n		地址：兰州市甘南路473华阳大厦4-1801（730000）\r\n	</dd>\r\n	<dd>\r\n		联系人：陈公权\r\n	</dd>\r\n	<dd>\r\n		电话：0931-8870062 / 6135850\r\n	</dd>\r\n	<dd>\r\n		手机：13919415283\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:foxhislz@163.com\">foxhislz@163.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:08:17');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (6, '广东广州办事处', '366,338,10', '<dl>\r\n	<dt>\r\n		广东广州办事处\r\n	</dt>\r\n	<dd>\r\n		地址：广州市天河区林和西路9号耀中广场B栋3016室\r\n	</dd>\r\n	<dd>\r\n		联系人：蒋永奇\r\n	</dd>\r\n	<dd>\r\n		电话：020-87050155\r\n	</dd>\r\n	<dd>\r\n		手机：13826101058\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:jyq@foxhis.com\">jyq@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:04:13');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (7, '广州深圳办事处', '377,342,10', '<dl>\r\n	<dt>\r\n		广州深圳办事处\r\n	</dt>\r\n	<dd>\r\n		地址：深圳市福田区天安创新科技广场A座1605室\r\n	</dd>\r\n	<dd>\r\n		联系人：邹绍高\r\n	</dd>\r\n	<dd>\r\n		电话：0755-83495655\r\n	</dd>\r\n	<dd>\r\n		传真：0755-83988780\r\n	</dd>\r\n	<dd>\r\n		手机：13823737452\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:zsg@foxhis.com\">zsg@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:03:50');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (8, '广西南宁办事处', '313,349,10', '<dl>\r\n	<dt>\r\n		广西南宁办事处\r\n	</dt>\r\n	<dd>\r\n		地址：南宁市越秀路7号倚林园10栋2单元401\r\n	</dd>\r\n	<dd>\r\n		联系人：周毅\r\n	</dd>\r\n	<dd>\r\n		电话：0771-5823715\r\n	</dd>\r\n	<dd>\r\n		手机：13877117171\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:zy8@foxhis.com\">zy8@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:03:23');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (9, '海南海口办事处', '336,382,10', '<dl>\r\n	<dt>\r\n		海南海口办事处\r\n	</dt>\r\n	<dd>\r\n		地址：海口市琼山区中山南路福祥家园2号楼2单元1004室\r\n	</dd>\r\n	<dd>\r\n		邮编：571100\r\n	</dd>\r\n	<dd>\r\n		联系人：莫鹏奇\r\n	</dd>\r\n	<dd>\r\n		电话：0898-65910065\r\n	</dd>\r\n	<dd>\r\n		手机：13379977221\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:13379977221@189.com\">13379977221@189.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:03:13');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (10, '黑龙江哈尔滨办事处', '464,87,10', '<dl>\r\n	<dt>\r\n		黑龙江哈尔滨办事处\r\n	</dt>\r\n	<dd>\r\n		地址：哈尔滨学府路翰林凯越酒店1113室\r\n	</dd>\r\n	<dd>\r\n		联系人：崔元涛\r\n	</dd>\r\n	<dd>\r\n		手机：13604942932\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:dlcyt@163.com\">dlcyt@163.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:10:44');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (11, '河南郑州办事处', '359,222,10', '<dl>\r\n	<dt>\r\n		河南郑州办事处\r\n	</dt>\r\n	<dd>\r\n		地址：郑州市未来大道869号海轮小区1号楼1单元33号\r\n	</dd>\r\n	<dd>\r\n		邮编：450003\r\n	</dd>\r\n	<dd>\r\n		联系人：金亮\r\n	</dd>\r\n	<dd>\r\n		电话：0371-6023852\r\n	</dd>\r\n	<dd>\r\n		手机：18937103810\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:jinliang@foxhis.com\">jinliang@foxhis.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:11:13');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (12, '湖南长沙办事处', '291,278,10', '<dl>\r\n	<dt>\r\n		湖南长沙办事处\r\n	</dt>\r\n	<dd>\r\n		地址：长沙湘春中路111号陋园宾馆\r\n	</dd>\r\n	<dd>\r\n		联系人：徐萌\r\n	</dd>\r\n	<dd>\r\n		手机：13607312446\r\n	</dd>\r\n	<dd>\r\n		电话：0731-4841768\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:xumeng@foxhis.com\">xumeng@foxhis.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:11:47');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (13, '湖北武汉办事处', '366,246,10', '<dl>\r\n	<dt>\r\n		湖北武汉办事处\r\n	</dt>\r\n	<dd>\r\n		地址：武汉青年路64号青年广场A座12楼C（430022）\r\n	</dd>\r\n	<dd>\r\n		联系人：高峰\r\n	</dd>\r\n	<dd>\r\n		电话：027-85489288\r\n	</dd>\r\n	<dd>\r\n		手机：13907120809\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:wuhan@foxhis.com\">wuhan@foxhis.com</a> \r\n	</dd>\r\n</dl>\r\n<dl>\r\n	<dt>\r\n		湖北武汉办事处（宜昌/十堰/襄樊）\r\n	</dt>\r\n	<dd>\r\n		地址：武汉市武昌区徐东大街368号和盛世家4-3\r\n	</dd>\r\n	<dd>\r\n		联系人：王少东\r\n	</dd>\r\n	<dd>\r\n		手机：13307176815\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:wsd@foxhis.com\">wsd@foxhis.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:14:32');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (14, '江苏南京办事处', '422,227,10', '<dl>\r\n	<dt>\r\n		江苏南京办事处\r\n	</dt>\r\n	<dd>\r\n		地址：南京市建邺区梦都大街130号紫鑫国际酒店公寓2405室（210019）\r\n	</dd>\r\n	<dd>\r\n		联系人：张锦玲\r\n	</dd>\r\n	<dd>\r\n		电话：025-86217811 / 86217822\r\n	</dd>\r\n	<dd>\r\n		手机：13016985115\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:js169@126.com\">js169@126.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:19:34');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (15, '江苏苏州办事处', '418,241,10', '<dl>\r\n	<dt>\r\n		江苏苏州办事处\r\n	</dt>\r\n	<dd>\r\n		地址：苏州工业园区玲珑湾花园19幢1101室\r\n	</dd>\r\n	<dd>\r\n		联系人：温勇兵\r\n	</dd>\r\n	<dd>\r\n		电话：0512-62550966\r\n	</dd>\r\n	<dd>\r\n		手机：18626214766 / 13952404266\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:13952404266@139.com\">13952404266@139.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:17:38');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (16, '江西南昌办事处', '385,281,10', '<dl>\r\n	<dt>\r\n		江西南昌办事处\r\n	</dt>\r\n	<dd>\r\n		地址：南昌市红谷滩新区鼎峰中央A栋1001室\r\n	</dd>\r\n	<dd>\r\n		联系人：朱模雄\r\n	</dd>\r\n	<dd>\r\n		电话：0791-83866651\r\n	</dd>\r\n	<dd>\r\n		手机：13177896358 / 15879016838\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:nczmx@126.com\">nczmx@126.com</a>\r\n	</dd>\r\n	<dd>\r\n		联系人：谢秀娟\r\n	</dd>\r\n	<dd>\r\n		手机：13755788851\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:19:23');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (17, '辽宁大连办事处', '432,125,10', '<dl>\r\n	<dt>\r\n		辽宁大连办事处\r\n	</dt>\r\n	<dd>\r\n		地址：大连市沙河口区新华街184号1单元3楼1号（116001）\r\n	</dd>\r\n	<dd>\r\n		联系人：崔元涛\r\n	</dd>\r\n	<dd>\r\n		手机：13604942932\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:dlcyt@163.com\">dlcyt@163.com</a> \r\n	</dd>\r\n</dl>\r\n<dl>\r\n	<dt>\r\n		沈阳（东北区域中心）\r\n	</dt>\r\n	<dd>\r\n		地址：沈阳市铁西区云峰北街13-2号保利3D大厦905室\r\n	</dd>\r\n	<dd>\r\n		联系人：崔元涛\r\n	</dd>\r\n	<dd>\r\n		手机：13604942932\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:dlcyt@163.com\">dlcyt@163.com</a> \r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:45:22');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (18, '山东济南办事处', '400,189,10', '<dl>\r\n	<dt>\r\n		山东济南办事处\r\n	</dt>\r\n	<dd>\r\n		地址：山东济南市山大路228号A座438房间\r\n	</dd>\r\n	<dd>\r\n		联系人：王玉琦\r\n	</dd>\r\n	<dd>\r\n		手机：13356676787\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:wwwsdjn@163.com\">wwwsdjn@163.com</a> \r\n	</dd>\r\n	<dd>\r\n		联系人：晋双双\r\n	</dd>\r\n	<dd>\r\n		手机：18678883353\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:38:26');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (19, '山东青岛办事处', '413,183,10', '<dl>\r\n	<dt>\r\n		山东青岛办事处\r\n	</dt>\r\n	<dd>\r\n		地址：青岛市市北区北仲路4号1单元503室\r\n	</dd>\r\n	<dd>\r\n		联系人：孙远科\r\n	</dd>\r\n	<dd>\r\n		手机：13370590770\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:syk@foxhis.com\">syk@foxhis.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:38:56');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (20, '陕西西安办事处', '315,208,10', '<dl>\r\n	<dt>\r\n		陕西西安办事处\r\n	</dt>\r\n	<dd>\r\n		地址：西安市五星街8号时光2000酒店公寓10410室（710002）\r\n	</dd>\r\n	<dd>\r\n		联系人：白艳文\r\n	</dd>\r\n	<dd>\r\n		手机：13381218117\r\n	</dd>\r\n	<dd>\r\n		联系人：邓春雷\r\n	</dd>\r\n	<dd>\r\n		手机：18681827545 / 13892889569\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:dengchunlei@163.com\">dengchunlei@163.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:39:33');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (21, '上海办事处', '438,245,10', '<dl>\r\n	<dt>\r\n		上海办事处\r\n	</dt>\r\n	<dd>\r\n		地址：上海市武宁路955弄6号502室（200063）\r\n	</dd>\r\n	<dd>\r\n		联系人：陈立建\r\n	</dd>\r\n	<dd>\r\n		电话：021-62545315\r\n	</dd>\r\n	<dd>\r\n		手机：13817315821\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:13817315821@139.com\">13817315821@139.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:40:06');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (23, '四川', '265,266,10', '<dl>\r\n	<dt>\r\n		四川成都办事处\r\n	</dt>\r\n	<dd>\r\n		地址：成都洗面桥街29号通用工程大厦901室（610017）\r\n	</dd>\r\n	<dd>\r\n		联系人：谢志俊\r\n	</dd>\r\n	<dd>\r\n		电话：028-85512902\r\n	</dd>\r\n	<dd>\r\n		手机：13808066637\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:foxhiscd@163.com\">foxhiscd@163.com</a> \r\n	</dd>\r\n</dl>\r\n<dl>\r\n	<dt>\r\n		四川重庆办事处\r\n	</dt>\r\n	<dd>\r\n		联系人：谢志俊 13808066637\r\n	</dd>\r\n	<dd>\r\n		郑自刚 13320229990\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:44:49');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (24, '新疆乌鲁木齐办事处', '156,122,10', '<dl>\r\n	<dt>\r\n		新疆乌鲁木齐办事处\r\n	</dt>\r\n	<dd>\r\n		地址：乌鲁木齐市新市区苏州东街466号御景苑5号楼4单元201室\r\n	</dd>\r\n	<dd>\r\n		联系人：徐国杨\r\n	</dd>\r\n	<dd>\r\n		电话：0991-6627100\r\n	</dd>\r\n	<dd>\r\n		手机：13999271661\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:xuguoyang008@163.com\">xuguoyang008@163.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:46:11');
INSERT INTO `xr_contact` (`id`, `title`, `coords`, `content`, `display`, `time`) VALUES (25, '云南昆明办事处', '255,330,10', '<dl>\r\n	<dt>\r\n		云南昆明办事处\r\n	</dt>\r\n	<dd>\r\n		地址：昆明市金禧园721栋2单元402室（650225）\r\n	</dd>\r\n	<dd>\r\n		联系人：夏维鸣\r\n	</dd>\r\n	<dd>\r\n		手机：13888309591\r\n	</dd>\r\n	<dd>\r\n		邮箱：<a href=\"mailto:hj7588@163.com\">hj7588@163.com</a>\r\n	</dd>\r\n</dl>', '1', '2013-6-15 18:46:34');



     */

    public $id;
    public $title;
    public $content;
    public $coords;
    public $display;
    public $time;

    function __construct($id = "", $title = "", $coords = "", $content = "", $display = "", $time = "") {
        $this->id = $id;
        $this->title = $title;
        $this->coords = $coords;
        $this->content = $content;
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
        $rs = $db->insert(0, 2, $db->Config["Q_DB_PREFIX"] . 'contact', $this->setClause());
        return $rs;
    }

    /**
     * ;
     * @global type $db
     * @return type
     */
    function update() {
        global $db;
        $rs = $db->update(0, 1, $db->Config["Q_DB_PREFIX"] . 'contact', $this->setClause(), array("id= '" . $this->id . "'"));
        return $rs;
    }

    /**
     *
     * @global type $db
     * @return type
     */
    public function delete() {
        global $db;
        $rs = $db->delete(0, 1, $db->Config["Q_DB_PREFIX"] . 'contact', array(
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
        $rs = $db->select(0, 0, $db->Config["Q_DB_PREFIX"] . 'contact', '*', $sqlwhere, "time desc" . $limit);
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
        $rs = $db->select(0, 2, $db->Config["Q_DB_PREFIX"] . 'contact', '*', $sqlwhere, $limit);
        return $rs;
    }

    /**
     * set 子句
     * @return {Array}
     */
    function setClause() {

        return array(
            "title='" . $this->title . "'",
            "coords='" . $this->coords . "'",
            "content='" . $this->content . "'",
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
        $coords = empty($this->coords) ? "" : " and coords = '%{$this->coords}%'";
        $content = empty($this->content) ? "" : " and content like '%{$this->content}%'";
        $display = 0 == strlen($this->display) ? "" : " and display = '{$this->display}'";
        $time = empty($this->time) ? "" : " and time = '{$this->time}'";
        return $id . $title . $coords . $content . $display . $time;
    }

}

?>
