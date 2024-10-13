<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$tel	= $_POST['tel'];
		$nome	= htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
		$msg	= htmlspecialchars($_POST['msg'], ENT_QUOTES, 'UTF-8');

		$msg = "Saudações " . $nome . "\n" . $msg;

		$data = [
		    'receiver'  => $tel,
		    'msgtext'   => $msg,
		    'sender'    => '244930673691',
		    'token'     => 'fQWI6UsIVbYtBrOC8ghn',
		];

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.dw-api.com/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		if ($response)
		{
			http_response_code(200);
			echo "SUCESS";
		} else {
			http_response_code(400);
			echo "FAILURE";
		}
	}

?>