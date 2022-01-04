<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePatient;
use App\Http\Requests\UpdatePatient;
use App\Http\Requests\CommentPost;
use App\Imports\PatientImport;
use App\Exports\PatientExport;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Enums\Result;
use App\Models\Attention;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Patient;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Storage;



class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        // 全てのデータを取得
        $patients = \DB::table('patients')->whereNull('deleted_at')->paginate(10);
        return view('admin/patients/list',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/patients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatient $request)
    {
        if($request->file("results_pdf")){
            $pdf = $request->file("results_pdf")->getClientOriginalName();
            $path = $request->file("results_pdf")->storeAs("public/pdf", $pdf);

            $name= $request->input('name');
            $rename = preg_replace("/( |　)/", "", $name);

            $patients = new Patient;
            $patients->name = $rename;
            $patients->birthday = $request->input('birthday');
            $patients->patient_id = $request->input('patient_id');
            $patients->results = $request->input('results');
            $patients->results_pdf = $pdf;
            //dd($patients);
            $patients->save();
            //一覧表示画面にリダイレクト
            return redirect('admin/patients/list');

        }else{
            $name= $request->input('name');
            $rename = preg_replace("/( |　)/", "", $name);
            //dd($rename);

            $patients = new Patient;
            $patients->name = $rename;
            $patients->birthday = $request->input('birthday');
            $patients->patient_id = $request->input('patient_id');
            $patients->results = $request->input('results');
            //dd($patients);

            $patients->save();
            //一覧表示画面にリダイレクト
            return redirect('admin/patients/list');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients=Patient::find($id);
        $result = Result::toSelectArray();
        return view('admin/patients/edit', compact('patients','result'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatient $request, $id)
    {
        if($request->file("results_pdf")){
            $pdf_update = $request->file("results_pdf")->getClientOriginalName();
            $path = $request->file("results_pdf")->storeAs("public/pdf", $pdf_update);

            $name= $request->input('name');
            $rename = preg_replace("/( |　)/", "", $name);

            $patients=Patient::find($id);
            $patients->name=$rename;
            $patients->birthday=$request->input('birthday');
            $patients->patient_id=$request->input('patient_id');
            $patients->results=$request->input('results');
            $patients->results_pdf = $pdf_update;
            //dd($patients);
            //DBに保存
            $patients->save();

            //一覧表示画面にリダイレクト
            return redirect('admin/patients/list');

        }else{
            $name= $request->input('name');
            $rename = preg_replace("/( |　)/", "", $name);

            $patients=Patient::find($id);
            $patients->name=$rename;
            $patients->birthday=$request->input('birthday');
            $patients->patient_id=$request->input('patient_id');
            $patients->results=$request->input('results');
            //dd($patients);
            //DBに保存
            $patients->save();

            //一覧表示画面にリダイレクト
            return redirect('admin/patients/list');
        }
    }

    public function attention()
    {
        $attention = \DB::table('attention')->find(1);
        //dd($attention);
        return view('admin/attention',compact('attention'));
    }

    public function attentionupdate(CommentPost $request)
    {
        $attention= Attention::find(1);
        $attention->comment=$request->input('comment');
        //dd($attention);
        //DBに保存
        $attention->save();

        //一覧表示画面にリダイレクト
        return redirect('admin/attention');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients=Patient::find($id);
        if($results_pdf=Storage::disk('local')->exists('public/pdf/' . $patients->results_pdf)){
            Storage::delete('public/pdf/' . $patients->results_pdf);
            $patients->delete();
            return redirect('admin/patients/list');
        }else{
            $patients->delete();
            return redirect('admin/patients/list');
        }
    }

    public function csvexport()
    {
        return Excel::download(new PatientExport, date('Y-m-d') .'_'.'患者様一覧.csv');
    }

    /**
     * CSVインポート
     */
    // CSVアップロード〜DBインポート処理
    protected function import(Request $request)
    {

        // 一旦アップロードされたCSVファイルを受け取り保存する
        $uploaded_file = $request->file('csvdata');
        // inputのnameはcsvdataとする
        $orgName = date('Y-m-d') ."_".$request->file('csvdata')->getClientOriginalName();
        $spath = storage_path('app\\');
        $path = $spath.$request->file('csvdata')->storeAs('/public/csv/',$orgName);
        Excel::import(new PatientImport, $uploaded_file);
        return redirect('admin/patients/list');
    }
}
