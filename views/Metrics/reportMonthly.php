<div class="text-center">
  <h1 class="blue_text">Metrics</h1>
  <p class="lead">
  </p>
</div>
<div class="row">
  <div class="col-10">
    <h2>Getting there Monthly</h2>
    <?php $msg = ASSET_PATH ."assets/js/metrics_monthly.js"; ?>
    <?php echo "<script>alert(\"$msg\")</script>";?>
  </div>
</div> <!-- row -->

<div class="row">
    <div class="col-12">
      <canvas id="myChart"></canvas>
    </div>
</div> <!-- row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="<?php ASSET_PATH;?>assets/js/metrics_monthly.js"></script>
