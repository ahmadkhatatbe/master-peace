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
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6" style="margin-bottom:200px">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->

                    <div class="flex items-center justify-between p-4 border-b dark:border-primary" >

                        <div class=" col-12 " style="height: auto;">



                            <table class="table  ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">image</th>
                                        <th scope="col">Make</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Current Bid</th>
                                           <th scope="col">action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Vehicles as  $vehicle)
                                        <tr>
                                            <th scope="row">{{ $vehicle->id }}</th>
                                             
                                           
                                                <td> <img src="{{ asset($vehicle->images[0]->filename) }}"
                                                        alt="Vehicle Image" width="100"></td>
                                          
                                            
                                            <td>{{ $vehicle->make }}</td>
                                            <td>{{ $vehicle->model }}</td>
                                            <td>{{ $vehicle->current_bid }}</td>
                                              <td>
                                                <form action="{{route('join')}}" method="post">
                                            @csrf
                                            <input type="text" name='vehicle_id' value="{{$vehicle->id}}" hidden>
                                            <input type="text" name='user_id' value="{{Auth::user()->id}}" hidden>
                                            <input type="text" name='auction_id' value="{{$vehicle->auction_id}}" hidden>
                                            <input type="submit" class="btn btn-primary w-full m-1" value="Join">

                                            
                                                 </form>
                                        </td>

                                             
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>






                        </div>
                    </div>
    </main>
@endsection
