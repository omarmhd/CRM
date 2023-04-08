<?php

namespace App\Http\Controllers;

use App\Models\CurrantSurvey;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Result;
use App\Models\User;
use http\Encoding\Stream\Enbrotli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request  $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('users.edit', $data) . '" class="edit btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-pen"></i></a>
                                    <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-icon   btn-light-danger  me-2 mb-2 py-3"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return  view('users.index');
    }



    public  function create(){
        $user =new User();
        $method="post";
        $route=route("users.store");
        return view("users.create",compact('user','method','route'));
    }

    public  function  store(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>"required|unique:users,name",
            'full_name'=>'required',
            'email'=>"required|unique:users,email",
            'role'=>'required|in:employee,administrator',
            'password'=>'required|min:4'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $data=$request->except(['password']);
        $data['password']=Hash::make($request->password);
        $user=User::create($data);

        if ($user){
            return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);
        }
            return response()->json(['success' => false, 'message' => " لم تتم العملية"]);


    }


    public function  show($id){

        $surveysCurrantBefor=CurrantSurvey::with('survey')->where('employee_id',$id)->whereIN('status',['1','2','3','4','5'])->where('status_show','published')->where('is_open',"1");
        $surveyLatest=$surveysCurrantBefor->latest()->first();


        if( $surveysCurrantBefor->count()>0){

            $surveyLatest=$surveysCurrantBefor->latest()->first();

            $surveysCurrant=$surveysCurrantBefor->get();
            $countsurveys=$surveysCurrant->count();

            $avgScore=$countsurveys>0?($surveysCurrant->sum("score")/$surveysCurrant->count("is_evaluated")):0  ;


            $surveys =$surveysCurrantBefor->paginate(6);

//        $sectionResult=Result::where("employee_id",$id)->get()->groupBy('employee_id');

            $user=User::findOrFail($id);
            return view("users.show",compact('surveyLatest','user','surveys','avgScore'));
        }

        return redirect()->back()->with('info',"لا يوجد تقيمات لهذا الحساب. ");
    }

    public function showMyEvaluation(){

        $id=auth()->user()->id;
        $surveysCurrantBefor=CurrantSurvey::with('survey')->where('employee_id',$id)->whereIN('status',['1','2','3','4','5'])->where('status_show','published')->where('is_open',"1");



            $surveyLatest=$surveysCurrantBefor->latest()->first();

            $surveysCurrant=$surveysCurrantBefor->get();
            $countsurveys=$surveysCurrant->count();

            $avgScore=$countsurveys>0?($surveysCurrant->sum("score")/$surveysCurrant->count("is_evaluated")):0  ;


            $surveys =$surveysCurrantBefor->paginate(6);

//        $sectionResult=Result::where("employee_id",$id)->get()->groupBy('employee_id');

            $user=User::findOrFail($id);
            return view("users.show",compact('surveyLatest','user','surveys','avgScore'));




    }



    public  function edit(User $user){
        abort_if(Gate::none(['administrator']), 403);
        return view("users.edit",compact('user'));
    }

    public  function  update(Request $request,User $user){
        abort_if(Gate::none(['administrator']), 403);
        $validator = Validator::make($request->all(), [
            'name'=>"required|unique:users,name,".$user->id,
            'full_name'=>'required',
            'email'=>"required|unique:users,email,".$user->id,
            'role'=>'required|in:employee,evaluator,administrator,hr,query',

        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        $data=$request->except(['password']);

        if ($request->password!==null) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);


        if ($user){
            return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);
        }
        return response()->json(['success' => false, 'message' => " لم تتم العملية"]);


    }


    public function  destroy(User $user){
        abort_if(Gate::none(['administrator']), 403);
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}
