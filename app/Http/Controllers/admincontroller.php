<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\employeedata;
use App\Jobs\MyJob;
class admincontroller extends Controller
{
 
  public function checkLogin(Request $req){
      $login =User::where('name','=',$req->name)->first();
      $credentials = $req->only('name', 'password');
       if(Auth::attempt($credentials)){
         $req->session()->put('name', $login->name);
         $req->session()->put('id', $credentials);              
         $req->session()->put('role', $credentials);
           if(auth::user()->role == '0'){
              $viewEmployeeData = employeedata::all();
              $viewEmployeeData = employeedata::paginate(5);
              $Nonadmin = employeedata::get();
              // return redirect('viewEmployeDetails');
              return redirect('viewEmployeDetails');
             }
         else{        
              $viewEmployeeData = employeedata::all();
              $viewEmployeeData = employeedata::paginate(5);
              $Nonadmin = employeedata::get();
              return redirect('viewNonAdminEmployeDetails');
                //     return redirect()->intended('dashboard');
             }
          }
      else{
              return back()->with('fail','This User name or Password is not Registered');
          }
   }
   public function emptyUrl(){
   

      return redirect('adminpage_404_Error');
    
    
    
}
public function sendEmail(){

   $emailJob = new MyJob();
   dispatch($emailJob);
  }
}
