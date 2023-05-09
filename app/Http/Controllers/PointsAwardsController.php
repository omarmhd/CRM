<?php

namespace App\Http\Controllers;

use App\Models\PointsAward;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PointsAwardsController extends Controller
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
            $data = PointsAward::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('client',function ($data){

                    return $data->client->full_name;

                })->addColumn("action",function ($data){
                    $actionBtn = '<a href="'.route("point-awards.edit",$data).'" class="edit btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-cube"></i></a>  ';
                    return $actionBtn;

                })->rawColumns(['action'])->make(true);
        }

        return  view('points.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(PointsAwards $pointTransaction)
    {
        //
    }


    public function edit($id)
    {

        $pointAward=PointsAward::findorfail($id);
        return view("points.edit",compact("pointAward"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointsAwards  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'redeemed_points'=>"required|numeric",
            "awards"=>"required",




        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        $pointAward=PointsAward::findorfail($id);

        $pointAward->update([
            "points"=>DB::raw("points-$request->redeemed_points"),
            'redeemed_points'=>DB::raw("redeemed_points+$request->redeemed_points"),
            "awards"=>$request->awards,
        ]);
        return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointsAwards  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointsAwards $pointTransaction)
    {
        //
    }
}
