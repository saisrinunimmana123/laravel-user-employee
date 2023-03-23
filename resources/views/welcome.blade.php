<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
   <!-- <td>
                      @php 
                       $empdatas = json_decode($employeeData->skills)
                      @endphp
                        @foreach($empdatas as $empdata)
                         {{$empdata.","}}
                        @endforeach</td>     -->
    </body>
</html>




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
     if(auth::user()->role == 0){
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
    else{
             return redirect('404error');
        }
     }

     public function viewEmployeeDetails(){
  
        if(auth::user()->role == 0){
            $viewEmployeeData = employeedata::all();
            $viewEmployeeData = employeedata::paginate(3);
            return view('Admin.viewEmployeeData',['viewEmployeeData'=>$viewEmployeeData]);
           }
       else{
          return redirect('404Error');
           }
    }
    public function employeeEditData($id){

       if(auth::user()->role == 0){

          $editNewEmployeeData=employeedata::find($id);
            
          return view('Admin.updateEmployee',compact('editNewEmployeeData'));

        }
    else{
        return redirect('404Error');
       }
  }
 public function updateNewEmploye(Request $req,$id){

    if(auth::user()->role == 0){
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
    else{
    
       return view('404Error');
        }

   }
 public function delete($id){

       if(auth::user()->role == 0){
        $delete=employeedata::find($id);
        $delete->delete();
             return Redirect('viewEmployeDetails');
        }
    else{
           return redirect('404Error');
          }
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
  if(auth::user()->role == 0){
         $admins = User::get();
         return view('Admin.ViewUsers',['admins'=>$admins]);
      }
  else{
      return redirect('404Error');
      }
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



}

Route::get('createNewEmp','HomeController@createNewEmployee')->middleware('   EmployeeMiddleWare');
Route::post('saveCreateNewEmp','HomeController@saveCreateNewEmployee')->middleware('EmployeeMiddleWare');
Route::get('employeeEditData/{id}','HomeController@employeeEditData')->middleware('EmployeeMiddleWare');
Route::put('updateNewEmp/{id}','HomeController@updateNewEmploye')->middleware('Adminmiddleware');
Route::get('delete/{id}','HomeController@delete')->middleware('EmployeeMiddleWare');
Route::get('viewEmployeDetails','HomeController@viewEmployeeDetails')->middleware('EmployeeMiddleWare');
Route::get('viewAdminAndNonAdminEmployeDetails','HomeController@viewAdminAndNonAdminEmployeeDetails')->middleware('EmployeeMiddleWare');