<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <title>Laravel</title>
      <style>
         @media screen and (max-width:480px){
             #table{
         margin-left: 20px;
         width:74% !important;
         height:1160px !important;
         }  
         table{
         margin:20px 0px 0px 0px;
         }   
         }
         #table{
         margin-left: 5px;
         width:64% !important;
         height:450px;
         }  
         table{
         margin:20px 20px 0px 15px;
         }     
      </style>
   </head>
   <body>
    @include('employee.employeedashboard')
    <form method="get" action="">
      <div class="head ">
      </div>
      <div class="table-responsive" id="table"> 
         <table class="table table-striped table-hover  "  >
            <thead style="background: pink">
               <tr>
                  <th><strong>Id</strong></th>
                  <th><strong>Employee_Id</strong></th>
                  <th><strong>Employee Name</strong></th>
                  <th><strong>Gender</strong></th>
                  <th><strong>Skills</strong></th>
                  <th><strong>Start_Date</strong></th>
               </tr>
            </thead>
            <tbody>
               @foreach($Nonadmin as $NonAdmindata)
               <tr style="border:1px solid black">
                  <td>{{$NonAdmindata->id}}</td>
                  <td>{{$NonAdmindata->emp_id}}</td>
                  <td>{{$NonAdmindata->f_name.' '.$NonAdmindata->l_name}}</td>
                  <td>{{$NonAdmindata->gender}}</td>
                  <td>{{$NonAdmindata->skills}}</td>
                  <td>{{$NonAdmindata->start_date}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
    </form>
   </body>
</html>
