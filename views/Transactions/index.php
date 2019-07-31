<div class="text-center">
<h1 class="blue_text">Transactions</h1>
<p class="lead">
</p>
<div class="customer_listing">
  <div class="col-md-10 ">
    <div class="table-responsive">
       <table id="transResults" class="table table-bordered table-striped table-hover" >
            <thead>
              <tr class="blue_text">
                <th>Id</th>
                <th>User Id</th>
                <th>Transaction</th>
                <th>Expiration</th>
              </tr>
            </thead>
            <tbody>
           </tbody>
      </table>
</div>
  <script type="text/javascript">
$(document).ready(function() {

    var table = $('#transResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo ROOT_URL?>"+"/?controller=transactions&action=doAjaxTable",
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

    $("#transResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        var controller="transactions";
        var action="fetch";
        var link= "<?php echo ROOT_URL?>"+"/?controller="+controller+"&action="+action+"&id="+data["user_id"];

        document.location.href = link;

     });

  });
</script>
