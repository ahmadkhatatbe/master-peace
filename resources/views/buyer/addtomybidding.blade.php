@extends('seller.sellernav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Vehicle You can to Join for bidding</h1>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->

                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">

                        <div class=" col-12 " style="height: 300px">



                            <table class="table  ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Make</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Current Bid</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Vehicles as $key => $vehicle)
                                        <tr>
                                            <th scope="row">{{ $vehicle->id }}</th>
                                            @if (isset($image_vehicles[$key]) && $image_vehicles[$key])
                                                <td> <img src="{{ asset($image_vehicles[$key]->filename) }}"
                                                        alt="Vehicle Image" width="100"></td>
                                            @else
                                                <td> No Image</td>
                                            @endif
                                            <td>{{ $vehicle->make }}</td>
                                            <td>{{ $vehicle->model }}</td>
                                            <td>{{ $vehicle->current_bid }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>






                        </div>
                    </div>

    </main>
@endsection
