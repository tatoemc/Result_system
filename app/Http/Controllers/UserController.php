<?php

namespace App\Http\Controllers;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Dept; 
use App\Semester;
use App\Grade;
use App\Year;
use App\Subject;
use Carbon\Carbon;
use Session;
use Hash;
use Image;
use Storage;  
use Auth; 

 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $users = User::orderBy('id', 'desc')->paginate(10); 
        //return view and pass in the variable
        return view ('users.index')->withUsers($users);
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
        $grades = Grade::all();
        $semesters = Semester::all();
        
         return view('users.create')->withDepts($depts)->withGrades($grades)->withSemesters($semesters);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          

       //dd($request->all());
       
        
        $this->validate($request , array(
         'name'=> 'required',
         'email' =>'required',
         'password' =>'required',
         'gender' =>'required',
         'dept_id'=> 'required',
       
        ));
        //2 
           /**
               $subject_id = Subject::all()->pluck('id')->last();
                $lastSubjectCode = $subject_id + 1 ;
         
                $newSubjectCode = $dept_id.$semester_id.$lastSubjectCode;

           */
    
       foreach($request->universit_id as $index => $universit_id) 

       {
            // $b for universit_id
            $b= Carbon::now()->format('Y');
            $user = new User;  
            $user->dept_id = $request->dept_id;
            $user->universit_id = $b.$universit_id;
            $user->name = $request->name[$index];
            $user->email = $request->email[$index];
            $user->gender = $request->gender[$index];
            $user->save();

        } 
 


        Session::flash('success','تم الحفظ بنجاح');
        
       return redirect()->route('users.create')->with('message','تم الحفظ');
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //new statment
        $user = User::where('id',$id)->firstOrFail();   
        return view('users.show')->withUser($user);
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
        $user = User::find($id);
        $depts = Dept::all();
        // Session::flash('message','تم التعديل بنجاح');
        return view('users.edit')->withUser($user)->withDepts($depts);

    } 
     
    public function SelectStudent( )
    {
        $depts = Dept::all();
        $semesters = Semester::all();
        $grades = Grade::all();

        return view('users.SelectStudent')->withDepts($depts)->withSemesters($semesters);

    } 
     public function EditStudent(Request $request)
    {
    //dd($request->all());
        
        $dept_id = $request->dept_id;
        $semester_id = $request->semester_id;
      
        $users = User::where('dept_id', $dept_id)
        ->where('semester_id', $semester_id)
        ->orderBy('id', 'desc')->paginate(10)
        //->get()
        ; 
        //return view and pass in the variable
        return view('users.EditStudent')->withUsers($users);

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
         'user_type' =>'required',
         'email' =>'required',
         'gender' =>'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'Bdate'=> 'required',
         'qualification' => 'required',
         'snb' => 'required',
         'snb_type'=> 'required',
         'phone' => 'required',
         'phone2' => 'required',
         'images' =>'sometimes|image',
         'dept_id'=> 'required',
         'job_id' => 'required',
         'degree_id' =>'required'
         
        ));
        //save the data to the data base
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->user_type = $request->input('user_type');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->unit = $request->input('unit');
        $user->home_no = $request->input('home_no');
        $user->Bdate = $request->input('Bdate');
        $user->qualification = $request->input('qualification');
        $user->snb = $request->input('snb');
        $user->snb_type = $request->input('snb_type');
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone');
        $user->dept_id = $request->input('dept_id');
        $user->job_id = $request->input('job_id');
        $user->degree_id = $request->input('degree_id');
        
 
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);
            $oldFilename = $user->image;
            $user->images = $filename;
           // Stroage::delete();
            Storage::delete($oldFilename);
        }

        $user->save();

        //redirect with flash data to  posts.show
        return redirect()->route('users.show', $id)->with('message','تم التعديل بنجاح'); 
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
        $user = User::find($id);
        Storage::delete($user->images);
        $user->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('users.index')->with('message','تم الحذف الموظف'); 
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","كلمة المرور الحالية غير صحيحة. فضلا حاول مجددا.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","لا يمكن تغير كلمة المرور بكلمة المرور الحالية. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","تم تغير كلمة المرور بنجاح !");
 
    }
    public function GetStudents(Request $request) 
    {  
       
        $depts = Dept::all()->pluck('name','id');
        $semesters = Semester::all();
        $grades = Grade::all();
        $subjects = Subject::all(); 
        $years = Year::all();

        if ($request->subject) 
        {
             $this->validate($request , array(
             'dept'=> 'required',
             'semester_id' => 'required',
             'grade_id' =>'required',
             'subject' =>'required'
             
               )); 

             $dept = Dept:: find($request->dept);
             $semester = Semester::find($request->semester_id);
             $grade = Grade::find($request->grade_id);
             $subject = Subject::find($request->subject);
            // $year = $request->year;


             $users = User::where('dept_id', $request->dept)
             ->where('user_type','stu')
             ->where('semester_id',$request->semester_id)
             ->where('grade_id',$request->grade_id)
             ->orderBy('name','asc')
             ->get(); 
        
        return view ('users.ShowStudents')->withSemester($semester)->withGrade($grade)->withSubject($subject)->withDept($dept)->withUsers($users); 

        }//end of if




     return view ('users.GetStudents')->withSemesters($semesters)->withGrades($grades)->withSubjects($subjects)->withDepts($depts)->withYears($years); 
        
    }
    

     public function prepartransform()
        {
              
            $depts = Dept::all();
           // dd($request->all());
         
            return view ('users.transform')->withDepts($depts); 

        }
     public function transform(Request $request)
        {
            //dd($request->all());
            $depts = Dept::all();
            $dept_id = $request->dept_id;

            $users = User::select('id','grade_id')
                       ->where('dept_id', $dept_id)
                       ->where('user_type','stu')
                       ->get()->toArray();

             
             foreach($users as $user )
                {
                   
                   $user_id = $user['id'];
                   $user_grade = $user['grade_id'];

                   if ($user_grade == 1) {

                    $u = User::where('id',$user_id)
                    ->update(['semester_id' => 3,'grade_id' => 2]);
     
                   }
                   elseif ($user_grade == 2)
                    {

                    $u = User::where('id',$user_id)
                    ->update(['semester_id' => 5,'grade_id' => 3]);
                       
                    }

                    elseif ($user_grade == 3)
                    {
                       $u = User::where('id',$user_id)
                       ->update(['semester_id' => 7,'grade_id' => 4]);
                       
                    }
                    elseif ($user_grade == 4)
                    {
                        $u = User::where('id',$user_id)
                        ->update(['semester_id' => 9,'grade_id' => 5]);
                    }
                    elseif ($user_grade == 5)
                    {
                        $u = User::where('id',$user_id)
                        ->update(['semester_id' => 11,'grade_id' => 6]);
                    }

                   //dd();
                }//end foreach

            Session::flash('success','تم الحفظ بنجاح');
            return view ('users.transform')->withDepts($depts)->with('message','تم أتحويل الطلاب بنجاح'); 

        }
 
    
}//end of class
