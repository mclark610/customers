<div class="text-center">
<h1 class="blue_text">Customer Transactions</h1>
<p class="lead"></p>
<div class="row">
  <div class="col-12">
    <div class="customer_listing">
          <form>
            <div class="form-group">
              <label for="customer">Customer</label>
              <input type="text" class="form-control" id="customer" aria-describedby="CustomerHelp" placeholder="Customer Name" readonly>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" placeholder="Phone Number" readonly>
            </div>
          </form>

            <div class="row">
              <div class="col-md-10 text-left">
                <div class="table-responsive textcentered">
                  <table id="table-results" class="table table-bordered table-striped table-hover " >
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
  <script type="text/javascript" src="/assets/js/trans_fetch.js"></script>
