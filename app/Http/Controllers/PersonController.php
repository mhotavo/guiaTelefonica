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

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $persons = Person::orderBy('firstName', 'ASC')->paginate(2);
        
        return view('admin.persons')->with('persons', $persons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.createPerson');
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
       $person = new Person($request->all());
       $person->save();
       $phonesArray= $request->input('phones'); 
       $ExtArray= $request->input('extensions'); 

       foreach ($phonesArray as $key => $value) {
        $phones = new Phone();
        $phones->idPerson = $person->id;
        $phones->phone = $value;
        $phones->extension = $ExtArray[$key];
        $phones->save();

    }

    flash('Persona creada Correctamente', 'success')->important();
    return redirect()->route('persons.index');

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
