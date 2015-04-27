<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->get('/', function() use($app) {
$index_page = <<<l
<!Doctype html>
<head>
<title>Flipkart</title>
</head>
<body style="font-family:Arial;text-align:center">
    <h2>Win something</h2>
    <hr>
    <h3>1. Visit this page on your phone</h3>
    <h3>2. Visit below link</h3>
    <a style="background:#027CD5;padding:10px 20px;text-decoration:none;color:#fff" href="http://www.google.com">Register</a>
</body>
l;
return $index_page;
});

$app->run();

?>
