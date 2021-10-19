<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Shippment;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function store()
    {
       // Api uthentication with username and password
    $response = Http::withBasicAuth('SPSAPI', 'sps2021?')->get( 'https://rsrge1testapi.snapfulfil.net/api/shipments/');

        if ($response->successful())
         {

        $shipments = json_decode($response->getBody()->getContents(),  true);
         foreach($shipments as $shipment){
                // Update the shipment if exist or create new shipment
                $saveShipment = new Shippment;
                        $saveShipment->where('ShipmentId', $shipment['ShipmentId'])->first();
                        $saveShipment->BizId = $shipment['BizId'];
                        $saveShipment->BizSalesOrder = $shipment['BizSalesOrder'];
                        $saveShipment->Status = $shipment['Status'];
                        $saveShipment->ShipmentId = $shipment['ShipmentId'];
                        $saveShipment->save();
        }
        }
     else {

        // Return Error message
        }
        return redirect('home');

     } 


    public function index()
    {
        $shipments = DB::select('select * from shippments');
        return view('home',['shipment'=>$shipments]);
    }
}
