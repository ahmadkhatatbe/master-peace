@extends('seller.sellernav')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">My Vehicles</h1>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6" style="margin-bottom:200px">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }" >
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
                                                <button><a class="btn btn-primary w-full m-1" href="{{route('subcategery',$vehicle->id)}}">View</a></button>
                                        </td>

                                             
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>






                        </div>
                    </div>

    </main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

        <script>
            // Use SweetAlert2 to display the alert from the right
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: '{{ session('success') }}',
                position: 'center', // Display from the top right
                showConfirmButton: true, // Hide the confirmation button
                // timer: 3000 // Automatically close after 3 seconds
            });
        </script>
@endsection
