<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script
         src="https://code.jquery.com/jquery-3.6.3.min.js"
         integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
         crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="{{url('js/editAndUpdateAlertMessage.js')}}"></script>
      <title>Laravel</title>
      <style>
          @media only screen and (max-width: 768px) and (min-width: 320px){
             #table{
         margin-left: 20px;
         width:74% !important;
         height:1160px;
         }  
         table{
         margin:20px 20px 0px 0px;
         }   
         }
         #table{
         margin-left: 5px;
         width:70% !important;
         height:460px;
         }  
         table{
         margin:20px 20px 0px 5px;
         }    
      </style>
   </head>
   <body>
      <div>
         @include('admin.adminDashboard')
      </div>
      <div>
      <form method="get" action="">
        <button><a href="{{url('http://127.0.0.1:8000/createNewEmp')}}">Add New Employee</a></button>
         <div class="table-responsive " id="table">
            <table class="table table-striped table-hover  table-bordered"  >
               <thead style="background: pink">
                  <tr>
                     <th><strong>Id</strong></th>
                     <th><strong>Employee_Id</strong></th>
                     <th><strong>F_Name</strong></th>
                     <th><strong>L_Name</strong></th>
                     <th><strong>Gender</strong></th>
                     <th><strong>Skills</strong></th>
                     <th><strong>Start_date</strong></th>
                     <th><strong>Created By</strong></th>
                     <th><strong>Updated By</strong></th>
                     <th><strong>Created On</strong></th>
                     <th><strong>Updated On</strong></th>
                     <th><strong>Action</strong></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($viewEmployeeData as $employeeData)
                  <tr>
                     <td>{{$employeeData->id}}</td>
                     <td>{{$employeeData->emp_id}}</td>
                     <td>{{$employeeData->f_name}}</td>
                     <td>{{$employeeData->l_name}}</td>
                     <td>{{$employeeData->gender}}</td>                     
                     <td>{{$employeeData->skills}}   
                     <td>{{$employeeData->start_date}}</td>
                     <td>{{$employeeData->created_by}}</td>
                     <td>{{$employeeData->updated_by}}</td>
                     <td>{{$employeeData->created_at}}</td>
                     <td>{{$employeeData->updated_at}}</td>
                     <td style="width:160px"><a href="{{url('employeeEditData/'.$employeeData->id)}}"class="btn btn-info  btn3"  id="edit" style="width:40px; padding-right: 30px">Edit</a>
                        <a href="{{url('delete/'.$employeeData->id)}}" class="btn btn-danger btn2"  id="delete">Delete</a>
                     </td>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            <div class="d-flex justify-content-center">
               {!! $viewEmployeeData->links() !!}
            </div>
         </div>
      </form>
   </body>
</html>
