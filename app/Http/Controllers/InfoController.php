<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Symfony\Component\HttpFoundation\Response; 

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $url = 'https://blockchain.info/ticker';
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            	// Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
          return response()->json([
            'message'=> 'Curl Error Setup ',
            'info' =>'error'
            ]);
        }
       
        return view('info.index')->with('list',json_decode($response,true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array();
        $data['title'] = 'Konversi Rupiah ke Bitcoin';
        $data['result'] = '';
        return view('info.idrtobtc')->with('data',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        //
      $data = array();
        $data['title'] = 'Konversi Bitcoin ke Rupiah';
        $data['result'] = '';
        return view('info.btctoidr')->with('data',$data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        //
        
        $request->validate([
          'amount' => 'required',
        ]);
        
        $usd= 14000;
        $amount = intval($request['amount']) / intval($usd);
        
        //dd($amount);
        
        $url = 'https://blockchain.info/tobtc?currency=USD&value='.$amount;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            	// Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));  
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
          return response()->json([
            'message'=> 'Curl Error Setup ',
            'info' =>'error'
            ]);
        }
        
        
        $data = array();
        $data['title'] = 'Konversi Rupiah ke Bitcoin';
        
       $a = $request['amount'];
       $b = number_format($a,2,",",".");
        
        $data['result'] = 'Rp.'.$b.' = '.$response.' BTC';
        return view('info.idrtobtc')->with('data',$data);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        //
        
        $request->validate([
          'amount' => 'required',
        ]);
        
        //dollar to btc
        $usd = 1;
        
        $url = 'https://blockchain.info/tobtc?currency=USD&value='.$usd;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            	// Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));  
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
          return response()->json([
            'message'=> 'Curl Error Setup ',
            'info' =>'error'
            ]);
        }
        
       $a = $request['amount'] / $response * 14000;
       $b = number_format($a,2,",",".");
        $data = array();
        $data['title'] = 'Konversi Bitcoin ke Rupiah';
        $data['result'] = 'BTC '.$request['amount'].' = Rp. '.$b.' ';
        return view('info.idrtobtc')->with('data',$data);
        
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
}
