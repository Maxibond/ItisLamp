<!DOCTYPE>
<html>
<head>
 <title>Интернет-магазин "Шабашka" </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
    echo '<table border>
    <tr>
    	<td>Номер</td>
    	<td>Получатель</td>
    	<td>Товар</td>
    	<td>Кол-во</td>
    	<td>Комментарий от заказчика</td>
    </tr>';
	if (( $fp = fopen('file.csv','r'))!==FALSE){
		while (($data = fgetcsv($fp, 1000, ','))!==FALSE){
			$num = count($data);
			$row++;
			echo '<tr>';
			echo '<td align="middle">'.$row.'</td>';
			for($c=0;$c < $num; $c++){
				echo '<td align="middle">'.$data[$c]."</td>";
			}
			echo '</tr>';
		}
		fclose($fp);
	}
	echo '</tabe>';
?>
</body>
</html>
