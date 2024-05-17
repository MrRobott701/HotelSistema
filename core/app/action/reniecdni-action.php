 <?php
 $curl = curl_init();
 $dni="10101010";
;    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apiperu.dev/api/dni/$dni?api_token=2459a23f7f4d399ff63c236602ba502ea64adb66957b7ce095b7b7d4e4f91851",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYPEER => false
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $persona = json_decode($response);
        //var_dump($persona);

        //$data=json_decode($response, false);
        echo $persona->data->nombre_completo;
    }  