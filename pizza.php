<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = array(
    array('Pizza', 'Slices'),
    array('Cheese', intval($_POST['cheese'])),
    array('Pepperoni', intval($_POST['pepperoni'])),
    array('Veggie', intval($_POST['veggie'])),
    array('Meat Lovers', intval($_POST['meat-lovers'])),
    array('Hawaiian', intval($_POST['hawaiian']))
  );
} else {
  $data = array(
    array('Pizza', 'Slices'),
    array('Cheese', 0),
    array('Pepperoni', 0),
    array('Veggie', 0),
    array('Meat Lovers', 0),
    array('Hawaiian', 0)
  );
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Pizza Chart</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

        var options = {
          title: 'Pizza Slices Eaten',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <h1>Pizza Chart</h1>
    <form method="post" action="pizza.php">
      <label for="cheese">Cheese:</label>
      <input type="number" id="cheese" name="cheese" value="<?php echo $data[1][1]; ?>"><br>

      <label for="pepperoni">Pepperoni:</label>
      <input type="number" id="pepperoni" name="pepperoni" value="<?php echo $data[2][1]; ?>"><br>

      <label for="veggie">Veggie:</label>
      <input type="number" id="veggie" name="veggie" value="<?php echo $data[3][1]; ?>"><br>

      <label for="meat-lovers">Meat Lovers:</label>
      <input type="number" id="meat-lovers" name="meat-lovers" value="<?php echo $data[4][1]; ?>"><br>

      <label for="hawaiian">Hawaiian:</label>
      <input type="number" id="hawaiian" name="hawaiian" value="<?php echo $data[5][1]; ?>"><br>

      <input type="submit" value="Draw Chart">
    </form>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>