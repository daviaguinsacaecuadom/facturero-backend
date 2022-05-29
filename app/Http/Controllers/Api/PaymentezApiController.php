<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;

class PaymentezApiController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        $card = [
            "user" => [
                "id" => $request->id,
                "email" => $request->email,
            ],
            "card" => [
                "number" => $request->number,
                "holder_name" => $request->holder_name,
                "expiry_month" => $request->expiry_month,
                "expiry_year" => $request->expiry_year,
                "cvc" => $request->cvc,
            ]
        ];
        $token = $this->paymentezToken()['authtoken'];
        //Abrimos conexión cURL y la almacenamos en la variable $ch.
        $ch = curl_init();
        //Configuramos mediante CURLOPT_URL la URL de nuestra API
        curl_setopt($ch, CURLOPT_URL, 'https://ccapi-stg.paymentez.com/v2/card/add');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($card));
        curl_setopt($ch, CURLOPT_USERAGENT, "booyah!");
        //Abrimos conexión cURL y la almacenamos en la variable $ch.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 0 o 1, indicamos que no queremos al Header en nuestra respuesta
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //Enviamos nuestro header con el token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Auth-Token: ' . $token
        ));

        $result = curl_exec($ch);
        //Cerramos la conexión cURL
        curl_close($ch);
        $cardPay = json_decode($result);

        return $cardPay;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function paymentezToken()
    {
        // $settings = setting()->all();
        // $settings = array_intersect_key($settings,
        //     [
        //         'paymentez_key' => '',
        //         'paymentez_secret' => '',
        //     ]
        // );
        // $keys = explode(";", $settings['paymentez_key']);
        // $secrets = explode(";", $settings['paymentez_secret']);
        //$tokenClient = $this->generateToken($keys[0],$secrets[0]);
        //$tokenServer = $this->generateToken($keys[1],$secrets[1]);
        // $tokens = [
        //     'token_client' => $tokenClient,
        //     'token_server' => $tokenServer
        // ];

        $tokenClient = $this->generateToken('TPP3-EC-CLIENT', 'ZfapAKOk4QFXheRNvndVib9XU3szzg');

        return $tokenClient;
    }

    private function generateToken($key, $secret)
    {
        // $date = new DateTime();
        // $unix_timestamp = $date->getTimestamp();

        // $pay = [
        //     'date' => $date,
        //     'timestamp' => $unix_timestamp,
        // ];
        // return $pay;
        $paymentez_server_application_code = $key;
        $paymentez_server_app_key = $secret;
        $date = new DateTime();
        $unix_timestamp = $date->getTimestamp();
        $uniq_token_string = $paymentez_server_app_key . $unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($paymentez_server_application_code . ";" . $unix_timestamp . ";" . $uniq_token_hash);
        $pay = [
            'timestamp' => $unix_timestamp,
            'uniqtokenst' => $uniq_token_string,
            'uniqtohas' => $uniq_token_hash,
            'authtoken' => $auth_token
        ];
        return $pay;
    }
}
