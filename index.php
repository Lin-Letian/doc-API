<link rel="icon" href="https://www.birdy02.com/favicon.ico" type="image/x-icon">
<style>
    footer {
        text-align: center;
        padding: 2em;
        background-color: #f0f2f5;
        color: #666;
    }
</style>
<?php
$api = 'https://api.birdy02.com';
$back_api = [
    "http://152.136.172.12:18080"
];
$model = isset($_GET['m']) ? $_GET['m'] : null;
$data_m = [
    "ip-shudi" => [
        "name" => "IP属地查询",
        "say" => "可查询指定 IP 的国家、省、市、区县，运营商和线路类型，由于接入多个API，返回数据内容格式会不一致。",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/analysis/ip",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["type", "是", 'string', '要查询的模块，输入值shudi'],
            ['ip', "是", 'string', '查询的IP，IPv4地址'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "Country": "中国",
    "Province": "浙江",
    "City": "湖州",
    "County": "XX区",
    "Operator": "电信",
    "lineType": "城域网"
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>Country", "string", "IP归属国家"],
            ["data>Province", "string", "IP归属省"],
            ["data>City", "string", "IP归属市"],
            ["data>County", "string", "IP归属区县"],
            ["data>Operator", "string", "IP运营商"],
            ["data>lineType", "string", "IP线路类型"],
        ]
    ],
    "site-basic" => [
        "name" => "站点基本信息分析",
        "say" => "可分析站点基本情况、提取页面中的域名、ip、邮箱、站点是否存在暗链",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/analysis/site",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["type", "是", 'string', '要分析的信息，输入值 basic'],
            ['site', "是", 'string', '分析的站点，base64加密后的url'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "title": "网页名称",
    "status": "200",
    "server": "Microsoft-IIS/7.5",
    "length": 6537,
    "anlian": [],
    "domains": [],
    "ips": [],
    "sCode": "<html></html>",
    "vul": [
      {
        "name": "HTTP X-Content-Type-Options 缺失",
        "describe": "Web 服务器对于 HTTP 请求的响应头缺少 X-Content-Type-Options，这意味着此网站更易遭受跨站脚本攻击（XSS）。X-Content-Type-Options 响应头相当于一个提示标志，被服务器用来提示客户端一定要遵循在 Content-Type 首部中对 MIME 类型 的设定，而不能对其进行修改，这就禁用了客户端的 MIME 类型嗅探行为。浏览器通常会根据响应头 Content-Type 字段来分辨资源类型，有些资源的 Content-Type 是错的或者未定义，这时浏览器会启用 MIME-sniffing 来猜测该资源的类型并解析执行内容。利用这个特性，攻击者可以让原本应该解析为图片的请求被解析为 JavaScript 代码",
        "link": "https://cloud.tencent.com/developer/article/2182642",
        "repair": [
          "修改网站配置文件，推荐在所有传出请求上发送值为 nosniff 的 X-Content-Type-Options 响应头"
        ],
        "data": "",
        "risk": "1"
      }
    ],
    "header": "HTTP/1.1 200 OK",
    "link": "http://xxx.xx/login.html",
    "keywords": "",
    "description": "",
    "emails": []
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>title", "string", "站点标题"],
            ["data>status", "int", "响应状态码"],
            ["data>server", "string", "站点服务"],
            ["data>length", "int", "响应字节长度"],
            ["data>anlian", "list", "匹配到的暗链关键字"],
            ["data>domains", "list", "匹配到的域名"],
            ["data>ips", "list", "匹配到的IPv4"],
            ["data>sCode", "string", "网站源码"],
            ["data>vul", "list", "监测到的漏洞"],
            ["data>header", "string", "响应头"],
            ["data>link", "string", "最终访问的url，如果有302等跳转，则为跳转后的链接"],
            ["data>keywords", "string", "页面keywords -> html中"],
            ["data>description", "string", "页面描述 -> html中"],
            ["data>emails", "list", "页面中提取到的邮箱"],
        ]
    ],
    "site-cms" => [
        "name" => "站点指纹信息",
        "say" => "分析站点指纹信息",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/analysis/site",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["type", "是", 'string', '要查询的模块，输入值cms'],
            ['cms', "是", 'string', '要分析的站点URL'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "cms": [
      "登陆页面",
      "育友软件"
    ]
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>cms", "list", "CMS信息，值: string"]
        ]
    ],
    "site-ip" => [
        "name" => "站点解析IP",
        "say" => "分析站点解析IP信息",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/analysis/site",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["type", "是", 'string', '要查询的模块，输入值ip'],
            ['cms', "是", 'string', '要分析的站点URL'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "ip": "0.0.0.0"
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>ip", "string", "解析的IPv4"]
        ]
    ],
    "icp" => [
        "name" => "域名icp备案",
        "say" => "查询域名icp备案",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/query/icp",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["keyword", "是", 'string', '要查询的域名/备案号/单位名称'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "list": [
      {
        "SiteName": "",
        "SiteIndex": "",
        "natureName": "企业",
        "unitName": "xxxx公司",
        "mainLicence": "津ICP备xxxxxx号",
        "serviceLicence": "津ICP备xxxxxx号-6",
        "updateRecordTime": "2023-12-30",
        "domain": "xxxx.xxx"
      }
    ],
    "size": 1
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>size", "int", "获取到的数据数量"],
            ["data>list", "list", "获取到的值列表"],
            ["data>list>SiteName", "string", "站点名称"],
            ["data>list>SiteIndex", "string", "站点主页"],
            ["data>list>natureName", "string", "单位性质"],
            ["data>list>unitName", "string", "单位名称"],
            ["data>list>mainLicence", "string", "ICP备案号"],
            ["data>list>serviceLicence", "string", "ICP许可号(浙xxx号-1)"],
            ["data>list>updateRecordTime", "string", "更新时间"],
            ["data>list>domain", "string", "域名"],
        ]
    ],
    "wangan" => [
        "name" => "网安备案",
        "say" => "查询网安备案",
        "api" => $api,
        'b_api' => $back_api,
        "_api" => [
            "path" => "/api/query/wangan",
            "format" => "JSON",
            "method" => "POST"
        ],
        "matters" => "如果您需要与我取得联系，我的微信：LLT3213，再次感谢您对我们的支持与信任！！！",
        "reqArg" => [
            ["keyword", "是", 'string', '要查询的域名/备案号/单位名称，先通过域名查询过后可以通过单位名称查询'],
            ['token', "是", 'string', '请求认证的token']
        ],
        "examples" => '{
  "success": true,
  "code": 200,
  "msg": "",
  "data": {
    "list": [
      {
        "webName": "百度",
        "time": "2016-07-13",
        "unitType": "企业单位",
        "unitName": "北京百度网讯科技有限公司",
        "wanganId": "京公网安备11000002000001号",
        "domain": "baidu.com",
        "department": "网安总队",
        "webType": "交互式"
      }
    ],
    "size": 1
  }
}',
        "resArg" => [
            ["success", "bool", "响应是否成功"],
            ["code", "int", "信息是否获取成功，200成功"],
            ["msg", "string", "存在错误时，返回提示信息"],
            ["data", "JSON", "响应数据"],
            ["data>size", "int", "获取到的数据数量"],
            ["data>list", "list", "获取到的值列表"],
            ["data>list>unitName", "string", "单位名称"],
            ["data>list>wanganId", "string", "公安备案ID"],
            ["data>list>unitType", "string", "单位性质"],
            ["data>list>department", "string", "监管单位"],
            ["data>list>webName", "string", "站点名称"],
            ["data>list>time", "string", "审核日期"],
            ["data>list>webType", "string", "网站类型"],
            ["data>list>domain", "string", "域名"],
        ]
    ]
];
$pages = array_keys($data_m);
if ($model != null and in_array($model, $pages)) {
    $data = $data_m[$model]
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API · <?= $data['name'] ?></title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #fff;
            }

            .site-title {
                color: #fff;
                position: relative;
                margin-top: 0;
                padding: .2em .8em;
                letter-spacing: .3em;
                font-weight: 700;
                text-shadow: .05rem .05rem .1rem transparent;
                font-size: 1.2em;
                cursor: pointer;
            }

            .site-title:hover {
                background: #ffffff40;
                border-radius: 2em;
            }

            .container {
                width: 80%;
                max-width: 1100px;
                margin: 20px auto;
                background-color: #fff;
                border-radius: 1em;
                border: 2px solid #fff;
                box-sizing: border-box;
                box-shadow: 8px 8px 20px rgba(55, 99, 170, .1), -8px -8px 20px #fff;
            }


            .say-title-strong {
                color: #555;
                min-width: 5em;
                display: inline-block;
            }

            .say-text {
                padding: .2em .6em;
                background: #FF7C7C;
                color: #fff;
                border-radius: .4em;
                font-size: .9em;
            }

            header {
                text-align: center;
                margin-bottom: 20px;
            }

            header h1 {
                color: #555;
                font-size: 24px;
                margin: 0;
            }

            .section {
                padding: 2.2em 2em;
            }

            .section-border {
                padding: 2.2em 2em;
                border-top: 1px dashed #4259ef23;
                border-bottom: 1px dashed #4259ef23;
                border-radius: 1em;
            }

            .section > li {
                margin-bottom: 2em;
            }

            .section h2 {
                color: #555;
                font-size: 20px;
                margin-bottom: 10px;
            }

            pre {
                background: #555;
                padding: 1rem;
                border-radius: 5px;
                overflow-x: auto;
                color: #fff;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group label {
                font-size: 16px;
                color: #666;
                display: block;
                margin-bottom: 5px;
            }

            .form-group input[type="text"], .form-group textarea {
                width: calc(100% - 22px);
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
                box-sizing: border-box;
            }

            .btn {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn:hover {
                background-color: #0056b3;
            }

            .response {
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 4px;
                background-color: #f9f9f9;
                font-size: 16px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 1rem 0;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: .6em .8em;
                text-align: left;
                font-size: 16px;
                vertical-align: middle;
            }

            th {
                background-color: #f1f3f8;
                font-weight: normal;
            }
        </style>
    </head>
    <body style="padding:0;margin:0">
    <header style="background:linear-gradient(330deg, #0080f2 0%, rgb(146 37 208) 100%);min-height:20em;color:#fff">
        <div style="padding:1em 0">
            <a class="site-title" href="/" style="text-decoration:none">林乐天 - secAPI</a>
        </div>
        <div style="padding-top:3em;text-align:left;padding-left:10em">
            <h1 style="color:#fff;font-size:4em">API · <?= $data['name'] ?></h1>
            <p style="padding-left:1em;color:#ffffff8f"><strong>Method: </strong><?= $data['_api']['method'] ?></p>
        </div>
    </header>
    <div class="container">
        <div class="section">
            <p style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong" style="color:#f2b94b">API简介: </strong><?= $data['say'] ?>
            </p>
            <p style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong" style="color:#4b72f2">API: </strong><?= $data['api'] ?>
            </p>
            <p style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong" style="color:#c34bf2">API(备选): </strong></p>
            <ul>
                <?php foreach ($data['b_api'] as $td) { ?>
                    <li style="color:#555;font-size:1.1rem"><?= $td ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="section section-border">
            <p style="border-radius: 8px;border: 2px solid #c28b00;padding: 1em;font-size: 1.1em;text-indent:2em">
                接口问题联系相关负责人沟通修复：
                <a target="_blank" href="https://www.birdy02.com/"
                   style="text-decoration: none;color: #555;border-bottom: 2px solid rgb(98,120,230)">联系该接口开发者</a>
            </p>
        </div>
        <div class="section">
            <li style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong">接口地址: </strong>
                <span class="say-text"><?= $data['_api']['path'] ?></span>
            </li>
            <li style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong">返回格式: </strong>
                <span class="say-text"><?= $data['_api']['format'] ?></span>
            </li>
            <li style="color:#555;font-size:1.1rem">
                <strong class="say-title-strong">请求方式: </strong>
                <span class="say-text"><?= $data['_api']['method'] ?></span>
            </li>
            <li style="color:#555;font-size:1.1rem;margin-bottom: 0">
                <strong class="say-title-strong">请求 URL: </strong>
                <span id="api-url" class="say-text"><?= $data['api'] ?><?= $data['_api']['path'] ?></span>
                <span class="copy-url say-text" style="background:#133bc7c7;color:#fff;cursor:pointer"
                      onclick="copyToClipboard('#api-url')">copy</span>
            </li>
        </div>
        <div class="section section-border" style="background-color: rgba(85,85,85,0.04)">
            <h2>注意事项</h2>
            <ul style="color:#555">
                <li><?= $data['matters'] ?></li>
            </ul>
        </div>
        <div class="section">
            <h2>请求参数</h2>
            <table>
                <thead>
                <tr>
                    <th style="width: 5em;text-align: center;font-weight: bold">接口名称</th>
                    <th style="width: 4em;text-align: center;font-weight: bold">是否必填</th>
                    <th style="width: 6em;text-align: center;font-weight: bold">接口类型</th>
                    <th style="text-align: center;font-weight: bold">接口说明</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['reqArg'] as $td) { ?>
                    <tr>
                        <td><?= $td[0] ?></td>
                        <td><?= $td[1] ?></td>
                        <td><?= $td[2] ?></td>
                        <td><span class="say-text"><?= $td[3] ?></span></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="section section-border">
            <h2>返回示例</h2>
            <pre><code><?= $data['examples'] ?></code></pre>
        </div>
        <div class="section">
            <h2>返回参数说明</h2>
            <table>
                <thead>
                <tr>
                    <th style="width: 8em;text-align: center;font-weight: bold">接口名称</th>
                    <th style="width: 6em;text-align: center;font-weight: bold">接口类型</th>
                    <th style="text-align: center;font-weight: bold">接口说明</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['resArg'] as $td) { ?>
                    <tr>
                        <td><?= $td[0] ?></td>
                        <td><?= $td[1] ?></td>
                        <td><span class="say-text"><?= $td[2] ?></span></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if ($model == 'ip-shudi') { ?>
            <div class="section section-border">
                <h2>API请求测试</h2>
                <div class="form-group">
                    <label for="ip">IP地址:</label>
                    <input type="text" id="ip" placeholder="请输入IP地址">
                </div>
                <div class="form-group">
                    <label for="token">认证Token:</label>
                    <input type="text" id="token" placeholder="请输入认证Token">
                </div>
                <div style="text-align: right;">
                    <button class="btn" style="margin-bottom: 1em;right: 0;position: relative;" onclick="testApi()">
                        测试API
                    </button>
                </div>
                <div id="response" class="response" style="display:none;font-size:13px;color:#555">
                    <pre><code id="output"></code></pre>
                </div>
            </div>
        <?php } elseif ($model == 'site-basic' or $model == 'site-cms' or $model == "site-ip") { ?>
            <div class="section section-border">
                <h2>API请求测试</h2>
                <div class="form-group">
                    <label for="url">URL地址:</label>
                    <input type="text" id="url" placeholder="请输入URL地址">
                </div>
                <div class="form-group">
                    <label for="token">认证Token:</label>
                    <input type="text" id="token" placeholder="请输入认证Token">
                </div>
                <div style="text-align: right;">
                    <button class="btn" style="margin-bottom: 1em;right: 0;position: relative;" onclick="testApi()">
                        测试API
                    </button>
                </div>
                <div id="response" class="response" style="display:none;font-size:13px;color:#555">
                    <pre><code id="output"></code></pre>
                </div>
            </div>
        <?php } elseif ($model == 'icp') { ?>
            <div class="section section-border">
                <h2>API请求测试</h2>
                <div class="form-group">
                    <label for="icp_input">域名/备案号/单位名称:</label>
                    <input type="text" id="icp_input" placeholder="请输入查询的域名/备案号/单位名称">
                </div>
                <div class="form-group">
                    <label for="token">认证Token:</label>
                    <input type="text" id="token" placeholder="请输入认证Token">
                </div>
                <div style="text-align: right;">
                    <button class="btn" style="margin-bottom: 1em;right: 0;position: relative;" onclick="testApi()">
                        测试API
                    </button>
                </div>
                <div id="response" class="response" style="display:none;font-size:13px;color:#555">
                    <pre><code id="output"></code></pre>
                </div>
            </div>
        <?php } elseif ($model == 'wangan') { ?>
            <div class="section section-border">
                <h2>API请求测试</h2>
                <div class="form-group">
                    <label for="wangan_input">域名/备案号/单位名称:</label>
                    <input type="text" id="wangan_input" placeholder="请输入查询的域名/备案号/单位名称">
                </div>
                <div class="form-group">
                    <label for="token">认证Token:</label>
                    <input type="text" id="token" placeholder="请输入认证Token">
                </div>
                <div style="text-align: right;">
                    <button class="btn" style="margin-bottom: 1em;right: 0;position: relative;" onclick="testApi()">
                        测试API
                    </button>
                </div>
                <div id="response" class="response" style="display:none;font-size:13px;color:#555">
                    <pre><code id="output"></code></pre>
                </div>
            </div>
        <?php } ?>
    </div>
    <script>
        function copyToClipboard(element) {
            let text = document.querySelector(element).innerText;
            navigator.clipboard.writeText(text).then(function () {
                alert('URL已复制到剪贴板');
            }).catch(function (error) {
                alert('复制失败：' + error);
            });
        }

        function testApi() {
            let text;
            let token;
            let url;
            let xhr;
            <?php if ($model == 'ip-shudi') { ?>
            document.getElementById('response').style.display = 'block';
            document.getElementById('output').innerText = '请求测试';
            text = document.getElementById('ip').value;
            token = document.getElementById('token').value;
            url = '<?= $data['api'] ?><?= $data['_api']['path'] ?>?type=shudi&ip=' + text;
            if (!text || !token) {
                document.getElementById('output').innerText = '请输入IP地址和认证Token';
                return;
            }
            xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('token', token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    document.getElementById('response').style.display = 'block';
                    if (xhr.status === 200) {
                        const result = JSON.parse(xhr.responseText);
                        document.getElementById('output').innerText = JSON.stringify(result, null, 2);
                    } else {
                        document.getElementById('output').innerText = '请求失败：' + xhr.statusText;
                    }
                }
            };
            xhr.onerror = function () {
                document.getElementById('response').style.display = 'block';
                document.getElementById('output').innerHTML = '请求失败：无法完成请求';
            };
            xhr.send();
            <?php }elseif ($model == 'site-basic' or $model == 'site-cms' or $model == "site-ip") {?>
            document.getElementById('response').style.display = 'block';
            document.getElementById('output').innerText = '请求测试';
            text = document.getElementById('url').value;
            token = document.getElementById('token').value;
            url = '<?= $data['api'] ?><?= $data['_api']['path'] ?>?type=<?= $model == "site-basic" ? "basic" : ($model == "site-cms" ? "cms" : ($model == "site-ip" ? "ip" : ""))  ?>&site=' + btoa(unescape(encodeURIComponent(text)));
            if (!text || !token) {
                document.getElementById('output').innerText = '请输入IP地址和认证Token';
                return;
            }
            xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('token', token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    document.getElementById('response').style.display = 'block';
                    if (xhr.status === 200) {
                        const result = JSON.parse(xhr.responseText);
                        document.getElementById('output').innerText = JSON.stringify(result, null, 2);
                    } else {
                        document.getElementById('output').innerText = '请求失败：' + xhr.statusText;
                    }
                }
            };
            xhr.onerror = function () {
                document.getElementById('response').style.display = 'block';
                document.getElementById('output').innerText = '请求失败：无法完成请求';
            };
            xhr.send();
            <?php }elseif ($model == "icp") {?>
            document.getElementById('response').style.display = 'block';
            document.getElementById('output').innerText = '请求测试';
            text = document.getElementById('icp_input').value;
            token = document.getElementById('token').value;
            url = '<?= $data['api'] ?><?= $data['_api']['path'] ?>?keyword=' + text;
            if (!text || !token) {
                document.getElementById('output').innerText = '请输入IP地址和认证Token';
                return;
            }
            xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('token', token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    document.getElementById('response').style.display = 'block';
                    if (xhr.status === 200) {
                        const result = JSON.parse(xhr.responseText);
                        document.getElementById('output').innerText = JSON.stringify(result, null, 2);
                    } else {
                        document.getElementById('output').innerText = '请求失败：' + xhr.statusText;
                    }
                }
            };
            xhr.onerror = function () {
                document.getElementById('response').style.display = 'block';
                document.getElementById('output').innerText = '请求失败：无法完成请求';
            };
            xhr.send();
            <?php }elseif ($model == "wangan") {?>
            document.getElementById('response').style.display = 'block';
            document.getElementById('output').innerText = '请求测试';
            text = document.getElementById('wangan_input').value;
            token = document.getElementById('token').value;
            url = '<?= $data['api'] ?><?= $data['_api']['path'] ?>?keyword=' + text;
            if (!text || !token) {
                document.getElementById('output').innerText = '请输入IP地址和认证Token';
                return;
            }
            xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('token', token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    document.getElementById('response').style.display = 'block';
                    if (xhr.status === 200) {
                        const result = JSON.parse(xhr.responseText);
                        document.getElementById('output').innerText = JSON.stringify(result, null, 2);
                    } else {
                        document.getElementById('output').innerText = '请求失败：' + xhr.statusText;
                    }
                }
            };
            xhr.onerror = function () {
                document.getElementById('response').style.display = 'block';
                document.getElementById('output').innerText = '请求失败：无法完成请求';
            };
            xhr.send();
            <?php } ?>
        }
    </script>
    <footer>
        <p>Copyright &copy; 2022-2024 <a target="_blank" href="https://www.birdy02.com"
                                         style="text-decoration: none;color: #666">林乐天的个人博客</a>
            Designed by 林乐天</p>
        <a href="mailto:@qq.com" style="text-decoration: none;color: #555">联系邮箱: @qq.com</a>
    </footer>
    </body>
    </html>
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>主页 - secAPI服务</title>
        <style>
            * {
                transition: all .5s ease 0s;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f2f5;
                color: #333;
            }

            header {
                background-image: url(https://img.onmicrosoft.cn/5se.jpg);
                color: #fff;
                padding: 17em 2em 8em;
                text-align: center;
                border-radius: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: 50% 50%;
            }

            header h1 {
                font-size: 3em;
                margin: 0;
            }

            header p {
                font-size: 1.2em;
                margin: 1em 0 0;
            }

            .container {
                width: 80%;
                margin: 2em auto;
                padding: 2em;
                /*background-color: #fff;*/
                border-radius: 8px;
                /*box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);*/
            }

            .section {
                margin-bottom: 2em;
            }

            .section h2 {
                color: #333;
                font-size: 2em;
                margin-bottom: 1em;
            }

            .api-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 1em;
            }

            .api-item {
                flex: 1 1 calc(24% - 2em);
                background-color: #f9f9f9;
                border-radius: 8px;
                padding: 1em;
                transition: transform 0.3s;
                min-width: 16em;
                width: calc(32% - 2em);
                border: 2px solid #fff;
                background-image: linear-gradient(180deg, #f3f5f8, #fff);
                box-shadow: 8px 8px 20px rgba(55, 99, 170, .1), -8px -8px 20px #fff;
                max-width: 100%;
            }

            .api-item:hover {
                transform: translateY(-5px);
            }

            .api-item h3 {
                margin: 0;
                font-size: 1.3em;
                color: #cb960e;
            }

            .api-item p {
                margin: 0.5em 0 0;
                color: #666;
            }

            .api-item a {
                text-decoration: none;
                color: inherit;
                display: block;
            }


        </style>
    </head>
    <body>
    <div style="height:60px;width:100%;opacity:1;background:#fff">
        <p style="text-align:center;padding:0;margin:0;line-height:60px;font-size:1.3em;letter-spacing:.3em;font-weight:600;color:#555">
            主页 - secAPI服务</p>
    </div>
    <div style="position: relative;">
        <header>
            <p>欢迎来到我的主页，这里提供各种API接口，助力开发者实现更多可能。</p>
        </header>
        <div style="transform: rotate(180deg);bottom: -1px;overflow: hidden;position: absolute;width: 100%;z-index: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
                 style="width: 200%;transform: translateX(-46%) rotateY(180deg);height: 110px;">
                <path class="wp-moose-shape-fill" opacity="0.33"
                      d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"
                      style="fill: #fff;"></path>
                <path class="wp-moose-shape-fill" opacity="0.66"
                      d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"
                      style="fill: #fff;"></path>
                <path class="wp-moose-shape-fill"
                      d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"
                      style="fill: #fff;"></path>
            </svg>
        </div>
    </div>
    <div style="width: 100%;background-color:#fff;padding:1.2em 0">
        <div style="max-width: 1200px;min-height: 2em;margin: 0 auto;width: 100%;">
            <h1 style="color:#555;text-indent:2em">林乐天</h1>
            <p style="text-indent:2em">以下是我提供的一些API服务，欢迎使用并提出宝贵意见。</p>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="api-grid">
                <?php foreach (array_keys($data_m) as $td) { ?>
                    <div class="api-item">
                        <a href="/<?= $td ?>">
                            <h3><?= $data_m[$td]['name'] ?></h3>
                            <p><?= $data_m[$td]['say'] ?></p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; 2022-2024 <a target="_blank" href="https://www.birdy02.com"
                                         style="text-decoration: none;color: #666">林乐天的个人博客</a>
            Designed by 林乐天</p>
        <a href="mailto:2596456807@qq.com" style="text-decoration: none;color: #555">联系邮箱: @qq.com</a>
    </footer>
    </body>
    </html>
<?php } ?>
