<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>      
      <link href="{{url('css/dashboard.css')}}" rel="stylesheet">
   </head>
   <body>
      <button class="button" style="margin-left:10px;width:40px;height:40px;r"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <div class="nav1">
         <button style="background: #337ab7;  color:white ; border:1px solid #cdcaca;height:50px;width:300px" ><a href="viewNonAdminEmployeDetails" style=" color:white;height:50px; margin:10px 3px 3px 3px !important;">Dashboard</a></button>
         <ul class="nov2" style="list-style-type:none;">
            <li class="panel panel-default" id="dropdown">
               <a data-toggle="collapse" href="#dropdown-lvl2">
               Employee
               <i class="fa fa-chevron-down" style="margin-left: 70px"></i>
               <span class="caret"></span>
               </a>
               <div id="dropdown-lvl2" class="panel-collapse collapse">
                  <div class="panel-body">
                     <ul class="nav navbar-nav">
                        <li><a class="nav-link" href="viewNonAdminEmployeDetails"  style="margin-left: 25px">View Employee</a></li>
                     </ul>
                  </div>
               </div>
            </li>
         </ul>
      </div>
      <h2  style="background: #fff0f0;height: 50px;border-bottom:  1px solid black;margin-top: 13px"> <a class="logoutt" href="{{url('logout')}}" >logout</a></h2>
   </body>
</html>
<script>
$(".button").click(function(){
    $(".nav1").fadeToggle();
});
</script>