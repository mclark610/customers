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
                <th>Id</th>
                <th>Name</th>
                <th>Expiration</th>
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

    var table = $('#custResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "/customers/customers/doAjaxTable",
        "columns" : [
          { "data" : "id" } ,
          { "data" : "last" },
          { "data" : "expiration" }
        ]
      });
    
    $("#custResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        var controller="transactions";
        var action="fetch";
        var link="/customers/"+controller+"/"+action+"/"+data["id"];

        document.location.href = link;
     });
  });

    </script>

  </div> <!-- customer_listing -->
