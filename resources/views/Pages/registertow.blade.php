

   @extends('layouts.master')
   <!-- start-header -->
          
<link rel="stylesheet" href="{{ url('/css/registrationstep2.css') }}">

   @section('title','register-part-2')

    
            <!-- start-section-one -->
            @section('content')
            
<div class="label">
    <h1>Payment</h1>

</div>
<div class="section-one">
<div class="verfication">
<p> <img src="{{url('/images/accept.png')}}" alt="" srcset=""><span>Verification Email Sent</span><br>
A verification email has been sent to <bold>{{Auth::user()->email}}</bold> Please check your inbox to verify your email.</p>
<p><img src="/images/accept.png" alt="" srcset=""><span>Guest Account Created
</span><br>Welcome to the Auction EV vehicles Community. You can set your password through the verification email or do it a little later during
registration. </p>
</div>

</div>
<div class="type-member">
    <div class="label-type">
        <h3>Choose Your MemberShip :</h3>
        
    </div>
    
    <div class="chooses">
      
<div class="member" id="chooseone">
    <div id="member_basic">
<input type="radio" name="basic" id="basic" value="75"><span>Basic</span>
<p>Buy one to a few vehicles a year</p>
<p class="price"> $75.00 JD/YEAR</p>
<P><small>(No Deposit)</small></P>
<p><small>Membership is fully refundable within 7 days if there is 
    no activity tied to your account</small></p>
</div>

</div>


<div class="member" id="choosetow">
    <div id="member_premier">
    <input type="radio" name="premier"  id="premier" value="250"><span>premier</span>
    <p>Buy many cars a year</p>
    <p class="price"> $250.00 JD/YEAR</p>
    <P><small>(+ $400.00 JD Refundable deposit)</small></P>
    <p><small>Membership is fully refundable within 7 days if there is 
        no activity tied to your account</small></p>

</div>
</div>

    </div>
</div>
 <!--//////////// end-section-one/////////////// -->

<!--//////////// start-section-one/////////////// -->

<div class="pay">
    <div class="label-pay">
        <p>Please select your payment method :</p>
    </div>
    
<div class="chosses-payment">
   
    <div class="option">
        <img class="credit_card" id="credit_card"src="/images/credit_card_icon_129105.png" alt="">
    </div>
    <div class="option"id="ebay">
       <img class="ebay" src="/images/Ebay_icon-icons.com_66888 (1).png" alt="">
    </div>
    <div class="option">
        <img class="googlepay" id="googlepay"src="/images/cads.png" alt=""><span>pay</span>
    </div>

</div>
</div>

<div class="select-method">
    <div  id="select_method">

   
    <form action="" method="post">
    <label for="select"> Card Type :</label><br>
    <select name="card-type" id="cardtype" >
        <option value="" selected>cardtype</option>
        <option value="visa">Visa Card</option>
                <option value="master">Master Card</option>

    </select><br>
    <label for="name">Name On Card :</label><br>
    <input type="text" placeholder="name on card"><br>
    <input type="text" placeholder="card number"><span ><img src="" alt=""></span><br>
    <input type="datetime" placeholder="MMM"> 
    <input type="datetime" placeholder="YYY">
    <input type="datetime" placeholder="CVV"><br>
    <input type="phone" placeholder="Enter you phone Number">
    <br>
    <input type="checkbox" ><span><bold>Automatic Annual Renewal
</bold><br>YourAuction Electric Vehicles 
Membership will automatically renew every 365
 days and be billed to your primary payment
method on file. You can cancel your Membership
 any time. Membership fees are subject to change.</span>
<br>
<input type="submit" value="Submit">
    </form>
 </div>
 <div id="paypal_payment">

<form action="{{route('paypal')}}" method="post">
@csrf
  <input  type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

  <input id="member_type" type="text" name="member_value" value="" hidden>
  
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online" width="200" height="100">
  <img alt="" width="5" height="5"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
 </div>
</div>
<button><a href="{{route('paypal')}}">paypal</a> </button>
<script src="{{url('/javascript/registrationstep2.js')}}"></script>
@endsection
</body>
</html>