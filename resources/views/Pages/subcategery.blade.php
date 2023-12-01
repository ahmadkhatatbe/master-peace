@extends('layouts.master')

@section('title', 'singlecategory')

<link rel="stylesheet" href="{{ url('/css/subcategery.css') }}">
<link rel="stylesheet" href="{{ url('/css/style.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
    



@section('content')
    <div class="main-container">

    </div>
    <div class="label">
       
            <h1>{{ $info->make }} {{ $info->model }} {{ $info->year }} </h1>
        
    </div>

    <div class="container">
        <div class="content">


            <!-- left side -->



            <div class="left">


                <div class="cardimage-wrapper">
                    <div class="cardimage">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="cardimg-display">

                                <img src="{{ asset($info->images[0]->filename) }}" alt="Vehicle Image" class="cardimg"
                                    id="showcase-image" width="100%">

                            </div>
                        </div>
                        <div class="subimage">
                            <div class="img-select"style="display:flex;flex-wrap:wrap">
                                @foreach ($info->images as $image)
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
            <div class="mid">
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
                                    <td>keys :</td>
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
                                <tr>
                                    <td>Color :</td>
                                </tr>
                            </thead>
                            <tbody>

                              
                                    <tr>
                                        <td>#{{ $info->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $info->vin }}</td>
                                    </tr>
                                    <tr>
                                        <td> {{ $info->mileage }} mi (ACTUAL)</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $info->title_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>${{ $info->retail_value }} JD</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $info->primary_damage }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $info->secondary_damage }} </td>

                                    </tr>

                                    <tr>
                                        <td>{{ $info->color }}</td>
                                    </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="report">
                    <div class="name-section">
                        <h4>Services And Reports</h4>
                    </div>
                    <div class="report-content">




                        <div><img class="img-1" src="/images/simple-autoscore-logo.png" alt="" srcset="">
                            <span>Autoscore Report</span>
                        </div>

                        <div><img class="img-2" src="/images/carfax.jpg" alt="" srcset=""> <span>CarFax
                                Report</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right side -->
            <div class="right">

                <div class="sub-right">
                    <h3>Bid Information</h3>
                    <hr>
                    <div class="content-bid">
                        <table class="table-right">
                            <thead>
{{-- 
                                @php
                                    foreach ($auctions as $auction) {
                                        if ($auction['id'] == $subinfo->auction_id) {
                                            $status = $auction['status'];
                                            if ($auction && $auction['start_datetime'] && $auction['end_datetime']) {
                                                $start = \Carbon\Carbon::parse($auction['start_datetime']);
                                                $end = \Carbon\Carbon::parse($auction['end_datetime']);
                                    
                                                // Calculate the total time duration in days, hours, and minutes
                                                $totalDays = $end->diffInDays($start);
                                                $totalHours = $end->diffInHours($start) % 24;
                                                $totalMinutes = $end->diffInMinutes($start) % 60;
                                    
                                                // Display the total time
                                                $formattedTotalTime = "$totalDays days, $totalHours hours, $totalMinutes minutes";
                                            } else {
                                                $formattedTotalTime = 'N/A'; // Handle the case where data is missing
                                            }
                                        }
                                    }
                                    
                                @endphp --}}
                                <tr>
                                    <td> Bid Status:</td>
                                </tr>
                                <tr>
                                    <td> Sale Status:</td>
                                </tr>
                                <tr>
                                    <td> Time Left:</td>
                                </tr>
                                <tr>
                                    <td> Current Bid:</td>
                                </tr>
                                <tr>
                                    <td>Start Bid : $ </td>
                                </tr>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> sale</td>
                                </tr>
                                <tr>
                                    <td> On Approval</td>
                                </tr>
                                <tr>
                                    <td><span id="timer"></span></td>
                                </tr>
 <tr>

                                        <td> {{ now()->format('Y-m-d') }}</td>
                                    </tr>
                                @if (!empty($bids))
                                    {{-- @php
                                        $totalBidAmount = 0;
                                        foreach ($bids as $bid) {
                                            if ($bid['vehicle_id'] === $subinfo->id) {
                                                $totalBidAmount += $bid['amount'];
                                            }
                                        }
                                    @endphp --}}

                                     
                                    <tr>
                                        <td> ${{ $info->current_bid + $bids
                                        
                                        }} JD</td>
                                    </tr>
                                @else 
                               
                                    <tr>

                                        <td> ${{ $info->current_bid }} JD</td>
                                    </tr>
                                @endif

                                <tr>
                                    <form action="{{ route('bid') }}" method="post">
                                        @csrf
                                <tr>
                                    <td>
                                        @auth


                                            <input type="text" class="input" name="user_id"
                                                value="{{ Auth::user()->id }}"hidden>
                                        @endauth
                                        <input type="text" class="input" name="vehicle_id" value="{{ $info->id }}"
                                            hidden>
                                        <input type="text" class="input" name="winstatus" value="no" hidden>




                                        <input type="number" class="input" name="amount" >
                                    </td>
                                </tr>






                            </tbody>
                        </table>

                        <div class="form">


                        </div><br>
                        <center><small>($100.00 USD Bid Increment)</small><br>
                          
                        </center>

                        <input type="submit" class="bid-link" value="Bid">
                        </form>
                        <hr>
                        <h5>All bids are legally binding and all sales are final.</h5>
                    </div>
                </div>
                <div class="sale-info">
                    <div class="sale-name">
                        <h4>Sale Information</h4>
                    </div>
                    <div class="sale-content">
                        <table>
                            <thead class="thead-info">
                                <tr>
                                    <td>Location</td>
                                </tr>
                                <tr>
                                    <td>Sale Date</td>
                                </tr>
                                <tr>
                                    <td>Sale Updated</td>
                                </tr>
                            </thead>
                            <tbody class="tbody-info">
                                <tr>
                                    <td>AL-HARA-AREA</td>
                                </tr>
                                <tr>
                                    <td>FUTURE</td>
                                </tr>
                                <tr>
                                    <td>07/04/2024 12:45 PB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    <div class="container ">
        <div class="name-similar">
            <h3>View Similar Vehicle</h3>
        </div>
        <div class="vehiclecards">

@foreach ($vehicles as $infovehicles )
    

            <div class="vehiclecard">
                <div class="swiper-container"style="overflow: hidden; height:55%" >
        <div class="swiper-wrapper" >
          
            @foreach ($infovehicles->images as $image)
                
                    <div class="swiper-slide">
                        <img src="{{ asset($image->filename) }}" alt="">
                    </div>
                
            @endforeach
        </div>
        
    </div>
              
                <div class="vehiclecard-content">
                    <p class="name">{{$infovehicles->year }} {{$infovehicles->make }} {{$infovehicles->model }} </p>
                    <p class="lotnumber"> Lot # <span class="lotnumber">{{$infovehicles->id }}</span></p>
                    <p class="vehicleprice">Current Bid: <span class="vehicleprice">${{$infovehicles->current_bid }} JD</span></p>
                    <p class="location">Location: Al Hara Area</p>
                     <div style="display: flex; justify-content:space-between">
                <div style="margin-top: 15px">
                    <a style="text-decoration: none" class="vehiclebtn-detail"href="{{route('subcategery',$infovehicles->id)  }}">View
                        Detail</a>
                </div>
                <div>
                   
                   
                    <form action="{{ route('watch') }}" method="post">
                        @csrf
                        <input type="text" name="vehicle_id" value="{{ $infovehicles->id }}" hidden>
                        {{-- <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden> --}}

                        <button type="submit" class="vehiclebtn-watch">WishList</button>
                    </form> 
                    
                   
                </div>
            </div>
                </div>
            </div>
            
           @endforeach
        </div>

    </div>




    {{--  --}}





    {{--  --}}



    <script src="{{ url('/javascript/subcategory.js') }}"></script>
    <script src="{{ url('/javascript/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
        <script>

            // Use SweetAlert2 to display the alert from the right
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: '{{ session('error') }}',
                position: 'center', // Display from the top right
                showConfirmButton: true, // Hide the confirmation button
                // timer: 3000 // Automatically close after 3 seconds
            });
        </script>
        
    @endif
    <script>
        
            var swiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: true, // Enable looping

        // If you want pagination (dots navigation), you can add the following:
        pagination: {
            el: '.swiper-pagination',
        },
 autoplay: {
            delay: 3000, // Delay between slides (in milliseconds)
        },
        // If you want navigation buttons (prev/next), you can add the following:
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    </script>

    <!-- End Slider Script -->
@endsection
