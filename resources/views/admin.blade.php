@extends('layouts.admin')

@section('content')




   
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">VIP Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $vip_users }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-3x text-gray-300"></i>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Premium Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $premium_users }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-3x text-gray-300"></i>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-success text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_users }}</div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-users fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-info text-uppercase mb-1">Net Income</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₱ {{ number_format($total_netincome, 2) }} </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-chart-bar fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-info text-uppercase mb-1">Total Expenses</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₱ {{ number_format($total_expenses, 2) }} </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-chart-bar fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-warning text-uppercase mb-1">Total Revenue</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ number_format($total_revenue, 2) }} </div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-ruble-sign fa-2x text-gray-250"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Membership Chart Report </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>


                <!-- Card Body -->
                <div class="card-body">
                 <script src="https://code.highcharts.com/highcharts.js"></script>
                  <script src="https://code.highcharts.com/modules/exporting.js"></script>
                  <script src="https://code.highcharts.com/modules/export-data.js"></script>
                  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                  <figure class="highcharts-figure">
                     <div class="h6 mb-0 font-weight-bold text-gray-800">Total Sign Up Today: {{  $signup_today  }}</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">Total Sign Up Yesterday: {{  $countYesterday  }}</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">Total Sign Up From Last 7 days: {{  $countLastSevenDays  }}</div>
                    <div id="container"></div>
                    <p class="highcharts-description"> 
                     

                     </p>
                  </figure>
                </div>
              </div>
            </div>
              
          </div>
<style>
 .highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
  </style>

  <script>

var usersChart =  <?php echo json_encode($usersChart) ?>;
var jan =  <?php echo json_encode($jan) ?>;
var feb =  <?php echo json_encode($feb) ?>;
var march =  <?php echo json_encode($march) ?>;
var april =  <?php echo json_encode($april) ?>;
var may =  <?php echo json_encode($may) ?>;
var june =  <?php echo json_encode($june) ?>;
var july =  <?php echo json_encode($july) ?>;
var aug =  <?php echo json_encode($aug) ?>;
var sep =  <?php echo json_encode($sep) ?>;
var oct =  <?php echo json_encode($oct) ?>;
var nov =  <?php echo json_encode($nov) ?>;
var dec =  <?php echo json_encode($dec) ?>;

Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Monthly Sign up Report'
  },
  subtitle: {
    text: ''
  },
  /** xAxis: {
    min: 0,
    title: {
      text: 'Months'
    }
  }, **/
  xAxis: {
        categories: ['Jan','Feb','Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    title: {
      text: 'Months'
    }
    },
  yAxis: {
    min: 0,
    title: {
      text: 'Headcount'
    }
  },
  /**tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },**/
   tooltip: {
        formatter: function () {
            return 'Total Sign Up for <b>' + this.x +
                '</b> is <b>' + this.y + '</b>';
        }
    },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
        data: [jan,feb,march, april, may, june,july,aug,sep,oct,nov,dec]
    }]
  /* series: [{
    name: 'Sign Up',
    data: usersChart

  }] 

  series: [{ name: 'march',
                    data: march,
                }, {
                    name: 'april',
                    data: april,
                }, {
                    name: 'may',
                    data: may,
                }, {
                    name: 'june',
                    data: june,
                }, {
                    name: 'july',
                    data: july,
                }, {
                    name: 'aug',
                    data: aug,
                }, {
                    name: 'sep',
                    data: sep,
                }, {
                    name: 'oct',
                    data: oct,
                }, {
                    name: 'nov',
                    data: nov,
                }, {
                    name: 'dec',
                    data: dec,
                }] */

});


  </script>


@endsection