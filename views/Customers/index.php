<div class="text-center">
  <h1 class="blue_text">Customer Listing</h1>
  <p class="lead">
  </p>
</div>
<div class="customer_listing">
  <div class="col-md-10 ">
    <div class="table-responsive">
       <table id="custResults" class="table table-bordered table-striped table-hover" >
            <thead>
              <tr class="blue_text">
                <th>id</th>
                <th>last</th>
                <th>expiration</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
      </table>
    </div> <!-- table-responsive -->
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
//    alert("Customers view");
    var table = $('#custResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "https://cust.casualcoder.net/?controller=Customers&action=doAjaxTable",
        "columns" : [
          { "data" : "id" } ,
          { "data" : "last" },
          { "data" : "expiration" },
        ]
      });

    $("#custResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        var controller="transactions";
        var action="fetch";
        var link="https://cust.casualcoder.net/?controller="+controller+"&action="+action+"&id="+data["id"];

        document.location.href = link;
     });
  });

    </script>

  </div> <!-- customer_listing -->
