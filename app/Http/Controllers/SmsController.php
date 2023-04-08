<?php

namespace App\Http\Controllers;


use App\Models\Sms;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        if ($request->ajax()) {

            $data = Sms::latest()->get();
            return DataTables::of($data)->addIndexColumn()
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
     */    public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        'content'=>"required",
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }


    $sms=Sms::create(['content'=>$request->content,'sender'=>"f"]);

    if ($sms){
        return response()->json(['success' => true, 'message' => "تمت الارسال بنجاح"]);
    }
    return response()->json(['success' => false, 'message' => " لم تتم العملية"]);


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
