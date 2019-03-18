<?php

namespace App\Http\Controllers;

use App\Transfer;

use Alert;

use Illuminate\Http\Request;

class TransfersController extends Controller
{
    //
    public function store(Request $request)
    {
        $transfer = new Transfer;

        if ($transfer::where('fullname', $request->txtname)->first()) {
            echo "User already registered !";
         }else{
             // Call paystack and insert into db
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.paystack.co/transferrecipient",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{ \n   \"type\": \"nuban\",\n   \"name\": \"$request->txtname\",\n   \"description\": \"$request->txtdesc\",\n   \"account_number\": \"$request->txtaccount\",\n   \"bank_code\": \"$request->bankname\",\n   \"currency\": \"NGN\",\n   \"metadata\": {\n      \"job\": \"Developer\"\n    }\n }",
				  CURLOPT_HTTPHEADER => array(
				    "Authorization: Bearer sk_test_36e175c5c710aacac84e2a3974988707c0834e7d",
				    "Cache-Control: no-cache",
				    "Content-Type: application/json"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				$key_gen ='';
				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  //echo "<br/>=========Paystack Response============<br/>".$response."<br/>";
				  // $myfile = file_put_contents('logs.txt', $response.PHP_EOL , FILE_APPEND | LOCK_EX);
				  $ans = json_decode($response);
				  $key_gen = $ans->data->recipient_code;
				}
				//CURL ends here
                $transfer->fullname = $request->txtname;
                $transfer->description = $request->txtdesc;
                $transfer->accountNumber = $request->txtaccount;
                $transfer->bankName = $request->bankname;
                $transfer->recipientCode = $key_gen;
        
                $transfer->save();

                Alert::success('Recipient Successfully Added!');

                return redirect()->back();
         }    

    }

    public function checkAccount(Request $request)
    {
        $account = $request->txtaccount;
		$bankname = $request->bankname;
		
        $curl = curl_init();
        $url = "https://api.paystack.co/bank/resolve?account_number=$account&bank_code=$bankname";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_36e175c5c710aacac84e2a3974988707c0834e7d",
            "Cache-Control: no-cache",
            "Content-Type: application/json"
            )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $ans = json_decode($response);
        $accName = $ans->data->account_name;

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
          Alert::success($accName, $account)->autoclose(3500);

          return view('add');
          // echo "<p align=center> $account belongs to <b> $accName </b> <p/>";
            
        }
    }

    public function transfer(Request $request)
    {
      // CURL here
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_VERBOSE => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"source\": \"balance\", \"reason\": \"$request->reason\", \"amount\":$request->amtTran, \"recipient\": \"$request->recTran\"}",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer sk_test_36e175c5c710aacac84e2a3974988707c0834e7d",
          "Cache-Control: no-cache",
          "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $transferCode = "Error";

        // $info = curl_getinfo($curl);
        // print_r($info['request_header']);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo "<br/>=========Paystack Response============<br/>";
          $myfile = file_put_contents('logs.txt', $response.PHP_EOL , FILE_APPEND | LOCK_EX);
          $ans = json_decode($response);
          $message = $ans->message;
          $transferCode = $ans->data->transfer_code;
          
          // echo "<span style='color:blue;font-size:1.2em;'><b>$message</b></span>";
          // echo "<span style='color:blue;font-size:1.2em;'><b>$transferCode</b></span>";
          
          $arr = array($transferCode);
          return view('otp')->with('arr', $arr);

        }
        //CURL ends here
    }

    public function otp(Request $request)
    {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transfer/finalize_transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"transfer_code\": \"$request->txt_transfercode\", \"otp\": \"$request->txtotp\"}",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer sk_test_36e175c5c710aacac84e2a3974988707c0834e7d",
          "Cache-Control: no-cache",
          "Content-Type: application/json"
        ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        //echo "<br/>=========Paystack Response============<br/>";
        $myfile = file_put_contents('logs.txt', $response.PHP_EOL , FILE_APPEND | LOCK_EX);
        $ans = json_decode($response);
        $message = $ans->message;
        $transferCode = $ans->data->transfer_code;
        Alert::success($message, $transferCode)->autoclose(3500);

        return view('add');
        // echo "<span style='color:blue;font-size:1.2em;'><b>$message with code $transferCode</b></span>";
			}
    }

}
