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


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     $companies = Company::orderBy('name', 'ASC')->paginate(20);
     return view('admin.companies')->with('companies', $companies);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createCompany');
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
            'email' => 'email|unique:companies',
            'phones' => 'required',
            'category' => 'required',
            'idCategory' => 'required',
            ]);
        $company = new Company($request->all());
        $company->save();
        $phonesArray= $request->input('phones'); 
        $ExtArray= $request->input('extensions'); 

        foreach ($phonesArray as $key => $value) {
            $phones = new Phone();
            $phones->idCompany = $company->id;
            $phones->phone = $value;
            $phones->extension = $ExtArray[$key];
            $phones->save();
        }

        flash('Empresa creada Correctamente', 'success')->important();
        return redirect()->route('company.index');
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
        $company= Company::find($id);
        $phones = Phone::PhoneCompany($id)->get();
        return view('admin.editCompany')
        ->with('company', $company)
        ->with('phones', $phones);
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
      $this->validate($request, [
        'name' => 'required|max:30',
        'address' => 'required|max:50',
        'idCity' => 'required',
        'email' => 'required',
        'phones' => 'required',
        'category' => 'required',
        'idCategory' => 'required',
        ]);
      $source = Company::find($id);
      $source->fill($request->all()); //fill -> llenar
      $source->save();

      $phonesDel = Phone::PhoneCompany($id);
      $phonesDel->delete();
      $phonesArray= $request->input('phones'); 
      $ExtArray= $request->input('extensions'); 

      foreach ($phonesArray as $key => $value) {

        if ($value!="") {
            $phones = new Phone();
            $phones->idCompany = $id;
            $phones->phone = $value;
            $phones->extension = $ExtArray[$key];
            $phones->save();
        }
    }
    flash('<strong>' . $request->input('name') . '</strong> modificada correctamente.', 'success')->important();
    return redirect()->route('company.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        flash('Empresa Eliminada Correctamente', 'success')->important();
        return redirect()->route('company.index');
    }
}
