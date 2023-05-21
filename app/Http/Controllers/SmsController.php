<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Sms;
use App\Notifications\VonageMessage;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SmsController extends Controller
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

            $data = Sms::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn("action",function ($data){
                    return '<a href="'.route("sms.edit",$data).'"  class="btn btn-primary btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-sms"></i></a>';
                })->rawColumns([ 'action'])
             ->make(true);
        }

        return  view('sms.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('sms.create');

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
        'content'=>"required",
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }


    $clients=Client::all();
    foreach ($clients as $client){

            $response = Http::get('http://www.hotsms.ps/sendbulksms.php', [
                'user_name' => 'Rami Dabous',
                'user_pass' => '3324878',
                'sender' =>'Rami Dabous',
                'mobile' => $client->phone,
                'type' => 0,
                'text' => $request->content
            ]);



            switch ($response->body()) {
                case '1001':
                    break;
                case '1000':
                    return response()->json(['success' => false, 'message' => " Balance in your account"]);
                    break;
                case '2000':
                    return response()->json(['success' => false, 'message' => "Invalid value in username or password field."]);
                    break;
                case '3000':
                    return response()->json(['success' => false, 'message' => "Invalid type."]);
                    break;
                case '4000':
                    return response()->json(['success' => false, 'message' => "Invalid URL Error, This means that one of the parameters was not provided or left blank."]);
                    break;
                case '5000':
                    return response()->json(['success' => false, 'message' => "Countries Not Covers or Mobile Empty."]);
                case '6000':
                    return response()->json(['success' => false, 'message' => "Invalid sender name."]);
                    break;
                default:
                    return response()->json(['success' => false, 'message' => 'Unknown response code: ' . $response->body()]);
                    break;
            }
        }

    $sms=Sms::create(['content'=>$request->content,'sender'=>auth()->user()->name]);
    return response()->json(['success' => true, 'message' => "تمت الارسال بنجاح"]);




}

    public function saveDraft(Request $request){
        if(!is_null($request->title) or !is_null($request->content)){

        Sms::create([
            "content"=>$request->content,
            "sender"=>auth()->user()->full_name,
            "title"=>$request->title,
            "send_status"=>0,
        ]);

        return redirect()->back()->with("success","تم حفظ الرسالة");
        }
        return redirect()->back()->with("error","لم يتم الحفظ");
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
    public function edit(Request $request, $id)
    {
      $sms=Sms::findorfail($id);
        if ($request->ajax()) {

            $data = Client::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn("action",function ($data){
                    return '<a href="'.route("clients.edit",$data).'"  class="btn btn-primary btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-sms"></i></a>';
                })->addColumn("checkbox",function ($data){
                    return '<input type="checkbox" style=" top: .8rem;scale: 1.4;margin-right: 0.7rem;" class="checkbox form-controller" name="phones[]" value="'.$data->phone.'">';
                })->
                rawColumns(['checkbox'])
                ->make(true);
        }

     return view("sms.edit",compact("sms"));
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

        Sms::find($id)->update(["content"=>$request->content,"title"=>$request->title]);
        $phones=$request->phones;


        foreach ($phones as $phone){

        $response = Http::get('http://www.hotsms.ps/sendbulksms.php', [
            'user_name' => 'Rami Dabous',
            'user_pass' => '3324878',
            'sender' =>'Rami Dabous',
            'mobile' => $phone,
            'type' => 0,
            'text' => $request->content
        ]);



        switch ($response->body()) {
            case '1001':
                break;
            case '1000':
                return response()->json(['success' => false, 'message' => " Balance in your account"]);
                break;
            case '2000':
                return response()->json(['success' => false, 'message' => "Invalid value in username or password field."]);
                break;
            case '3000':
                return response()->json(['success' => false, 'message' => "Invalid type."]);
                break;
            case '4000':
                return response()->json(['success' => false, 'message' => "Invalid URL Error, This means that one of the parameters was not provided or left blank."]);
                break;
            case '5000':
                return response()->json(['success' => false, 'message' => "Countries Not Covers or Mobile Empty."]);
            case '6000':
                return response()->json(['success' => false, 'message' => "Invalid sender name."]);
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Unknown response code: ' . $response->body()]);
                break;
        }

        }

        return response()->json(["success"=>true,'message'=>'تم الارسال بنجاح']);
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
