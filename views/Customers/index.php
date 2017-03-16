<div class="text-center">
<h1 class="blue_text">Customer Listing</h1>
<p class="lead">
<!--  Please log in to access -->
</p>
</div>
<!-- 
  <form name="customers" method="POST" action="customer.php">
    <div class="sort_by" align=right>
      <select name="sort by">
        <option value="not_paid">Not Paid</option>
        <option value="paid">Paid</option>
        <option value="expiring">Expiring within 10 days</option>
        <option value="expired">Expired</option>
      </select>
    </div>
  </form>
-->
<div class="customer_listing">
  <div class="col-md-10 "> 
    <div class="table-responsive">  
       <table id="table_results" class="table table-bordered table-striped table-hover" >
            <thead>
              <tr class="blue_text">
                <th>Id</th>
                <th>Name</th>
                <th>Last Date</th>
              </tr>
            </thead>
            <tbody>
              <tr id=999 class="myrow" style="font-size: 12px;">
                <td>999</td>
                <td>Test Name</td>
                <td>3/15/17</td>
                <!--
                <td class="text-right none"> <a href="#" class="tick_icon gridneed_icon"></a>
                  <a class="col-md-offset-1 cross_icon gridneed_icon" data-toggle="modal" href="/billing/index.php"></a>
                </td>
                -->
              </tr>
            <?php foreach($viewmodel as $col) : ?>
              <tr id="<?php echo $col['id']?>" class="myrow" style="font-size: 12px;">
                <td ><?php echo $col['id']?></td>
                <td><?php echo $col['last'],', ' ,$col['first']?></td>
                <td><?php echo $col['expiration']?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
      </table>
    </div> <!-- table-responsive -->
        </div>
      </div>

<script>
  $("tr").dblclick(function() {
    var id = $(this).attr('id');
    var controller="billing";
    var action="fetch";
    var link="/customers/"+controller+"/"+action+"/"+id;

    document.location.href = link;


  });
</script>

  </div> <!-- customer_listing -->
