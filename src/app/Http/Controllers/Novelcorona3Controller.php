<?php

namespace App\Http\Controllers;

use App\Exports\P3Export;
use Illuminate\Http\Request;
use App\Novelcorona3 AS PP3;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Novelcorona3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = DB::table('novelcorona3 AS p')
        ->select('p.*', 'u.name AS reportor')
        ->leftJoin('user AS u', 'u.id', '=', 'p.user')
        ->orderBy('p.created_at')
        ->get();

        return view('Novelcorona3.index')->with(['record' => $record]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Novelcorona3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cid' => 'required|unique:novelcorona3|max:13',
            'fname' => 'required',
            'lname' => 'required',
        ]);

        $record = new PP3;
        foreach($request->except(['_token']) AS $key => $value){
            $record->$key = $value;
        }

        $lastrecord = DB::table('novelcorona3')->latest('created_at')->first();

        // $code = 'TYD-'.date_format(now(), 'd/m').'-';
        // $code .= $f1.$f2;
        // $lastrecord = (isset($lastrecord)) ? $lastrecord->id : 0;
        // $code .= '-'.substr('0000'.strval($lastrecord+1), -4);

        // $record->code = $code;
        $record->user = session('user_id');

        $record->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = PP3::find($id);
        return view('Novelcorona3.show')->with(['r' => $result]);
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
        $result = PP3::find($id);
        //return dd($result);
        return view('Novelcorona3.edit')->with(['r' => $result]);
    }


    public function editcid($id)
    {
        //
        $result = PP3::where('cid', '=', $id);
        //return dd($result);
        return view('Novelcorona3.edit')->with(['r' => $result]);
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
        //return dd($request);
        $this->validate($request, [
            'cid' => 'required|max:13',
            'fname' => 'required',
            'lname' => 'required',
        ]);

        $record = PP3::find($id);
        foreach($request->except(['_token', '_method']) AS $key => $value){
            $record->$key = $value;
        }
        $record->save();

        return redirect('/n3');
    }
}
