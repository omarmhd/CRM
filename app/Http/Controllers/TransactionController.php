<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\PointsAward;

use App\Models\Transaction;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {

        abort_if(Gate::none(['administrator']), 403);

        if ($request->ajax()) {
            $data = Transaction::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('transactions.edit', $data) . '" class="edit btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-pen"></i></a>
                                  <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-icon   btn-light-danger  me-2 mb-2 py-3"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })->rawColumns([ 'action'])->make(true);
        }

        return  view('transactions.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     $clients=Client::all();
     $transaction=new Transaction();
     return  view('transactions.create',compact("clients","transaction"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'client_id'=>"required|exists:clients,id",
            'id2'=>"sometimes|required|exists:clients,id",

            'type'=>'required|in:بيع,شراء,تبديل',
            'karat'=>'required|numeric',
            'wight'=>'required|numeric'



        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }


        $amount_point=DB::table("settings")->where("key","amount_point")->value("value");
        $data=$request->all();

        $data["points"]=$request->price>=$amount_point?$request->price/$amount_point:0;

        $earned_points=$request->price/$amount_point;
        if ($request->price>=$amount_point){
            $transction=Transaction::create($data);
             $point_award= PointsAward::updateOrCreate(
                 ["client_id"=>$transction->client_id],[
                "transaction_id"=>$transction->id,
                "client_id"=>$transction->client_id,
                "points"=>DB::raw("points+$earned_points")
             ]);
            $points=PointsAward::where("client_id",$transction->client_id)->value("points");


            $response = Http::get('http://www.hotsms.ps/sendbulksms.php', [
                'user_name' => 'Rami Dabous',
                'user_pass' => '3324878',
                'sender' =>'Rami Dabous',
                'mobile' =>$point_award->client->phone,
                'type' => 0,
                'text' => "شكرًا لزيارتكم❤عدد نقاطك هي ".$points."نقطة لتقييم الخدمة اضغط هنا: (https://bit.ly/RamiDabous)"
            ]);


        }

        if ($transction){
            return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);
        }
        return response()->json(['success' => false, 'message' => " لم تتم العملية"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    public function edit($id){
        abort_if(Gate::none(['administrator']), 403);

        $transaction=Transaction::findorfail($id);
        $clients=Client::all();
        return view("transactions.edit", compact("transaction","clients"));

    }
    public function update(Request $request,$id)
    {
        abort_if(Gate::none(['administrator']), 403);
        $validator = Validator::make($request->all(), [
            'client_id'=>"required|exists:clients,id",
            'name'=>'required',
            'type'=>'required|in:بيع,شراء,تبديل',
            'karat'=>'required|numeric',
            'wight'=>'required|numeric'
        ]);
        $data=$request->except("_token");
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }


        $transaction=Transaction::findorfail($id);

        $transaction->update($data);

        return response()->json(['success' => true, 'message' => "تم التحديث في البيانات"]);



    }

    public function  destroy($id){
        abort_if(Gate::none(['administrator']), 403);
        $transaction=Transaction::findorfail($id);
        $transaction->delete();
        return response()->json(['success' => true, 'message' => "تم الحذف بنجاح"]);


    }
}
