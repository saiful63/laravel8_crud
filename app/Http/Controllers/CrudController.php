<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

use Session;


class CrudController extends Controller
{
    public function ShowData(){
        //$showData = Crud::all();
        $showData = Crud::paginate(4);
        return view('show_info',compact('showData'));
    }

    public function AddData(){
        return view('add_info');
    }

    public function StoreData(Request $request){
        $str = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];

        $cr = [
            'name.required' => 'Name field mandatory',
            'name.max' => 'Your name cannot be more than 10 character',
            'email.required' => 'Email field required',
            'email.email' => 'Similar email exist!',

        ];

        $this->validate($request,$str,$cr);
        
        $crud = new Crud;
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data added successfully');
        

        return redirect('/');
    }


    public function EditData($id = null){
     $editData = Crud::find($id);
     return view('edit-data',compact('editData'));
    }


       public function UpdateData(Request $request,$id){
        $str = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];

        $cr = [
            'name.required' => 'Name field mandatory',
            'name.max' => 'Your name cannot be more than 10 character',
            'email.required' => 'Email field required',
            'email.email' => 'Similar email exist!',

        ];

        $this->validate($request,$str,$cr);
        
        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data Updated successfully');
        

        return redirect('/');
    }

    public function DeleteData($id = null){
        $dlt = Crud::find($id);
        $dlt->delete();
        Session::flash('msg','Data Deleted successfully');
        return redirect('/');
    }

}
