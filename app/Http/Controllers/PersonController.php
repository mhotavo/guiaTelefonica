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

    
    public function index(Request $request)
    {
       #$persons = Person::orderBy('firstName', 'ASC')->paginate(2);
        $persons = Person::Name($request->input('name'))->orderBy('firstName', 'ASC')->paginate(20);
        return view('admin.person.index')->with('persons', $persons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.person.create');
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
        $person= Person::find($id);
        $phones = Phone::PhonePerson($id)->get();
        return view('admin.editPerson')
        ->with('person', $person)
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
            'firstName' => 'required|max:30',
            'secondName' => 'max:30',
            'surname' => 'required|max:30',
            'secondSurname' => 'max:30',
            'birthday' => 'required',
            'address' => 'required|max:50',
            'city' => 'required',
            'idCity' => 'required',
            'profession' => 'max:50',
            'email' => 'email',
            'phones' => 'required',
            ]);
        $source = Person::find($id);
         $source->fill($request->all()); //fill -> llenar
         $source->save();

         $phonesDel = Phone::PhonePerson($id);
         $phonesDel->delete();
         $phonesArray= $request->input('phones'); 
         $ExtArray= $request->input('extensions'); 

         foreach ($phonesArray as $key => $value) {

            if ($value!="") {
                $phones = new Phone();
                $phones->idPerson = $id;
                $phones->phone = $value;
                $phones->extension = $ExtArray[$key];
                $phones->save();
            }
        }
        flash('<strong>' . $request->input('firstName') . '- </strong>  Cambios guardados correctamente.', 'success')->important();
        return redirect()->route('person.index');
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
