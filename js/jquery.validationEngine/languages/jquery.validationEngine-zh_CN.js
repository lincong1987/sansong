(function($) {
    $.fn.validationEngineLanguage = function() {
    };
    $.validationEngineLanguage = {
        newLang: function() {
            $.validationEngineLanguage.allRules = {
                "required": {// Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "不可为空",
                    "alertTextCheckboxMultiple": "选择一个项目",
                    "alertTextCheckboxe": "必须钩选此栏",
                    "alertTextDateRange": "日期范围不可空白"
                },
                "length": {
                    "regex": "none",
                    "alertText": "输入的字符数必须介于 ",
                    "alertText2": " 和 ",
                    "alertText3": " 之间"
                },
                "requiredInFunction": {
                    "func": function(field, rules, i, options) {
                        var flag = false;
                        if (field.val() == "test") {
                            flag = true;
                        } else {
                            flag = false;
                        }
                        return flag;
                    },
                    "alertText": " 输入的值必须为 test"
                },
                "dateRange": {
                    "regex": "none",
                    "alertText": "无效的 ",
                    "alertText2": " 日期范围"
                },
                "dateTimeRange": {
                    "regex": "none",
                    "alertText": "无效的 ",
                    "alertText2": " 时间范围"
                },
                "minSize": {
                    "regex": "none",
                    "alertText": "最少 ",
                    "alertText2": " 个字符"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "最多 ",
                    "alertText2": " 个字符"
                },
                "groupRequired": {
                    "regex": "none",
                    "alertText": "必需选填其中一个栏位"
                },
                "min": {
                    "regex": "none",
                    "alertText": "最小值為 "
                },
                "max": {
                    "regex": "none",
                    "alertText": "最大值为 "
                },
                "past": {
                    "regex": "none",
                    "alertText": "必需早于 "
                },
                "future": {
                    "regex": "none",
                    "alertText": "必需晚于 "
                },
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "最多选取 ",
                    "alertText2": " 个项目"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "最少选择 ",
                    "alertText2": " 个项目"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "请输入与上面相同的密码"
                },
                "passwordComplexity": {
                    "regex": /^((?=.*\d)(?=.*[a-z])|(?=.*\d)(?=.*[A-Z]))[0-9a-zA-Z`~!@#$^*()|\-_{}':;""',\[\]\\\/.<>~！@#￥……*（）—|｛｝【】‘；：《》·”“'‘’。，、]{8,}$/,
                    "alertText": " 密码最少长度为 8位 ，并至少包含2种复杂类别的字符 (如 Abc21334 或者 abcd1234),不能包含&?=+%和空格"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "无效"
                },
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/,
                    "alertText": " 无效"
                },
                "mobilePhone": {
                    "regex": /^([0-9]{11})?$/,
                    "alertText": "请输入11位数的手机号码"
                },
                "faxmail": {
                    "regex": /^[+]{0,1}(\d){1,3}[-]?([-]?((\d)|[ ]){1,12})+$/,
                    "alertText": "请输入正确的传真格式"
                },
                "email": {
                    // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
                    "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    "alertText": "电子邮件地址无效"
                },
                "postcode": {
                    // Number, including positive, negative, and floating
                    // decimal. Credit: bassistance
                    "regex": /^(\d{6})?$/,
                    "alertText": "请输入正确的邮政编码格式"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": " 不是有效的整数"
                },
                "negativeInteger": {
                    "regex": /^-\d+$/,
                    "alertText": " 不是有效的负整数"
                },
                "positiveInteger": {
                    "regex": /^\d+$/,
                    "alertText": " 不是有效的正整数"
                },
                "noZeroStart": {
                    "regex": /^(0|[1-9][0-9]*)$/,
                    "alertText": " 不能以0开头的正整数"
                },
                "aDecimal": {
                    // Number, including positive, negative, and floating decimal. Credit: bassistance
                    "regex": /^([\d]+([\.]{1}[\d]{1})?)?$/,
                    "alertText": "小数点后只能输入一位数字"
                },
                "valueRange": {
                    "regex": "none",
                    "alertText": " 输入的数字大小必须介于 ",
                    "alertText2": " 和 ",
                    "alertText3": " 之间"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "无效的浮点数"
                },
                "negativeNumber": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^-((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "无效的负浮点数"
                },
                "positiveNumber": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "无效的正浮点数"
                },
                "date": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
                    "alertText": "格式无效，格式必需为 YYYY-MM-DD"
                },
                "ipv4": {
                    "regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "地址无效 "
                },
                "url": {
                    "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    "alertText": "无效"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": " 只能填数字"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "只接受英文字母大小写"
                },
                "onlyLetterNumber": {
                    "regex": /^[0-9a-zA-Z]+$/,
                    "alertText": "只能英文和数字"
                },
                "notSpaceForStartOrEnd": {
                    "regex": /[^\s]+/,
                    "alertText": "不能全为空格"
                },
                "noSpecialCaracters": {
                    "regex": /^[0-9a-zA-Z_]+$/,
                    "alertText": "您只能输入数字和英文字符以及下划线"
                },
                "chinese": {
                    // Number, including positive, negative, and floating
                    // decimal. Credit: bassistance
                    "regex": /^[\u4E00-\u9FA5]+$/,
                    "alertText": "请输入中文"
                },
                "id": {
                    // Number, including positive, negative, and floating
                    // decimal. Credit: bassistance
                    "regex": /^((\d{17}[\dXx])$|(\d{15})$)?$/,
                    "alertText": "* 身份证填写有误，15位身份证应为全数字，18位身份证最后一位是数字或者'X'"
                },
                "isNotNumber": {
                    // Number, including positive, negative, and floating
                    // decimal. Credit: bassistance
                    "regex": /^([a-zA-Z\u4e00-\u9fa5]+$)?$/,
                    "alertText": "不允许数字"
                },
                "letterNumber": {
                    "regex": /^[a-zA-Z][a-zA-Z0-9_]*$/,
                    "alertText": "必须以字母开头,只能由字母或数字或下划线组成"
                },
                // --- CUSTOM RULES -- Those are specific to the demos, they can be removed or changed to your likings
                "ajaxUserCall": {
                    "url": "/AjaxServlet.servlet",
                    // you may want to pass extra data on the ajax call
                    "extraData": "name=eric",
                    "alertTextOk": "可以使用",
                    "alertText": "已被其他人使用",
                    "alertTextLoad": "正在确认名称是否有其他人使用，请稍等。"
                },
                "ajaxUserCalls": {
                    "url": "/AjaxServlets.servlet",
                    // you may want to pass extra data on the ajax call
                    "extraData": "name=eric",
                    "extraDataDynamic": ['#d1', "#d2"],
                    "alertTextOk": "可以使用",
                    "alertText": "已被其他人使用",
                    "alertTextLoad": "正在确认名称是否有其他人使用，请稍等。"
                },
                "ajaxUserCallPhp": {
                    "url": "phpajax/ajaxValidateFieldUser.php",
                    // you may want to pass extra data on the ajax call
                    "extraData": "name=eric",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "可以使用",
                    "alertText": "已被其他人使用",
                    "alertTextLoad": "正在确认帐号名称是否有其他人使用，请稍等。"
                },
                "ajaxNameCall": {
                    // remote json service location
                    "url": "ajaxValidateFieldName",
                    // error
                    "alertText": "可以使用",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "已被其他人使用",
                    // speaks by itself
                    "alertTextLoad": "正在确认名称是否有其他人使用，请稍等。"
                },
                "ajaxNameCallPhp": {
                    // remote json service location
                    "url": "phpajax/ajaxValidateFieldName.php",
                    // error
                    "alertText": "已被其他人使用",
                    // speaks by itself
                    "alertTextLoad": "正在确认名称是否有其他人使用，请稍等。"
                },
                "validate2fields": {
                    "alertText": "请输入 HELLO"
                },
                //tls warning:homegrown not fielded
                "dateFormat": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/,
                    "alertText": "格式无效"
                },
                //tls warning:homegrown not fielded
                "dateTimeFormat": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/,
                    "alertText": "格式无效",
                    "alertText2": "可接受的格式： ",
                    "alertText3": "mm/dd/yyyy hh:mm:ss AM|PM 或 ",
                    "alertText4": "yyyy-mm-dd hh:mm:ss AM|PM"
                }
            };

        }
    };
    $.validationEngineLanguage.newLang();
})(jQuery);