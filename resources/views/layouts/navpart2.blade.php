<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <title>@yield('title','signin')</title>
</head>
<body>
    <div class="header">
        <div class="left">
            <h1 class="logo"> Auction EV vehicle</h1>
        </div>
            <div class="right-side">
               
                <div class="btns-header">    
                
           
    @if (Auth::check())
<div class="main-user">
          <span class="userimg" ><img  src="{{url('/images/user.png')}}" alt=""><img src="{{url('/images/caret-down.png')}}" alt="" srcset=""></span>
           <div class="usermain">
             <li class="user"><a href="{{route('profile.edit')}}">Profile</a> </li>
              <li class="user"><form method="POST" action="{{ route('logout') }}">
                            @csrf

                          <input class="logout" type="submit" value="LogOut">

</form></li>
      
    </div>
</div>
 @endif
       
       
        @if (!Auth::check())
        <button id="register"><a href="{{route('register')}}">register</a></button>
        <button id="signin"><a href="{{route('login')}}">signIn</a></button>
          @endif
               </div>
                 </div>
             

    <div class="menu" >
                    
<div class="btns-responsivebar">
    <button class="btn--responsivebar" id="register-responsivebar">register</button><br><br>
    <button class="btn--responsivebar" id="signin-responsivebar">signIn</button>
</div>
</div>


                  <div class="buger">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <img class="image" src="{{url('/images/menu-burger.png')}}" alt="burgermenu">
    </label>
</div>  
                 
    </div>


