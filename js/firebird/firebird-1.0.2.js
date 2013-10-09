/*!
 * The Firebird Javascript Lite Lib Red Star.
 *
 * http://www.firebird.com.cn
 *
 * editor lc
 * $Id: firebird-1.0.2.js 162 2013-09-16 07:42:14Z lc $
 *
 * based on baidu tangram 1.5.2.2
 * http://tangram.baidu.com
 */

/**
 * 框架主体
 * @type firebird
 */
var FB, firebird = FB = firebird || {
    version: "1.0.2",
    PERIOD: ".",
    debug: false,
    noop: function() {
    }
};
window.console = window.console || {
    log: function() {
        //        if(firebird.debug === false){
        //            return;
        //        }
        //        var args = Array.prototype.slice.call(arguments);
        //        if(!this.logElement){
        //            var logElement = document.createElement("textarea");
        //            document.insertBefore(logElement);
        //            this.logElement = logElement;
        //        }
        //        this.logElement.innerText = this.logElement.innerText + "\n INFO: " + args.join(", ");
    },
    group: function() {
    },
    groupEnd: function() {
    },
    time: function() {
    },
    timeEnd: function() {
    }
};
window.console.group = window.console.group || function() {
};
window.console.groupEnd = window.consolegroupEnd || function() {
};
window.console.time = window.console.time || function() {
};
window.console.timeEnd = window.console.timeEnd || function() {
};
/**
 * 日志
 * @returns {undefined}
 */
firebird.log = function() {
    if (firebird.debug === true) {
        window.console.log(Array.prototype.slice.call(arguments));
    }
};

/**
 * 命名空间
 * @function
 * @public
 * @returns {firebird}
 */
firebird.namespace = function() {
    var a = arguments, o, i = 0, j, d, arg;

    for (; i < a.length; i++) {
        o = this; //Reset base object per argument or it will get reused from the last
        arg = a[i];
        if (arg.indexOf(this.PERIOD) > -1) { //Skip this if no "." is present
            d = arg.split(this.PERIOD);
            for (j = (d[0] == 'firebird') ? 1 : 0; j < d.length; j++) {
                o[d[j]] = o[d[j]] || {};
                o = o[d[j]];
            }
        } else {
            o[arg] = o[arg] || {};
            o = o[arg]; //Reset base object to the new object so it's returned
        }
    }
    return o;
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace string///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作字符串的方法
 * @namespace firebird.string
 */
firebird.string = firebird.string || {};

/**
 * 删除目标字符串两端的空白字符
 * @name firebird.string.trim
 * @function
 * @grammar firebird.string.trim(source)
 * @param {string} source 目标字符串
 * @remark
 * 不支持删除单侧空白字符
 * @shortcut trim
 * @meta standard
 *
 * @returns {string} 删除两端空白字符后的字符串
 */
firebird.string.trim = function(source) {
    return String(source).replace(new RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+\x24)", "g"), "");
};

firebird.trim = firebird.string.trim;

/**
 * 获取目标字符串在gbk编码下的字节长度
 * @name firebird.string.byteLength
 * @function
 * @grammar firebird.string.byteLength(source)
 * @param {string} source 目标字符串
 * @remark
 * 获取字符在gbk编码下的字节长度, 实现原理是认为大于127的就一定是双字节。如果字符超出gbk编码范围, 则这个计算不准确
 * @meta standard
 * @see firebird.string.byteSubstr
 *
 * @returns {number} 字节长度
 */
firebird.string.byteLength = function(source) {
    return String(source).replace(/[^\x00-\xff]/g, "ci").length;
};

firebird.byteLength = firebird.string.byteLength;

/**
 * 对目标字符串按gbk编码截取字节长度
 * @name firebird.string.byteSubstr
 * @function
 * @grammar firebird.string.byteSubstr(source, length)
 * @param {string} source 目标字符串
 * @param {number} length 需要截取的字节长度
 * @param {string} [tail] 追加字符串,可选.
 * @remark
 * 截取过程中,遇到半个汉字时,向下取整。
 * @see firebird.string.byteLength
 *
 * @returns {string} 字符串截取结果
 */
firebird.string.byteSubstr = function(source, length, tail) {
    source = String(source);
    tail = tail || '';
    if (length < 0 || firebird.string.byteLength(source) <= length) {
        return source + tail;
    }

    source = source.substr(0, length).replace(/([^\x00-\xff])/g, "\x241 ")//双字节字符替换成两个
            .substr(0, length)//截取长度
            .replace(/[^\x00-\xff]$/, "")//去掉临界双字节字符
            .replace(/([^\x00-\xff]) /g, "\x241");//还原
    return source + tail;
};

firebird.byteSubstr = firebird.string.byteSubstr;

/**
 * 将目标字符串进行驼峰化处理
 * @name firebird.string.toCamelCase
 * @function
 * @grammar firebird.string.toCamelCase(source)
 * @param {string} source 目标字符串
 * @remark
 * 支持单词以“-_”分隔
 * @meta standard
 *
 * @return {string} 驼峰化处理后的字符串
 */
firebird.string.toCamel = function(source) {
    //提前判断,提高getStyle等的效率 thanks xianwei
    if (source.indexOf('-') < 0 && source.indexOf('_') < 0) {
        return source;
    }
    return source.replace(/[-_][^-_]/g, function(match) {
        return match.charAt(1).toUpperCase();
    });
};

firebird.toCamel = firebird.string.toCamel;

/**
 * 对目标字符串进行html解码
 * @name firebird.string.decodeHTML
 * @function
 * @grammar firebird.string.decodeHTML(source)
 * @param {string} source 目标字符串
 * @shortcut decodeHTML
 * @meta standard
 * @see firebird.string.encodeHTML
 *
 * @returns {string} html解码后的字符串
 */
firebird.string.decodeHTML = function(source) {
    var str = String(source)
            .replace(/&quot;/g, '"')
            .replace(/&lt;/g, '<')
            .replace(/&gt;/g, '>')
            .replace(/&amp;/g, "&");
    //处理转义的中文和实体字符
    return str.replace(/&#([\d]+);/g, function(_0, _1) {
        return String.fromCharCode(parseInt(_1, 10));
    });
};

firebird.decodeHTML = firebird.string.decodeHTML;

/**
 * 对目标字符串进行html编码
 * @name firebird.string.encodeHTML
 * @function
 * @grammar firebird.string.encodeHTML(source)
 * @param {string} source 目标字符串
 * @remark
 * 编码字符有5个:&<>"'
 * @shortcut encodeHTML
 * @meta standard
 * @see firebird.string.decodeHTML
 *
 * @returns {string} html编码后的字符串
 */
firebird.string.encodeHTML = function(source) {
    return String(source)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#39;");
};

firebird.encodeHTML = firebird.string.encodeHTML;

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace array////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * firebird.array
 */
firebird.array = firebird.array || {};

/**
 * 查询数组中指定元素的索引位置
 * @param {Array} source 需要查询的数组
 * @param {Any} match 查询项
 * @param {number} [fromIndex] 查询的起始位索引位置,如果为负数,则从source.length+fromIndex往后开始查找
 */
firebird.array.indexOf = function(source, match, fromIndex) {
    var len = source.length,
            iterator = match;

    fromIndex = fromIndex | 0;
    if (fromIndex < 0) {//小于0
        fromIndex = Math.max(0, len + fromIndex);
    }
    for (; fromIndex < len; fromIndex++) {
        if (fromIndex in source && source[fromIndex] === match) {
            return fromIndex;
        }
    }

    return -1;
};

/**
 * firebird.array.contains
 * 判断一个数组中是否包含给定元素
 * @param {Array} source 需要查询的数组
 * @param {Any} obj 查询项
 */
firebird.array.contains = function(source, obj) {
    return (firebird.array.indexOf(source, obj) >= 0);
};

/**
 * 过滤数组中的相同项。如果两个元素相同,会删除后一个元素。
 * @name firebird.array.unique
 * @function
 * @grammar firebird.array.unique(source[, compareFn])
 * @param {Array} source 需要过滤相同项的数组
 * @param {Function} [compareFn] 比较两个数组项是否相同的函数,两个数组项作为函数的参数。
 *
 * @returns {Array} 过滤后的新数组
 */
firebird.array.unique = function(source, compareFn) {
    var len = source.length,
            result = source.slice(0),
            i, datum;

    if ('function' !== typeof compareFn) {
        compareFn = function(item1, item2) {
            return item1 === item2;
        };
    }

    // 从后往前双重循环比较
    // 如果两个元素相同,删除后一个
    while (--len > 0) {
        datum = result[len];
        i = len;
        while (i--) {
            if (compareFn(datum, result[i])) {
                result.splice(len, 1);
                break;
            }
        }
    }

    return result;
};

/**
 * 将两个数组参数合并成一个类似hashMap结构的对象,这个对象使用第一个数组做为key,使用第二个数组做为值,如果第二个参数未指定,则把对象的所有值置为true。
 * @name firebird.array.hash
 * @function
 * @grammar firebird.array.hash(keys[, values])
 * @param {Array} keys 作为key的数组
 * @param {Array} [values] 作为value的数组,未指定此参数时,默认值将对象的值都设为true。
 *
 * @returns {Object} 合并后的对象{key : value}
 */
firebird.array.hash = function(keys, values) {
    var o = {}, vl = values && values.length, i = 0, l = keys.length;
    for (; i < l; i++) {
        o[keys[i]] = (vl && vl > i) ? values[i] : true;
    }
    return o;
};

/**
 * 移除数组中的项
 * @name firebird.array.remove
 * @function
 * @grammar firebird.array.remove(source, match)
 * @param {Array} source 需要移除项的数组
 * @param {Any} match 要移除的项
 * @meta standard
 * @see firebird.array.removeAt
 *
 * @returns {Array} 移除后的数组
 */
firebird.array.remove = function(source, match) {
    var len = source.length;

    while (len--) {
        if (len in source && source[len] === match) {
            source.splice(len, 1);
        }
    }
    return source;
};

/**
 * 遍历数组中所有元素,将每一个元素应用方法进行合并,并返回合并后的结果。
 * @name firebird.array.reduce
 * @function
 * @grammar firebird.array.reduce(source, iterator[, initializer])
 * @param {Array}    source 需要遍历的数组.
 * @param {Function} iterator 对每个数组元素进行处理的函数,函数接受四个参数:上一次reduce的结果(或初始值),当前元素值,索引值,整个数组.
 * @param {Object}   [initializer] 合并的初始项,如果没有此参数,默认用数组中的第一个值作为初始值.
 * @return {Array} reduce后的值.
 * @see firebird.array.reduce
 */
firebird.array.reduce = function(source, iterator, initializer) {
    var i = 0,
            l = source.length,
            found = 0;

    if (arguments.length < 3) {
        //没有initializer的情况,找到第一个可用的值
        for (; i < l; i++) {
            initializer = source[i++];
            found = 1;
            break;
        }
        if (!found) {
            return;
        }
    }

    for (; i < l; i++) {
        if (i in source) {
            initializer = iterator(initializer, source[i], i, source);
        }
    }
    return initializer;
};

/**
 * 遍历数组中所有元素,将每一个元素应用方法进行转换,并返回转换后的新数组。
 * @name firebird.array.map
 * @function
 * @grammar firebird.array.map(source, iterator[, thisObject])
 * @param {Array}    source   需要遍历的数组.
 * @param {Function} iterator 对每个数组元素进行处理的函数.
 * @param {Object} [thisObject] 函数调用时的this指针,如果没有此参数,默认是当前遍历的数组
 * @return {Array} map后的数组.
 * @see firebird.array.reduce
 */
firebird.array.map = function(source, iterator, thisObject) {
    var results = [],
            i = 0,
            l = source.length;
    for (; i < l; i++) {
        results[i] = iterator.call(thisObject || source, source[i], i);
    }
    return results;
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace cookie///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作cookie的方法
 * @namespace firebird.cookie
 */
firebird.cookie = firebird.cookie || {};

/**
 * 验证字符串是否合法的cookie键名
 *
 * @param {string} key 需要遍历的数组
 * @meta standard
 * @return {boolean} 是否合法的cookie键名
 */
firebird.cookie._isValidKey = function(key) {
    return (new RegExp("^[^\\x00-\\x20\\x7f\\(\\)<>@,;:\\\\\\\"\\[\\]\\?=\\{\\}\\/\\u0080-\\uffff]+\x24")).test(key);
};

/**
 * 设置cookie的值,不对值进行编码
 * @name firebird.cookie.setRaw
 * @function
 * @grammar firebird.cookie.setRaw(key, value[, options])
 * @param {string} key 需要设置Cookie的键名
 * @param {string} value 需要设置Cookie的值
 * @param {Object} [options] 设置Cookie的其他可选参数
 * @config {string} [path] cookie路径
 * @config {Date|number} [expires] cookie过期时间,如果类型是数字的话, 单位是毫秒
 * @config {string} [domain] cookie域名
 * @config {string} [secure] cookie是否安全传输
 * @remark
 *
 <b>options参数包括:</b><br>
 path:cookie路径<br>
 expires:cookie过期时间,Number型,单位为毫秒。<br>
 domain:cookie域名<br>
 secure:cookie是否安全传输

 * @meta standard
 * @see firebird.cookie.set,firebird.cookie.getRaw
 */
firebird.cookie.setRaw = function(key, value, options) {
    if (!firebird.cookie._isValidKey(key)) {
        return;
    }

    options = options || {};

    // 计算cookie过期时间
    var expires = options.expires;
    if ('number' === typeof options.expires) {
        expires = new Date();
        expires.setTime(expires.getTime() + options.expires);
    }

    document.cookie =
            key + "=" + value
            + (options.path ? "; path=" + options.path : "")
            + (expires ? "; expires=" + expires.toGMTString() : "")
            + (options.domain ? "; domain=" + options.domain : "")
            + (options.secure ? "; secure" : '');
};

/**
 * 设置cookie的值,用encodeURIComponent进行编码
 * @name firebird.cookie.set
 * @function
 * @grammar firebird.cookie.set(key, value[, options])
 * @param {string} key 需要设置Cookie的键名
 * @param {string} value 需要设置Cookie的值
 * @param {Object} [options] 设置Cookie的其他可选参数
 * @config {string} [path] cookie路径
 * @config {Date|number} [expires] cookie过期时间,如果类型是数字的话, 单位是毫秒
 * @config {string} [domain] cookie域名
 * @config {string} [secure] cookie是否安全传输
 * @remark
 *
 1. <b>注意:</b>该方法会对cookie值进行encodeURIComponent编码。如果想设置cookie源字符串,请使用setRaw方法。<br><br>
 2. <b>options参数包括:</b><br>
 path:cookie路径<br>
 expires:cookie过期时间,Number型,单位为毫秒。<br>
 domain:cookie域名<br>
 secure:cookie是否安全传输

 * @meta standard
 * @see firebird.cookie.setRaw,firebird.cookie.get
 */
firebird.cookie.set = function(key, value, options) {
    firebird.cookie.setRaw(key, encodeURIComponent(value), options);
};

/**
 * 获取cookie的值,不对值进行解码
 * @name firebird.cookie.getRaw
 * @function
 * @grammar firebird.cookie.getRaw(key)
 * @param {string} key 需要获取Cookie的键名
 * @meta standard
 * @see firebird.cookie.get,firebird.cookie.setRaw
 *
 * @returns {string|null} 获取的Cookie值,获取不到时返回null
 */
firebird.cookie.getRaw = function(key) {
    if (firebird.cookie._isValidKey(key)) {
        var reg = new RegExp("(^| )" + key + "=([^;]*)(;|\x24)"),
                result = reg.exec(document.cookie);

        if (result) {
            return result[2] || null;
        }
    }

    return null;
};

/**
 * 获取cookie的值,用decodeURIComponent进行解码
 * @name firebird.cookie.get
 * @function
 * @grammar firebird.cookie.get(key)
 * @param {string} key 需要获取Cookie的键名
 * @remark
 * <b>注意:</b>该方法会对cookie值进行decodeURIComponent解码。如果想获得cookie源字符串,请使用getRaw方法。
 * @meta standard
 * @see firebird.cookie.getRaw,firebird.cookie.set
 *
 * @returns {string|null} cookie的值,获取不到时返回null
 */
firebird.cookie.get = function(key) {
    var value = firebird.cookie.getRaw(key);
    if ('string' === typeof value) {
        value = decodeURIComponent(value);
        return value;
    }
    return null;
};

firebird.cookie.remove = function(key, options) {
    options = options || {};
    options.expires = new Date(0);
    firebird.cookie.setRaw(key, '', options);
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace date///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作日期的方法
 * @namespace firebird.date
 */
firebird.date = firebird.date || {};

/**
 * 获取当前时间戳
 * @return 时间戳
 */
firebird.date.now = function() {
    return (new Date()).getTime();
};
firebird.now = firebird.date.now;

/**
 * 将目标字符串转换成日期对象
 * @name firebird.date.parse
 * @function
 * @grammar firebird.date.parse(source)
 * @param {string} source 目标字符串
 * @remark
 *
 对于目标字符串,下面这些规则决定了 parse 方法能够成功地解析: <br>
 <ol>
 <li>短日期可以使用“/”或“-”作为日期分隔符,但是必须用月/日/年的格式来表示,例如"7/20/96"。</li>
 <li>以 "July 10 1995" 形式表示的长日期中的年、月、日可以按任何顺序排列,年份值可以用 2 位数字表示也可以用 4 位数字表示。如果使用 2 位数字来表示年份,那么该年份必须大于或等于 70。 </li>
 <li>括号中的任何文本都被视为注释。这些括号可以嵌套使用。 </li>
 <li>逗号和空格被视为分隔符。允许使用多个分隔符。 </li>
 <li>月和日的名称必须具有两个或两个以上的字符。如果两个字符所组成的名称不是独一无二的,那么该名称就被解析成最后一个符合条件的月或日。例如,"Ju" 被解释为七月而不是六月。 </li>
 <li>在所提供的日期中,如果所指定的星期几的值与按照该日期中剩余部分所确定的星期几的值不符合,那么该指定值就会被忽略。例如,尽管 1996 年 11 月 9 日实际上是星期五,"Tuesday November 9 1996" 也还是可以被接受并进行解析的。但是结果 date 对象中包含的是 "Friday November 9 1996"。 </li>
 <li>JScript 处理所有的标准时区,以及全球标准时间 (UTC) 和格林威治标准时间 (GMT)。</li>
 <li>小时、分钟、和秒钟之间用冒号分隔,尽管不是这三项都需要指明。"10:"、"10:11"、和 "10:11:12" 都是有效的。 </li>
 <li>如果使用 24 小时计时的时钟,那么为中午 12 点之后的时间指定 "PM" 是错误的。例如 "23:15 PM" 就是错误的。</li>
 <li>包含无效日期的字符串是错误的。例如,一个包含有两个年份或两个月份的字符串就是错误的。</li>
 </ol>

 *
 * @returns {Date} 转换后的日期对象
 */

firebird.date.parse = function(source) {
    var reg = new RegExp("^\\d+(\\-|\\/)\\d+(\\-|\\/)\\d+\x24");
    if ('string' === typeof source) {
        if (reg.test(source) || isNaN(Date.parse(source))) {
            var d = source.split(/ |T/),
                    d1 = d.length > 1
                    ? d[1].split(/[^\d]/)
                    : [0, 0, 0],
                    d0 = d[0].split(/[^\d]/);
            return new Date(d0[0] - 0,
                    d0[1] - 1,
                    d0[2] - 0,
                    d1[0] - 0,
                    d1[1] - 0,
                    d1[2] - 0);
        } else {
            return new Date(source);
        }
    }

    return new Date();
};

/**
 * 日期格式化函数
 * @param {Object} options 参数对象
 * <br>
 * options = {
 * date:"",
 * dateObj:"",
 * time:"",
 * format:""
 * }
 * @example options.format {Object} 格式化模板
 * {yyyy}   年份    4位         自1900开始      1900 -
 * {yyy}    年份    3位         自1900开始      0 -
 * {M}      月份                不自动补0       1 - 12
 * {MM}     月份                自动补0         01-12
 * {MMM}    月份    英文月份的缩写		Jan to Dec
 * {MMMM}   月份    英文月份的全称		January to December
 * {MC}     月      中文
 * {MCS}    月      中文 短
 * {dd}     日期    自动补0
 * {D}      日期    不自动补0       01 - 31
 * {HH}     小时    01 - 23
 * {H}      小时    1 - 23
 * {mm}     分钟    00 - 59
 * {m}      分钟    1 - 59
 * {ss}     秒      00 - 59
 * {s}      秒      0 - 59
 * {w}      星期    星期天到六的索引	0 - 6
 * {DD}     星期    星期天到六英文全称 	Sunday - Saturday
 * {D}      星期    星期天到六英文缩写 	Sun - Sat
 * {DCL}    星期    中文 长
 * {DC}     星期    中文
 * {DCS}    星期    中文 短
 * 以下内容
 * firebird.date.format({time: new Date, format: "yyyy|yyy, M|MM|MMM|MMMM|MC|MCS, dd|D, HH|H, mm|m, ss|s, w, DD|D|DCL|DC|DCS"})
 * 将返回
 * "2012|112, 7|07|Jul|July|七月|七, 13|Fri, 10|10, 56|56, 27|27, 5, Friday|Fri|星期六|周六|六"
 */
firebird.date.format = function(options) {

    options = options || {};

    var defaults = {
        date: null,
        dateObj: null,
        time: null,
        format: "yyyy-MM-dd"
    };

    var opts = firebird.extend(defaults, options);
    if (opts.date === null && opts.dateObj === null && opts.time === null) {
        return "";
    }

    var $date = null;

    if (opts.date !== null) {
        $date = firebird.date.parse(opts.date);
    }

    if (opts.time !== null) {
        $date = new Date();
        $date.setTime(opts.time);
    }

    if (opts.dateObj !== null) {
        $date = new Date();
        if (!opts.dateObj.time) {
            return "";
        }
        $date.setTime(opts.dateObj.time);
    }

    if (!($date instanceof Date)) {
        return "";
    }

    var $week = ("Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday").split("_");
    var $weekShort = ("Sun_Mon_Tue_Wed_Thu_Fri_Sat").split("_");

    var $weekChineseLong = ("星期日,星期一,星期二,星期三,星期四,星期五,星期六").split(",");
    var $weekChinese = ("周日,周一,周二,周三,周四,周五,周六").split(",");
    var $weekChineseShort = ("日,一,二,三,四,五,六").split(",");

    var $month = ("January,February,March,April,May,June,July,August,September,October,November,December").split(",");
    var $monthShort = ("Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec").split(",");

    var $monthChinese = ("一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月").split(",");
    var $monthChineseShort = ("一,二,三,四,五,六,七,八,九,十,十一,十二").split(",");

    var $fmt = {
        yyyy: $date.getFullYear().toString(),
        yyy: $date.getYear().toString(),
        //	月份	不自动补0			1 - 12
        M: ($date.getMonth() + 1).toString(),
        //	月份	自动补0				01-12
        MM: firebird.number.pad(($date.getMonth() + 1), 2),
        //	月份	英文月份的缩写		Jan to Dec
        MMM: $monthShort[$date.getMonth()],
        //	月份	英文月份的全称		January to December
        MMMM: $month[$date.getMonth()],
        //	月 中文
        MC: $monthChinese[$date.getMonth()],
        //	月 中文 短
        MCS: $monthChineseShort[$date.getMonth()],
        //	日期	自动补0
        dd: firebird.number.pad($date.getDate(), 2),
        //	日期	不自动补0				01 - 31
        d: $date.getDate().toString(),
        //	小时	01 - 23
        HH: firebird.number.pad($date.getHours(), 2),
        //	小时	1 - 23
        H: $date.getHours().toString(),
        //	分钟	00 - 59
        mm: firebird.number.pad($date.getMinutes(), 2),
        //	分钟	1 - 59
        m: $date.getMinutes().toString(),
        //	秒		00 - 59
        ss: firebird.number.pad($date.getSeconds(), 2),
        //	秒		0 - 59
        s: $date.getSeconds().toString(),
        //	星期	星期天到六的索引	0 - 6
        w: $date.getDay().toString(),
        //	星期	星期天到六英文全称 	Sunday - Saturday
        DD: $week[$date.getDay()],
        //	星期	星期天到六英文缩写 	Sun - Sat
        D: $weekShort[$date.getDay()],
        //	星期 中文 长
        DCL: $weekChineseLong[$date.getDay()],
        //	星期 中文
        DC: $weekChinese[$date.getDay()],
        //	星期 中文 短
        DCS: $weekChineseShort[$date.getDay()]
    };

    var tmp = opts.format;
    if (firebird.trim(tmp) === "") {
        return "";
    }

    return tmp.replace(/yyyy/g, $fmt.yyyy)
            .replace(/yyy/g, $fmt.yyy)
            .replace(/MMMM/g, $fmt.MMMM)
            .replace(/MMM/g, $fmt.MMM)
            .replace(/MM/g, $fmt.MM)
            .replace(/MC/g, $fmt.MC)
            .replace(/MCS/g, $fmt.MCS)
            .replace(/M/g, $fmt.M)
            .replace(/dd/g, $fmt.dd)
            .replace(/d/g, $fmt.d)
            .replace(/HH/g, $fmt.HH)
            .replace(/H/g, $fmt.H)
            .replace(/mm/g, $fmt.mm)
            .replace(/m/g, $fmt.m)
            .replace(/ss/g, $fmt.ss)
            .replace(/s/g, $fmt.s)
            .replace(/w/g, $fmt.w)
            .replace(/DD/g, $fmt.DD)
            .replace(/DCL/g, $fmt.DCL)
            .replace(/DCS/g, $fmt.DCS)
            .replace(/DC/g, $fmt.DC)
            .replace(/D/g, $fmt.D);
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace object///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作原生对象的方法
 * @namespace firebird.object
 */
firebird.object = firebird.object || {};

/**
 * 将源对象的所有属性拷贝到目标对象中
 * @name firebird.object.extend
 * @function
 * @grammar firebird.object.extend(target, source)
 * @param {Object} target 目标对象
 * @param {Object} source 源对象
 * @see firebird.array.merge
 * @remark
 *
 1.目标对象中,与源对象key相同的成员将会被覆盖。<br>
 2.源对象的prototype成员不会拷贝。

 * @shortcut extend
 * @meta standard
 *
 * @returns {Object} 目标对象
 */
firebird.object.extend = function(target, source) {
    for (var p in source) {
        if (source.hasOwnProperty(p)) {
            target[p] = source[p];
        }
    }

    return target;
};

firebird.extend = firebird.object.extend;

/**
 * 获取目标对象的键名列表
 * @name firebird.object.keys
 * @function
 * @grammar firebird.object.keys(source)
 * @param {Object} source 目标对象
 * @see firebird.object.values
 *
 * @returns {Array} 键名列表
 */
firebird.object.keys = function(source) {
    var result = [], resultLen = 0, k;
    for (k in source) {
        if (source.hasOwnProperty(k)) {
            result[resultLen++] = k;
        }
    }
    return result;
};

/**
 * 获取目标对象的值列表
 * @name firebird.object.values
 * @function
 * @grammar firebird.object.values(source)
 * @param {Object} source 目标对象
 * @see firebird.object.keys
 *
 * @returns {Array} 值列表
 */
firebird.object.values = function(source) {
    var result = [], resultLen = 0, k;
    for (k in source) {
        if (source.hasOwnProperty(k)) {
            result[resultLen++] = source[k];
        }
    }
    return result;
};

/**
 * 遍历Object中所有元素
 * @name firebird.object.each
 * @function
 * @grammar firebird.object.each(source, iterator)
 * @param {Object} source 需要遍历的Object
 * @param {Function} iterator 对每个Object元素进行调用的函数,function (item, key)
 *
 * @returns {Object} 遍历的Object
 */
firebird.object.each = function(source, iterator) {
    var returnValue, key, item;
    if ('function' === typeof iterator) {
        for (key in source) {
            if (source.hasOwnProperty(key)) {
                item = source[key];
                returnValue = iterator.call(source, item, key);

                if (returnValue === false) {
                    break;
                }
            }
        }
    }
    return source;
};

/**
 * 遍历object中所有元素,将每一个元素应用方法进行转换,返回转换后的新object。
 * @name firebird.object.map
 * @function
 * @grammar firebird.object.map(source, iterator)
 *
 * @param 	{Array}    source   需要遍历的object
 * @param 	{Function} iterator 对每个object元素进行处理的函数
 * @return 	{Array} 			map后的object
 */
firebird.object.map = function(source, iterator) {
    var results = {};
    for (var key in source) {
        if (source.hasOwnProperty(key)) {
            results[key] = iterator(source[key], key);
        }
    }
    return results;
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace number///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作number的方法
 * @namespace firebird.number
 */
firebird.number = firebird.number || {};

/**
 * 为目标数字添加逗号分隔
 * @name firebird.number.encomma
 * @function
 * @grammar firebird.number.encomma(source[, length])
 * @param {number} source 需要处理的数字
 * @param {number} [length] 两次逗号之间的数字位数,默认为3位
 *
 * @returns {string} 添加逗号分隔后的字符串
 */
firebird.number.encomma = function(source, length) {
    if (!length || length < 1) {
        length = 3;
    }

    source = String(source).split(".");
    source[0] = source[0].replace(new RegExp('(\\d)(?=(\\d{' + length + '})+$)', 'ig'), "$1,");
    return source.join(".");
};

/**
 * 去除数字的逗号分隔符
 * @param {String} source 需要处理的文字
 */
firebird.number.decomma = function(source) {
    return source.toString().replace(/\,|\./g, "");
};

/**
 * 对目标数字进行0补齐处理
 * @name firebird.number.pad
 * @function
 * @grammar firebird.number.pad(source, length)
 * @param {number} source 需要处理的数字
 * @param {number} length 需要输出的长度
 *
 * @returns {string} 对目标数字进行0补齐处理后的结果
 */
firebird.number.pad = function(source, length) {
    var pre = "",
            negative = (source < 0),
            string = String(Math.abs(source));

    if (string.length < length) {
        pre = (new Array(length - string.length + 1)).join('0');
    }

    return (negative ? "-" : "") + pre + string;
};

/**
 * 生成随机整数,范围是[min, max]
 * @name firebird.number.random
 * @function
 * @grammar firebird.number.random(min, max)
 *
 * @param 	{number} min 	随机整数的最小值
 * @param 	{number} max 	随机整数的最大值
 * @return 	{number} 		生成的随机整数
 */
firebird.number.random = function(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace url//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 操作url的方法
 * @namespace firebird.url
 */
firebird.url = firebird.url || {};

/**
 * 解析目标URL中的参数成json对象
 * @name firebird.url.parse
 * @function
 * @grammar firebird.url.parse(url)
 * @param {string} url 目标URL
 * @see firebird.url.jsonToQuery
 *
 * @returns {Object} - 解析为结果对象,其中URI编码后的字符不会被解码,'a=%20' ==> {a:'%20'}。
 */
firebird.url.parse = function(url) {
    url = url || location.href;
    var query = url.substr(url.lastIndexOf('?') + 1),
            params = query.split('&'),
            len = params.length,
            result = {},
            i = 0,
            key, value, item, param;

    for (; i < len; i++) {
        if (!params[i]) {
            continue;
        }
        param = params[i].split('=');
        key = param[0];
        value = param[1];

        item = result[key];
        if ('undefined' === typeof item) {
            result[key] = value;
        } else if (firebird.lang.isArray(item)) {
            item.push(value);
        } else { // 这里只可能是string了
            result[key] = [item, value];
        }
    }

    return result;
};

/**
 * 根据参数名从目标URL中获取参数值
 * @name firebird.url.getParameter
 * @function
 * @grammar firebird.url.getQueryValue(key, url)
 * @param {string} key 要获取的参数名
 * @param {string} url 目标URL
 * @meta standard
 * @see firebird.url.jsonToQuery
 *
 * @returns {string|null} - 获取的参数值,其中URI编码后的字符不会被解码,获取不到时返回null
 */
firebird.url.getParameter = function(key, url) {
    url = url || location.href;
    var reg = new RegExp(
            "(^|&|\\?|#)"
            + key
            + "=([^&#]*)(&|\x24|#)",
            "");
    var match = url.match(reg);
    if (match) {
        return match[2];
    }

    return null;
};

/**
 * 对字符串进行%#&+=以及和\s匹配的所有字符进行url转义
 * @name firebird.url.escape
 * @function
 * @grammar firebird.url.escape(source)
 * @param {string} source 需要转义的字符串.
 * @return {string} 转义之后的字符串.
 * @remark
 * 用于get请求转义。在服务器只接受gbk,并且页面是gbk编码时,可以经过本转义后直接发get请求。
 *
 * @return {string} 转义后的字符串
 */
firebird.url.escape = function(source) {
    return String(source).replace(/[#%&+=\/\\\ \ \f\r\n\t]/g, function(all) {
        return '%' + (0x100 + all.charCodeAt()).toString(16).substring(1).toUpperCase();
    });
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace platform/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 判断平台类型和特性的属性
 * @namespace firebird.platform
 */
firebird.platform = firebird.platform || {};

/**
 * 判断是否为android平台
 * @property android 是否为android平台
 * @grammar firebird.platform.android
 * @meta standard
 * @see firebird.platform.x11,firebird.platform.windows,firebird.platform.macintosh,firebird.platform.iphone,firebird.platform.ipad
 * @return {Boolean} 布尔值
 */
firebird.platform.isAndroid = /android/i.test(navigator.userAgent);

/**
 * 判断是否为iphone平台
 * @property iphone 是否为iphone平台
 * @grammar firebird.platform.iphone
 * @meta standard
 * @see firebird.platform.x11,firebird.platform.windows,firebird.platform.macintosh,firebird.platform.ipad,firebird.platform.android
 * @return {Boolean} 布尔值
 */
firebird.platform.isIphone = /iphone/i.test(navigator.userAgent);

/**
 * 判断是否为x11平台
 * @property x11 是否为x11平台
 * @grammar firebird.platform.x11
 * @meta standard
 * @see firebird.platform.windows,firebird.platform.macintosh,firebird.platform.iphone,firebird.platform.ipad,firebird.platform.android
 * @return {Boolean} 布尔值
 */
firebird.platform.isX11 = /x11/i.test(navigator.userAgent);

/**
 * 判断是否为macintosh平台
 * @property macintosh 是否为macintosh平台
 * @grammar firebird.platform.macintosh
 * @meta standard
 * @see firebird.platform.x11,firebird.platform.windows,firebird.platform.iphone,firebird.platform.ipad,firebird.platform.android
 * @return {Boolean} 布尔值
 */
firebird.platform.isMac = /macintosh/i.test(navigator.userAgent);

/**
 * 判断是否为windows平台
 * @property windows 是否为windows平台
 * @grammar firebird.platform.windows
 * @meta standard
 * @see firebird.platform.x11,firebird.platform.macintosh,firebird.platform.iphone,firebird.platform.ipad,firebird.platform.android
 * @return {Boolean} 布尔值
 */
firebird.platform.isWindows = /windows/i.test(navigator.userAgent);

/**
 * 判断是否为x11平台
 * @property x11 是否为x11平台
 * @grammar firebird.platform.x11
 * @meta standard
 * @see firebird.platform.windows,firebird.platform.macintosh,firebird.platform.iphone,firebird.platform.ipad,firebird.platform.android
 * @return {Boolean} 布尔值
 */
firebird.platform.isX11 = /x11/i.test(navigator.userAgent);

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace lang/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 对语言层面的封装,类型判断的支持。
 * @namespace firebird.lang
 */
firebird.lang = firebird.lang || {};

/**
 * uuid
 */
firebird.uuid = firebird.lang.uuid = 1E8;

/**
 * 判断目标参数是否Array对象
 * @name firebird.lang.isArray
 * @function
 * @grammar firebird.lang.isArray(source)
 * @param {Any} source 目标参数
 * @meta standard
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isElement,firebird.lang.isBoolean,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isArray = function(source) {
    return '[object Array]' === Object.prototype.toString.call(source);
};


/**
 * 判断目标参数是否Boolean对象
 * @name firebird.lang.isBoolean
 * @function
 * @grammar firebird.lang.isBoolean(source)
 * @param {Any} source 目标参数
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isElement,firebird.lang.isArray,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isBoolean = function(source) {
    return typeof source === 'boolean';
};


/**
 * 判断目标参数是否为Date对象
 * @name firebird.lang.isDate
 * @function
 * @grammar firebird.lang.isDate(source)
 * @param {Any} source 目标参数
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isArray,firebird.lang.isBoolean,firebird.lang.isElement
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isDate = function(source) {
    // return o instanceof Date;
    return Object.toString.call(source) === "[object Date]" && source.toString() !== 'Invalid Date' && !isNaN(source);
};

/**
 * 判断目标参数是否为Element对象
 * @name firebird.lang.isElement
 * @function
 * @grammar firebird.lang.isElement(source)
 * @param {Any} source 目标参数
 * @meta standard
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isArray,firebird.lang.isBoolean,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isElement = function(source) {
    return !!(source && source.nodeName && source.nodeType == 1);
};

/**
 * 判断目标参数是否为function或Function实例
 * @name firebird.lang.isFunction
 * @function
 * @grammar firebird.lang.isFunction(source)
 * @param {Any} source 目标参数
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isArray,firebird.lang.isElement,firebird.lang.isBoolean,firebird.lang.isDate
 * @meta standard
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isFunction = function(source) {
    // chrome下,'function' == typeof /a/ 为true.
    return '[object Function]' === Object.prototype.toString.call(source);
};
/**
 * 判断目标参数是否number类型或Number对象
 * @name firebird.lang.isNumber
 * @function
 * @grammar firebird.lang.isNumber(source)
 * @param {Any} source 目标参数
 * @meta standard
 * @see firebird.lang.isString,firebird.lang.isObject,firebird.lang.isArray,firebird.lang.isElement,firebird.lang.isBoolean,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 * @remark 用本函数判断NaN会返回false,尽管在Javascript中是Number类型。
 */
firebird.lang.isNumber = function(source) {
    return '[object Number]' === Object.prototype.toString.call(source) && isFinite(source);
};

/**
 * 判断目标参数是否为Object对象
 * @name firebird.lang.isObject
 * @function
 * @grammar firebird.lang.isObject(source)
 * @param {Any} source 目标参数
 * @shortcut isObject
 * @meta standard
 * @see firebird.lang.isString,firebird.lang.isNumber,firebird.lang.isArray,firebird.lang.isElement,firebird.lang.isBoolean,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isObject = function(source) {
    return 'function' === typeof source || !!(source && 'object' === typeof source);
};

/**
 * 判断目标参数是否string类型或String对象
 * @name firebird.lang.isString
 * @function
 * @grammar firebird.lang.isString(source)
 * @param {Any} source 目标参数
 * @shortcut isString
 * @meta standard
 * @see firebird.lang.isObject,firebird.lang.isNumber,firebird.lang.isArray,firebird.lang.isElement,firebird.lang.isBoolean,firebird.lang.isDate
 *
 * @returns {boolean} 类型判断结果
 */
firebird.lang.isString = function(source) {
    return '[object String]' === Object.prototype.toString.call(source);
};

/**
 * 将一个变量转换成array
 * @name firebird.lang.toArray
 * @function
 * @grammar firebird.lang.toArray(source)
 * @param {mix} source 需要转换成array的变量
 * @meta standard
 * @returns {array} 转换后的array
 */
firebird.lang.toArray = function(source) {
    if (source === null || source === undefined)
        return [];
    if (firebird.lang.isArray(source))
        return source;

    // The strings and functions also have 'length'
    if (typeof source.length !== 'number' || typeof source === 'string' || firebird.lang.isFunction(source)) {
        return [source];
    }

    //nodeList, IE 下调用 [].slice.call(nodeList) 会报错
    if (source.item) {
        var l = source.length, array = new Array(l);
        while (l--)
            array[l] = source[l];
        return array;
    }

    return [].slice.call(source);
};

/**
 * 定义快捷方法
 */
firebird.isArray = firebird.lang.isArray;
firebird.isBoolean = firebird.lang.isBoolean;
firebird.isDate = firebird.lang.isDate;
firebird.isElement = firebird.lang.isElement;
firebird.isFunction = firebird.lang.isFunction;
firebird.isNumber = firebird.lang.isNumber;
firebird.isObject = firebird.lang.isObject;
firebird.isString = firebird.lang.isString;
firebird.toArray = firebird.lang.toArray;

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace browser//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 判断浏览器类型和特性的属性
 * @namespace firebird.browser
 */
firebird.browser = firebird.browser || {};

/**
 * 判断是否为ie浏览器
 * @see !-[1,] 这个在正美站上发现的
 * @name firebird.browser.ie
 * @field
 * @grammar firebird.browser.ie
 * @returns {Number} IE版本号
 */
firebird.browser.ie = firebird.ie = /msie (\d+\.\d+)/i.test(navigator.userAgent) ? (document.documentMode || +RegExp['\x241']) : undefined;

/**
 * 判断是否为firefox浏览器
 * @property firefox firefox版本号
 * @grammar firebird.browser.firefox
 * @meta standard
 * @see firebird.browser.ie,firebird.browser.safari,firebird.browser.opera,firebird.browser.chrome
 * @return {Number} firefox版本号
 */
firebird.browser.firefox = /firefox\/(\d+\.\d+)/i.test(navigator.userAgent) ? +RegExp['\x241'] : undefined;

/**
 * 判断是否为chrome浏览器
 * @grammar firebird.browser.chrome
 * @see firebird.browser.ie,firebird.browser.firefox,firebird.browser.safari,firebird.browser.opera
 * @property chrome chrome版本号
 * @return {Number} chrome版本号
 */
firebird.browser.chrome = /chrome\/(\d+\.\d+)/i.test(navigator.userAgent) ? +RegExp['\x241'] : undefined;

/**
 * 判断是否为gecko内核
 * @property isGecko
 * @grammar firebird.browser.isGecko
 * @meta standard
 * @see firebird.browser.isWebkit
 * @returns {Boolean} 布尔值
 */
firebird.browser.isGecko = /gecko/i.test(navigator.userAgent) && !/like gecko/i.test(navigator.userAgent);

/**
 * 判断是否严格标准的渲染模式
 * @property isStrict
 * @grammar firebird.browser.isStrict
 * @meta standard
 * @returns {Boolean} 布尔值
 */
firebird.browser.isStrict = document.compatMode === "CSS1Compat";

/**
 * 判断是否为webkit内核
 * @property isWebkit
 * @grammar firebird.browser.isWebkit
 * @meta standard
 * @see firebird.browser.isGecko
 * @returns {Boolean} 布尔值
 */
firebird.browser.isWebkit = /webkit/i.test(navigator.userAgent);


try {
    if (/(\d+\.\d+)/.test(external.max_version)) {
        /**
         * 判断是否为maxthon浏览器
         * @property maxthon maxthon版本号
         * @grammar firebird.browser.maxthon
         * @see firebird.browser.ie
         * @returns {Number} maxthon版本号
         */
        firebird.browser.maxthon = +RegExp['\x241'];
    }
} catch (e) {
}

/**
 * 判断是否为opera浏览器
 * @property opera opera版本号
 * @grammar firebird.browser.opera
 * @meta standard
 * @see firebird.browser.ie,firebird.browser.firefox,firebird.browser.safari,firebird.browser.chrome
 * @returns {Number} opera版本号
 */

/**
 * opera 从10开始不是用opera后面的字符串进行版本的判断
 * 在Browser identification最后添加Version + 数字进行版本标识
 * opera后面的数字保持在9.80不变
 */
firebird.browser.opera = /opera(\/| )(\d+(\.\d+)?)(.+?(version\/(\d+(\.\d+)?)))?/i.test(navigator.userAgent) ? +(RegExp["\x246"] || RegExp["\x242"]) : undefined;

/**
 * 判断是否为safari浏览器, 支持ipad
 * @property safari safari版本号
 * @grammar firebird.browser.safari
 * @meta standard
 * @see firebird.browser.ie,firebird.browser.firefox,firebird.browser.opera,firebird.browser.chrome
 */
firebird.browser.safari = /(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(navigator.userAgent) && !/chrome/i.test(navigator.userAgent) ? +(RegExp['\x241'] || RegExp['\x242']) : undefined;

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace history//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 提供对浏览器处理浏览历史的功能
 * @namespace firebird.history
 */
firebird.history = firebird.history || {};

/**
 * 通过hash值的来记录页面的状态
 * 通过js改变hash的时候,浏览器会增加历史记录,并且执行回调函数
 * @name firebird.history.listen
 * @function
 * @grammar firebird.history.listen(callback)
 * @param {Function} callBack hash值变更时的回调函数.
 */
(function() {

    /**
     * 当前hash值,用来判断hash变化
     */
    var _curHash;

    /**
     * hash变化时的回调函数
     */
    var _callbackFun;
    var _frame;

    /**
     * 用于IE更新iframe的hash值
     * @private
     * @param {String} hash
     */
    function _addHistory(hash) {
        var fdoc = _frame.contentWindow.document;
        hash = hash || '#';

        //通过open方法触发frame的onload
        fdoc.open();
        fdoc.write('\<script\>window.top.location.hash="' + hash + '";\</script\>');
        fdoc.close();
        fdoc.location.hash = hash;
    }

    /**
     * 执行回调函数并改边hash值
     * @private
     */
    function _hashChangeCallBack() {

        _callbackFun && _callbackFun();
        //设置当前的hash值,防止轮询再次监听到hash变化
        _curHash = (window.location.hash.replace(/^#/, '') || '');

        firebird.log("@private _hashChangeCallBack>>", _curHash);
    }

    /**
     * 判断hash是否变化
     * @private
     */
    function _checkHash() {

        var hash = location.hash.replace(/^#/, '');
        firebird.log("@private _checkHash", hash, _curHash);
        if (hash !== _curHash) {
            //如果frame存在通过frame的onload事件来触发回调方法,如果不存在直接执行回调函数
            _frame ? _addHistory(hash) : _hashChangeCallBack();
        }
    }

    function listen(callBack) {
        _curHash = ('');
        if (callBack)
            _callbackFun = callBack;
        firebird.log("@private listen", _curHash);

        if (firebird.browser.ie) {

            //IE下通过创建frame来增加history
            _frame = document.createElement('iframe');
            _frame.style.display = 'none';
            document.body.appendChild(_frame);

            _addHistory(window.location.hash);
            //通过frame的onload事件触发回调函数
            _frame.attachEvent('onload', function() {
                _hashChangeCallBack();
            });
            setInterval(_checkHash, 100);

        } else if (firebird.browser.firefox < 3.6) {
            //ff3.5以下版本hash变化会自动增加历史记录,只需轮询监听hash变化调用回调函数
            setInterval(_checkHash, 100);
            firebird.log("@private listen >> firefox");
        } else {

            if (_curHash !== location.hash.replace(/^#/, ''))
                _curHash = (window.location.hash.replace(/^#/, '') || '');

            //ff3.6 chrome safari oprea11通过onhashchange实现
            window.onhashchange = _hashChangeCallBack;
            firebird.log("firebird.history.listen>>>", _curHash, location.hash.replace(/^#/, ''));
        }
    }

    firebird.history.listen = listen;
})();


////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace json/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * @namespace firebird.json
 * @type type
 */
firebird.json = firebird.json || {};

/**
 * 将字符串解析成json对象。注:不会自动祛除空格
 * @name firebird.json.parse
 * @function
 * @grammar firebird.json.parse(data)
 * @param {string} data 需要解析的字符串
 * @remark
 * 该方法的实现与ecma-262第五版中规定的JSON.parse不同,暂时只支持传入一个参数。后续会进行功能丰富。
 * @meta standard
 * @see firebird.json.stringify,firebird.json.decode
 *
 * @returns {JSON} 解析结果json对象
 */
firebird.json.parse = function(data) {
    return (new Function("return (" + data + ")"))();
};


/**
 * 将字符串解析成json对象,为过时接口,今后会被firebird.json.parse代替
 * @name firebird.json.decode
 * @function
 * @grammar firebird.json.decode(source)
 * @param {string} source 需要解析的字符串
 * @meta out
 * @see firebird.json.encode,firebird.json.parse
 *
 * @returns {JSON} 解析结果json对象
 */
firebird.json.decode = firebird.json.parse;

/**
 * 将json对象序列化
 * @name firebird.json.stringify
 * @function
 * @grammar firebird.json.stringify(value)
 * @remark
 * 该方法的实现与ecma-262第五版中规定的JSON.stringify不同,暂时只支持传入一个参数。后续会进行功能丰富。
 * @meta standard
 * @see firebird.json.parse,firebird.json.encode
 *
 * @returns {string} 序列化后的字符串
 */
firebird.json.stringify = (function() {
    /**
     * 字符串处理时需要转义的字符表
     * @private
     */
    var escapeMap = {
        "\b": '\\b',
        "\t": '\\t',
        "\n": '\\n',
        "\f": '\\f',
        "\r": '\\r',
        '"': '\\"',
        "\\": '\\\\'
    };

    /**
     * 字符串序列化
     * @private
     * @param {String} source
     */
    function encodeString(source) {
        if (/["\\\x00-\x1f]/.test(source)) {
            source = source.replace(
                    /["\\\x00-\x1f]/g,
                    function(match) {
                        var c = escapeMap[match];
                        if (c) {
                            return c;
                        }
                        c = match.charCodeAt();
                        return "\\u00"
                                + Math.floor(c / 16).toString(16)
                                + (c % 16).toString(16);
                    });
        }
        return '"' + source + '"';
    }

    /**
     * 数组序列化
     * @private
     * @param {String} source
     */
    function encodeArray(source) {
        var result = ["["],
                l = source.length,
                preComma, i, item;

        for (i = 0; i < l; i++) {
            item = source[i];

            switch (typeof item) {
                case "undefined":
                case "function":
                case "unknown":
                    break;
                default:
                    if (preComma) {
                        result.push(',');
                    }
                    result.push(firebird.json.stringify(item));
                    preComma = 1;
            }
        }
        result.push("]");
        return result.join("");
    }

    /**
     * 处理日期序列化时的补零
     * @private
     * @param {String} source
     */
    function pad(source) {
        return source < 10 ? '0' + source : source;
    }

    /**
     * 日期序列化
     * @private
     * @param {String} source
     */
    function encodeDate(source) {
        return '"' + source.getFullYear() + "-"
                + pad(source.getMonth() + 1) + "-"
                + pad(source.getDate()) + "T"
                + pad(source.getHours()) + ":"
                + pad(source.getMinutes()) + ":"
                + pad(source.getSeconds()) + '"';
    }

    return function(value) {
        switch (typeof value) {
            case 'undefined':
                return 'undefined';

            case 'number':
                return isFinite(value) ? String(value) : "null";

            case 'string':
                return encodeString(value);

            case 'boolean':
                return String(value);

            default:
                if (value === null) {
                    return 'null';
                } else if (value instanceof Array) {
                    return encodeArray(value);
                } else if (value instanceof Date) {
                    return encodeDate(value);
                } else {
                    var result = ['{'],
                            encode = firebird.json.stringify,
                            preComma,
                            item;

                    for (var key in value) {
                        if (Object.prototype.hasOwnProperty.call(value, key)) {
                            item = value[key];
                            switch (typeof item) {
                                case 'undefined':
                                case 'unknown':
                                case 'function':
                                    break;
                                default:
                                    if (preComma) {
                                        result.push(',');
                                    }
                                    preComma = 1;
                                    result.push(encode(key) + ':' + encode(item));
                            }
                        }
                    }
                    result.push('}');
                    return result.join('');
                }
        }
    };
})();


/**
 * 将json对象序列化,为过时接口,今后会被firebird.json.stringify代替
 * @name firebird.json.encode
 * @function
 * @grammar firebird.json.encode(value)
 * @param {JSON} value 需要序列化的json对象
 * @meta out
 * @see firebird.json.decode,firebird.json.stringify
 *
 * @returns {string} 序列化后的字符串
 */
firebird.json.encode = firebird.json.stringify;


firebird.forEach = function(enumerable, iterator, context) {
    var i, n, t;
    if (typeof iterator == "function" && enumerable) {
        // Array or ArrayLike or NodeList or String
        if (typeof enumerable.length == "number") {
            for (i = 0, n = enumerable.length; i < n; i++) {
                t = enumerable[ i ] || (enumerable.charAt && enumerable.charAt(i));
                // 被循环执行的函数，默认会传入三个参数(array[i], i, array)
                iterator.call(context || null, t, i, enumerable);
            }
            // enumerable is number
        } else if (typeof enumerable == "number") {
            for (i = 0; i < enumerable; i++) {
                iterator.call(context || null, i, i, i);
            }
            // enumerable is json
        } else if (typeof enumerable == "object") {
            for (i in enumerable) {
                if (enumerable.hasOwnProperty(i)) {
                    iterator.call(context || null, enumerable[ i ], i, enumerable);
                }
            }
        }
    }
    return enumerable;
};

/**
 * 返回类型
 * @type Object
 * @function
 * @example
 * var huhu = "a beautiful jiangshu man";
 * alert(firebird.type(huhu));
 * // string
 */
firebird.type = (function() {
    var objectType = {},
            nodeType = [, "HTMLElement", "Attribute", "Text", , , , , "Comment", "Document", , "DocumentFragment", ],
            str = "Array Boolean Date Error Function Number RegExp String",
            toString = objectType.toString;

    // 给 objectType 集合赋值，建立映射
    firebird.forEach(str.split(" "), function(name) {
        objectType[ "[object " + name + "]" ] = name.toLowerCase();

        firebird[ "is" + name ] = function(unknow) {
            return firebird.type(unknow) == name.toLowerCase();
        };
    });

    // 方法主体
    return function(unknow) {
        var s = typeof unknow;

        return s != "object" ? s
                : unknow == null ? "null"
                : unknow._type_
                || objectType[ toString.call(unknow) ]
                || nodeType[ unknow.nodeType ]
                || (unknow == unknow.window ? "Window" : "")
                || "object";
    };
})();

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace data/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 提供数据缓存功能
 * @namespace firebird.data
 */
firebird.data = firebird.data || {};

/**
 * 跨框架数据共享接口
 * @param {String} key 存储的数据名
 * @param {Everything} value 将要存储的任意数据
 * @return {Everything} 返回被存储的数据
 * @example firebird.data.set("dsw", {id:"dsw", name: "daishaowei", sex: "male"});
 */
firebird.data.set = function(key, value) {
    var top = window.top,
            cache = top['$FIREBIRD_CACHE$'] || {};
    top['$FIREBIRD_CACHE$'] = cache;

    return cache[key] = value;
};

/**
 * 跨框架数据共享接口
 * @param {String} key 存储的数据名
 * @return {Everything} 返回被查询的数据
 * @example firebird.data.get("dsw");
 */
firebird.data.get = function(key) {
    var top = window.top,
            cache = top['$FIREBIRD_CACHE$'] || {};
    top['$FIREBIRD_CACHE$'] = cache;

    return cache[key];
};

/**
 * 数据共享删除接口
 * @param {String} key 删除的数据名
 * @example firebird.data.remove("dsw");
 */
firebird.data.remove = function(key) {
    var cache = window.top['$FIREBIRD_CACHE$'];
    if (cache && cache[key])
        delete cache[key];
};

/**
 * 数据共享清除接口
 *
 * @example
 * step1:
 * firebird.data.set("key1", "value1");
 * firebird.data.set("key2", "value2");
 * firebird.log("key1 is d%, key2 is d%", firebird.data.set("key1"), firebird.data.set("key2"));
 * step2:
 * firebird.data.clear();
 * firebird.log(firebird.log("key1 is d%, key2 is d%", firebird.data.set("key1"), firebird.data.set("key2")););
 */
firebird.data.clear = function() {
    window.top['$FIREBIRD_CACHE$'] = {};
};

/**
 * 跨框架数据共享接口
 * @return {Object} 返回被查询的数据
 * @example firebird.data.getAll();
 */
firebird.data.getAll = function() {
    var top = window.top,
            cache = top['$FIREBIRD_CACHE$'] || {};
    top['$FIREBIRD_CACHE$'] = cache;
    return cache;
};

firebird.lsdata = firebird.lsdata || {};

/**
 * 跨框架数据共享接口
 * @param {String} key 存储的数据名
 * @param {Everything} value 将要存储的任意数据
 * @return {Everything} 返回被存储的数据
 * @example firebird.data.set("dsw", {id:"dsw", name: "daishaowei", sex: "male"});
 */
firebird.lsdata.set = function(key, value) {
    localStorage.setItem(key, value);
    return value;
};

/**
 * 跨框架数据共享接口
 * @param {String} key 存储的数据名
 * @return {Everything} 返回被查询的数据
 * @example firebird.data.get("dsw");
 */
firebird.lsdata.get = function(key) {
    return localStorage.setItem(key);
};

/**
 * 数据共享删除接口
 * @param {String} key 删除的数据名
 * @example firebird.data.remove("dsw");
 */
firebird.lsdata.remove = function(key) {
    localStorage.removeItem(key);
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace loader///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 动态加载资源
 * @namespace firebird.loader
 * @type type
 */
firebird.loader = firebird.loader || {};

/**
 * 动态加载CSS方法
 * @param {type} url
 * @param {type} callback
 * @returns {undefined}
 * @example firebird.loader.css("http://www.firebird.cn/index.css", function(){ doSth(); });
 */
firebird.loader.css = function(url, callback) {

    var head = document.getElementsByTagName("HEAD")[0];
    var link = document.createElement("link");
    link.type = "text/css";
    link.rel = "stylesheet";
    link.href = url += (url.indexOf('?') > 0 ? '&' : '?');

    head.insertBefore(link, head.firstChild);

    if (callback)
        callback();
};

/**
 * 动态加载js方法
 *
 * @param {type} url
 * @param {type} callback
 * @returns {undefined}
 * @example firebird.loader.js("http://www.firebird.cn/index.js", function(){ doSth(); });
 */
firebird.loader.js = function(url, success, error) {

    var head = document.getElementsByTagName("HEAD")[0];

    var script = document.createElement("script");
    script.src = url += (url.indexOf('?') > 0 ? '&' : '?') + "_timestamp=" + ~new Date;
    script.charset = "utf-8";
    script.async = false;

    head.insertBefore(script, head.firstChild);

    script.onload = script.onreadystatechange = function() {
        if ((!this.readyState) || this.readyState === "loaded" || this.readyState === "complete") {
            //if(!head.done[name]){
            //firebird.log("script>> load fail1");
            //head.removeChild(script);
            //}
            success && success();
        }
    };
    script.onerror = function() {
        script.onload = script.onerror = error && error(script) || undefined;
        head.removeChild(script);
    };
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace api//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 应用通信
 * @namespace firebird.api
 * @type type
 */
firebird.api = firebird.api || {
    proxy: ""
};

/**
 * 获取应用对象
 * @param {type} message
 * @returns {undefined}
 */
firebird.api.getApp = function(message) {

};

/**
 * 获取应用窗口
 * @param {type} message
 * @returns {undefined}
 */
firebird.api.getAppWindow = function(message) {

};

/**
 * 在平台中获取来自app的消息
 * @param {type} message
 * @returns {unresolved}
 */
firebird.api.message = function(message) {

    if (firebird.api.proxy === "") {
        firebird.log("firebird.api.proxy is undefined");
        return;
    }

    firebird.api.send("message", {
        message: message
    });
};

/**
 * 在平台中打开来自app的弹出申请窗口
 * @param {type} options
 * @returns {unresolved}
 */
firebird.api.dialog = function(options) {

    if (firebird.api.proxy === "") {
        firebird.log("firebird.api.proxy is undefined");
        return;
    }

    firebird.api.send("dialog", options);
};

/**
 * 跨域发送数据
 * 数据总长度不能操过2000(ie)
 * @param {String} type api回调类型
 * @param {Any} options 任意数据,方法
 * @returns {unresolved}
 */
firebird.api.send = function(type, options) {

    var id = "proxy_" + new Date().getTime();
    var obj = {
        proxy: id,
        type: type,
        data: options
    };

    var hash = encodeURIComponent(firebird.json.encode(obj));
    var src = firebird.api.proxy + "#" + hash;

    if (firebird.ie && src.length > 2000) {
        firebird.log("firebird.api.proxy: Message Body Is Too Large.");
        return;
    }

    var iframe = document.createElement("iframe");
    iframe.src = src;
    iframe.name = iframe.id = obj.proxy;
    iframe.style.display = "none";

    document.body.insertBefore(iframe);

    firebird.log("proxy>>> ", firebird.api.proxy + "#" + hash);
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace form/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 表单操作
 * @type type
 * @namespace firebird.form
 */
firebird.form = firebird.form || {};

/**
 * 表单填充
 * @param {String} name 提交到后台的对象名
 * @param {Array[Object]|Object} data 表单数据
 * @param {Object} render 数据渲染器
 * @return {String}
 * @requires firebird.forEach
 * @example
 * var list = [{id: 1, value: "1"}, {id: 2, value: "2"}, {id: 3, value: "3"}];
 * var inputs = firebird.form.arrayToInput("fundingList", list, {
 * value: function(v){
 * v = "value_" + v;
 * return v;
 * }
 * });
 * firebird.log(inputs);
 */
firebird.form.arrayToInput = function(name, data, render) {
    var isArray = firebird.isArray(data);
    var input = [];
    if (isArray) {
        $.each(data, function(i, n) {
            for (var key in n) {
                input.push("<input type='hidden' name='" + name + "[" + i + "]." + key + "' value='" + (render && render[key] ? render[key](n[key], n, this) : n[key]) + "' />\n");
            }
        });
    } else {
        $.each(data, function(key, v) {
            var superName = name === "" ? "" : name + ".";
            input.push("<input type='hidden' name='" + superName + key + "' value='" + (render && render[key] ? render[key](v, data, this) : v) + "' />\n");
        });
    }
    return input.join("");
};

/**
 * 对象数组序列化
 * @param {String} name 提交到后台的对象名
 * @param {Array[Object]} data 表单数据
 * @param {Object} render 数据渲染器
 * @return 表单
 * @requires firebird.forEach
 */
firebird.form.arraySerialize = function(name, data, render) {
    if (typeof name !== "string") {
        return {};
    }
    var serialize = {};
    $.each(data, function(i, n) {
        for (var key in n) {
            serialize[name + "[" + i + "]." + key] = render && render[key] ? render[key](n[key], n, this) : n[key];
        }
    });
    return serialize;
};

/**
 *
 * @param {type} _iid
 * @returns {unresolved}
 */
firebird.form.post = function(_iid) {
    var me = this;
    var poster = firebird.data.get(_iid);
    if (poster === null) {
        return;
    }
    var seq = new Date() - 0;
    var target = poster.target ? poster.target : "";
    var inputs = typeof(poster.data) == "function" ? me.arrayToInput(poster.name||"", poster.list||{}, post.render||{}) : poster.data;
    var iframe = $("<iframe id='seq_iframe_" + seq + "' name='seq_iframe_" + seq + "' src='about:blank' style='display: none'></iframe>").appendTo("body");
    var form = $("<form method='post' id='seq_form_" + seq + "' name='seq_form_" + seq + "' target='seq_iframe_'" + seq + "' style='display: none'></form>").append(inputs).appendTo("body");

    poster.complete = poster.complete || function() {
        iframe.remove();
        form.remove();
    };

    switch (target) {
        case "_blank":
            form.attr("target", "_blank");
            iframe.remove();
            break;
        case "windowOpen":
            window.setTimeout(function() {
                var win = window.open('', '_blank', 'Width=' + (screen.width) + ',Height=' + (screen.height - 50) + ',Left=0,Top=0,status=yes,menubar=no,location=no,scrollbars=no,resizable=yes,status=no');
                win.name = "seq_iframe_" + seq;
                iframe.remove();
            }, 0);
            break;
    }
    form.attr({
        action: poster.url
    }).submit();
};

/**
 * 表单验证
 *
 * @example
 */
firebird.form.validate = function() {
    return;
};


////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace seal/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * 签章
 * @namespace firebird.seal
 * @author lc
 * @example
 * // 定义签章服务器
 * firebird.seal.host = "http://192.168.1.254:8888/";
 * firebird.seal.load({
 *  top: $("#sealDiv").offset().top,
 *  left: $("#sealDiv").offset().left + 10,
 *  height: 80,
 *  width: 80,
 *  SignatureID: sigId,
 *  error: function(type, message, errors) {
 *      // 关于此处异常参数，见 firebird.seal api
 *      alert(type&&type=="message"?message:errors.join(", "));
 *      $("#sealDiv").html("签章载入失败");
 *      },
 *  success: function(sealElement, controller, options) {
 *      dosth();
 *      }
 * });
 *
 * @see firebird.seal.create
 * @see firebird.seal.load
 */
firebird.seal = firebird.seal || {};
/**
 * 当前上下文中存在的印章对象
 * @type Object
 * @public
 */
firebird.seal.list = {};
/**
 * 汇信印章服务器地址，一般为域名
 * @type String
 * @see firebird.seal.server
 * @example firebird.seal.host = "http://192.168.1.168/";
 */
firebird.seal.host = "";
/**
 * 印章控制对象
 * 原 objImpl 对象
 * @type HTMLObjectElement
 * @public
 */
firebird.seal.controller = {};
/**
 * 默认签章参数
 * @type function
 */
firebird.seal.defaults = firebird.seal.defaults || {
    /**
     * @property {Array} errors 错误列表
     * @type Array
     */
    errors: [],
    /**
     * @property {String} namespace 签章控制器名称
     * @type String
     */
    namespace: "hxseal",
    /**
     * @property {Number} top 相对于0,0的高度位移
     * @type Number
     */
    top: 0,
    /**
     * @property {Number} name 相对于0,0的高度位移
     * @type Number
     */
    left: 0,
    /**
     * @property {Number} name description
     * @type Number
     */
    height: 161,
    /**
     * @property {Number} name description
     * @type Number
     */
    width: 161,
    /**
     * @property {String} name description
     * @type String
     */
    position: "absolute",
    /**
     * 签章内容
     * @property {String} content 签章内容，一般为md5摘要
     * @type String
     */
    content: "",
    /**
     * 企业名称
     * @property {String} content 企业名称
     * @type String
     */
    entName: "",
    /**
     * 印章元素属性id
     * @property {String} content 印章元素属性id
     * @type String
     */
    id: "",
    /**
     * 企业名称
     * @property {String} content 企业名称
     * @type String
     */
    className: "",
    /**
     * 企业名称
     * @property {String} content 企业名称
     * @type String
     */
    classid: "clsid:3C78C8A9-AF7C-4430-A332-21A2D59F9AEA",
    /**
     * 企业名称
     * @property {String} content 企业名称
     * @type String
     */
    codeBase: "http://202.75.221.19/update/e7/hxseal.cab#1,0,1,3",
    /**
     * 企业名称
     * @property {String} content 企业名称
     * @type String
     */
    strEnterpriseName: "",
    /**
     * 签章id
     * @property {String} content 签章id
     * @type String
     */
    SignatureID: "",
    /**
     * 签章证书
     * @property {String} content 签章证书
     * @type String
     */
    SignatureCert: "",
    /**
     * 签章值
     * @property {String} content 签章值
     * @type String
     */
    iGetSignData: "",
    /**
     * 成功回调
     * 签章id: sealElement.SignatureID
     * 签章证书: sealElement.SignatureCert
     * 签名值: sealElement.iGetSignData()
     * @augments sealElement, controller, options
     * @property {Function} success 成功回调
     * @function
     *
     */
    success: firebird.noop,
    /**
     * @augments type, message, errors
     * @type @exp;firebirdnoop
     */
    error: firebird.noop,
    /**
     * 控制器创建回调
     * @type Function
     * @function
     * @property {Function} onControllerInit 控制器创建回调
     */
    onControllerInit: firebird.noop,
    /**
     * 签章初始化回调
     * @property {Function} onSealInit 签章初始化回调
     * @type Function
     */
    onSealInit: firebird.noop,
    /**
     * 签章创建回调
     * @property {Function} onSealCreate 签章创建回调
     * @type Function
     */
    onSealCreate: firebird.noop,
    /**
     * 签章创建成功回调
     * @property {Function} onSealCreateComplete 签章创建成功回调
     * @type Function
     */
    onSealCreateComplete: firebird.noop
};


/**
 * 签章接口
 * @type Object
 */
firebird.seal.server = {
    UploadSignInfoUrl: "/tseal/external/localSignedAction.do",
    RemoteSignUrl: "/tseal/external/remoteSignedAction.do",
    DownloadSignInfoUrl: "/tseal/external/getSignedInfoAction.do",
    DownloadSignCertUrl: "/tseal/external/getSignedCertAction.do",
    DownloadSignImgUrl: "/tseal/external/getSignedImgAction.do",
    RemoteVerifyUrl: "/tseal/external/checkSignInfoAction.do",
    DownloadUserInfoUrl: "/tseal/external/getCertuserSealAction.do",
    DownloadThumbnailUrl: "/tseal/external/seal-rest.do?",
    LockUrl: "/tseal/external/LockDocumentAction.do",
    UnLockUrl: "/tseal/external/getLockPasswordAction.do"
};

/**
 * 签章事件
 * @type Object
 * @see firebird.seal.event
 */
firebird.seal.events = {
    /**
     * 创建印章事件
     */
    OnPreCreateSealElement: "create",
    OnElementResize: "resize",
    OnRemoteVerifyEnd: "verify",
    OnRemoteVerifyError: "verifyError",
    OnSignEnd: "sign",
    OnElementDelete: "remove"
};

/**
 * 签章事件回调
 * @type Object
 * @see firebird.seal.events
 */
firebird.seal.event = {
    /**
     *
     * @param {type} options
     * @returns {unresolved}
     */
    create: function(options) {
        var sealElement = document.createElement("object");
        sealElement.setAttribute("classid", "clsid:3C78C8A9-AF7C-4430-A332-21A2D59F9AEA");
        sealElement.style.position = options.position;
        sealElement.style.top = parseInt(options.top, 10) + "px";
        sealElement.style.left = parseInt(options.left, 10) + "px";
        sealElement.style.width = parseInt(options.width, 10) + "px";
        sealElement.style.height = parseInt(options.height, 10) + "px";
        try {
            var controller = firebird.seal.define(options.namespace);
            document.body.appendChild(sealElement);
            controller.iShieldNotify(0);
            controller.iInitControl(sealElement, sealElement);
            controller.iFillControl(sealElement, sealElement);
            if (!firebird.seal.list[options.namespace]) {
                firebird.seal.list[options.namespace] = [];
            }
            sealElement.signId = sealElement.SignatureID;

            firebird.seal.list[options.namespace].push({
                options: options,
                seal: sealElement
            });
            /**
             * 签章id: sealElement.SignatureID
             * 签章证书: sealElement.SignatureCert
             * 签名值: sealElement.iGetSignData()
             */
            options.success(sealElement, controller, options);
        } catch (e) {
            options.error("message", e.message);
        }
    },
    /**
     * 重置大小
     * @returns {undefined}
     */
    resize: function() {
    },
    /**
     * 校验
     * @returns {undefined}
     */
    verify: function() {
    },
    /**
     * 校验错误
     * @returns {undefined}
     */
    verifyError: function() {
    },
    /**
     * 签名
     * @returns {undefined}
     */
    sign: function() {
    },
    /**
     * 移除
     * @returns {undefined}
     */
    remove: function() {
    },
    /**
     * 设置宽度
     * @param {HTMLObjectElement} seal
     * @param {int} val
     */
    width: function(seal, val) {
        if (!val) {
            seal.style.width = parseInt(val) + "px";
        }
        return parseInt(seal.style.width, 10);
    },
    /**
     * 设置高度
     * @param {HTMLObjectElement} seal
     * @param {type} val
     */
    height: function(seal, val) {
        if (!val) {
            seal.style.height = parseInt(val) + "px";
        }
        return parseInt(seal.style.height, 10);
    },
    /**
     * 位移
     * @param {HTMLObjectElement } seal
     * @param {Object} offset
     * @returns {firebird.seal.defaults.offset.Anonym$2}
     */
    offset: function(seal, offset) {
        if (!offset) {
            seal.style.top = parseInt(offset.top || 0) + "px";
            seal.style.left = parseInt(offset.left || 0) + "px";
        }
        return {
            top: parseInt(seal.style.top, 10),
            left: parseInt(seal.style.left, 10)
        };
    }
};

/**
 * 自定义印章控制器
 * <object id="test" classid="CLSID:8040AA3B-40EC-4038-8EE1-1A1D6198FDE2" width="0" height="0" sealurl="aaa" ></object>
 * @private
 * @param {String} namespace 控制器命名空间
 * @param {string|HTMLObjectElement} controller 控制器命名空间
 * @param {String} callback 控制器命名空间
 */
firebird.seal.define = function(namespace, controller, callback) {
    if (namespace in this.controller) {
        if (callback)
            callback(this);
        return this.controller[namespace];
    }
    // 获取
    var controllerElement = firebird.isString(controller) ? document.getElementById(controller) : controller;
    if (!controllerElement) {
        controllerElement = document.createElement("object");
        controllerElement.id = namespace;
        controllerElement.style.display = "none";
        controllerElement.setAttribute("classid", "CLSID:8040AA3B-40EC-4038-8EE1-1A1D6198FDE2");
        document.body.appendChild(controllerElement);
    }
    this.controller[namespace] = controllerElement;

    if (callback)
        callback(this);
    return this.controller[namespace];
};

/**
 * 初始化签章控制器
 * @function
 * @private
 * @param {Object} options
 * @return controller
 */
firebird.seal.init = function(options) {
    options.errors = [];
    var _seal = this;
    // 1.检测场景
    if (!firebird.ie || !options.namespace || _seal.host.replace(/ /g, "") === "") {
        options.errors.push("message", "FIREBIRD Seal Environment Error.");
        return null;
    }
    if (options.namespace in this.controller) {
        return this.controller[options.namespace];
    }
    /**
     * @type Element
     */
    var controller = this.define(options.namespace, options.namespace);
    // 2.检测控制器加载
    try {
        // 初始化控制器
        controller.iInitialize();
        // 配置控制器服务路径
        firebird.object.each(_seal.server, function(v, k) {
            controller[k] = _seal.host + "" + v;
        });

        // 3.控制器事件绑定
        controller.attachEvent("OnPreCreateSealElement", function() {
            _seal.event.create(options);
        });

        // 0 为初始化成功
        if (0 !== controller.iIsInitialized()) {
            options.errors.push("message", "FIREBIRD Seal Controller Is Not Initialized.");
            return null;
        }

    } catch (e) {
        options.error("message", "FIREBIRD Seal Controller Initialize Error.", options.errors);
    }

    // 4.返回控制器
    return this.controller[options.namespace];
};

/**
 * 签章错误
 * @private
 * @function
 * @param {Object} controller
 */
firebird.seal.error = function(controller) {
    var ex = {
        cus: 0,
        sys: 0
    };
    try {
        ex.cus = controller.iErrorCode(0);
        ex.sys = controller.iErrorCode(1);
    } catch (e) {
    }

    return ex;
};

/**
 * 创建图章
 * @param {Object} settings
 * @public
 * @function
 * @example firebird.seal.create({
 * qymc: "浙江汇信科技有限公司",
 * content: "37e83dea02e0b6d557a2612a960b31af", // md5
 * error: function(){
 * dosth();
 * },
 * success: function(){
 * dosth();
 * }
 * });
 * @see /yearcheck/../sign.jsp
 */
firebird.seal.create = function(settings) {
    var _seal = this;
    // 合并印章渲染参数
    var options = firebird.extend(this.defaults, settings);
    options.signId = (options.signId || options.SignatureID || "").toString();
    if (options.signId.replace(/ /g, "") !== "") {
        this.load(settings);
        return;
    }
    var controller = null;
    try {
        controller = _seal.init(options);
        if (controller === null) {
            options.errors.push("message", "FIREBIRD Seal Controller Is Not Defined.");
            return;
        }
    } catch (e) {
        options.error("error", e.message, options.errors);
        return;
    }

    //try {

    if (options.entName.length === 0) {
        controller.iSealSign(options.content, "MaskContent", 0, 0);
    } else {
        controller.iSealSignEx(options.entName, 0, options.content, "MaskContent", 0, 0);
    }
    //alert(1);
    //} catch (e) {
    //options.error("error", _seal.error(controller), options.errors);
    //return;
    //}
};

/**
 * 载入图章
 * @public
 * @function
 * @param {Object} settings
 */
firebird.seal.load = function(settings) {
    var _seal = this;
    // 合并印章渲染参数
    var options = firebird.extend(this.defaults, settings);
    if (!options.signId || options.signId.toString().replace(/ /g, "") === "") {
        options.error("message", "FIREBIRD Seal signId Is Not Defined.", options.errors);
        return;
    }
    var controller = null;
    try {
        controller = _seal.init(options);
        if (controller === null) {
            options.error("message", "FIREBIRD Seal Controller Is Not Defined.", options.errors);
            return;
        }
    } catch (e) {
        options.error("error", e.message, options.errors);
        return;
    }

    try {
        controller.iLoadHtmlSeal(options.signId, 2759, 0, 0);
    } catch (e) {
        options.error("error", _seal.error(controller), options.errors);
        return;
    }
};

////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////namespace cert/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * 汇信安全控件
 * @namespace firebird.cert
 */
firebird.cert = firebird.cert || {
    version: "1.0.1",
    host: "",
    ra: "",
    i18n: "zh-cn",
    defaults: {
        errors: [],
        support: "1;3",
        namespace: "HX_CERT",
        controller: null,
        nbxh: "",
        randCode: "",
        myKey: "",
        keytype: "",
        keysn: "",
        data: {},
        timeout: 30000,
        onGetKeyCount: function() {
            return true;
        },
        onGetCertCount: function() {
            return true;
        },
        onBeforeFormat: function() {
            return true;
        },
        onFormat: firebird.noop(),
        onAfterFormat: firebird.noop(),
        onInit: firebird.noop(),
        success: firebird.noop(),
        error: firebird.noop()
    },
    ERR: {
        render: function(id, param) {
            var _cert = firebird.cert;
            var str = this[_cert.i18n] && this[_cert.i18n][id] && this[_cert.i18n][id];
            if (typeof param === "undefined") {
                return str;
            }
            if (!firebird.isObject(param) || !firebird.isArray(param)) {
                str = str.replace(new RegExp("\\{0\\}", "gi"), param);
            }
            if (firebird.isObject(param)) {
                firebird.object.each(param, function(n, i) {
                    str = str.replace(new RegExp("\\{" + i + "\\}", "gi"), n);
                });
            }
            if (firebird.isArray(param)) {
                firebird.array.map(param, function(n, i) {
                    str = str.replace(new RegExp("\\{" + i + "\\}", "gi"), n);
                });
            }
            return str;
        },
        "en-us": {
            1: "FIREBIRD Cert Environment Error.",
            2: "FIREBIRD Cert Key SetSupportKeyTypes({0}) Error.",
            3: "FIREBIRD Cert Key Count({0}) Error.",
            4: "FIREBIRD Cert Controller Initialize Error.",
            5: "FIREBIRD Cert Controller Is Not Defined.",
            6: "FIREBIRD Cert Get Ra Server Error When KeyType Is {0}.",
            7: "FIREBIRD Cert Format Error(rastate is {0}).",
            8: "FIREBIRD Cert Format Error.",
            9: "FIREBIRD Cert Host Is Not Defined.",
            10: "FIREBIRD Cert jQuery Is Not Defined.",
            11: "FIREBIRD Cert CertCount({0}) Over 1 Is Not Allowed, Please Format Key First.",
            12: "FIREBIRD Cert Ra Error ({0} {1} {2}).",
            13: "FIREBIRD Cert Create Error.",
            14: "FIREBIRD Cert Can Not Caught Key Info Error.",
            15: "FIREBIRD Cert Can Not Caught Key Serial Number Error."
        },
        "zh-cn": {
            1: "汇信安全控件环境检测失败。",
            2: "汇信安全控件设置key类型({0})异常。",
            3: "汇信安全控件检测key数量({0})异常。",
            4: "汇信安全控件初始化失败。",
            5: "汇信安全控件无法获取。",
            6: "汇信安全控件没有定义RA请求地址在Key类型为{0}时。",
            7: "汇信安全控件格式化失败(RA状态码为{0})。",
            8: "汇信安全控件格式化失败",
            9: "汇信安全控件制证失败，证书处理服务地址没有配置。",
            10: "汇信安全控件制证失败，没有jQuery环境。",
            11: "汇信安全控件制证失败，Key内有{0}张以上证书是不允许的，请先执行格式化。",
            12: "汇信安全控件制证失败，RA返回了错误{0} {1} {2}。",
            13: "汇信安全控件制证失败。",
            14: "汇信安全控件制证失败，无法获取Key信息，可能是用户取消了操作。",
            15: "汇信安全控件制证失败，无法获取Key序列号。"
        }
    },
    event: {
        onCreateZJCARequest: firebird.noop,
        onCreatePKCS10request: firebird.noop,
        onInstallPKCS7X509Cert: firebird.noop,
        onInstallPfxCert: firebird.noop,
        /**
         * 设置Key类型
         */
        onSetKeyTypes: firebird.noop,
        /**
         * 获取Key数量
         */
        onGetKeyCount: firebird.noop,
        /**
         * 获取证书数量
         */
        onGetCertCount: firebird.noop,
        /**
         * 获取最新的证书
         */
        onGetLastCert: firebird.noop,
        /**
         * 获取Key类型
         */
        onGetKeyType: firebird.noop,
        /**
         * 获取sn
         */
        onGetSn: firebird.noop,
        /**
         * 获取key信息
         */
        onGetKeyInfo: firebird.noop,
        /**
         * 获取CSP列表
         */
        onGetGetCspList: firebird.noop,
        /**
         * 获取最后的错误
         */
        onGetErr: firebird.noop,
        /**
         * 格式化
         */
        onFormatKey: firebird.noop,
        /**
         * 解锁
         */
        onUnLockey: firebird.noop,
        /**
         * 制证
         */
        onCreateZJCACert: firebird.noop
    }
};

/**
 * CLSID:1DECBA92-5007-4A94-BDF7-BC4B553D3BCB
 * @param {type} namespace
 * @returns {unresolved}
 */
firebird.cert.define = function(namespace) {
    if (!this.controller) {
        var controllerElement = document.createElement("object");
        controllerElement.id = namespace;
        controllerElement.style.display = "none";
        controllerElement.setAttribute("classid", "CLSID:1DECBA92-5007-4A94-BDF7-BC4B553D3BCB");
        document.body.insertBefore(controllerElement);
        this.controller = controllerElement;
    }
    return this.controller;
};

/**
 *
 * @param {type} options
 * @returns {unresolved}
 */
firebird.cert.init = function(options) {
    options.errors = [];
    var _cert = this;

    // 1.检测场景
    if (!firebird.ie || !options.namespace) {
        options.errors.push(_cert.ERR.render(1));
        return null;
    }
    /**
     * @type Element
     */
    this.controller = this.define(options.namespace);

    // 2.检测控制器加载
    try {
        // 设置 支持的KEY类型
        var setSupportKeyTypes = _cert.setKeyTypes(_cert.controller, options.support);
        if (setSupportKeyTypes != 0) {
            options.errors.push(_cert.ERR.render(2, setSupportKeyTypes));
            return;
        }
        //检测KEY数量，如果不等于1，抛异常
        var keyCount = _cert.controller.GetKeyCount();
        // 检测KEY数量
        if (options.onGetKeyCount(keyCount, _cert) == false) {
            return;
        }
        if (keyCount != 1) {
            options.errors.push(_cert.ERR.render(3, keyCount));
            return;
        }

    } catch (e) {
        options.errors.push(_cert.ERR.render(4));
    }
    options.onInit(this.controller);
    // 4.返回控制器
    return this.controller;
};

/**
 * 生成符合浙江CA要求的证书请求
 * 如果是格尔key则生成CMP请求，如果是非格尔key，如飞天等新key则生成P10请求
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return 返回生成的证书请求，如果为空则失败，否则成功
 */
firebird.cert.createZJCARequest = function(controller) {
    var req = controller ? controller.CreateZJCACertRequest() : this.controller.CreateZJCACertRequest();
    this.event.onCreateZJCARequest(req);
    return req;
};

/**
 * 获取当前类型Key里面证书个数
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return key里面证书个数,小于0，表示出错
 */
firebird.cert.getCertCount = function(controller) {
    var req = controller ? controller.GetCertCountInKey() : this.controller.GetCertCountInKey();
    this.event.onGetCertCount(req);
    return req;
};

/**
 * 安装ZJCA返回的请求
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param  cert 返回的请求。如果是非握奇key双证书签名证书和加密证书一块传入，并以分号隔开
 * @return {int} 0成功，其他失败
 */
firebird.cert.createZJCACert = function(controller, cert) {
    var req = controller ? controller.InstallZJCACert(cert) : this.controller.InstallZJCACert(cert);
    this.event.onCreateZJCACert(req);
    return req;
};

/**
 * 设置支持的key类别，可以多种。此函数一般为最先调用，以后的其他的操作都限制在此函数确认的范围内，如果没有调用，则默认支持所有类型
 * @param {String} types 支持的key类型列表，以分号隔开，最后不要用分号结尾，如果是空就支持所有类型
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return 0成功，负值失败
 * @example
 * <b>USBkey类型代号<b/>
 * 0 缺省类型，为支持微软CSP的key
 * 1 蓝色格尔握奇key
 * 2 飞天3003auto
 * 3 e照通飞天KEY
 * 4 中钞
 * 5 海泰
 * 6 IE软证书
 * 7 ZJCA飞天KEY
 */
firebird.cert.setKeyTypes = function(controller, types) {
    var req = controller ? controller.SetSupportKeyTypes(types) : this.controller.SetSupportKeyTypes(types);
    this.event.onSetKeyTypes(req, types);
    return req;
};

/**
 * 得到目前插入的指定类型的key的个数，key的初始化也在其中<br>
 * <b>注意</b><br>
 * 此函数应该在SetSupportKeyTypes后其他key操作函数前调用。因为其中包含了key的初始化。虽然很多操作都会默认操作此函数，但是强烈推荐首先调用一下。
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return key的个数，小于0出错
 * @example
 * var keyCount = firebird.cert.getKeyCount(controller);
 * alert(keyCount);
 */
firebird.cert.getKeyCount = function(controller) {
    var req = controller ? controller.GetKeyCount() : this.controller.GetKeyCount();
    this.onGetKeyCount(req);
    return req;
};

/**
 * 获取当前key中最新的证书内容，如果存在多个key，返回空值
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param certType 最新证书的类型：0–所有类型。1–签名，2–加密
 * @return 最新证书内容,xml格式，如果存在多个key，返回空值
 */
firebird.cert.getLastCert = function(controller, certType) {
    var req = controller ? controller.GetNewestCertInKey(certType) : this.controller.GetNewestCertInKey(certType);
    this.event.onGetLastCert(req);
    return req;
};

/**
 * 得到最后一次操作的出错信息，如果没有出错返回值内容不确定，可能是上次的错误值，因为目前没有清空功能
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return {String} 最后一次操作的信息
 */
firebird.cert.getErr = function(controller) {
    var req = controller ? controller.GetHxLastErrInfo() : this.controller.GetHxLastErrInfo();
    this.event.onGetErr(req);
    return req;
};

/**
 * 使用微软的CAPI生成p10证书请求，保存成base64
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return p10证书请求的内容，空字符串表示失败
 */
firebird.cert.createPKCS10request = function(controller) {
    var req = controller ? controller.CreatePKCS10requestByCAPI() : this.controller.CreatePKCS10requestByCAPI();
    this.event.onCreatePKCS10request(req);
    return req;
};

/**
 * 安装p10请求返回的PKCS7、X509公钥证书
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param cert PKCS7、X509公钥证书
 * @return 0–成功，负值为失败,-8888为没有实现
 */
firebird.cert.installPKCS7X509Cert = function(controller, cert) {
    var req = controller ? controller.InstallPKCS7X509CertByCAPI(cert) : this.controller.InstallPKCS7X509CertByCAPI(cert);
    this.event.onInstallPKCS7X509Cert(req);
    return req;
};

/**
 * 安装pfx证书。本接口一般用来安装加密证书
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param {String} cert pfx证书
 * @param {String} password pfx证书密码
 * @return 0–成功，负值为失败,-8888为没有实现
 */
firebird.cert.installPfxCert = function(controller, cert, password) {
    var req = controller ? controller.InstallPfxCertByCAPI(cert, password) : this.controller.InstallPfxCertByCAPI(cert, password);
    this.event.onInstallPfxCert(req);
    return req;
};

/**
 * 获取当前类型Key的类型号，类型号宏定义见HxConfig.h文件
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return key的类型号,小于0，表示出错
 */
firebird.cert.getKeyType = function(controller) {
    var req = controller ? controller.GetCurKeyType() : this.controller.GetCurKeyType();
    this.event.onGetKeyType(req);
    return req;
};

/**
 * 获取当前类型Key的硬件序列号，如果多个key，返回空值
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return key的序列号，如果多个key，返回空值
 */
firebird.cert.getSn = function(controller) {
    var req = controller ? controller.GetKeySN() : this.controller.GetKeySN();
    this.event.onGetSn(req);
    return req;
};

/**
 * 得到当前在线（插入）key的情况
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @return key的插入情况，格式：类型逗号名称逗号个数分号。1,蓝色握奇key,2;3,飞天3003,1
 */
firebird.cert.getKeyInfo = function(controller) {
    var req = controller ? controller.GetOnlineKeyInfo() : this.controller.GetOnlineKeyInfo();
    this.event.onGetKeyInfo(req);
    return req;
};

/**
 * 得到当前系统的csp列表
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param {Int} flag 1:指明是列出所有的，2:只列出支持的
 * @return 得到当前系统的csp列表
 * csp名称1,好记的名称1,usbkey类型编号1;csp名称2,好记的名称2,usbkey类型编号2
 * 如果没有对应usbkey类型编号就为-1."好记的名称"对应配置文件中的cn,“类型编号”对应配置文件中的type
 */
firebird.cert.getGetCspList = function(controller, flag) {
    var req = controller ? controller.GetSysCspList(flag) : this.controller.GetSysCspList(flag);
    this.event.onGetGetCspList(req);
    return req;
};

/**
 * 对当前key进行格式化，如果有多个key，返回失败
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param url 格式化地址，一般为格尔握奇key，其他key可以设置成空
 * @return 0–成功，负值为失败
 */
firebird.cert.formatKey = function(controller, url) {
    var req = controller ? controller.FormatKey(url) : this.controller.FormatKey(url);
    this.event.onFormatKey(req);
    return req;
};

/**
 * 解锁当前key，密码设成缺省密码123456
 * @param {HTMLObjectElement} controller 汇信安全控件
 * @param url 解锁验证的url
 * @param code 解锁验证码
 * @return 0–成功，负值为失败
 */
firebird.cert.unLockKey = function(controller, url, code) {
    var req = controller ? controller.UnLockKey(url, code) : this.controller.UnLockKey(url, code);
    this.event.onUnLockey(req);
    return req;
};

/**
 * 制证
 * @param {Object} settings
 */
firebird.cert.create = function(settings) {
    var _cert = this;
    // 合并参数
    var options = firebird.extend(this.defaults, settings);
    if (_cert.host.replace(/ /g, "") === "") {
        options.error("message", _cert.ERR.render(9), options.errors);
        return;
    }
    if (!jQuery) {
        options.error("message", _cert.ERR.render(10), options.errors);
        return;
    }
    var controller = _cert.init(options);
    if (!controller) {
        options.error("message", _cert.ERR.render(5), options.errors);
        return;
    }

    var certCount = 0;
    var certReq = "";
    var keyType = "";
    var keySn = "";

    try {

        certCount = _cert.getCertCount(controller);
        if (options.onGetCertCount(certCount, certReq, keyType, keySn) == false) {
            options.error("message", _cert.ERR.render(11, certCount), options.errors);
            return;
        }
        if (certCount > 1) {
            options.error("message", _cert.ERR.render(11, certCount), options.errors);
            return;
        }
        keyType = _cert.getKeyType(controller) == '1' ? "OLDKEY" : "NEWKEY";
        keySn = _cert.getSn(controller);

        if (firebird.string.trim(keySn) == "") {
            options.error("error", _cert.ERR.render(15), options.errors);
            return;
        }

        certReq = _cert.createZJCARequest(controller);
        if (firebird.string.trim(certReq) == "") {
            options.error("error", _cert.ERR.render(14), options.errors);
            return;
        }

        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: _cert.host,
            data: {
                "cert.nbxh": options.nbxh,
                "cert.randCode": options.randCode,
                "cert.myKey": certReq,
                "cert.keytype": keyType,
                "cert.keysn": keySn
            },
            error: function(e1, e2, e3) {
                alert("ajax error")
                options.error("error", _cert.ERR.render(12, [e1.toString(), e2.toString(), e3.toString()]));
            },
            success: function(data) {
                var createZJCACertReq = "";
                try {
                    createZJCACertReq = _cert.createZJCACert(controller, data.raCode);
                    if (createZJCACertReq == 0) {
                        options.success(data.raCode, certReq, keyType, keySn);
                    } else {
                        //HXRA-150001
                        options.error("error", _cert.ERR.render(12, [data.raCode, "", ""]));
                    }
                } catch (ajaxEx) {
                    options.error("error", _cert.ERR.render(12, [data.raCode, ajaxEx.meaasge, ""]));
                }

            }
        });

    } catch (e) {
        options.error("error", _cert.ERR.render(13), (function(a) {
            options.errors.push(a);
            try {
                options.errors.push(_cert.getErr(controller));
            } catch (ex) {
            }
            return options.errors.join(", ");
        })(e));
        return;
    }
};

/**
 * 格式化
 * @param {type} settings
 */
firebird.cert.format = function(settings) {
    var _cert = this;
    // 合并参数
    var options = firebird.extend(this.defaults, settings);
    var controller = _cert.init(options);
    if (!controller) {
        options.error("message", _cert.ERR.render(5), options.errors);
        return;
    }
    var keyType = "";
    var rastate = "";

    try {
        keyType = _cert.getKeyType(controller);
        if (options.onBeforeFormat(keyType, controller) == false) {
            return;
        }
        if (keyType == 1 && _cert.ra.replace(/ /g, "") == "") {
            options.error("message", _cert.ERR.render(6, keyType), options.errors);
            return;
        }
        rastate = _cert.formatKey(controller, keyType == 1 ? _cert.ra : "");
        if (rastate == 0) {
            options.success(rastate, keyType, controller);
        } else {
            options.errors.push(_cert.ERR.render(7, rastate));
        }

    } catch (e) {
        options.error("error", _cert.ERR.render(8), (function(a) {
            options.errors.push(a);
            return options.errors.join(", ");
        })(e), (function() {
            var keyErr = "";
            try {
                keyErr = _cert.getErr(controller);
            } catch (ex) {
            }
            return keyErr;
        })());
    }
};

/**
 * 简单dom操作
 * @namespace firebird.dom
 */
firebird.dom = firebird.dom || {
    /**
     * @param {HTMLElement} elem
     * @return {HTMLElement} elem
     * @method _remove
     */
    _remove: function(elem) {
        this.empty(elem);
        if (elem.parentNode) {
            elem.parentNode.removeChild(elem);
        }
        return elem;
    },
    /**
     * @param {HTMLElement} selector
     * @return {HTMLElement} selector
     * @method remove
     */
    remove: function(selector) {
        var _this = this;
        if (firebird.lang.isArray(selector)) {
            var elem, i = 0;
            for (; (elem = selector[i]) != null; i++) {
                _this._remove(elem);
            }
        } else {
            _this._remove(selector);
        }
        return selector;
    },
    empty: function(selector) {
        if (firebird.lang.isArray(selector)) {
            var elem, i = 0;
            for (; (elem = selector[i]) != null; i++) {
                this._empty(elem);
            }
        } else {
            this._empty(selector);
        }
        return selector;
    },
    _empty: function(elem) {
        while (elem.firstChild) {
            elem.removeChild(elem.firstChild);
        }
    },
    show: function(elem) {

    },
    hide: function(elem) {

    }

};


firebird.namespace("firebird.singleton");

/**
 * 单例
 * @param {type} fn
 * @returns {unresolved}
 */
firebird.singleton = function(fn) {
    var result;
    return function() {
        return result || (result = fn.apply(this, arguments));
    };
};

firebird.namespace("firebird.ui.progress");

/**
 * ui组件，进度条
 * @namespace firebird.ui.progress
 * @type type
 */
firebird.ui.progress = {
    /**
     * 版本
     * @type String
     */
    version: "1.0.0",
    /**
     * 默认参数
     * @type @exp;firebird@call;extend
     */
    options: {
        /**
         * 初始值
         * @type Number
         */
        value: 0,
        /**
         * 最大值
         * @type Number
         */
        max: 100,
        /**
         * 位置
         * @type Number
         */
        top: 0,
        /**
         * 位置
         * @type Number
         */
        left: 0,
        /**
         * 定位方式
         * @type String
         */
        position: "absolute",
        /**
         * 文本提示
         * @type String
         */
        info: "请稍等...",
        /**
         * 是否锁屏
         * @type Boolean
         */
        mask: true,
        /**
         * 进度变化时回调
         * @type @exp;firebird@pro;noop
         */
        change: firebird.noop,
        /**
         * 进度条执行完毕回调
         * @type @exp;firebird@pro;noop
         */
        complete: firebird.noop
    },
    /**
     * 最小值
     * @type Number
     */
    min: 0,
    /**
     * 初始化
     * @param {type} settings
     * @returns {undefined}
     */
    init: function(settings) {
        this.options = firebird.extend(this.options, settings);
        this._init();
        this._info();
        this._refreshValue();
    },
    /**
     * 干掉进度条
     * @returns {undefined}
     */
    destroy: function() {
        this.mask.style.display = 'none';
    },
    /**
     * 改变进度
     * @param {type} newValue
     * @param {type} info
     * @returns {firebird.ui.progress}
     */
    value: function(newValue, info) {
        if (typeof newValue === "undefined") {
            return this._value();
        }
        if (typeof info !== "undefined") {
            this.info(info);
        }
        this._setOption("value", newValue);

        return this;
    },
    /**
     * 改变提示
     * @param {type} info
     * @returns {undefined}
     */
    info: function(info) {
        if (typeof info !== "undefined") {
            this._setOption("info", info);
            this._info();
        }
    },
    _info: function() {
        this.msgDiv.innerHTML = this.options.info || "";
    },
    _init: function() {
        if (!this.element) {
            // 容器
            var element = document.createElement("div");
            var valueDiv = document.createElement("div");
            var msgDiv = document.createElement("div");

            this.mask = this.options.mask === true ? firebird.ui.mask.init() : document.body;
            this.mask.insertBefore(msgDiv);
            this.mask.insertBefore(element);
            element.insertBefore(valueDiv);

            element.className = 'firebird-ui-progressbar';
            valueDiv.className = 'firebird-ui-progressbar-value';
            msgDiv.className = 'firebird-ui-progressbar-msg';

            this.valueDiv = valueDiv;
            this.element = element;
            this.msgDiv = msgDiv;
        }
        this.mask.style.display = 'block';
        return element;
    },
    _refreshValue: function() {
        var value = this.value(),
                percentage = this._percentage();

        if (this.oldValue !== value) {
            this.oldValue = value;
            this.options.change.call(this, this);
        }

        this.valueDiv.style.width = percentage.toFixed(0) + "%";
        this.element.setAttribute("aria-valuenow", value);
    },
    _setOption: function(key, value) {
        if (key === "value") {
            this.options.value = value;
            this._refreshValue();
            if (this._value() === this.options.max) {
                this.options.complete.call(this, this);
            }
        } else {
            this.options[key] = value;
        }
    },
    _value: function() {
        var val = this.options.value;
        if (!firebird.isNumber(parseInt(val, 10))) {
            val = 0;
        }
        return Math.min(this.options.max, Math.max(this.min, val));
    },
    _percentage: function() {
        return 100 * this._value() / this.options.max;
    }
};

/**
 * firebird.ui.mask
 */
firebird.namespace("firebird.ui.mask");

/**
 * firebird.ui.mask Impl
 * 遮罩实现
 *
 * @example
 * //
 * firebird.ui.mask.init();
 * firebird.ui.mask.destroy();
 * @version 1.0.0
 */
firebird.ui.mask = {
    version: '1.0.0',
    options: {
        parent: document.body,
        position: "absolute"
    },
    init: function(settings) {
        this.options = firebird.extend(this.options, settings);
        this.options.parent = this.options.parent || document.body;
        return this._init();
    },
    destroy: function() {
        this.element.style.display = 'none';
    },
    _init: function() {
        if (!this.element) {
            var element = document.createElement("div");
            element.className = 'firebird-ui-mask';
            firebird.log(this.options.parent);
            this.options.parent.insertBefore(element);
            this.element = element;
        }
        this.element.style.display = 'block';
        return this.element;
    }
};


/**
 * 文件上传管理器
 * @namespace firebird.upload
 * @type type
 */
firebird.upload = firebird.upload || {};

/**
 * 文件队列
 * @type Array
 */
firebird.upload.list = [];

/**
 * 模版
 * @type String
 */
firebird.upload.tpl = ''
        + '<div class="{FILE_MANAGER_CSS}">'
        + '     <div class="fileName">{FILE_NAME}</div>'
        + '         <div class="fileToolbar">'
        + '             <a class="fileOpen" href="javascript:;" onclick="window.open(\'{WEB_PATH}\');">&#25171;&#24320;</a>'
        + '             <a class="fileDel" href="javascript:;" onclick="firebird.upload.del(\'{FILE_NAME}\',\'{FILE_TYPE}\',\'{FILE_MANAGER_CSS}\');">&#21024;&#38500;</a>'
        + '         </div>'
        + '     <div class="fileImg"><img src="{WEB_PATH}" onclick="window.open(\'{WEB_PATH}\');" /></div>'
        + '</div>';

/**
 * 添加文件
 * @param {Object} file
 * @returns {undefined}
 */
firebird.upload.add = function(file) {
    this.list.push(file);
    return this;
};

/**
 * 删除文件
 * @param {type} name
 * @param {type} type
 * @param {type} css
 * @returns {firebird.upload}
 */
firebird.upload.del = function(name, type, css) {
    var me = this;
    try {
        var index;
        $.each(me.list, function(i, file) {
            if (file.name === name) {
                index = i;
                return false;
            }
        });
        if (!isNaN(index)) {
            me.list.splice(index, 1);
            me.show({
                type: type,
                css: css || ""
            });
        }
    } catch (e) {
        alert(e);
    }
    return this;
};
/**
 * 显示队列
 * @returns {firebird.upload}
 */
firebird.upload.show = function(options) {
    var upload = this;
    var opts = $.extend(true, {
        type: "",
        tpl: this.tpl,
        css: ''
    }, options);

    var host = (upload.host != "" && upload.host != "/" && upload.host) || (location.protocol + "//" + location.hostname + ":" + location.port + "/");
    var imgs = [];
    $.each(upload.list, function(i, file) {
        if (file.type == opts.type && file.type != "") {
            imgs.push(opts.tpl
                    .replace(/{FILE_TYPE}/gi, opts.type)
                    .replace(/{FILE_NAME}/gi, file.name)
                    .replace(/{WEB_PATH}/gi, host + file.name)
                    .replace(/{FILE_MANAGER_CSS}/gi, options.css));
        }
    });
    $("#" + opts.type).html(imgs.join(""));
    return upload;
};

/**
 * 显示当前队列，一般用于已有数据的修改
 *
 * @param {String} fileNameList 逗号分隔符的文件名列
 * @param {String} host
 * @param {String} type
 * @param {String} css
 * @returns {firebird.upload}
 *
 * @example
 * firebird.upload.showCurrentFile("abc.jpg,cde.jpg", "http"//localhost/res/", "images", "images-item");
 */
firebird.upload.showCurrentFile = function(fileNameList, host, type, css) {
    var list = (fileNameList.length === 0 ? [] : fileNameList.split(","));
    firebird.upload.list = [];
    $.each(list, function(i, name) {
        firebird.upload.add({
            host: host || firebird.upload.host,
            name: name,
            type: type || "",
            css: css || ""
        });
    });

    this.show({
        type: type,
        css: css
    });

    return this;
};

/**
 * 初始化上传按钮
 * @param {String} type
 * @param {String} css
 * @returns {firebird.upload}
 */
firebird.upload.init = function(type, css) {
    var upload = this;
    var _id = "firebird-upload-file" + new Date().getTime();
    var url = upload.action + (upload.action.indexOf("?") !== -1 ? "&" : "?") + $.param({
        _id: _id,
        type: type,
        css: css
    });

    firebird.data.set(_id, {
        success: function(list, type) {
            $.each(list, function(i, file) {
                upload.add(file);
            });

            upload.show({
                type: type,
                css: css || ""
            });
        }
    });
    var ifm = $("iframe[type='" + type + "']").css({
        height: 30,
        width: 150
    });
    ifm.attr({
        src: url,
        frameboder: 0,
        scrollbar: "hidden"
    }).show();
    return upload;
};

/**
 * 过滤器
 * @namespace firebird.filter
 */
firebird.filter = firebird.filter || {};

/**
 * 过滤器注册
 * @param {Object} filter 过滤器
 * @param {String} [filter.name] 过滤器名称
 * @param {String} [filter.pattern] request URL 匹配，*为通配符
 * @param {Function} [filter.callback] 过滤器回调
 */
firebird.filter.register = function(filter) {
    if (!firebird.data.get("firebird.filter")) {
        firebird.data.set("firebird.filter", {
            chain: {}
        });
    }
    if (filter && filter.name && filter.pattern && filter.callback) {
        firebird.data.get("firebird.filter").chain[filter.name] = filter;
    } else {
        firebird.log("[INFO] firebird.filter.register fail, filter [" + filter.name + "] arguments is missing.");
    }
};

/**
 * 过滤器执行
 */
firebird.filter.doFilter = function() {
    var me = this;
    var filterChain = firebird.data.get("firebird.filter").chain;
    var req = location;
    console.group("firebird.filter.doFilter " + req);
    jQuery.each(filterChain, function(name, filter) {
        firebird.log("[INFO]: firebird.filter.doFilter " + name + " start.");
        try {
            var reg = new RegExp(("^" + filter.pattern.replace(/,/g, "|").replace(/\*/g, "(.*)").replace(/\\/g, "\\")).toString(), "g");
            if (reg.test(req.pathname) || filter.pattern === "*") {
                console.time("[INFO]: firebird.filter.doFilter ", name + " matched.");
                filter.callback(req, filterChain, jQuery, window);
                console.timeEnd("[INFO]: firebird.filter.doFilter ", name + " callback.");
            }
        } catch (ex) {
            firebird.log("[ERROR]: firebird.filter.doFilter " + ex.message);
        }
    });
    console.groupEnd("firebird.filter.doFilter " + req);
};

/**
 * 过滤器初始化
 */
firebird.filter.init = function() {
    if (!firebird.data.get("firebird.filter")) {
        firebird.data.set("firebird.filter", {
            chain: {}
        });
    }
    firebird.filter.doFilter();
};

jQuery(function() {
    firebird.filter.init();
});

console.log("%c  thanks for using firebird javascript library!    ", "border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; width: 500px");
//console.log("%c       ___ _            _     _          _         ", "color:red; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c      \/ __|_)          | |   (_)        | |        ", "color:orange; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c     | |__ _  ____ ____| | _  _  ____ _ | |        ", "color:yellow; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c     |  __) |\/ ___) _  ) || \\| |\/ ___) || |        ", "color:green; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c     | |  | | |  ( (\/ \/| |_) ) | |  ( (_| |        ", "color:blue; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c     |_|  |_|_|   \\____)____/|_|_|   \\____|        ", "color:purple; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c  firebird lib loaded.                             ", "color:green; border-left: 1px solid #000; border-right: 1px solid #000;");
//console.log("%c  @page %d                                         ", "color:green; border-left: 1px solid #000; ", location.href);
//console.log("%c  @urlParamter %O                                  ", "color:green; border-left: 1px solid #000; ", firebird.url.parse());
//console.log("%c  @date %d                        ", "color:green; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;", firebird.date.format({time: firebird.now(), format: "yyyy-MM-dd HH:mm:ss"}));
//console.log("%c                                                   ", " width: 500px");




/**
 * 结束
 */
firebird.loaded = true;