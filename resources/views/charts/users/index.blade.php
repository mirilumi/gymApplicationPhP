@extends('layouts.userLayout')

@section('content')
    <div id="linechart" style="width: 900px; height: 500px"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var visitor = <?php echo $visitor; ?>;
        console.log(visitor);
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(visitor);
            var options = {
                title: 'Progressi',
                // curveType: 'function',
                legend: {position: 'bottom'}
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>
@endsection