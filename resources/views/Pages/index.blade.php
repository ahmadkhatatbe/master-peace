@extends('layouts.master')

@section('title', 'home')

<link rel="stylesheet" href="{{ url('/css/home.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@section('content')
    <!--/////////////////////////////////start section-one///////////////////////////////  -->

    <section class="section-one">
        <div class="text-section-one">
            <p>Take advantage of the wonderful opportunity to own a high-quality and attractively
                priced used electric vehicle in our
                auction and be part of positive environmental change</p>
            <div>
               <a href="{{route('register')}}"> <button class="btn-register-section-one" id="register-parttow">register to start Bidding </button></a>
            </div>
        </div>
    </section>
    <!--/////////////////////////////////////////////////End section-one///////////////////////////////  -->

    <!--////////////////////////////////////////////////start section-two///////////////////////////////  -->















    <section class="section-two">
        <div class="name-section-two">
            <div>
            <p>Popular Vehicles</p> 
        </div>
            <div class="custom-pagination">
    <ul id="pagination" class="pagination">
        @if ($vehicles->onFirstPage())
            <li id="previous" class="previous  disabled"><span class="page-link"><</span></li>
        @else
            <li id="previous" class="previous  "><a class="page-link" href="{{ $vehicles->previousPageUrl() }}"><</a></li>
        @endif

        @if ($vehicles->hasMorePages())
            <li id="next" class="next  "><a class="page-link" href="{{ $vehicles->nextPageUrl() }}">></a></li>
        @else
            <li  id="next" class="next   disabled"><span class="page-link">></span></li>
        @endif
    </ul>
</div>
        </div>
       <!-- Custom Pagination Buttons -->

        @foreach ($vehicles as $vehicle)
         
      
            
        
         
                @php
                    $totalBidAmount = 0;
                    foreach ($bids as $bid) {
                        if ($bid['vehicle_id'] === $vehicle->id) {
                            $totalBidAmount += $bid['amount'];
                        }
                    }
                @endphp


                <div class="card">
                 <div class="swiper-container"style="overflow: hidden; height:55%" >
        <div class="swiper-wrapper" >
            @foreach ($images as $image)
                @if ($image->vehicle_id == $vehicle->id)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->filename) }}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
        
    </div>
                    <div class="card-content">
                        <p class="name">{{ $vehicle->make }} {{ $vehicle->model }} {{ $vehicle->year }}</p>
                        <p class="lotnumber"> Lot # <span class="lotnumber">{{ $vehicle->id }}</span></p>
                        <p class="price">Current Bid: <span
                                class="price">${{ $vehicle->current_bid + $totalBidAmount }}</span></p>
                    
            <p class="location">Location: Al Hara Area</p>
            <div style="display: flex; justify-content:space-between">
                <div style="margin-top: 15px">
                    <a style="text-decoration: none" class="btn-detail"href="subcategery/{{ $vehicle->id }}">View
                        Detail</a>
                </div>
                <div>
                   
                   
                    <form action="{{ route('watch') }}" method="post">
                        @csrf
                        <input type="text" name="vehicle_id" value="{{ $vehicle->id }}" hidden>
                        {{-- <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden> --}}

                        <button type="submit" class="btn-watch">WishList</button>
                    </form> 
                    
                   
                </div>
            </div>

            </div>
            </div>
        @endforeach




    </section>
    <!--////////////////////////////////////////////////start section-three///////////////////////////////  -->

    <section class="section-three">
        <div class="name-section-three">
            <p>Membership Options </p>
            <p>As a Auction Electric Vehicles Member, you'll be able to search our massive
                inventory for wholesale, used and repairable
                cars,and SUVs. Unlock additional features by upgrading to a Basic or Premier Membership—you'll be able to
                jump right
                into the auction and start bidding in our live auctions!</p>
        </div>
        <div class="cards-membercard">

            <div class="membercard">
                <p>Guest</p>
                <p>Free</p>
                <div>
                    <p>For those who plan to look at
                        auctions,but don't want to bid.</p>
                </div>
                <li>View an auction</li>
                <li>Add vehicles to your Watchlist</li>
                <li>Create vehicle alerts</li>


            </div>

            <div class="membercard">
                <p>Basic</p>
                <p>$75 JD</p>
                <div>
                    <p>For those who plan to buy only a
                        few vehicles per year.</p>
                </div>
                <li>View multiple online auctions</li>
                <li>Bid up to $2000JD without
                    making a deposit</li>
                <li>Bid on up to five vehicles at a time with
                    a deposit</li>
                <li>Save youli favorite searches</li>


            </div>

            <div class="membercard">
                <p>Premier</p>
                <p>$250 JD</p>
                <div>
                    <p>For those who plan to buy
                        multiple vehicles on a regular basis.</p>
                </div>
                <li>Every Included in Basic</li>
                <li>Bid on multiple vehicles at the
                    same time up to $100k JD Daily</li>
                <li>Get priority in-location assistance</li>
                <li>Receive priority customer service</li>
                <li>Receive phone support</li>

            </div>


        </div>
        <div class="btn-section-three"><a href="{{route('register')}}"> <button>REGISTER NOW</button></a></div>
    </section>


    <!--////////////////////////////////////////////////End section-three///////////////////////////////  -->

    <script src="{{ url('/javascript/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'You Won',
            text: '{{ session('success') }}',
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

@endsection
</body>

</html>
