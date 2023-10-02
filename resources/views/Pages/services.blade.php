
    
@extends('layouts.master')


    <link rel="stylesheet" href="{{url('/css/services.css')}}">
    

@section('content')


    <!-- label -->
    <div class="label">
        <h1>Services</h1>
    </div>
    <div class="content">

<div class="up">
<div class="image reveal" ><img src="{{url('/images/png-clipart-carfax-used-car-certified-pre-owned-hyundai-santa-fe-car-mammal-carnivoran-thumbnail-removebg-preview.png')}}" alt="image"></div>
<div class="text rereveal"><p class="text-content">
We take pride in offering the Carfax Report service on our website. The Carfax Report is a comprehensive report that
provides important and detailed information about a vehicle's history and records. This information is obtained from
reliable and diverse sources such as government agencies, insurance companies, service centers, and more.

</p></div>
</div>

<div class="down ">
   
    <div class="text  reveal">
        <p class="text-content">
            Auto Score Vehicle Inspection is an advanced evaluation tool used to assess the condition and value of a vehicle. Auto
            Score aims to provide a comprehensive analysis of multiple factors that impact the value and condition of the vehicle,
            helping buyers and sellers make informed decisions about the car.

        </p>
    </div> 
    <div class="image rereveal">
        <img src="{{url('/images/simple-autoscore-logo.png')}}" alt="image">
    </div>
</div>
    </div>





    <script src="{{url('/javascript/services.js')}}"></script>
    @endsection
