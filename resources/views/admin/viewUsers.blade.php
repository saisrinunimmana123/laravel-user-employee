<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
         margin:20px 20px 0px 0px;
         }   
         }
         #table{
         margin-left: 5px;
         width:54% !important;
         height:450px;
         }  
         table{
         margin:20px 20px 0px 5px;
         width:1060px;
         }    
      </style>
   </head>
   <body>
      @include('admin.adminDashboard')
      <form method="get" action="">
         <div class="head">
         </div>
         <div class="table-responsive " id="table" >
            <table class="table table-striped table-hover table-bordered">
               <thead style="background: pink">
                  <tr>
                     <th><strong>Id</strong></th>
                     <th><strong>Name</strong></th>
                     <th><strong>Role</strong></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($admins as $admin)
                  <tr style="border:1px solid black">
                     <td style="width:100px">{{$admin->id}}</td>
                     <td style="width:100px">{{$admin->name}}</td>
                     <td style="width:100px">{{$admin->role}}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </form>
   </body>
</html>