@extends('layouts.master')
@section('title','contact')


    <link rel="stylesheet" href="{{url('/css/contactus.css')}}">
   

@section('content')


    <div class="container">
    <div class="section-one">
          <h1>Contact Us</h1>

    </div>

<div class="section-two">
  
   <div class="left reveal">
<div> <img src="/images/phone-call.png" alt=""> <span>0777565464</span></div>
<div> <img src="/images/email.png" alt=""> <span>ahmedkatatbeh@gmail.com</span></div>
<div> <img src="/images/location.png" alt=""> <span>Irbid-Coding Academy</span></div>

   </div>
   <div class="right rereveal">
    <h3>Get Us To Know</h3>
<form action="" method="post">
    <input id="text" type="text" placeholder="Enter Your Name"><br>
    <input id="text" type="text" placeholder="Enter Your Email"><br>
    <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>
    <br><input type="submit" value="Send">
</form>
   </div>
</div>
    <script src="{{url('/javascript/contactus.js')}}"></script>

 @endsection
