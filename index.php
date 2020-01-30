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

require("model/Customer.php");
require("model/Transaction.php");
require("model/Users.php");
require("model/Tables.php");
require("model/Metrics.php");

$bootstrap = new Bootstrap($_GET);
#echo "bootstrap: " + var_dump($bootstrap);

$controller = $bootstrap->createController();
#echo "controller: " + var_dump($controller);

if ($controller) {
	$controller->executeAction();
}
else {
    echo "controller not found. Exiting...\n";
}
?>
