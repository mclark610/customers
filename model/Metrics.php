<?php
define('RGB_COLORS',array(
  'rgb(0,72,186)', //dk blue
  'rgb(175,0,42)', //blood red
  'rgb(255,191,0)', //amber
  'rgb(0.40,0.13,0.00)', //plum
  'rgb(30,77,43)', //green
  'rgb(195,176,145)',//khaki
  'rgb(127,255,212)',// aquamarine,
  'rgb(216,145,239)',//lavendar
));

class PieData implements JsonSerializable {
    private
        $labels = null,
        $data   = null,
        $rst    = null,
        $title  = null;

    public function __construct($rst) {
      $labels = array();
      $this->rst = $rst;
    }

    private function initArrays() {
        foreach( $this->rst as $key => $value) {
          $this->labels[] = $value["year"];
          $this->data[]   = $value["amount"];
        }

        $this->buildTitle();
    }

    private function buildTitle() {
         $numYears = count($this->rst);
         $yearSpan = "";
         if ($numYears>0) {
            $yearSpan = $this->labels[0] . " to " . end($this->labels);
         };
        $this->title = 'Yearly Sales ' . $yearSpan;
    }

    public function buildDataset() {
        return [
            'label' => $this->title,
            'backgroundColor' => 'rgb(255, 99, 132)',
            'borderColor' => 'rgb(255, 99, 132)',
            'data' => $this->data,
            'backgroundColor' => [
              'rgb(54, 162, 235)', //blue
              'rgb(75, 192, 192)', //orange
              'rgb(201, 203, 207)',//grey
              'rgb(75, 192, 192)',//green
             ]
        ];
    }

    public function jsonSerialize() {
      $this->initArrays();
      return [
        'labels'=> $this->labels,
        'datasets' => [$this->buildDataset()]
      ];
    }
}

//XDEBUG_SESSION_START=xdebug-atom
class MonthlyData implements JsonSerializable {
    private
        $labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        $data   = null,
        $rst    = null,
        $title  = null,
        $yearData = null,
        $arrYears = null;

    public function __construct($rst) {
      $this->yearData = array();
      $this->arrYears = array();
      $this->rst = $rst;
    }

    private function initYearMonth($yr) {
       $this->yearData[$yr] = array_fill(0,12,0);
    }

    private function initArrays() {

        foreach( $this->rst as $value) {
             if (!array_key_exists($value["year"],$this->yearData)) {
                $this->arrYears[] = $value["year"];
                $this->initYearMonth($value["year"]);
            }

            $this->yearData[$value["year"]][$value["month"]-1] = intval($value["amount"]);
        }

        $this->buildTitle();
    }

    private function buildTitle() {
         $numYears = count($this->arrYears);
         $yearSpan = "";
         if ($numYears>0) {
            $yearSpan = $this->labels[0] . " to " . end($this->labels);
         };
        $this->title = 'Yearly Sales ' . $yearSpan;
    }

    public function buildDataset($yr) {
        return [
            'label' => $yr,
            'backgroundColor' => RGB_COLORS[$yr % 8],
            'borderColor' => RGB_COLORS[$yr % 8],
            'data' => $this->yearData[$yr],
            'fill' => false
        ];
    }

    public function buildOptions() {
      return [
        'responsive' => true,
        'title' => [
          'display' => true,
          'text' => 'Monthly Sales'
        ],
        'tooltips' => [
          'mode' => 'index',
          'intersect' => false,
        ],
        'hover' => [
          'mode' => 'nearest',
          'intersect' => true
        ],
        'scales' => [
          'xAxes' => [[
            'display' => true,
            'scaleLabel' => [
              'display' => true,
              'labelString' => 'Month'
            ]
          ]],
          'yAxes' => [
            'display' => true,
            'scaleLabel' => [
              'display' => true,
              'labelString' => 'Value'
            ]
          ]
        ]
    ];
    }

    public function jsonSerialize() {
      $this->initArrays();
      asort($this->arrYears);
      foreach($this->arrYears as $yr) {
         $datasets[] = $this->buildDataset($yr);
      }

      return [
        'labels'=> $this->labels,
        'datasets' => $datasets,
        'options' => $this->buildOptions(),
      ];
    }
}

class MetricsModel extends Model {
  	private $sql;
    private $row;
	  private $limit=10;
	  private $arrCust;

    public function Index() {
//		    return $this->salesYearly();
    }

    public function yearly() {

    }
    public function monthly() {

    }
    public function salesWeekly( $year, $limit=10 ) {
        $this->sql = "call sales_weekly(".$year.")";
	      $this->query($this->sql);

        $rst = $this->resultSet();

		    return("sales goes here");
    }

    public function salesMonthly() {
          $this->sql = "call sales_monthly()";
          $this->query($this->sql);

          $rst = $this->resultSet();
          $tmp = json_encode(new MonthlyData($rst));

          echo json_encode(new MonthlyData($rst));

    }

    public function salesYearly() {
          $this->sql = "call sales_yearly()";
          $this->query($this->sql);

          $rst = $this->resultSet();
          echo json_encode(new PieData($rst));
    }

}
