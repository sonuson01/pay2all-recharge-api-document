<?php
//sample php code

//this will collect data from form
$provider_id = $_POST['provider_id']; 
$number = $_POST['number'];
$amount = $_POST['amount'];
$client_id = "09919190"; //(your system unique id. that you can check in pay2all);
//end of data collection from form


//check whether user enter some data or not
        if(empty($provider_id)){
        echo"select operator";
        exit;
        }
        if(empty($number)){
        echo"enter mobile number";
        exit;
        }
        if(empty($amount)){
        echo"enter amount";
        exit;
        }


        $parameters = array(
                'number' => $number,
                'provider_id' => $provider_id // Provider id check in pay2all
                'amount' => $amount, // Recharge or payment Amount
                'client_id' => $client_id // your system unique id
                'optional1' => '',
                'optional2' => '',
                'optional3' => '',
                'optional4' => ''
        );

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyMDgiLCJqdGkiOiIwNDZjOGNhNTViMTJhZWNjMGQ2YWE0NzdlYmY4MmQwZmM2OWQxZTJlZjhjOTdkYWU5MTMyNDUyMzM0ZGNhMzU2MWI0NGYxMzgzNWNiZWJiZCIsImlhdCI6MTYyOTAyNTg5My43NjA3ODIwMDM0MDI3MDk5NjA5Mzc1LCJuYmYiOjE2MjkwMjU4OTMuNzYwNzg3OTYzODY3MTg3NSwiZXhwIjoxNjQ0OTIzNDkzLjcxNDA0NzkwODc4Mjk1ODk4NDM3NSwic3ViIjoiMzA1ODYiLCJzY29wZXMiOltdfQ.ijZabF62_NeZL9VEoCdZMd8EU6tQNOdPD4uojryDEDtj3GsBgn6PydBEeRhe0VGKpL_S70cWrM3AX6APo_7d1ot1ZTyL1sjvhWq7XeJ21_qRxMdFIndBwhvKR0KkFUD-ypKvdul4lCGJETbMia2CLDdS_vPLcJoIWX50U3Yr-OmfRFySk-DG27dPRIUOTIMsrxdogmBNB7YsHPl4iyEDQ_YjqfcWJDaMGxGM-AhbW4d4WIRjdMa2YFdl37sRO99tPeX3VwPKGITkAmm6nDGIvhKv_JyWjs-Bq017zAktNR82OBt5rBl0y1Y4SXNf6pYz0gzivV3ROmypJn1M1GQMBYO3SSsorF80p52ZRokcBa5SPckVrWFEr0m5ZYTMY--Iq55f9azmTwl6oPB6EAqeP65xl57aZiD2ZIOGuMQmGFUOzECv7MHPE9c1Pb1Eov2T2ukHBH_7-7sOuQKI-bK_odxtY9jtY9vZ0R7qAgq0OCNQjLk5vXbH6eP4EGx32scynBbDuR8mHi_Mh-E6ZpvDAHn7_cJ9bka0pmb8F3SwL1o8QZnp1yv_7R9B-VkoTQ-9Tail-_QX8fopj1nRbQhFDM5cGUM2hhLWxV4PkVjsAthxfOTSGFRt6PGiwYErzonQbGxVMw4p8UpBigYfPstFL5ANwR_9Vxafl5pTbLNYOKQ"; //you have to add personal access token 

    

        $header = ["Accept:application/json", "Authorization:Bearer ".$access_token];

        $method = 'POST';

        $url = 'https://pay2all.in/api/v1/transaction';


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        echo $response;  //[JSON RESPONSE]


     


?>
