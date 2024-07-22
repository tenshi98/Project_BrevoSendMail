<?php
/***********************************************************************
* Envio Correos
*
*===========================     Detalles    ===========================
* Permite enviar correos a traves del servicio de brevo
*===========================    Modo de uso  ===========================
*
* 	//Envio de correo
*	$rmail = brevoSendMail('jperez@mail.com', 'Juan Perez',
*                          'malvarez@mail.com', 'Marisol Alvarez',
*                          'Notificacion', '<p>Cuerpo mensaje</p>',
* 						   'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
*   //Envio del mensaje
*	if ($rmail!=1) {
*		//mensaje en caso de error
*	} else {
*		//en caso de envio correcto
*	}
*
*===========================    Parametros   ===========================
* String    $De_correo          Correo Emisor
* String    $De_nombre          Nombre del usuario del Correo Emisor
* String    $Hacia_correo       Correo Receptor
* String    $Hacia_nombre       Nombre del usuario del Correo Receptor
* String    $Asunto             Asunto del correo
* String    $CuerpoHTML         Cuerpo del correo, con tag html
* String    $APIKEY             APIKEY obtenida
************************************************************************/
//Funcion
function brevoSendMail($De_correo, $De_nombre, $Hacia_correo, $Hacia_nombre, $Asunto,$CuerpoHTML, $APIKEY){
	/***************************************************************/
	//valido que existan datos
	if(isset($De_correo, $De_nombre,$Hacia_correo,$Hacia_nombre,$Asunto,$CuerpoHTML,$APIKEY)&&$De_correo!=''&&$De_nombre!=''&&$Hacia_correo!=''&&$Hacia_nombre!=''&&$Asunto!=''&&$CuerpoHTML!=''&&$APIKEY!=''){
		//URL de envio
		$URL = 'https://api.brevo.com/v3/smtp/email';
		//Se hace el envio
		try {
			//Se crea arreglo para adjuntar datos
			$data = array(
				"sender" => array(
					"email" => $De_correo,
					"name" => $De_nombre
				),
				"to" => array(
					array(
						"email" => $Hacia_correo,
						"name" => $Hacia_nombre
					)
				),
				"subject" => $Asunto,
				"htmlContent" => '<html><head></head><body>'.$CuerpoHTML.'</body></html>'
			);

			//envio de los datos
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $URL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Api-Key: '.$APIKEY;
			$headers[] = 'Content-Type: application/json';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			curl_close($ch);

			//envio correcto
			return 1;
		//En caso de error se devuelve el error y se guarda un log de este
		} catch (Exception $e) {
			//Guardo el log
			error_log("/***************************************************************/", 0);
			error_log("EMail Error:".$result, 0);
			error_log("/***************************************************************/", 0);
			//devuelvo el error
			return $result;
		}
	/***************************************************************/
	//En el caso de que no existan datos devuelvo la notificacion
	}else{
		return 'No hay datos ingresados';
	}

}
?>
