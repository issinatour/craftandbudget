
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>
</div>
<!-- Mainly scripts -->
<script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>js/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="<?=base_url()?>js/plugins/flot/jquery.flot.js"></script>
<script src="<?=base_url()?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url()?>js/plugins/flot/jquery.flot.spline.js"></script>
<script src="<?=base_url()?>js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?=base_url()?>js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="<?=base_url()?>js/plugins/peity/jquery.peity.min.js"></script>
<script src="<?=base_url()?>js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>js/inspinia.js"></script>
<script src="<?=base_url()?>js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?=base_url()?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="<?=base_url()?>js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="<?=base_url()?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="<?=base_url()?>js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="<?=base_url()?>js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="<?=base_url()?>js/plugins/toastr/toastr.min.js"></script>


<script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

        }, 1300);


        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#464f88"],
                xaxis:{
                },
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
        );

        var doughnutData = [
            {
                value: 300,
                color: "#a3e1d4",
                highlight: "#1ab394",
                label: "App"
            },
            {
                value: 50,
                color: "#dedede",
                highlight: "#1ab394",
                label: "Software"
            },
            {
                value: 100,
                color: "#b5b8cf",
                highlight: "#1ab394",
                label: "Laptop"
            }
        ];

        var doughnutOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 45, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
        };

        var ctx = document.getElementById("doughnutChart").getContext("2d");
        var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

        var polarData = [
            {
                value: 300,
                color: "#a3e1d4",
                highlight: "#1ab394",
                label: "App"
            },
            {
                value: 140,
                color: "#dedede",
                highlight: "#1ab394",
                label: "Software"
            },
            {
                value: 200,
                color: "#b5b8cf",
                highlight: "#1ab394",
                label: "Laptop"
            }
        ];

        var polarOptions = {
            scaleShowLabelBackdrop: true,
            scaleBackdropColor: "rgba(255,255,255,0.75)",
            scaleBeginAtZero: true,
            scaleBackdropPaddingY: 1,
            scaleBackdropPaddingX: 1,
            scaleShowLine: true,
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
        };
        var ctx = document.getElementById("polarChart").getContext("2d");
        var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

    });
</script>
</body>

</html>