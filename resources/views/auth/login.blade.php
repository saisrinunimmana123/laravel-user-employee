<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script
         src="https://code.jquery.com/jquery-3.6.3.min.js"
         integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
         crossorigin="anonymous"></script>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
      <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
      <script src="{{url('js/LoginFormValidation.js')}}"></script>
      <link href="{{url('css/admin/login.css')}}" rel="stylesheet">

   </head>
   <body >
    <div class="container">
      <div class="container  dis">
         <form  method="post" action="{{url('Login')}}" id="Login" >
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="row container">
               <div class="col col-12 col-sm-12 col-md-12 col-lg-12 cal">
                  <h1 style="margin-left: 140px;color:white">Login</h1>
                  @csrf
                  <div class="title m-b-md ">
                     <div class="row">
                        <div class="col col-4  col-s-12  col-12">
                           <div class="form-group">
                              <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                              @error('name')
                              <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:425px;font-size:15px;height:30px;padding-bottom: 27px;" >{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="col col-4  col-s-12  col-12">
                        <div class="form-group">
                           <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                           @error('password')
                           <div class="alert alert-danger" style="margin-left:0px;margin-top:10px;width:425px;font-size:15px;height:30px;padding-bottom: 27px;" >{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <br>
                    
                     <div class="form-group align-center captchaField">
                        <div id="recapchaWidget" class="g-recaptcha"></div>
                      <span id="recaptcha-error" class="error-text" style="color:red">Please complete the reCAPTCHA</span>
                     </div>
                     <span id="captcha"  style="margin-left:0px;color:red" ></span>
                     <!-- <input type="button" id="but" style="background:blue;color:white;font-size: 25px;border-radius: 5px" value="ok"> -->
                     <div class="col col-4  col-s-12  col-12">
                        <div class="form-group">
                           <button style="cursor:pointer" type="click" id="submit" class="btn btn-primary submit-btn">Login</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
    </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
      <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
   </body>
</html>
<script type="text/javascript">
   var widId = "";
  
   var onloadCallback = function ()
     {
       widId = grecaptcha.render('recapchaWidget', {
         'sitekey': "{{config('services.recaptcha.key')}}"
         });
     };
     function IsRecapchaValid()
       {
       var res = grecaptcha.getResponse(widId);
       if (res == "" || res == undefined || res.length == 0)
          {
           return false;
          }
        return true;
       }
       // $("#submit").hide();
        $('#recaptcha-error').hide();
      
       $('.submit-btn').click(function(e) {
         
   var captcha_error = 0;
   
   var response = grecaptcha.getResponse();
   
   if(response.length == 0) {
       captcha_error = 1;
      
       e.preventDefault();
       $('#recaptcha-error').show();
   }
   else {
   
       captcha_error = 0;
       $('#recaptcha-error').hide();
   }
   })
         
    
</script>