<?php
session_start();

require("config.php");
require("core/bootstrap.php");
require("core/Controller.php");
require("core/Model.php");
require("core/Messages.php");

require("controllers/Customers.php");
require("controllers/Transactions.php");
require("controllers/Users.php");
require("controllers/Tables.php");
require("controllers/Metrics.php");
require("controllers/Home.php");

require("model/Customer.php");
require("model/Transaction.php");
require("model/Users.php");
require("model/Tables.php");
require("model/Metrics.php");
require("model/Home.php");

$bootstrap = new Bootstrap($_GET);
echo "BOOTSTRAP LOOK: ";
 var_dump($bootstrap);

$controller = $bootstrap->createController();
echo "BOOTSTRAP CONTROLLER LOOK: ";
var_dump($controller);

if ($controller) {
	echo "BOOTSTRAP CONTROLLER EXECUTEACTION: ";
	$controller->executeAction();
}
else {
    echo "controller not found. Exiting...\n";
}
?>
