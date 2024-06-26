<?php
 
$dataPoints1 = array(
    array("label"=> "12-09", "y"=> 32890),
    array("label"=> "2007", "y"=> 5312),
    array("label"=> "2008", "y"=> 11020),
    array("label"=> "2009", "y"=> 16854),
    array("label"=> "2010", "y"=> 30505),
    array("label"=> "2011", "y"=> 52764),
    array("label"=> "2012", "y"=> 70513),
    array("label"=> "2013", "y"=> 81488),
    array("label"=> "2014", "y"=> 88636),
    array("label"=> "2015", "y"=> 95092),
    array("label"=> "2016", "y"=> 103000)
);
 
$dataPoints2 = array(
    array("label"=> "12-09", "y"=> 18270),
    array("label"=> "2007", "y"=> 2098),
    array("label"=> "2008", "y"=> 2628),
    array("label"=> "2009", "y"=> 3373),
    array("label"=> "2010", "y"=> 4951),
    array("label"=> "2011", "y"=> 7513),
    array("label"=> "2012", "y"=> 12159),
    array("label"=> "2013", "y"=> 21992),
    array("label"=> "2014", "y"=> 34991),
    array("label"=> "2015", "y"=> 50776),
    array("label"=> "2016", "y"=> 68000)
);
 
$dataPoints3 = array(
    array("label"=> "12-09", "y"=> 355),
    array("label"=> "2007", "y"=> 522),
    array("label"=> "2008", "y"=> 828),
    array("label"=> "2009", "y"=> 1328),
    array("label"=> "2010", "y"=> 2410),
    array("label"=> "2011", "y"=> 4590),
    array("label"=> "2012", "y"=> 8365),
    array("label"=> "2013", "y"=> 13727),
    array("label"=> "2014", "y"=> 20534),
    array("label"=> "2015", "y"=> 29639),
    array("label"=> "2016", "y"=> 49000)
);
 
$dataPoints4 = array(
    array("label"=> "12-09", "y"=> 800),
    array("label"=> "2007", "y"=> 100),
    array("label"=> "2008", "y"=> 140),
    array("label"=> "2009", "y"=> 300),
    array("label"=> "2010", "y"=> 800),
    array("label"=> "2011", "y"=> 3300),
    array("label"=> "2012", "y"=> 6800),
    array("label"=> "2013", "y"=> 18600),
    array("label"=> "2014", "y"=> 28199),
    array("label"=> "2015", "y"=> 43530),
    array("label"=> "2016", "y"=> 78000)
);
 

 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Growth of Solar Photovoltaics"
    },
    theme: "light2",
    animationEnabled: true,
    toolTip:{
        shared: true,
        reversed: true
    },
    axisY: {
        title: "Cumulative Capacity",
        suffix: " MW"
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [
        {
            type: "stackedColumn",
            name: "Hotel",
            showInLegend: true,
            yValueFormatString: "#,##0 MW",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Almacen",
            showInLegend: true,
            yValueFormatString: "#,##0 MW",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Restaurant",
            showInLegend: true,
            yValueFormatString: "#,##0 MW",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Parking",
            showInLegend: true,
            yValueFormatString: "#,##0 MW",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        }
    ]
});
 
chart.render();
 
function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    e.chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 