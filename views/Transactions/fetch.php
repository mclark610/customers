<div class="text-center">
<h1 class="blue_text">Customer Transactions</h1>
<p class="lead"></p>
<div class="row">
  <div class="col-12">
    <div class="customer_listing">
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
              <br/>
            </div>

            <div class="row">
              <div class="col-md-10 text-left">
                <div class="table-responsive textcentered">
                  <table id="table_results" class="table table-bordered table-striped table-hover " >
                    <thead>
                      <tr class="blue_text">
                        <th>id</th>
                        <th>user_id</th>
                        <th>first</th>
                        <th>last</th>
                        <th>phone</th>
                        <th>expiration</th>
                        <th>amount</th>
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
  </div>
  <script type="text/javascript">
$(document).ready(function() {
    var table = $('#table_results').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo ROOT_URL?>"+"/?controller=Transactions&action=ajaxCustomerTransactions&id="+parseInt(<?php echo $_GET['id'];?>),
        "columns" : [
          { "data" : "id" } ,
          { "data" : "user_id"},
          { "data": "first"},
          { "data": "last"},
          {"data": "phone"},
          { "data": "expiration"},
          { "data" : "amount" },
        ],
      });

  });
</script>
