@extends('layouts.master')
 @section('title','about')

    <link rel="stylesheet" href="{{url('/css/aboutus.css')}}">


@section('content')

<!--///////////////////// section-one ////////////////////// -->
<div class="section-one ">
   <h1 class="about" id="about">About Us</h1> 

</div>

<!--///////////////////// end-section-one ////////////////////// -->

<!--///////////////////// section-two ////////////////////// -->
<div class="section-two ">
    <div class="section-two-partone reveal">
<div class="image"><img src="/images/Auction-1.png" alt="image"></div>
<p>Welcome to Electric Car Auction! We take pride in
     providing a unique and reliable platform for 
     buying and selling
electric vehicles online. We consider ourselves
 pioneers in this field and strive to enhance the
  seamless and
transparent exchange of electric vehicles.
We work with a wide range of sellers and buyers who are interested in electric cars. 
Whether you want to sell your
current electric vehicle or purchase a new one,
 we provide a secure and reliable platform to 
 achieve your goals.</p>
    </div>
    <div class="section-two-parttwo reveal">
        <p>
            Welcome to Electric Car Auction! We take pride in
            providing a unique and reliable platform for
            buying and selling
            electric vehicles online. We consider ourselves
            pioneers in this field and strive to enhance the
            seamless and
            transparent exchange of electric vehicles.We work with a wide range of sellers and buyers who are interested 
            in electric cars. Whether you want to sell your
        current electric vehicle or purchase a new one, we provide
         a secure and reliable platform to achieve your
          goals.</p>
    <div><img src="/images/Auction-1.png" alt=" image"></div>
    
    </div>

</div>

<!--///////////////////// end-section-two ////////////////////// -->

    <script src="{{url('/javascript/aboutus.js')}}"></script>

    @endsection  
