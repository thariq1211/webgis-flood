<script src="<?php echo base_url('assets/landing-assets/js/jquery-3.3.1.min.js')?>"></script>
<!-- https://jquery.com/download/ -->
<script src="<?php echo base_url('assets/landing-assets/js/moment.min.js')?>"></script>
<!-- https://momentjs.com/ -->
<script src="<?php echo base_url('assets/landing-assets/js/Chart.min.js')?>"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="<?php echo base_url('assets/landing-assets/js/bootstrap.min.js')?>"></script>
<!-- https://getbootstrap.com/ -->
<script src="<?php echo base_url('assets/landing-assets/js/tooplate-scripts.js')?>"></script>
<script>
    Chart.defaults.global.defaultFontColor = 'white';
    let ctxLine,
    ctxBar,
    ctxPie,
    optionsLine,
    optionsBar,
    optionsPie,
    configLine,
    configBar = {
      type: "horizontalBar",
      data: {
        labels: ["Red", "Aqua", "Green", "Yellow", "Purple", "Orange", "Blue"],
        datasets: [
        {
            label: "# of Hits",
            data: [33, 40, 28, 49, 58, 38, 44],
            backgroundColor: [
            "#F7604D",
            "#4ED6B8",
            "#A8D582",
            "#D7D768",
            "#9D66CC",
            "#DB9C3F",
            "#3889FC"
            ],
            borderWidth: 0
        }
        ]
    },
    options: optionsBar
};,
configPie,
lineChart;
barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>