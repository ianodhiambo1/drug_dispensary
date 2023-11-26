<?php

require "./inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

require  "./Controller/UserController.php";

$objFeedController = new UserController();

$strMethodName = $uri[3] . 'Action';

$objFeedController->{$strMethodName}();

?>
