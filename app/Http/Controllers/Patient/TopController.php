<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TopPost;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Patients;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(TopPost $request)
    {
        $param = [
            'patient_id' => $request->patient_id,
            'name' => $request->name,
            'birthday' => $request->birthday,
        ];
        // dd($param);

        if($patients = DB::select('select * from patients where patient_id = :patient_id and name = :name and birthday = :birthday', $param)){
            $attention = \DB::table('attention')->find(1);
            return view('patient.top',compact('patients','param','attention'));
        }else{
            return view('patient.login');
        }
    }
}
