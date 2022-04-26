<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class CrudController extends Controller
{
    //

    public function showData(){
        $showData = Crud::all();
        return view('show_data',compact('showData'));
    }
    public function addData(){
        return view('add_data');
    }
    public function storeData(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];
        $this->validate($request,$rules);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        return redirect('/');
    }
}
