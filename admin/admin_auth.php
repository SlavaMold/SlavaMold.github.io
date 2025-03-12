<?php 

require_once '../functions/connect.php'; 
session_start();
require_once 'delete.php';
$login = $_POST['login'];
$password = $_POST['password'];


$check_admin = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'" );

$mysqldata = mysqli_query($connect, "SELECT * FROM `message`");
$phpdata = mysqli_fetch_all($mysqldata, MYSQLI_ASSOC);

$toHtml= '';

if(mysqli_num_rows($check_admin) > 0 || $_SESSION['token'] == true) {?>
     <head>
		<meta charset="UTF-8">
		<title>Admin panel</title>
		<link rel="stylesheet" href="../css/admin-style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
    		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@1,300&family=Inter:wght@200&		family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    		<link rel="preconnect" href="https://fonts.googleapis.com">
    		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@1,300&family=Inter:wght@200&family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    		<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
	</head>
	<body>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<h2>Добро пожаловать в управление All Print Cahul!</h2>
		<div class="container">
		<header>
		<div class="header"> <span> Функции </span> 

			<div class="functions">	<form method="POST" action="" class="del-all">
			<input class="del-data-base function" type="submit" value='очистить все заказы' name="delAll"> 
			</form>

			<form method="POST" class="BL-info">
			<input class="get-bl function" type="submit" value='управление чёрным списком' name="blInfo"> 
			</form>

			<a href="../index.php" class="leave function"> вернуться на главную </a> </div> </div> </header> </div>
			</div>
			<div class="content">
				<div class="container">
				<?php foreach ($phpdata as $datarow) {  ?>	
					<div class="newCommit">
						<span class="comm-data">Заказ номер: <i> <?php echo $datarow['id']; ?> </i> </span>
						<span class="comm-data">Имя заказчика: <i> <?php echo $datarow['name']; ?> </i> </span>
						<span class="comm-data">E-mail: <i> <?php echo $datarow['email']; ?> </i> </span>
						<span class="comm-data">Телефон: <i> <?php echo $datarow['phone']; ?> </i> </span>
						<span class="comm-data">Какие соц. сети есть: <i> <?php echo $datarow['social']; ?> </i> </span>
						<span class="comm-data">Его комментарий: <i> <?php echo $datarow['message']; ?> </i> </span>
						<span class="comm-data">Нужна ли доставка: <i> <?php echo $datarow['ordered']; ?> </i> </span>
						<span class="comm-data">Что заказал: <i> <?php echo $datarow['what_ordered']; ?> </i> </span>
						<div class="images"> <?php
							$pathtoimg = "../pages/ssp/saved/" . $datarow['id'] . "/" ;
							$newimgs = explode('|', $datarow['images']);							
							for($key = 0; $key < count($newimgs); $key++){
								if($newimgs[$key] != ''){
								$imag = $pathtoimg . $newimgs[$key];
								echo '<img src=' . $imag . ' class= "adm-img" >' ; 
								echo '<a href="#" class="download-btn" downl="' . $imag . '"> <img class="download_img" src="../img/other/download.png"> </a>';
								}
							}
						 ?>
					 	 </div>
					 	 <form id='<?php echo $datarow['id'] ?>' method="POST" action="" class="delete-form">
					 	 <span>Удалить заказ номер</span>
					 	 <input class="delCommit" type="submit" value='<?php echo $datarow['id'] ?>' name="butt">
					 	 </form>

					 	 <form id='<?php echo $datarow['id'] ?>' method="POST" action="" class="user-to-bl">
					 	 <span>Добавить в чёрный список ip-адресов заказ </span>
					 	 <input class="blCommit" type="submit" value='<?php echo $datarow['id'] ?>' name="buttToBL">
					 	 </form>
					</div>
					<br>
	   <?php  };  ?>
	   <div class="link"> <span class="contacts"> Связь с разработчиком </span>
	   					<ul class='developer'>
	   						<li>	Слава Тодоров </li>
	   						<li>	079674587 (+Telegram/Viber)</li>
	   						<li> avezpal@gmail.com </li>
	   					 </ul>
	   				 </div>

		 		</div>

			</div>
			<script type="text/javascript" src="support.js"></script>
			<script type="text/javascript" src="../js/adm/ordered.js"></script>
	 </body></html>
<?php $_SESSION['token'] = true; } 
else{
	$_SESSION['message'] = 'Логин или пароль введены не корректно';
	header('Location: ../login.php');
}

	if(isset($_POST['butt'])){
		$toMysql = $_POST['butt'];
		mysqli_query($connect, "DELETE FROM `message` WHERE `id` = '$toMysql'");
		print_r($_POST);
		$dirtodel = '../pages/ssp/saved/' . "$toMysql";
		$files = glob("$dirtodel" . '/*'); 
			foreach($files as $file){ 
  			if(is_file($file)) {
   			 unlink($file); 
  				}
			}
		if(!rmdir($dirtodel)){

		}
		else{
			
		}
	} 

	if(isset($_POST['delAll'])){
		mysqli_query($connect, "TRUNCATE TABLE `message`");

		$globaldir = '../pages/ssp/saved/*';
		$dirrectories = glob("$globaldir");
		foreach($dirrectories as $dirrectory){ 
  				
  				$files = glob("$dirrectory" . '/*'); 
				foreach($files as $file){ 
  				if(is_file($file)) {
   				 unlink($file); 
  					}
				}
				rmdir($dirrectory);

			}
		header("Refresh:0");
	}

	if(isset($_POST['buttToBL'])){ 
		$idToBl = $_POST['buttToBL'];

		foreach ($phpdata as $search) {
			if($search['id'] == $idToBl){
				$ipToBl = $search['ip'];
				$dataToBl = $search['name'] . ', ' . $search['email'] . ', ' . $search['phone'];

				mysqli_query($connect, "INSERT INTO `blacklist` (`user_ip`, `userdata`) VALUES ('$ipToBl', '$dataToBl')");
			}
		}
	}

	if(isset($_POST['blInfo'])){ 
		$BlQuerry = mysqli_query($connect, "SELECT * FROM `blacklist`");

		$toHtml = '<div class="bl-list">';
		$toHtml.=	'<div class="table-hold">';
		$toHtml.=			'<table>';
		$toHtml.=				'<tr><th> ip-adress </th> <th> Последние данные </th></tr>';
							foreach($BlQuerry as $blel){
							$toHtml.=	'<tr> <td>' . $blel['user_ip'] . '</td> <td>' . $blel['userdata'] . '</td> <td>Удалить <form method="POST" action="" class="BL-delete">
								<input class="delFromBl" type="submit" value="' . $blel['user_ip'] .'" name="blDelete"> 
								</form> из чёрного списка </td> </tr> ';	
							}
		$toHtml.=			'</table>';
		$toHtml.=		'<div class="bl-list-buttons"> <form method="post" class="add-ip-custom"> <input type="submit" name="bladdcust" value="Добавить ip" class="bl-list-add-custom">';
		$toHtml.= '<label class="bl-label"> IP-адрес </label>';
		$toHtml.= '<input type="text" name="bladdip" class="bl-input">';
		$toHtml.= '<label class="bl-label"> Информация (не обязательно) </label>';
		$toHtml.= '<textarea type="text" name="bladddata" class="bl-input"> </textarea></form> ';

		$toHtml.= '<form method="post"> <input type="submit" name="blclose" value="выйти" class="bl-list-leave"> </form> </div>';
		$toHtml.=		'</div>';
		$toHtml.=		'<div class="overlay"> </div>';
		$toHtml.=	'</div>';
		echo $toHtml;
	}

	if(isset($_POST['blDelete'])){
		$ipToDel = $_POST['blDelete'];

		mysqli_query($connect, "DELETE FROM `blacklist` WHERE `user_ip` = '$ipToDel'");
	}

	if(isset($_POST['blclose'])){
		$toHtml = '';
		echo $toHtml;
	}

	if(isset($_POST['bladdcust'])){
		$ipToSql = $_POST['bladdip'];
		$dataToSql = $_POST['bladddata'];
		if($ipToSql != ''){
			mysqli_query($connect, "INSERT INTO `blacklist` (`user_ip`, `userdata`) VALUES ('$ipToSql', '$dataToSql')");
		}
		

	}
	

?>
