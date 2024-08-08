<?php
	$unaccepted=$_POST['unaccepted'];
	//$unaccepted='false';
	//$id=$_GET['id'];
	$id=$_POST['label'];
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	if($unaccepted=='false'){
		$wpdb->query("UPDATE `wp_zakazi` SET `pay_status`='1' WHERE `id`='$id'");
		$posts = $wpdb->get_results("SELECT * FROM `wp_zakazi` WHERE id = '$id'");
		$email=$posts[0]->email;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://api.pdfshift.io/v2/convert/",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => json_encode(array("source" => "http://".$_SERVER['HTTP_HOST']."/ticket.php?id=".$id, "landscape" => true, "use_print" => false)),
		    CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
		    CURLOPT_USERPWD => '34e362e6e6da4c9ab824d21e698ef3cd:'
		));

		$response = curl_exec($curl);
		file_put_contents('wp-content/uploads/pdf/ticket-'.$id.'.pdf', $response);

		// We also have a package to simplify your work:
		// https://packagist.org/packages/pdfshift/pdfshift-php
		$thema="Билет на событие Арт-паб";
		$msg="Поздравляем с приобретением билета. Для входа достаточно показать его администратору на телефоне.";
		$path = 'wp-content/uploads/pdf/ticket-'.$id.'.pdf'; 
		$text = 'Номер заказа - '.$id;
		send_mail(get_option( 'admin_email' ), 'Оплата события', $text);
		echo get_option( 'admin_email' );
		send_mail2($email, $thema, $msg, $path);
	};


	function send_mail($mail, $subject, $text)
	{
	    global $config;
	    mail($mail, $subject, $text, "From: noreply@".$_SERVER['HTTP_HOST'] . "\r\n" . "Reply-To: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n" . "Content-type: text/plain; charset=utf-8\r\n" . "X-Mailer: PHP/" . phpversion());
	}

	function send_mail2($mail_to, $thema, $msg, $path) { 
	 // Вспомогательная функция для отправки почтового сообщения с вложением
	 // Параметры - адрес получателя, тема письма, текст письма, путь к загруженному файлу
	 if ($path) {  
	  $fp = fopen($path,"rb");   
	  if (!$fp) { print "Cannot open file"; exit(); }   
	  $file = fread($fp, filesize($path));   
	  fclose($fp);   
	 }  
	 $name = basename($path); // в этой переменной надо сформировать имя файла (без пути)  
	 $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
	 $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
	 $headers    = "MIME-Version: 1.0;$EOL";   
	 $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
	 $headers   .= "From: noreply@".$_SERVER['HTTP_HOST'];  
	 $multipart  = "--$boundary$EOL";
	 $multipart .= "------------".$bondary."\nContent-Type:text/html;\n";
	 $multipart .= "Content-Transfer-Encoding: 8bit\n\n$msg\n\n";
	 $multipart .= $EOL; // раздел между заголовками и телом html-части 
	 $multipart .=  "$EOL--$boundary$EOL";   
	 $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
	 $multipart .= "Content-Transfer-Encoding: base64$EOL";   
	 $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";   
	 $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
	 $multipart .= chunk_split(base64_encode($file));   
	 $multipart .= "$EOL--$boundary--$EOL";   
	 if (!mail($mail_to, $thema, $multipart, $headers)) { //если не письмо не отправлено
	  return false;          
	  echo "Письмо не отправлено"; 
	 }  
	 else { // если письмо отправлено
	  return true; 
	  echo "Письмо отправлено";
	 }  
	 exit;  
	}
?>
