<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\MyJob;
use Session;
use app\User;
use App\employeedata;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
 public function createNewEmployee(Request $req){
     return view('Admin.CreateNewEmployee');        
 }                
 public function saveCreateNewEmployee(Request $req){
          $saveEmployeeData = new employeedata;
          $validator= $req->validate([
           'EmpId' => 'required',
           'F_Name' => 'required|min:3|max:255',
           'L_Name' => 'required|min:3|max:255',
           'gender' => 'required',
           'checkbox' => 'required',
          ]);
             $saveEmployeeData->emp_id = $req->EmpId;
             $saveEmployeeData->f_name = $req->F_Name;
             $saveEmployeeData->l_name = $req->L_Name;
             $saveEmployeeData->gender = $req->gender;
             $saveEmployeeData->skills =json_encode($req->checkbox);
             $saveEmployeeData->start_date = $req->Start_Date;
             $saveEmployeeData->created_by =auth::user()->name;
             $saveEmployeeData->updated_by =auth::user()->name;
             $saveEmployeeData->save();
             return redirect('viewEmployeDetails');
        
  }

  public function viewEmployeeDetails(){
            $viewEmployeeData = employeedata::all();
            $viewEmployeeData = employeedata::paginate(3);
             return view('Admin.viewEmployeeData',['viewEmployeeData'=>$viewEmployeeData]);
          
  }
  public function employeeEditData($id){
            $editNewEmployeeData=employeedata::find($id);
             return view('Admin.updateEmployee',compact('editNewEmployeeData'));
  }
  public function updateNewEmploye(Request $req,$id){
            $updateEmployeeData =employeedata::find($id);
            // dd($SaveNewEmployeeData->Start_Date);
            $validator= $req->validate([
            'EmpId' => 'required',
            'F_Name' => 'required|min:3|max:255',
            'L_Name' => 'required|min:3|max:255',
            'gender' => 'required',
            'checkbox' => 'required',
           ]);
             $updateEmployeeData->emp_id = $req->EmpId;
             $updateEmployeeData->f_name = $req->F_Name;
             $updateEmployeeData->l_name = $req->L_Name;
             $updateEmployeeData->gender = $req->gender;
             $updateEmployeeData->skills =json_encode($req->checkbox);
             $updateEmployeeData->start_date = $req->Start_Date;
             // dd($updateEmployeeData->updated_by);
             // $updateEmployeeData->created_by =Session::get('name');
             // $updateEmployeeData->updated_by =RegisterData::select('name')->where(name,'=',Session::get('name'))->get();

             $updateEmployeeData->updated_by =auth::user()->name;
             $updateEmployeeData->update();
 
             // $SaveNewEmployeeData=SaveNewEmployeeData::find($id);
              // return view('Login.Admin.EmployeeData',['ViewEmployeeData'=>$ViewEmployeeData]);
             return Redirect('viewEmployeDetails');
        
  }
  public function delete($id){
        $delete=employeedata::find($id);
        $delete->delete();
             return Redirect('viewEmployeDetails');
        
  }
  public function logout(){
         
        // if(Session::has('id')){
          // Session::pull('role');
                session()->forget('id');
                session()->forget('name');
                session()->forget('role');

            return redirect('Login');

       // }

 }
 public function viewAdminAndNonAdminEmployeeDetails(){ 
         $admins = User::get();
         return view('Admin.ViewUsers',['admins'=>$admins]);     
 }

 public function viewNonAdminEmployeeDetails(){

        // $Nonadmin = RegisterData::select('*')->where('role','NonAdmin')->get();
    $Nonadmin = employeedata::get();   
    return view('employee.viewNonAdminEmployee',['Nonadmin'=>$Nonadmin]);
        // return view('employee.viewNonAdminEmployee',['Nonadmin'=>$Nonadmin]);             
 }
   // public function Adminpage(){
   //   if(session()->get('role')=='Admin'){
   //    return redirect('Adminpage_404_error');
   //  }
   //  else if(session()->get('role')=='NonAdmin'){
   //      return redirect('404_error');
   //  }
   //  else{
   //    return false;
   //  }
  
   //     } 

 public function Error404(){
  return view('layouts.404error');
 }
 public function sendEmail(){

   $emailJob = new MyJob();
   dispatch($emailJob);
  }

}