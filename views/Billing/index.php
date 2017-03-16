<div class="text-center">
<h1 class="blue_text">Billing Transactions</h1>
<p class="lead">
</p>
<div class="customer_listing">
  <div class="col-md-10 "> 
    <div class="customer-detail">
    </div>
    <div class="table-responsive">  
       <table id="table_results" class="table table-bordered table-striped table-hover" >
            <thead>
              <tr class="blue_text">
                <th>Id</th>
                <th>Transaction</th>
                <th>Expiration</th>
              </tr>
            </thead>
            <tbody>
           <?php foreach($viewmodel as $col) : ?>
                <tr id="<?php echo $col['user_id'];?>" class="myrow" style="font-size: 12px;">
                <td><?php echo $col['id']?></td>
                <td><?php echo $col['amount']?></td>
                <td><?php echo $col['expiration']?></td>
              </tr>
           <?php endforeach; ?>
           </tbody>
      </table>             
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