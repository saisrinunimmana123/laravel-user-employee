<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{url('css/404error.css')}}" rel="stylesheet">      
   </head>
   <body class="body">
      <div>
         @include('admin.adminDashboard')
      </div>     
      <form>
         <div class="col col-3 col-4 col-s-3 col-s-5 col- 8 col-12 dis">
            <h1 style="">404 Error</h1>
         </div>
         <div class="col col-3 col-4 col-s-3 col-s-5 col- 8 col-12 dis">
            <h1 style="margin:0px 0px 0px 270px;color:#989fa7"></h1>
         </div>
      </form>
   </body>
</html>