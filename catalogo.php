<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include_once('menu.php');
    ?>
		<?php
$my_url = urlencode("http://localhost:3000/API/Productos/api-productos.php?categoria=juguetes");
//$json_is = "http://localhost:3000/API/Productos/api-productos.php?categoria=juguetes";
//$video_info = json_decode ( file_get_contents ( $json_is ), true );
     $response = json_decode(file_get_contents($my_url),true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
					include('items.php');	
		}
		}else{
		echo $response['response'];
		}
		?>

    <script src="js/main.js"></script>
</body>
</html>