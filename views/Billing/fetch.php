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
                    <th>Transaction</th>
                    <th>Expiration</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($viewmodel as $col) : ?>
                    <tr id = <?php echo $col['id'];?> class="myrow" style="font-size: 12px;">
                      <td class="col-md-1"><?php echo $col['id']?></td>
                      <td class="col-md-2"><?php echo $col['amount']?></td>
                      <td class="col-md-9"><?php echo $col['expiration']?></td>
                    </tr>
                  <?php endforeach; ?>
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
        Please return to the Customers page and try again.
      </div>
    </div>
  <?php endif; ?>

</div>
