<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,follow">
  <title>Result</title>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="morris.css">
</head>
<body>
 
<?php
$key=$_GET['datename'];
$con = mysql_connect('localhost', 'root', '');
//echo $key;
mysql_select_db($key, $con);
$quryset = mysql_query('SET NAMES utf8', $con);
$quryset = mysql_query("SELECT * FROM date");

//echo $quryset;

echo "<div id='graph'></div>";
echo "<script>";
echo "var day_data = [";
while ($data = mysql_fetch_array($quryset)){
        echo "{'DateT': '" . $data[0] . "', 'MaxT':" .$data[1] . ", 'MinT':" .$data[2] . "},";
}

        echo "];";
        echo "Morris.Line({";
        echo "element: 'graph',";
        echo "data: day_data,";
        echo "xkey: 'DateT',";
        echo "ymax: '25',";
        echo "ymin: '-5',";
        echo "ykeys: ['MaxT', 'MinT'],";
        echo "labels: ['最高気温', '最低気温'],";
        echo "smooth: false,";
        echo "resize: true";
        echo "});";
        echo "</script>";
 
?>
 
</body>
</html>