<?php
//DEFINE DB 
define("DB_HOST","localhost");
define("DB_USER","customer");
define("DB_PASS","customer");
define("DB_NAME","customer_data");

//Define URLs
define("ROOT_PATH","/customers/");
define("ROOT_URL","http://linux-desktop.home/customers/");


require("core/Model.php");
require("model/Tables.php");

    $viewModel = new TableModel();
    echo json_encode($viewModel->getTableData());
    
    #exit;

   	#$buf = json_encode($viewModel->getTableData());
    #echo $buf;
?>