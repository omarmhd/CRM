<?php

namespace App\Http\Controllers;

use App\Models\PointsAward;
use App\Models\PointsAwards;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

                })

                ->rawColumns(['action'])->make(true);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointsAwards  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(PointsAwards $pointTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointsAwards  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(PointsAwards $pointTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointsAwards  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointsAwards $pointTransaction)
    {
        //
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
