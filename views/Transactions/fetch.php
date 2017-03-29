<div class="text-center">
<h1 class="blue_text">Customer Transactions</h1>
<p class="lead"></p>
<div class="customer_listing">
  <div class="container">
    <?php if (isset($viewmodel) && !(empty($viewmodel))): ?>
        <?php $row = $viewmodel[0];?>
        <div class="row">
          <div class="col-sm-1">Name</div>
          <div class="col-sm-2 text-left"><?php echo "$row[first] $row[last]"?></div>
          <div class="col-sm-9"></div>
        </div>

        <div class="row">
          <div class="col-sm-1">Phone</div>
          <div class="col-sm-2 text-left"><?php echo $row['phone']?></div>
          <div class="col-sm-9"></div>
        </div>
        <div class="row">
          <br>
        </div>

        <div class="row">
          <div class="col-md-10 text-left"> 
            <div class="table-responsive textcentered">  
              <table id="table_results" class="table table-bordered table-striped table-hover " >
                <thead>
                  <tr class="blue_text">
                    <th>Id</th>
                    <th>User ID</th>
                    <th>Transaction</th>
                    <th>Expiration</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
            </table>             
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
  <?php else:  ?>
    <div class="panel panel-default">
      <div class="panel-body">
          Customer doesn't have any transactions
      </div>
    </div>
  <?php endif; ?>
</div>

  <script type="text/javascript">
$(document).ready(function() {
    var table = $('#table_results').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "/customers/transactions/ajaxCustomerTransactions/"+<?php echo $_GET['id']?>,
        "columns" : [
          { "data" : "id" } ,
          { "data" : "user_id"},
          { "data" : "amount" },
          { "data" : "expiration" }
        ],
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
            }
        ]
      });
    
  });
</script>
