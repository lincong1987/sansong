<?php
include("../../../include/function.php");
?>
<!DOCTYPE html>
<!--
 Copyright (c) 2012 Lincong All rights reserved.
 Mail lincong1987@gmail.com
 QQ 159257119
 This software is the confidential and proprietary information of Lincong,
 Inc. ("Confidential Information"). You shall not disclose such Confidential
 Information and shall use it only in accordance with the terms of the license
 agreement you entered into with Lincong.
$Id$
-->
<html lang="zh-CN">
    <head>
        <?php include ('../../../include/meta.php'); ?>
        <title>人才战略</title>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/base.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/common.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/biz/hr/hr.css?v=<?php echo Q_VERSION; ?>"/>
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
                        <img src="<?php echo WEB_HOST; ?>images/hr/hr_banner.png" />
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
                                        <h3><a class="modal-left-menu-title-link">人力资源</a></h3>
                                        <ul class="modal-left-menu-content">
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/hr/index.php" target="_self">人才战略</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/hr/offer.php" target="_self" class="hover">职位空缺</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 人才战略 -->
                                <div class="modal-hr">
                                    <div class="modal-hr-career-content">

                                        <?php
                                        $id = isset($_REQUEST["id"]) ? trim($_REQUEST["id"]) : "";
                                        if ($id == "1") {
                                            ?>
                                            <p><strong>软件实施工程师</strong></p>
                                            <p>学历要求：大专及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、计算机相关专业，全日制大专及以上学历； </p>
                                            <p>2、有良好的团队合作精神和客户沟通、协调能力；</p>
                                            <p>3、掌握sqL语言及会熟练运用一种开发工具； </p>
                                            <p>4、有吃苦耐劳精神，适应全国各地出差（住宿基本在酒店）； </p>
                                            <p>有工作经验者年薪5-8万 不含津贴工作内容：在酒店客户中安装、调试产品，同时给客户进行培训、跟班、业务指导及技术支持。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>

                                        <?php } ?>
                                        <?php
                                        if ($id == "2") {
                                            ?>
                                            <p><strong>JAVA移动产品开发工程师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>工作主动性和责任心强，积极乐观，沟通能力和团队合作意识良好；</p>
                                            <p>2、热爱软件编程，肯钻研，有较强的自主学习能力；</p>
                                            <p>3、有一定软件项目开发经验，工作经验一年以上；</p>
                                            <p>4、至少掌握一种数据库应用技术，如MSSQL、Sybase、MySQL、Oracle等；</p>
                                            <p>5、至少掌握一种高级编程语言，如C/C++、C#、PB等； 6、有JAVA、IOS、Andrid开发经验优先。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "5") {
                                            ?>
                                            <p><strong>PB开发工程师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1.工作主动性和责任心强，积极乐观，沟通能力和团队合作意识良好；</p>
                                            <p>2.计算机及相关专业本科学历以上；</p>
                                            <p>3.熟练掌握PB开发语言，有两年以上开发工作经验；</p>
                                            <p>4.掌握SQL语言；</p>
                                            <p>5.有酒店及相关行业软件开发经验优先。</p>
                                            <p>年薪：5-10万 不含津贴</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "6") {
                                            ?>
                                            <p><strong>接口开发工程师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、工作主动性和责任心强，积极乐观，沟通能力和团队合作意识良好；
                                            <p>2、热爱软件编程，肯钻研，有较强的自主学习能力； </p>
                                            <p>3、计算机及相关专业本科以上学历；</p>
                                            <p>4、熟练掌握.NET或PB开发语言，有一年以上开发工作经验；</p>
                                            <p>5、掌握SQL语言；</p>
                                            <p>有接口开发工作经验者优先；</p>
                                            <p>年薪：5-8万 不含津贴</p>
                                            <p>工作内容：负责公司产品与其它产品的接口开发和调试。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "3") {
                                            ?>
                                            <p><strong>.NET软件开发工程师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、工作主动性和责任心强，积极乐观，沟通能力和团队合作意识良好；</p>
                                            <p>2、热爱软件编程，肯钻研，有较强的自主学习能力； </p>
                                            <p>3、计算机及相关专业全日制本科及以上学历； </p>
                                            <p>4、至少掌握一种数据库应用技术，如MSSQL、Sybase、MySQL、Oracle等； </p>
                                            <p>5、至少掌握一种高级编程语言，如C/C++、C#、VB、PB、Delphi等； </p>
                                            <p>6、熟悉 .Net,有2年以上.NET开发工作经验 。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "4") {
                                            ?>
                                            <p><strong>JAVA软件开发工程师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、工作主动性和责任心强，积极乐观，沟通能力和团队合作意识良好； </p>
                                            <p>2、热爱软件编程，肯钻研，有较强的自主学习能力； </p>
                                            <p>3、至少掌握一种数据库应用技术，如MSSQL、Sybase、MySQL、Oracle等；</p>
                                            <p>4、有三年以上JAVA项目开发工作经验。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "7") {
                                            ?>
                                            <p><strong>网络硬件工程师</strong></p>
                                            <p>学历要求：大专及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、计算机相关专业，全日制大专以上学历，有一年以上相关工作经验； </p>
                                            <p>2、熟悉网络设备，局域网架设； </p>
                                            <p>3、熟悉主流IBM、HP等品牌服务器配置；</p>
                                            <p>4、服务器win、linux操作系统安装； </p>
                                            <p>5、熟悉linux，sql数据库操作。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "8") {
                                            ?>
                                            <p><strong>维护中心文员</strong></p>
                                            <p>学历要求：中专及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、学历要求职高或中专及以上，欢迎应届生；</p>
                                            <p>2、声音甜美，普通话标准，形象气质良；</p>
                                            <p>3、工作仔细耐心，爱岗敬业，有酒店工作经验或总机接线工作经验者优先。</p>
                                            <p>工作职责：负责公司维护中心来电接听和维护工作任务分配，客户传真和维护记录的管理。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "9") {
                                            ?>
                                            <p><strong>培训师</strong></p>
                                            <p>学历要求：本科及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>1、形象气质佳，普通话标准，有良好的沟通能力和培训潜质； </p>
                                            <p>2、能适应全国范围内较长时间出差，有良好的团队合作精神。</p>
                                            <p>3、有酒店工作经验者或培训经验工作者优先。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
                                        <?php
                                        if ($id == "10") {
                                            ?>
                                            <p><strong>北京分公司文秘</strong></p>
                                            <p>学历要求：中专及以上</p>
                                            <p><strong>职位描述:</strong></p>
                                            <p>工作内容：做好北京分公司的日常行政事务工作，积极配合销售和售后服务做好其辅助工作。 </p>
                                            <p>岗位要求：</p>
                                            <p>1、学历要求职高或中专及以上，欢迎应届生；</p>
                                            <p>2、较好的沟通协调能力和服务意识，有较好的公司内外协调处理问题的能力； </p>
                                            <p>3、配合销售人员做好辅助事物工作，如：给客户制作、发送售前或进场准备资料、维护合同管理、配合催款事宜等工作；</p>
                                            <p>4、配合北京售后服务中心做好辅助事务工作，如：维护记录录入、维护分配提醒、发送日报等工作；</p>
                                            <p>家住宣武区者优先考虑。</p>
                                            <p><strong>主要福利：</strong></p>
                                            <p>完善的社会保险：五大保险，公积金；</p>
                                            <p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>
                                            <p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>
                                            <p>健康计划：员工年度体检和健康咨询；</p>
                                            <p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>
                                            <p><b><img src="<?php echo WEB_HOST; ?>images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                            <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                            <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                            <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
                                        <?php } ?>
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