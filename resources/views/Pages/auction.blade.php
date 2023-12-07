@extends('layouts.master')
<link rel="stylesheet" href="{{ url('css/auction.css') }}">
<link rel="stylesheet" href="{{ url('/css/style2.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- sweet alert links --}}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
{{-- endlinks --}}
<style>
    #second {
        stroke-dasharray: 440;
        stroke-dashoffset: 440;
        transition: stroke-dashoffset 1s linear;
    }
</style>
@section('content')
    <div class="container" style="width: auto">
        <div class="content">


            <!-- left side -->
            <div class="left">
                @foreach ($vehiclesLive as $vehicle)
                    <div class="cardimage-wrapper">
                        <div class="cardimage">
                            <!-- card left -->
                            <div class="product-imgs">
                                <div class="cardimg-display">

                                    <img src="{{ asset($vehicle->images[0]->filename) }}" alt="Vehicle Image"
                                        class="cardimg" id="showcase-image" width="100%">

                                </div>
                            </div>
                            <div class="subimage">
                                <div class="img-select"style="display:flex;">
                                    @foreach ($vehicle->images as $image)
                                        <div class="img-item">
                                            <a href="#" data-src="{{ asset($image->filename) }}">
                                                <img class="cardimg-thumbnail" src="{{ asset($image->filename) }}"
                                                    alt="shoe image">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- mid  -->
            <div class="mid" style="">
                <div class="sub-mid">
                    <h3>Vehicle Details</h3>
                    <hr>
                    <div class="content">

                        <table class="table-mid">
                            <thead>
                                <tr>
                                    <td>Lot Number :</td>
                                </tr>
                                <tr>
                                    <td>VIN :</td>
                                </tr>
                                <tr>
                                    <td>Odometer :</td>
                                </tr>
                                <tr>
                                    <td>Title Code : </td>
                                </tr>

                                <tr>
                                    <td>Est.Retail Value :</td>
                                </tr>
                                <tr>
                                    <td>Primary :</td>
                                </tr>
                                <tr>
                                    <td>Secondary </td>
                                </tr>

                            </thead>
                            <tbody>


                                <tr>
                                    <td>#{{ $vehicle->id }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $vehicle->vin }}</td>
                                </tr>
                                <tr>
                                    <td> {{ $vehicle->mileage }} mi (ACTUAL)</td>
                                </tr>
                                <tr>
                                    <td>{{ $vehicle->title_code }}</td>
                                </tr>

                                <tr>
                                    <td>${{ $vehicle->retail_value }} JD</td>
                                </tr>
                                <tr>
                                    <td>{{ $vehicle->primary_damage }}</td>
                                </tr>

                                <tr>
                                    <td>{{ $vehicle->secondary_damage }} </td>

                                </tr>


                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="subtow-mid" style="text-align: center">
                    <div class="circle" style="margin: auto">
                        <div class="dot"></div>
                        <div class="action">
                            <svg>
                                <circle cx="70" cy="70" r="70" fill="none" stroke="#00000"
                                    stroke-width="10"></circle>

                                <circle id="second" cx="70" cy="70" r="70" fill="none" stroke="#0074d9"
                                    stroke-width="10"></circle>
                            </svg>
                        </div>
                        <div class="second">
                            <div style="text-align: center" id="latest-bidder">Bidder: Loading...</div>
                            <div style="text-align: center" id="Amount">CurrentPrice:Loading...</div>
                            <div style="text-align: center" id="seconds"> Loading...</div>
                             <input id="numberbidder" type="text" name="id" value="" hidden>
                             <input id="lastbidder" type="text" name="lastbidder" value="" hidden>
                             <input id="vehicle_id" type="text" name="lastbidder" value="" hidden>
                        </div>
                    </div>
                    <div>


                        <div style="display: flex;text-align:center;margin-left:100px; margin-top:10px;margin-bottom:10px">
                            <div>
                                <div id="pricevehicle" style="margin-right:10px;background:gray;padding:5px 10px 5px 10px">
                                </div>
                                <input type="text" id="amountOfmybid" hidden>


                            </div>
                            <button id="decrease" value="100"
                                style="padding: 5px 25px 5px 25px;margin-right:10px;border:none;border-radius:5px">--</button>

                            <button id="increase" value="100"
                                style="padding: 5px 25px 5px 25px;margin-right:10px;border:none;border-radius:5px">+</button>
                        </div>
                    </div>
                    <form id="livebidding">
                        @csrf

                        @auth
                            <input type="text" class="input" name="user_id" value="{{ Auth::user()->id }}" hidden>
                        @endauth
                        @php
                            $vehicleId = $vehicle->id;
                        @endphp
                        <input type="text" class="input" name="vehicle_id" value="{{ $vehicle->id }}" hidden>
                        <input type="text" class="input" name="winstatus" value="no" hidden>
                        <input id="totalAmount" type="number" class="input" name="amount" value=0 min=100 hidden>


                        {{-- <input id="bidamount" type="number" class="input" name="amount"> --}}
                        <input id="sendAmount" type="number" class="input" name="sendAmount" value='' hidden>

                        <input type="submit" class="bid-link" value="Bid">
                    </form>
                    <input id="currentbid" type="number" value="{{ $vehicle->current_bid }}" hidden>


                </div>
                @endforeach
            </div>




            <div class="right">
                <div class="scroll-box">
                    @foreach ($vehicles as $vehicleGroupes)
                        @foreach ($vehicleGroupes as $vehicle)
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th> </th>
                                        <th>Make :</th>
                                        <th>Odometer :</th>


                                        <th>CurrentBid :</th>
                                    </tr>

                                </thead>
                                <tbody>


                                    <tr>
                                        <td> <img src="{{ asset($vehicle->images[0]->filename) }}" alt="Vehicle Image"
                                                width="80px "hight="80px"></td>



                                        <td> <a href="{{ route('auction', $vehicle->id) }}"> {{ $vehicle->make }}</a>
                                        </td>

                                        <td>{{ $vehicle->mileage }}</td>



                                        <td>{{ $vehicle->current_bid }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        @endforeach
                    @endforeach
                </div>

            </div>



        </div>

    </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('./javascript/script.js') }}"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true, // Enable looping
            pagination: {
                el: '.swiper-pagination',
            },
            autoplay: {
                delay: 3000, // Delay between slides (in milliseconds)
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        ///////////////////////////
        function startCountdown(duration) {
            let enddata = new Date().getTime() + duration * 1000;

            let second = document.getElementById('second');
            let seconds2 = document.getElementById('seconds');
             let numberbidder = document.getElementById('numberbidder');
            let lastbidder = document.getElementById('lastbidder');
            let vehicle_id = document.getElementById('vehicle_id');
            let sendAmount= document.getElementById('sendAmount');
            let number=numberbidder.value;
            let lastowner=lastbidder.value;
            let vehicleid=vehicle_id.value;
            let amount=sendAmount.value;
            function updateCountdown() {
                let now = new Date().getTime();
                let distance = enddata - now;

                if (distance > 0) {
                    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    second.style.strokeDashoffset = 450 - (450 * seconds) / duration;
                    seconds2.innerHTML = seconds + " seconds";
                } else {
                    clearInterval(window.countdownInterval);
                    // /////////////
                               jQuery.ajax({
                    url: "http://127.0.0.1:8000/winner",
                    data: {
                         _token: '{{ csrf_token() }}',
                         id:number,
                         owner:lastowner,
                         idvehicle:vehicleid,
                          price:amount
                    },
                    type: 'POST',
                    success: function(result) {
                        if (result.success === true) {
Swal.fire({
            icon: 'success',
            title: 'You Won',
            text: 'You Won In This Auction',
        });
     setTimeout(function () {
                            window.location.href =
                                `http://127.0.0.1:8000/${result.route}/${result.vehicle_id}`;
                            }, 3000)}
                        if (result.success === false) {
Swal.fire({
            icon: 'success',
            title: 'You Won',
            text: 'You Won In This Auction',
        });
    
    // Delay the redirection by 3 seconds
    setTimeout(function () {
        window.location.href = `http://127.0.0.1:8000`;
    }, 3000);
}


                      
                    }
                });
                    /////////////////

                    console.log('Countdown complete!');
                }
            }

            // Clear any existing interval before starting a new one
            clearInterval(window.countdownInterval);

            // Start the countdown interval
            window.countdownInterval = setInterval(updateCountdown, 100);
        }

        //////////////////////////
        // end the counter

        $(document).ready(function() {
            $('#livebidding').on('submit', function(event) {
                event.preventDefault(); // Move this line to the beginning of the function
                var totalAmount = parseFloat($('#totalAmount').val());
                console.log(totalAmount);
                $('#totalAmount').val(totalAmount);

                jQuery.ajax({
                    url: "http://127.0.0.1:8000/livebid",
                    data: jQuery('#livebidding').serialize(),
                    type: 'POST',
                    success: function(result) {
                        startCountdown(10);

                        $('#bider').css('display', 'block');
                        jQuery('#bider').html(result.bidder);
                        jQuery('#livebidding')[0].reset();
                       
                            // Check for 'home' route response
    
   
                        console.log(result.vehicle_id)
                        if (result.success === true) {
Swal.fire({
            icon: 'success',
            title: 'You Won',
            text: 'You Won In This Auction',
        });
     setTimeout(function () {
                            window.location.href =
                                `http://127.0.0.1:8000/${result.route}/${result.vehicle_id}`;
                            }, 3000)}
                        if (result.success === false) {
Swal.fire({
            icon: 'success',
            title: 'You Won',
            text: 'You Won In This Auction',
        });
    
    // Delay the redirection by 3 seconds
    setTimeout(function () {
        window.location.href = `http://127.0.0.1:8000`;
    }, 3000);
}


                    }
                });
            });
        });

        $(document).ready(function() {
            // Function to update the latest bidder's name
            function updateLatestBidder() {
                jQuery.ajax({
                    url: "{{ route('getlivebid', $vehicleId) }}",
                    type: 'get',
                    success: function(result) {
                         
                        var latestBid = result.latestBid;
                        var latestBidderName = latestBid.user.name;
                        var totalAmount = result.totalAmount;
                        var currentbid = parseFloat($('#currentbid').val()) + parseFloat(totalAmount);

                        $('#latest-bidder').text('Bidder:' + latestBidderName);
                        $('#Amount').text('Price:' + currentbid);
                        $('#amountOfmybid').val(currentbid);
                        $('#lastbidder').val(latestBidderName);
                        $('#numberbidder').val(latestBid.user.id);
                         $('#vehicle_id').val(latestBid.vehicle_id);





                        var currentbid = $('#currentbid').val();
                        var sendAmount = $('#sendAmount').val(parseFloat($('#currentbid').val()) +
                            parseFloat(totalAmount));




                    }
                });
            }

            // Initial update and set an interval to update every N seconds
            updateLatestBidder();
            setInterval(updateLatestBidder, 900); // Update every 10 seconds (adjust as needed)

        });

    
    </script>
@endsection
