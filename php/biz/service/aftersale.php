<?php
include("../../../include/function.php");
?>
<!--
 Copyright (c) 2012 Lincong All rights reserved.
 Mail lincong1987@gmail.com
 QQ 159257119
 This software is the confidential and proprietary information of Lincong,
 Inc. ("Confidential Information"). You shall not disclose such Confidential
 Information and shall use it only in accordance with the terms of the license
 agreement you entered into with Lincong.
 page: honor.php
-->
<html lang="zh-CN">
    <head>
        <?php include ('../../../include/meta.php'); ?>
        <title>售后服务</title>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/base.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/common.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/biz/service/service.css?v=<?php echo Q_VERSION; ?>"/>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/jquery/jquery-1.8.3.min.js?v=<?php echo Q_VERSION; ?>"></script>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/icinfo/icinfo-1.0.0.min.js?v=<?php echo Q_VERSION; ?>"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include ('../../../include/header.php'); ?>
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-service-project-banner">
                        <img src="<?php echo WEB_HOST; ?>images/service/service_banner.png" />
                    </div>
                    <!-- 左右结构 -->
                    <table class="modal-l-r">
                        <colgroup>
                            <col style="width: 140px" />
                            <col />
                        </colgroup>
                        <tr>
                            <td class="modal-left" valign="top">
                                <div class="modal-left-menu">
                                    <div class="modal-left-menu-title">
                                        <h3><a class="modal-left-menu-title-link">客户服务</a></h3>
                                        <ul class="modal-left-menu-content">
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/service/index.php" target="_self">工程实施</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/service/aftersale.php" target="_self" class="hover">售后服务</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/service/download.php" target="_self">资料下载</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 工程实施 -->
                                <div class="modal-service-aftersale">
                                    <div class="modal-service-aftersale-title"></div>
                                    <div class="modal-service-aftersale-content">
                                        <img style="float: right;" src="../../../images/service/service_aftersale_content_1.png" />
                                        <p><strong>西软售后服务信息：</strong></p>
                                        <p>7*24小时热线电话 (086)-571-88231188(按“1”技术支持)</p>
                                        <p>7*24小时维护传真 (086)-571-88231179</p>
                                        <p>维护部邮箱 support@foxhis.com</p>
                                        <p>技术论坛 http://bbs.foxhis.com</p>
                                        <p>维护投诉电话 (086)-571-88231151 </p>
                                        <p>通讯地址 杭州文三路508号天苑大厦21层西软科技公司</p>
                                        <p>邮编 310013</p>
                                        <p><strong>服务对象</strong></p>
                                        <p>所有已签维护合同并在维护合同期限内的西软系统用户。</p>
                                        <p><strong>服务范围</strong></p>
                                        <p>现场工程实施完毕后并顺利通过验收的用户在工程人员撤场后，西软管理系统运行和使用过程中的一切西软系统的问题都属售后服务范畴。</p>
                                        <p><strong>服务方式</strong></p>
                                        <p>7*24小时全天在线的服务热线0571－88231188和维护部为您提供技术咨询和远程维护服务。</p>
                                        <p>用户如遇紧急情况确需现场维护，则由维护部统一协调，由公司相关部门派人现场处理。</p>
                                        <div style="height: 4px; background: #7d8eb5; margin: 5px auto;"></div>
                                        <p><strong>日常维护处理流程</strong></p>
                                        <img style="float: left;" src="../../../images/service/service_aftersale_content_2.png" />
                                        <p>1、各使用部门将系统出现的问题反应给电脑房值班人员。</p>
                                        <p>2、电脑房人员根据反应的问题，进行详细了解。搞清问题产生的情况及原因等，在了解情况后打西软24小时维护热线 (086-571-88231188) 请求维护，或登录西软在线系统请求远程处理。打电话前系统管理员一定要了解好问题的情况再和西软维护人员交流，一般不必要让操作员直接与西软维护人员交流，这样管理员了解了问题，更能了解处理情况。若系统管理员由于某种原因不能到场处理问题或做远程维护，那酒店也应指定相关负责人来处理相关问题或和西软公司维护员沟通处理相关问题，一般人选都为电脑知识和业务知识比较好的相关部门主管；若要通过远程维护解决的转入远程维护处理程序。</p>
                                        <p>3、维护完毕，写好维护日志。</p>
                                        <p><strong>远程维护处理程序</strong></p>
                                        <p>1、打电话到西软维护部，说明要维护的内容，和维护工程师沟通清楚，并记下帮你做维护的工程师的姓名，也可登录西软在线服务系统找值班工程师远程协助。</p>
                                        <p>若涉及一些报表修改或增加，代码增减、数据删除等对系统有修改的维护时都要发传真给西软维护部确认，传真请写明以下要素(详见维护联系单)：酒店名、联系人、联系方式(电话、手机、传真、Email)、要求完成的大致日期、问题的详细说明等、要求删除数据需要酒店盖章。传真收到后公司维护部会根据情况在最短时间内和你们联系，但考虑到时间安排或其它传真收发上的问题，建议在发传真10分钟后主动联系维护热线，以落实维护时间和安排人员。</p>
                                        <p>2、连通远程维护(使用西软在线服务系统或PCAnywhere )。</p>
                                        <p>3、维护期间请不要离开维护电脑，仔细看工程师的处理情况，有问题及时联系，还有可能会断开重连。</p>
                                        <p>4、问题处理好后联系对方询问问题原因、处理结果及防范措施等，并告知使部门。</p>
                                        <p>5、维护完毕，写好维护日志。</p>
                                        <p><strong>远程维护示意图</strong></p>
                                        <img src="../../../images/service/service_aftersale_content_3.png" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- 主体结束 -->

            <?php include ('../../../include/footer.php'); ?>
        </div>
    </body>
</html>