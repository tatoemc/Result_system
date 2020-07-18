<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Dept; 
use App\Semester;
use Session;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::orderBy('id', 'desc')->paginate(20); 
        //return view and pass in the variable
        return view ('subjects.index')->withSubjects($subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $depts = Dept::all();
        $semesters = Semester::all();
        
         return view('subjects.create')->withDepts($depts)->withSemesters($semesters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $dept_id = $request->dept_id;
        $semester_id = $request->semester_id;

        $subject_id = Subject::all()->pluck('id')->last();
        $lastSubjectCode = $subject_id + 1 ;
 
        $newSubjectCode = $dept_id.$semester_id.$lastSubjectCode;

        //
        $this->validate($request , array(
         'name'=> 'required',
         'dept_id'=> 'required',
         'semester_id'=> 'required',
         'hours'=> 'required'

     
        ));
        //2 
        $subject = new Subject; 
        $subject->name = $request->name;
        $subject->hours = $request->hours;
        $subject->code = $newSubjectCode;
        $subject->dept_id = $request->dept_id;
        $subject->semester_id = $request->semester_id;
        
        $subject->save();
        
        return redirect()->route('subjects.show', $subject->id)->with('message','تم الحفظ');
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
        $subject = Subject::find($id);  
        return view('subjects.show')->withSubject($subject);
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
        $subject = Subject::find($id);
        $depts = Dept::all();
        $semesters = Semester::all();
        
        
        return view('subjects.edit')->withsubject($subject)->withDepts($depts)->withSemesters($semesters);
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
         'name'=> 'required',
         'code'=> 'required',
         'dept_id'=> 'required',
         'semester_id'=> 'required'
         
        ));
        //save the data to the data base
        $subject = Subject::find($id);
        $subject->name = $request->input('name');
        $subject->code = $request->input('code');
        $subject->dept_id = $request->input('dept_id');
        $subject->semester_id = $request->input('semester_id');

        $subject->save();

        //redirect with flash data to  posts.show
        return redirect()->route('subjects.show', $id)->with('message','تم التعديل'); 
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
        $subject = Subject::find($id); 
        $subject->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('subjects.index')->with('message','تم حذف المادة'); 
    }

    public function selectDept()
    {
    //  
      $depts = Dept::all();
      $semesters = Semester::all();

    //  dd($years);

      return view ('subjects.selectDept')->withDepts($depts)->withSemesters($semesters);
      
    }
     public function showtSubject(Request $request)
    {
        // form to get Result
        
        $dept_id = $request->dept_id; 

        $dept = Dept::find( $dept_id);
        //dd($dept->name);

        $subjects = Semester::with('subjects')
        ->whereHas('subjects', function($query) use ($dept_id)  {
                            $query->where('dept_id', $dept_id);
                        })
        
        ->get();

        //->toArray()
        
        return view ('subjects.showtSubject',compact('subjects'))->withDept($dept);
      
    }  

}
