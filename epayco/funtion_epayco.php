<?php

$data = json_decode(file_get_contents('php://input'), true);
$amount = $data['amount'] ?? '0'; // Establece un valor predeterminado

$response = GeneratePaymentLink::geneateLink($amount);
echo json_encode($response);


class GeneratePaymentLink 
{
    static  $user = "carlosherazo2004@gmail.com";
    static $pass = '@vSf{*Car*g$los471';
  static  $tokenSession ="OGYyMDUzYjI4NTc4MzFlZjQyMmYwYzkzNzkwYzgyMjI6Y2NhZThjNjc1MDVmYTA5MTg0YTgxZGVkM2IzYjBlM2E=";    
   static function geneateLink($amount)
    {
  
                $response = self::generateLinkEpayco(
                    self::login()->token,
                    $amount,
                    [
                        "description"=> "Yuca ",
                        "title"=>"Juan",
                        "email"=>"sergiovegam41@gmail.com",
                        "payRef"=>"1231HJsdcyjGuNGNggg",
                        "urlResponse"=>"../productos.php",
                    ]
                );

                return $response;


    }

    // static function checkEpaycoStatus($id = null,$write = null){

    //     $payments = PaymentAttempts::where('userID',$id)
    //         ->where('status',"!=",PaymentAttempts::ACEPTADA)
    //         ->where('status',"!=",PaymentAttempts::CANCELADA)
    //         ->where('status',"!=",PaymentAttempts::ABANDONADA)
    //         ->where('status',"!=",PaymentAttempts::FALLIDA)
    //         ->where('status',"!=",PaymentAttempts::NO_PAGADO)
    //         ->where('status',"!=",PaymentAttempts::RECHAZADA)
    //         ->where('status',"!=",PaymentAttempts::PAGADO)
    //         ->where('status',"!=",PaymentAttempts::APROBADA)
    //         ->whereBetween('created_at', [
    //             now()->subWeeks(3),
    //             now()
    //         ])->get();


    //     if($write){
    //         $write->info(json_encode($payments));
    //     }


    //     if(count($payments) > 0){
    //         $token = self::login()->token;
    //     }
    //     foreach ($payments as $pay){


    //         $response = Http::withHeaders([
    //             'Accept' => 'application/json',
    //             'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer '.$token,
    //         ])->post('https://apify.epayco.co/transaction',['filter' => ['referenceClient' => $pay->payRef]]);

    //         $referenses = json_decode($response)->data->data;

    //         if (count($referenses) >= 1) {

    //             if( $referenses[0]->status == PaymentAttempts::PAGADO || $referenses[0]->status == PaymentAttempts::APROBADA || $referenses[0]->status == PaymentAttempts::ACEPTADA  ){

    //               if($write){
    //                 $write->info(json_encode($pay));
    //               }
                  
    //               WalletController::make($id,$pay->amount,WalletController::IN,"Recarga desde la App.");

    //             }

    //             $PaymentAttempts = PaymentAttempts::where('_id',$pay->id)->first();
    //             $PaymentAttempts->status = $referenses[0]->status;
    //             $PaymentAttempts->update();

    //         }

    //     }

    //     $wallet =  WalletController::getWallet($id);

    //     if( $wallet->technical_id == null  ){

    //         $wallet = WalletController::createWallet($id);

    //     }

    //     return $wallet;

    // }

     static function login()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apify.epayco.co/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Basic '. self::$tokenSession,
                'username: '.  self::$user,
                'password: '. self::$pass
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }

    private static function generateLinkEpayco($token, $gandTotal, $data)
    {



//        dd($data['description']);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apify.epayco.co/collection/link/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "quantity": 1,
              "onePayment":true,
              "amount": "'. $gandTotal .'",
              "currency": "COP",
              "id": "0",
              "reference": "'. $data['payRef'] .'",
              "base": "0",
              "description": "'. $data['description'] .'",
              "title": "'. $data['title'] .'",
              "typeSell": "1",
              "tax": "0",
              "email": "'. $data['email'] .'",
              "urlResponse": "'. $data['urlResponse'] .'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            )
        ));

        $response = curl_exec($curl);


//        dd($response);
        curl_close($curl);

  
        return json_decode($response);
    }


//     private function minutesDifference($date) {
//         $now = Carbon::now();
//         $givenDate = Carbon::parse($date);
//         return $now->diffInMinutes($givenDate);
//     }


}