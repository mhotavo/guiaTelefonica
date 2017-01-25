<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Phone;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company');
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
        $this->validate($request, [
            'name' => 'required|max:30',
            'address' => 'required|max:50',
            'idCity' => 'required',
            'email' => 'email|unique:persons',
            'phones' => 'required',
            ]);
        $company = new Company($request->all());
        $company->save();
        $phones = new Phone();
        $phonesArray= $request->input('phones'); 
        $ExtArray= $request->input('extensions'); 

        echo $company->id; 

        foreach ($phonesArray as $key => $value) {
         $phones->idCompany = $company->id;
         $phones->phone = $value;
         $phones->extension = $ExtArray[$key];
         $phones->save();
     }

     #flash('Empresa creada Correctamente', 'success')->important();
     #return redirect()->route('company.index');
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
