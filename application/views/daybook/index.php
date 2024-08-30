<?php 
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h5 class="box-title"><i class=""></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                                            <hr>
                                        </div>
                                        <form role="form" action="<?php echo site_url('admin/admin/manageDayBook') ?>" method="post">
                                            <div class="box-body">
                                                <?php echo $this->customlib->getCSRF(); ?>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('search_type'); ?><small class="text-danger"> *</small></label>
                                                        <select class="form-control" name="search_type" onchange="showdate(this.value)">
                                                            <?php foreach ($searchlist as $key => $search) { ?>
                                                                <option value="<?php echo $key ?>" <?php if ((isset($search_type)) && ($search_type == $key)) { echo "selected"; } ?>><?php echo $search ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="text-danger" id="error_search_type"></span>
                                                    </div>
                                                </div>
                                                <div id='date_result'></div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h5 class="box-title titlefix"><i class=""></i> <?php echo $this->lang->line('daybook_report'); ?></h5>
                                            <hr>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="card bg-info">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total <?php echo $this->lang->line('fees'); ?></h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"><?php echo number_format($total_amount, 2); ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-orange">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total Income </h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"> <?php echo number_format($income_grand_total, 2); ?></p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-pink">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total Expense </h5>
                                                        <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri">
                                                            <?php echo
                                                           number_format($expense_grand_total, 2);?>
                                                        </p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-danger">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Cash in Hand</h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"><?php echo number_format($cash, 2); ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div><!-- /.row -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->

                                        <div class="container">
                                        <div class="row">
                                          
                                            <div class="nk-ck-sm">
                                                                <div class="traffic-channel-doughnut-ck">
                                                                <canvas class="doughnut-chart" id="doughnutChartData"></canvas>
                                                                </div>
                                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
<?php
if ($search_type == 'period') {
    ?>

        $(document).ready(function () {
            showdate('period');
        });

    <?php
}
?>
  var total_amount = '<?php echo $total_amount; ?>';
    var income_grand_total = '<?php echo $income_grand_total; ?>';
    var expense_grand_total = '<?php echo $expense_grand_total; ?>';
    var cash = '<?php echo $cash; ?>';

    console.log('cash :>> ', cash);
   var doughnutChartData = {
    labels: ["Fees", "Income", "Expense","Cash In Hand"],
    dataUnit: 'RS',
    legend: true,
    datasets: [{
      borderColor: "#fff",
      background: ["#b695ff", "#f4aaa4", "#8feac5","#84fb74"],
      data: [total_amount, income_grand_total, expense_grand_total,cash]
    }]
  };
  function doughnutChart(selector, set_data) {
    var $selector = selector ? $(selector) : $('.doughnut-chart');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].borderColor,
          hoverBorderColor: _get_data.datasets[i].borderColor,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'doughnut',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          plugins: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              rtl: NioApp.State.isRTL,
              labels: {
                boxWidth: 12,
                padding: 20,
                color: '#6783b8'
              }
            },
            tooltip: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                label: function label(context) {
                  return "".concat(context.parsed, " ").concat(_get_data.dataUnit);
                }
              },
              backgroundColor: '#eff6ff',
              titleFont: {
                size: 13
              },
              titleColor: '#6783b8',
              titleMarginBottom: 6,
              bodyColor: '#9eaecf',
              bodyFont: {
                size: 12
              },
              bodySpacing: 4,
              padding: 10,
              footerMarginTop: 0,
              displayColors: false
            }
          },
          rotation: 1,
          cutoutPercentage: 40,
          maintainAspectRatio: false
        }
      });
    });
  }
  doughnutChart();

  // init doughnut chart
</script>
