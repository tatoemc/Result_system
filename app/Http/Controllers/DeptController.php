<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dept; 

class DeptController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depts = Dept::orderBy('id', 'desc')->paginate(8);
        //return view and pass in the variable
        return view ('depts.index')->withDepts($depts);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //
        return view('depts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request , array(
         'name'=> 'required'
     
        ));
        //2 
        $dept = new Dept; 
        $dept->name = $request->name;
        $dept->description = $request->description;
        
        $dept->save();

        return redirect()->route('depts.show', $dept->id);
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
        $dept = Dept::find($id);  
        return view('depts.show')->withDept($dept);
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
        $dept = Dept::find($id);
        return view('depts.edit')->withDept($dept);
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
        $this->validate($request , array(
         'name'=> 'required'
        
         
        ));
        //save the data to the data base
        $dept = Dept::find($id);
        $dept->name = $request->input('name');
        $dept->description = $request->input('description');

        $dept->save();

        //redirect with flash data to  posts.show
        return redirect()->route('depts.show', $id); 
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
        $dept = Dept::find($id);
        $dept->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('depts.index'); 
    }
}
