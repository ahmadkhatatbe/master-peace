@extends('layouts.master')

@section('title', 'singlecategory')

<link rel="stylesheet" href="{{ url('/css/subcategery.css') }}">
<link rel="stylesheet" href="{{ url('/css/style.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />



@section('content')
    <div class="main-container">

    </div>
    <div class="label">
        @foreach ($info as $subinfo)
            <h1>{{ $subinfo->make }} {{ $subinfo->model }} {{ $subinfo->year }} </h1>
        @endforeach
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

                                <img src="{{ asset($images[0]->filename) }}" alt="Vehicle Image" class="cardimg"
                                    id="showcase-image" width="100%">

                            </div>
                        </div>
                        <div class="subimage">
                            <div class="img-select"style="display:flex;flex-wrap:wrap">
                                @foreach ($images as $image)
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

                                @foreach ($info as $subinfo)
                                    <tr>
                                        <td>#{{ $subinfo->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $subinfo->vin }}</td>
                                    </tr>
                                    <tr>
                                        <td> {{ $subinfo->mileage }} mi (ACTUAL)</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $subinfo->title_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>${{ $subinfo->retail_value }} JD</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $subinfo->primary_damage }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $subinfo->secondary_damage }} </td>

                                    </tr>

                                    <tr>
                                        <td>{{ $subinfo->color }}</td>
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

                                {{-- @php
                                         foreach ($participants as $participant ) {
                                            foreach ($auctions as $auction) {
                                                if ($participant['auction_id'] === $auction->['id']) {
                                                    $status=$auction['status'];
                                                 $startdate=$auction['start_datetime'];
                                                 $startdate=$auction['start_datetime'];
                                                 $enddate=$auction['end_datetime'];
                                                }
                                            }
                                         }
                                     @endphp --}}
                                {{-- for compare between the auction_id in table auction and the table vehicles --}}
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
                                    
                                @endphp
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

                                @if (!empty($bids))
                                    @php
                                        $totalBidAmount = 0;
                                        foreach ($bids as $bid) {
                                            if ($bid['vehicle_id'] === $subinfo->id) {
                                                $totalBidAmount += $bid['amount'];
                                            }
                                        }
                                    @endphp


                                    <tr>
                                        <td> ${{ $subinfo->current_bid + $totalBidAmount }} JD</td>
                                    </tr>
                                @else
                                    <tr>

                                        <td> ${{ $subinfo->current_bid }} JD</td>
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
                                        <input type="text" class="input" name="vehicle_id" value="{{ $subinfo->id }}"
                                            hidden>
                                        <input type="text" class="input" name="winstatus" value="no" hidden>




                                        <input type="number" class="input" name="amount" max="100">
                                    </td>
                                </tr>






                            </tbody>
                        </table>

                        <div class="form">


                        </div><br>
                        <center><small>($100.00 USD Bid Increment)</small><br>
                            @if (Session::has('error'))
                                <span style="color: red; font-size:15px">{{ Session::get('error') }}</span>
                            @endif
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
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="container ">
        <div class="name-similar">
            <h3>View Similar Vehicle</h3>
        </div>
        <div class="vehiclecards">


            <div class="vehiclecard">
                <img src="/images/1d4acdea8e37448da7bddf50ad98a301_ful.jpg" alt="">
                <div class="vehiclecard-content">
                    <p class="name">2014 BMW I3 BEV</p>
                    <p class="lotnumber"> Lot # <span class="lotnumber">99960623</span></p>
                    <p class="vehicleprice">Current Bid: <span class="price">$20,000.00 JD</span></p>
                    <p class="location">Location: Al Hara Area</p>
                    <div>
                        <button class="vehiclebtn-detail">View Detail</button>
                        <button class="vehiclebtn-watch">Watch</button>
                    </div>
                </div>
            </div>
            <div class="vehiclecard">
                <img src="/images/81b67fd65746457a98dda0144d0daaab_thb.jpg" alt="">
                <div class="vehiclecard-content">
                    <p class="name">2020 Hyundai ioniq 5</p>
                    <p class="lotnumber"> Lot # <span class="lotnumber">94560623</span></p>
                    <p class="vehicleprice">Current Bid: <span class="price">$12,000.00 JD</span></p>
                    <p class="location">Location: Al Hara Area</p>
                    <div>
                        <button class="vehiclebtn-detail">View Detail</button>
                        <button class="vehiclebtn-watch">Watch</button>
                    </div>
                </div>
            </div>
            <div class="vehiclecard">
                <img src="/images/9c43e1b7050b488e892026a9f0151419_thb.jpg" alt="">
                <div class="vehiclecard-content">
                    <p class="name">2018 Tesla model 4</p>
                    <p class="lotnumber"> Lot # <span class="lotnumber">78660623</span></p>
                    <p class="vehicleprice">Current Bid: <span class="price">$10,000.00 JD</span></p>
                    <p class="location">Location: Al Hara Area</p>
                    <div>
                        <button class="vehiclebtn-detail">View Detail</button>
                        <button class="vehiclebtn-watch">Watch</button>
                    </div>
                </div>
            </div>
            <div class="vehiclecard">
                <img src="/images/344f233e39b8494da8b3da97ec6b3153_ful.jpg" alt="">
                <div class="vehiclecard-content">
                    <p class="name">2017 Tesla model 3</p>
                    <p class="lotnumber"> Lot # <span class="lotnumber">86560623</span></p>
                    <p class="vehicleprice">Current Bid: <span class="price">$18,000.00 JD</span></p>
                    <p class="location">Location: Al Hara Area</p>
                    <div>
                        <button class="vehiclebtn-detail">View Detail</button>
                        <button class="vehiclebtn-watch">Watch</button>
                    </div>
                </div>
            </div>
        </div>

    </div>




    {{--  --}}





    {{--  --}}



    <script src="{{ url('/javascript/subcategory.js') }}"></script>
    <script src="{{ url('/javascript/script.js') }}"></script>
    <script></script>

    <!-- End Slider Script -->
@endsection
