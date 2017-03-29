<div class="text-center">
<h1 class="blue_text">Tables test</h1>
<p class="lead">
<?php 
  #var_dump($_SESSION);
  #var_dump($_SERVER);
  if (isset($viewmodel) ) {
//      echo "numRows<$numRows> --- maxSize<$maxSize> --- numPages<$numPages><br>";
  }
?>

</p>
</div>
  <div class="cust_list">
    <div class="table-responsive">  
       <table id="tableResults" class="table table-bordered table-striped table-hover" >
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
  </div>   <!-- cust-list -->
</div> <!-- customer_listing -->

<script type="text/javascript">
$(document).ready(function() {

    var table = $('#tableResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "/customers/tables/doAjaxTable",
        "columns" : [
          { "data" : "id" } ,
          { "data" : "last" },
          { "data" : "expiration" }
        ]
      });
    
    $("#tableResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        //alert(data["id"] + data["last"] + data["expiration"]);
        var controller="tables";
        var action="fetch";
        var link="/customers/"+controller+"/"+action+"/"+data["id"];

        document.location.href = link;
                                     
     });
  });

    </script>

