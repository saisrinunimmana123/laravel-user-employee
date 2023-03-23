<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script
         src="https://code.jquery.com/jquery-3.6.3.min.js"
         integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
         crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
      <script src="{{url('js/CreateNewEmployee.js')}}"></script> 
      <link href="{{url('css/admin/createNewEmp.css')}}" rel="stylesheet">
      <script src="{{url('js/editAndUpdateAlertMessage.js')}}"></script>
      <style>
         .F_Name_error{
         width:50%
         }
      </style>
   </head>
   <body>
      <div>
         @include('admin.adminDashboard') 
      </div>
      <div class="head">
      </div>
      <div class="flex-center position-ref full-height">
         <div class="row container">
            <div class="col col-12 col-sm-12 col-lg-4 col-md-6 col-xl-3">
               <form method="post" action="{{url('updateNewEmp/'.$editNewEmployeeData->id)}}" class="form" id="CreateEmp">
                  <div class="formhead">
                     <h3>Update Employee Details</h3>
                  </div>
                  @csrf
                  @method('PUT')
                  <div class="title m-b-md formbody">
                     <div class=" F_Name_error" style="margin-top: 5px">
                        Employee ID<span class="red">*</span>
                        <input type="text" name="EmpId"style="width:280px;height:33px" class="" id="EmpId" value="{{$editNewEmployeeData->emp_id}}"><br>
                        <span id = "radio_error5" class="error" style="margin-top: 100px"></span>
                        @error('EmpId')
                        <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:280px;font-size:13px;height:30px;padding-bottom: 27px;" placeholder="EmpId">{{ $message }}</div>
                        <br>
                        @enderror
                        <div class="error" style="margin-left: 50px"></div>
                     </div>
                     <br>
                     <div class=" F_Name_error">
                        First Name<span class="red">*</span>
                        <input type="text" name="F_Name" class="" id="F_Name" value="{{$editNewEmployeeData->f_name}}" style="width:280px;margin-left:0px;height:33px"placeholder="Update First Name"><br>
                        <span id = "radio_error4" class="error" style="margin-top: 100px"></span>
                        @error('F_Name')
                        <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:280px;font-size:13px;height:30px;padding-bottom: 27px;" value="{{$editNewEmployeeData->L_Name}}" >{{ $message }}</div>
                        @enderror
                     </div>
                     <br>
                     <div class="F_Name_error">
                        Last Name<span class="red">*</span>
                        <input type="text" name="L_Name" class="" id="L_Name" style="width:280px;height:33px" value="{{$editNewEmployeeData->l_name}}" placeholder="Update last Name"><br>
                        <span id = "radio_error3" class="error" style="margin-top: 100px"></span>
                        @error('L_Name')
                        <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:280px;font-size:13px;height:30px;padding-bottom: 27px;" >{{ $message }}</div>
                        @enderror
                     </div>
                     <br>
                     <div class="input-group">
                        <span style="margin:5px 0px 0px 0px;padding-right: 8px"> Gender<span style=color:red>*</span>:</span>
                        <input type="radio" class="radio" name="gender" value="Male" {{ $editNewEmployeeData->gender == 'Male' ? 'checked' : ''}}>Male
                        <input type="radio" class="radio" name="gender" value="Female" {{ $editNewEmployeeData->gender == 'Female' ? 'checked' : ''}}>Female<br>
                        @error('gender')
                        <div class="alert alert-danger" style="margin-left:10px;margin-top:10px;width:280px;font-size:15px !important ;height:30px;padding-bottom: 27px;">{{ $message }}</div>
                        @enderror
                     </div>
                     <div>
                        <br>
                        <div class="input-group">
                           <label for="" class="form-label" style="margin:5px 0px 0px 0px;padding-right: 8px">Skills<span style=color:red>*</span><span style="margin-left: 16px">:</span></label>
                           C<input type="checkbox" name="checkbox[]" class="checkbox" value=C style="margin-right:  20px" {{str_contains($editNewEmployeeData->skills, 'C')  ? 'checked' : '' }}>
                           C++<input type="checkbox" class="checkbox" name="checkbox[]" value=C++ style="margin-right:  20px" {{str_contains($editNewEmployeeData->skills, 'C++')  ? 'checked' : '' }}>
                           Java<input type="checkbox" class="checkbox" name="checkbox[]" value=Java style="margin-right:  20px" {{str_contains($editNewEmployeeData->skills, 'Java')  ? 'checked' : '' }}>
                           .Net<input type="checkbox" class="checkbox" name="checkbox[]" value=.Net style="margin-right:  20px" {{str_contains($editNewEmployeeData->skills, '.Net')  ? 'checked' : '' }}>
                           Python<input type="checkbox" name="checkbox[]" value=Python style="margin-right:  20px" {{str_contains($editNewEmployeeData->skills, 'Python')  ? 'checked' : '' }}>
                           PHP<input type="checkbox" class="checkbox" name="checkbox[]" value=PHP style="margin-right: 20px" {{str_contains($editNewEmployeeData->skills, 'PHP')  ? 'checked' : '' }}>
                        </div>
                        <span id = "radio_error1" class="error" style="margin-left: 10px"></span>
                        @error('checkbox')
                        <div class="alert alert-danger" style="margin-left:10px;margin-top:10px;width:280px;font-size:13px;height:30px;padding-bottom: 27px;">{{ $message }}
                        </div>
                        @enderror
                     </div>
                     <div class="F_Name_error">
                        Start Date<span style="color:red">*</span>
                        <input type="text" name="Start_Date" id="datepicker" style="width:280px;margin-left: 0px" value="{{$editNewEmployeeData->start_date}}" placeholder="Start-Date" autocomplete="off">
                        @error('Start_Date')
                        <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:280px;font-size:13px;height:30px;padding-bottom: 27px;">{{ $message }}
                        </div>
                        @enderror<br>
                     </div><br>
                     <input type="submit" style="margin:5px 0px 0px 214px; background: #337ab7; color:white" name="submit" id="submit" value="Update" >
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
   </body>
</html>
<script>
   $( function() {
     $("#datepicker").datepicker({ dateFormat: 'yy/dd/mm' });
   } );
</script>