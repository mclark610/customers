
// ----------------------------------------------------
// build cool data object for pie chart
// ----------------------------------------------------
//// TODO: get color scheme together to use for Chart
function buildMonthlyLineChart() {
    //buildMonthlyLineChart2();
    buildMonthlySalesMonthly();
}

function buildMonthlySalesMonthly() {
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  let jqxhr = $.ajax("http://localhost/customers/?controller=Metrics&action=SalesMonthly")
    .done(function(data) {
      alert("data" + data);
      var ctx = document.getElementById('myChart').getContext('2d');
      var totalsChart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          //data: buildDataForPie(),
          data: JSON.parse(data),
          // Configuration options go here
          options: {
            responsive: true,
            title: {
              display: true,
              text: 'Monthly Sales'
            },
            tooltips: {
              mode: 'index',
              intersect: false,
            },
            hover: {
              mode: 'nearest',
              intersect: true
            },
            scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Month'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Value'
                }
              }]
            }
          }
        });

    })
    .fail(function() {
      alert("Incomplete data. Unable to build Line Chart");
    })
    .always("always", function() {
    });

}

function buildMonthlyLineChart2() {
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
				datasets: [{
					label: '2015',
					backgroundColor: "rgb(54, 162, 235)",
					borderColor: "rgb(54, 162, 235)",
					data: [
            10,
            50,
            20,
            30,
            40
					],
					fill: false,
				}, {
					label: '2016',
					fill: false,
					backgroundColor: "rgb(55,108,83)",
					borderColor: "rgb(55,108,83)",
					data: [
            50,
            40,
            30,
            20,
            10
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Monthly Sales'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

    var ctx = document.getElementById('myChart').getContext('2d');
		window.myLine = new Chart(ctx, config);
}

function optionOnSelect(e) {
  alert("report sele");

}

$(document).ready(function() {

  let root_url = window.location.origin+window.location.pathname;

  buildMonthlyLineChart();

  }); /* ready function */
