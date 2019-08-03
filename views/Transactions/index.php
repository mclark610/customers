<div class="text-center">
<h1 class="blue_text">Transactions</h1>
<p class="lead">
</p>
<div class="row">
  <div class="col-10">
    <div class="customer_listing">
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
  </div>
  <script type="text/javascript" src="/customers/assets/js/trans_index.js"></script>
  <script type="text/javascript">
$(document).ready(function() {

    var table = $('#transResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo ROOT_URL?>"+"/?controller=transactions&action=doAjaxTable",
        "columns" : trans_index_cols
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
