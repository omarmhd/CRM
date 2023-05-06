<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Milon\Barcode\DNS1D;
use Milon\Barcode\Facades\DNS1DFacade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::none(['administrator']), 403);

        if ($request->ajax()) {

            $data = Client::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('clients.edit', $data) . '" class="edit btn btn-icon   btn-light-primary  me-2 mb-2 py-3"><i class="fa fa-pen"></i></a>
                                    <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-icon   btn-light-danger  me-2 mb-2 py-3"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addcolumn('qr',function ($data){
                    $barcode = new DNS1D();
//                    $png = QrCode::format('png')->size(100)->generate($data->id);
//                    $png = base64_encode($png);


                    return  '<a href="data:image/png;base64,' .$barcode->getBarcodePNG("$data->id", "C39") . '" download="qr-'.$data->full_name.'" ><img src="data:image/png;base64,' .$barcode->getBarcodePNG("$data->id", "C39") . '" alt="barcode"   /></a>';
;;

                })

                ->rawColumns(['qr','action'])
                ->make(true);
        }

        return  view('clients.index');

    }

    public function importExcelToDB(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required|mimes:xlsx'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->errors()]);
        }
        if($request->hasFile('files')){
            $path = $request->file('files')->getRealPath();
            $data = \Excel::import($path)->get();


            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['topic_id' => $request->topic_id, 'question' => $value->question, 'a' => $value->a, 'b' => $value->b, 'c' => $value->c, 'd' => $value->d, 'answer' => $value->answer, 'code_snippet' => $value->code_snippet != '' ? $value->code_snippet : '-', 'answer_exp' => $value->answer_exp != '' ? $value->answer_exp : '-'];
                }
                if(!empty($arr)){
                    \DB::table('questions')->insert($arr);
                    return back()->with('added', 'Question Imported Successfully');
                }
                return back()->with('deleted', 'Your excel file is empty or its headers are not matched to question table fields');
            }
        }
        return back()->with('deleted', 'Request data does not have any files to import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $client =new client();
        return view("clients.create",compact('client'));
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

            'full_name'=>'required',
            'id_number'=>"required|unique:clients,id_number",
            'type'=>'required|in:مؤسسة,أفراد,شركة',
            'marital_status'=>'required|in:متزوج,أعزب',
            'city'=>'required|in:جباليا,بني سهيلا,بيت حانون,بيت لاهيا,دير البلح,خانيونس,رفح,غزة',
            'email'=>'required',
            'BOD'=>'required|date',
            'occupation'=>'required',
            'phone'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $data=$request->except(['password']);
        $data['password']=Hash::make($request->password);
        $client=Client::create($data);
        $response = Http::get('http://www.hotsms.ps/sendbulksms.php', [
            'user_name' => 'Rami Dabous',
            'user_pass' => '3324878',
            'sender' =>'Rami Dabous',
            'mobile' =>$client->phone,
            'type' => 0,
            'text' => "أهلًا وسهلًا بك في صالة عرض مجوهرات رامي الضابوس، نسعد بخدمتكم❤"
        ]);
        if ($client){
            return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);
        }
        return response()->json(['success' => false, 'message' => " لم تتم العملية"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
    }



    public function search(Request $request){
        $id= $request->input('query');
        $client=Client::where('id',$id)->first();
        if (is_null($client)){
            return response()->json(["message"=>"الزبون غير مسجل"],'404');
        }
        return response()->json(["message"=>$client->full_name],'200');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("clients.edit",compact('client'));
    }


    public function update(Request $request, Client $client)
    {

        $validator = Validator::make($request->all(), [

            'full_name'=>'required',
            'id_number'=>"required|unique:clients,id_number,".$client->id.',id',
            'type'=>'required|in:مؤسسة,أفراد,شركة',
            'marital_status'=>'required|in:متزوج,أعزب',
            'city'=>'required|in:جباليا,بني سهيلا,بيت حانون,بيت لاهيا,دير البلح,خانيونس,رفح,غزة',
            'email'=>'required',
            'BOD'=>'required|date',
            'occupation'=>'required',
            'phone'=>'required',

        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $data=$request->except(['password']);
        $data['password']=Hash::make($request->password);

        $client=$client->update($data);

        if ($client){
            return response()->json(['success' => true, 'message' => "تمت العملية بنجاح"]);
        }
        return response()->json(['success' => false, 'message' => " لم تتم العملية"]);

    }


    public function destroy(Client $client)
    {
        try {
            $client->delete();
    } catch (\Exception $e) {
        return response()->json(["status"=>"error",'message' => $e->getMessage()]);
    }

        return response()->json(["status"=>"success",'message' => "تم الحذف بنجاح"]);


    }
}
