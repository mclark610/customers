<div class="text-center">
  <h1 class="blue_text">Customer Transactions</h1>
  <p class="lead"></p>
</div>
<form>

  <div class="row">
    <div class="col-1 col-med-2"></div>
    <div class="col-6 .col-md-6">
        <div class="form-group">
              <label for="customer">Customer</label>
              <input type="text" class="form-control" id="customer" aria-describedby="CustomerHelp" placeholder="Customer Name" readonly>
        </div>
    </div>
    <div class="col-6 col-md-4"></div>
  </div> <!-- row -->

  <div class="row">
    <div class="col-1 col-med-2"></div>
    <div class="col-6 col-md-4">
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" aria-describedby="CustomerHelp" placeholder="Phone Number" readonly>
      </div>
    </div>
    <div class="col-6 col-md-4"></div>
  </div> <!-- row -->

</form>

<div class="row">
  <div class="col-12">
    &nbsp;
  </div>
</div> <!-- row -->

<div class="row">
  <div class="col-1 col-med-2"></div>
  <div class="col-8 col-med-6">
    <div class="table-responsive textcentered">
      <table id="table-results" class="table table-bordered table-striped table-hover ">
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
  </div> <!-- col6 -->

  <script type="text/javascript" src="<?php ASSET_PATH;?>assets/js/trans_fetch.js"></script>
