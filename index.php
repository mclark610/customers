<?php
session_start();

require("config.php");
require("core/bootstrap.php");
require("core/Controller.php");
require("core/Model.php");
require("core/Messages.php");

require("controllers/Customers.php");
require("controllers/Billing.php");
require("controllers/Users.php");

require("model/Customer.php");
require("model/Billing.php");
require("model/Users.php");

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
	$controller->executeAction();
}
?>

