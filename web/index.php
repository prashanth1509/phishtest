<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->get('/', function() use($app) {

    $short_appLink = "http://goo.gl/XspE3w";
    $phish_link = "https://dl.flipkart.com/dl/account/login?ret=".urlencode($short_appLink);

return <<<l
<!Doctype html>
<head>
<title>Flipkart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Win an Apple iPhone</h2>
    <a href="$phish_link">Click to Register</a>
    <style>
        body{
            font-family:Arial;
            background: #ccc;
            text-text-align: center;
        }
    </style>
</body>
l;

});



$app->get('/recheckLogin', function() use($app) {

return <<<l
<!Doctype html>
<head>
<title>Flipkart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="login">
        <div class="bar">Login</div>
        <div class="form">
            <div class="red">Email/Password combination is wrong.</div>
            <div class="comp">
                <label>Email Address</label>
                <input type=text id=usr placeholder="Enter your email address">
            </div>
            <div class="comp">
                <label>Email Address</label>
                <input type=password id=pwd placeholder="Enter your password">
            </div>
            <div class="comp">
                <input type=checkbox> Show Password
            </div>
            <div class="comp">
                <input type=button class="btn" value="LOGIN" onclick="javascript:test()">
            </div>
        </div>
        <div id="log" class="log">
            <div id="logd"></div>
            <div>
                <img src="http://cdn.alltheragefaces.com/img/faces/png/misc-spiderpman-s.png" width=100 height=100/>
            </div>
        </div>
    </div>
    <style>
        body{
            font-family:Arial;
            background: #ccc;
            margin:0;
        }
        .log{
            font-size: 30px;
            display: none;
        }
        .red{
            background: #FFD6D6;
            padding: 10px;
            border: 1px solid #FF3333;
            color: #FF3333;
        }
        .bg-white{background: #fff;}
        .log,.form, .bar{ background: #fff; padding:10px;}
        .bar{
            font-size: 20px;
        }
        .form {
            font-size: 12px;
            margin: 10px;
        }
        .comp{
            margin: 10px;
        }
        input[type=text],input[type=password]{
            width: 95%;
            padding: 5px;
            border: 1px solid #ccc;
            outline: 0;
        }
        .btn{
            width: 100%;
            background: #f78828;
            border: none;
            border-radius: 3px;
            padding: 8px;
            color: #fff;
        }
    </style>
    <script>
        window.onload = function(){
            window.test = function(){
                var user = document.getElementById("usr").value;
                var pwd = document.getElementById("pwd").value;
                document.getElementById("log").style.display="block";
                document.getElementById("logd").innerHTML = "Username = "+user+"<br>Password = "+pwd;
            }
        }
    </script>
    </body>
l;
});

$app->run();

?>
