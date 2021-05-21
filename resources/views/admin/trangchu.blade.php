@extends('admin.layout.index')
@section('title')
    <title>Danh sách mẫu phòng chiếu</title>
@endsection
@section('content')
<div style="display:flex">
  <div id="chart_div"></div>
    <div id="chart_div2"></div>
</div>

@endsection
@section('script-ori')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
@section('script')
<script type="text/javascript">

var data = {!! json_encode($data)!!}
var detailRevenue = {!! json_encode($detailRevenue)!!}
pieData = data.map(x=> {
  return [x.name,x.total]
})

LineData = detailRevenue.map(x => {
  return [x.buy_date,x.total, x.total - x.price*x.qty]
})

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawPieChart);
function drawPieChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows(pieData);

  var options = {
                'title':'Revenue of the movies',
                 'width':450,
                 'height':300};

  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawLineChart);

      function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Product sales'],
          ...LineData
        ]);

        var options = {
          title: 'Sales detail',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          'width':600,
          'height':300
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
</script>
@endsection