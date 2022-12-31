@php
$assetsurl = asset('public/frontend');
@endphp


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  


@if ($type==5)

<div id="chartdiv1" style="height: 350px"></div>

<script type="text/javascript">

am5.ready(function() {
    var root = am5.Root.new("chartdiv1");
    root.setThemes([
        am5themes_Animated.new(root)
    ]);
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout,
        innerRadius: am5.percent(40)
    }));

    var series0 = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "bottles",
        categoryField: "name",
        alignLabels: false
    }));

    var bgColor = root.interfaceColors.get("background");

    series0.ticks.template.setAll({
        forceHidden: true
    });
    series0.labels.template.setAll({
        forceHidden: true
    });
    series0.slices.template.setAll({
        stroke: bgColor,
        strokeWidth: 2,
        tooltipText: "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} bottles)"
    });
    series0.slices.template.states.create("hover", {
        scale: 0.95
    });

    var series1 = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "companies",
        categoryField: "name",
        alignLabels: true
    }));

    series1.slices.template.setAll({
        stroke: bgColor,
        strokeWidth: 2,
        tooltipText: "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} companies)"
    });

    data = [<?=rtrim($chartDatafive,',')?>];
    series0.data.setAll(data);
    series1.data.setAll(data);

    series0.appear(1000, 100);
    series1.appear(1000, 100);

});

</script>
@endif


@if ($type==4)

<div id="product" style="height: 350px"></div>

<script type="text/javascript">

am5.ready(function() {
            


           
            var root = am5.Root.new("product");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                pinchZoomX: true
            }));
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });
            
            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Create series
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "country",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            var data = [<?=rtrim($chartDataFour,',')?>];
            xAxis.data.setAll(data);
            series.data.setAll(data);
            series.appear(1000);
            chart.appear(1000, 100);

        }); 
</script>


@endif

@if ($type==3)

<div id="dealschart" style="height: 350px"></div>

<script type="text/javascript">
   
   am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("dealschart");
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        layout: root.verticalLayout
    }));

    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50
        })
    );

    var data = {{chartDataThree}}

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "year",
        renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9
        }),
        tooltip: am5.Tooltip.new(root, {})
    }));
    xAxis.data.setAll(data);
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        renderer: am5xy.AxisRendererY.new(root, {})
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "year"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
        });

        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 0,
                sprite: am5.Label.new(root, {
                    text: "{valueY}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: 0,
                    centerX: am5.p50,
                    populateText: true
                })
            });
        });

        legend.data.push(series);
    }

    makeSeries("Deals", "Deals");
    makeSeries("Investment", "Investment");
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()

</script>
@endif





@if ($type==2)

<div id="columnchart_material" style="height: 350px"></div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(
                [
                    <?=rtrim($chartDataTwo,',')?>
                ]
            );
            var options = {
            chart: {
                title: 'Performance',
                subtitle: '',
            }
            };
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endif


@if ($type==1)
<div id="series_chart_div" class="ms-n5 min-h-auto" style="height: 425px"></div>
<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {
        
        var data = google.visualization.arrayToDataTable(
            [
                <?=rtrim($chartOne,',')?>
            ]
        );

        var options = {
            title: '',
            hAxis: {title: 'Number Of Company'},
            vAxis: {title: 'Number Of Deals'},
            bubble: {textStyle: {fontSize: 11}},
            colorAxis: {colors: ['yellow', 'green']}
        };

        var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
        chart.draw(data, options);
    }
</script>

@endif



