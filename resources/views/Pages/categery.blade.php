@extends('layouts.master')
<link rel="stylesheet" href="{{ url('/css/category.css') }}">

<link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css') }}" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="/css/categery.css">
@section('title', 'category')


@section('content')





    <div>

        <h3>Filter</h3>

        <div>

        </div>
    </div>
    <div>
        <form method="GET" action="{{ route('categery') }}">
            @csrf
            <div class="form-group"style="display: flex;justify-content:space-around">
                <div class="form-group">
                    <label for="odometer">Odometer Range:</label>
                    <input type="range" name="odometer" id="odometer" min="0" max="1000000" step="100"
                        value="{{ request('odometer') }}">
                    <span id="odometerValue">{{ request('odometer') }} miles</span>
                </div>
                <div class="form-group">
                    <label for="make">Make:</label>
                    <select name="make" id="make">
                        <option value="">Any</option>
                        <option value="toyota" {{ request('make') === 'toyota' ? 'selected' : '' }}>toyota</option>
                        <option value="tesla" {{ request('make') === 'tesla' ? 'selected' : '' }}>tesla</option>
                        <option value="golf" {{ request('make') === 'golf' ? 'selected' : '' }}>golf</option>
                        <option value="ford" {{ request('make') === 'ford' ? 'selected' : '' }}>ford</option>
                        <option value="kia" {{ request('make') === 'kia' ? 'selected' : '' }}>kia</option>
                        <option value="hyundai" {{ request('make') === 'hyundai' ? 'selected' : '' }}>hyundai</option>
                        <!-- Add more make options here -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <select name="year" id="model">
                        <option value="">Any</option>
                        <option value="2018" {{ request('year') === '2018' ? 'selected' : '' }}>2018</option>
                        <option value="2019" {{ request('year') === '2019' ? 'selected' : '' }}>2019</option>
                        <option value="2020" {{ request('year') === '2020' ? 'selected' : '' }}>2020</option>
                        <option value="2021" {{ request('year') === '2021' ? 'selected' : '' }}>2021</option>

                        <!-- Add more model options here -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <select name="color" id="color">
                        <option value="">Any</option>
                        <option value="red" {{ request('color') === 'red' ? 'selected' : '' }}>Red</option>
                        <option value="white" {{ request('color') === 'white' ? 'selected' : '' }}>white</option>
                        <option value="black" {{ request('color') === 'black' ? 'selected' : '' }}>black</option>
                        <option value="blue" {{ request('color') === 'blue' ? 'selected' : '' }}>blue</option>
                        <!-- Add more color options here -->
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>

    <div class="result">
        <table class="table table-striped">

            <tr style="  border-bottom: 1px solid #080707;">
               
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
                  
                        
                  
                    <td>
                        <p>{{ $vehicle->id }}</p>
                        <p> <a
                                href="{{ route('subcategery', $vehicle->id) }}" class="link-content">View Details</a></p>
                    </td>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->mileage }}</td>
                    <td>Hara Area</td>
                    <td>{{ $vehicle->primary_damage }}</td>
                    @if (!empty($bids))
                        @php
                            $totalBidAmount = 0;
                            foreach ($bids as $bid) {
                                if ($bid['vehicle_id'] === $vehicle->id) {
                                    $totalBidAmount += $bid['amount'];
                                }
                            }
                        @endphp

                        <td>current bid:<br>${{ $vehicle->current_bid + $totalBidAmount }}JD <a
                                href="{{ route('subcategery', $vehicle->id) }}" class="link-content">Bid Now</a>
                        @else
                        <td>current bid:<br>${{ $vehicle->current_bid }} JD <a
                                href="{{ route('subcategery', $vehicle->id) }}" class="link-content">Bid Now</a>
                    @endif


                    </td>

                </tr>
            @endforeach

        </table>
    </div>
    </div>

    {{-- <div class="d-flex justify-content-center">
            {{ $vehicles->onEachSide(1)->links('pagination::bootstrap-4', ['show_prev_next' => true]) }}
        </div> --}}


    <script src="{{ url('/javascript/category.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>



    <script>
        // JavaScript code to update the odometer range value as the user interacts with the input
        const odometerInput = document.getElementById('odometer');
        const odometerValue = document.getElementById('odometerValue');

        odometerInput.addEventListener('input', () => {
            odometerValue.textContent = odometerInput.value + ' miles';
        });
    </script>
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




    </body>

    </html>
@endsection
