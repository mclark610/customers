<html>
<head>
  <title>Billing</title>
  <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>

<body>
<?php
  require('../../model/TransactionModel.php');
  $dbhost="localhost";
  $dbuser="customer";
  $dbpass="customer";
  $dbname="customer_data";
  $dsn="mysql:host=$dbhost;dbname=$dbname;charset=utf8;";  

?>
  <div class="header">
      <h1>Billing</h1>
  </div>

  <form name="billing" method="POST" action="billing.php">
    <div class="sort_by" align=right>
      <select name="sort by">
        <option value="not_paid">Not Paid</option>
        <option value="paid">Paid</option>
        <option value="expiring">Expiring within 10 days</option>
        <option value="expired">Expired</option>
      </select>
    </div>
  </form>

  <div class="billing_listing">
<?php
        $td;
        $obj_array = array();

        try {
            $td = new TransactionModel($dsn,$dbuser,$dbpass);
            $trans_array = $td->fetchTransactions(100);

            #echo "array count: " .    count($trans_array) . "\n";
        }
        catch (mysqli_sql_exception $e) {
           echo "exception thrown : " . $e->getMessage() . "\n";
        }

         $pos=0;
         $max=count($trans_array);
         while( $pos < $max) {
	      $trans = $trans_array[$pos];
              
              $bill_detail_link="http://localhost/customers/transactions.php?id=" . $trans->getId();

	      if ($pos % 2) { ?>
                <div class="even_customer_listing" ondblclick="window.open('<?php echo $bill_detail_link; ?>','_newtab');">
              <?php } else { ?>
                <div class="odd_customer_listing" ondblclick="window.open('<?php echo $bill_detail_link; ?>','_newtab');">
              <?php }
                $pos = $pos + 1;
              ?>
	      
	      <!-- HTML HERE --> 
              <div class="cb">
                <input type="checkbox" value="1"></input>
              </div>
              <div class="first_name">
                <?php echo $trans->getId();?>
              </div>
              <div class="last_name">
                <?php echo $trans->getUserId();?>
              </div>
              <div class="phone">
                <?php echo $trans->getAmount();?>
              </div>
              <div class="expiration">
                <?php echo $trans->getDateExpired();?>
              </div>
             </div> <!-- odd/even_billing_listing -->
	 <?php } ?>
  </div> <!-- billing_listing -->
</body>
</html>
