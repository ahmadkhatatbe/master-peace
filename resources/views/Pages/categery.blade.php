<link rel="stylesheet" href="{{ url('/css/category.css') }}">

<link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css') }}" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="/css/categery.css">


@extends('layouts.master')
@section('title', 'category')


@section('content')


    

    <div>@foreach ($vehicles as $vehicle )
        <h1>Search Result for {{$vehicle->make}}  ({{ count($vehicles) }})</h1>
       @endforeach <div>

        </div>
    </div>
    <div class="btn-div">
        <button id="btn_filter" class="btn-show">Filter</button>

    </div>
    <div class="result-section">
        <div class="filter" id="filter">
            <button type="button" class="collapsible">Newly Added Vehicles</button>
            <div class="content">
                <form action="">
                    <input type="checkbox" name="day">
                    <label for="day">Last 24 Hours(154)</label><br>
                    <input type="checkbox" name="day">
                    <label for="day">Last 7 Day(154)</label>
                </form>
            </div>
            <button type="button" class="collapsible">Featured Items
            </button>
            <div class="content">
                <form action="">
                    <input type="checkbox" name="Used Vehicles ">
                    <label for="day">Used Vehicles (1517)</label><br>
                    <input type="checkbox" name="buy now">
                    <label for="day">Buy It Now </label>
                    <input type="checkbox" name="run drive">
                    <label for="day">Run and Drive </label>
                </form>
            </div>
            <button type="button" class="collapsible">Odometer
            </button>
            <div class="content">
                <form action="">
                    <div>
                        <label for="day">Min</label><br>
                        <input type="text" name="Used Vehicles ">
                    </div>
                    <label for="day">Max </label><br>
                    <input type="text" name="buy now">


                </form>
            </div>
            <button type="button" class="collapsible">Year
            </button>
            <div class="content">
                <form action="">
                    <div>
                        <label for="day">Min</label><br>
                        <input type="text" name="Used Vehicles ">

                        <p>To</p>
                        <label for="day">Max </label><br>
                        <input type="text" name="buy now">
                    </div>

                </form>
            </div>
            <button type="button" class="collapsible">Model
            </button>
            <div class="content">
                <form action="">
                    <input type="checkbox" name="Used Vehicles ">
                    <label for="day">Toyota</label><br>
                    <input type="checkbox" name="Toyota">
                    <label for="day">BMW </label><br>
                    <input type="checkbox" name="Ford">
                    <label for="day">Ford </label>

                </form>
            </div>
            <button type="button" class="collapsible">Vehicle Title Type
            </button>
            <div class="content">
                <form action="">
                    <input type="checkbox" name="cleantitle ">
                    <label for="day">Clean Title</label><br>
                    <input type="checkbox" name="salvage">
                    <label for="day">Salvage </label><br>


                </form>
            </div>
        </div>
        <div class="result">
            <table class="table table-striped">

                <tr style="  border-bottom: 1px solid #080707;">
                    <th><input type="checkbox" name="">image</th>
                    <th>#Lot</th>
                    <th>Make</th>
                    <th>Year</th>
                    <th>Model</th>
                    <th>odometer</th>
                    <th>Location</th>
                    <th>Damage</th>
                    <th>Current Bid</th>

                </tr>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td><img src="/images/81b67fd65746457a98dda0144d0daaab_thb.jpg" alt="" width="80px"
                                height="70px"></td>
                        <td>
                            <p>{{ $vehicle->id }}</p>
                            <p><a href="#" class="watch"><img src="" alt="">Watch</a></p>
                        </td>
                        <td>{{ $vehicle->make }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>IONIQ5 SE</td>
                        <td>{{ $vehicle->mileage }}</td>
                        <td>Hara Area</td>
                        <td>NORMAL WEAR</td>
                          @if (!empty($bids))
                                    @php
                                        $totalBidAmount = 0;
                                        foreach ($bids as $bid) {
                                            if ($bid['vehicle_id'] === $vehicle->id) {
                                                $totalBidAmount += $bid['amount'];
                                            }
                                        }
                                    @endphp
                                     
                                         <td>current bid:<br>${{ $vehicle->current_bid + $totalBidAmount }}JD <a href="pages/subcategery/{{$vehicle->id}}" class="link-content">Bid Now</a>

                                    
                                @else
                                   
 <td>current bid:<br>${{ $vehicle->current_bid }} JD <a href="pages/subcategery/{{$vehicle->id}}" class="link-content">Bid Now</a>
                                        
                                   
                                @endif

                       
                        </td>

                    </tr>
                @endforeach
                
            </table>
        </div>
    </div>


    <script src="{{ url('/javascript/category.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
@endsection
</body>

</html>
