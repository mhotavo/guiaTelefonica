<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Phone;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('person');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('person');
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
        'firstName' => 'required|max:30',
        'secondName' => 'max:30',
        'surname' => 'required|max:30',
        'secondSurname' => 'max:30',
        'birthday' => 'required',
        'address' => 'required|max:50',
        'idCity' => 'required',
        'profession' => 'max:50',
        'email' => 'email|unique:persons',
        'phones' => 'required',
        ]);
     $user = new Person($request->all());
     $user->save();
     $phones = new Phone();
     $phonesArray= $request->input('phones'); 
     $ExtArray= $request->input('extensions'); 
     foreach ($phonesArray as $key => $value) {
       $phones->idPerson = $user->id;
       $phones->phone = $value;
       $phones->extension = $ExtArray[$key];
       $phones->save();
   }

   flash('Persona creada Correctamente', 'success')->important();
   return redirect()->route('person.index');

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
