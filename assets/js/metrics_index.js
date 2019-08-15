
// ----------------------------------------------------
// build cool data object for pie chart
// ----------------------------------------------------

// prepares correct data
function buildPieSalesYearly() {
  let jqxhr = $.ajax("http://localhost/customers/?controller=Metrics&action=SalesYearly")
    .done(function(data) {
      var ctx = document.getElementById('myChart').getContext('2d');
      var totalsChart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'pie',
          // The data for our dataset
          //data: buildDataForPie(),
          data: JSON.parse(data),
          // Configuration options go here
          options: {}
      });
    })
    .fail(function() {
      alert("Incomplete data. Unable to build Pie Chart");
    })
    .always("always", function() {
    });
}

function optionOnSelect(e) {
  alert("report sele")

}

$(document).ready(function() {

  let root_url = window.location.origin+window.location.pathname;

  buildPieSalesYearly();

  }); /* ready function */
