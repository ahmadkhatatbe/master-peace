@extends('admindashboard.layouts.adminnav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Add Auction</h1>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Add Informtion user
                        </h4>
                    </div>
                    <div class=" p-4 border-b dark:border-primary  col-12">

                        <div class=" col-12  ">
                            {{-- form for Add the Vehicles --}}


                            <form action="{{ route('auction.store') }}" method="post" class=" col-12 ">
                                @csrf
                                <div class="flex col-12 ">
                                    <div class="form-group col-6 m-1">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="title"
                                            placeholder="Auction Title">

                                    </div>

                                    <div class="form-group col-6 m-1">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="description"
                                            placeholder="description">

                                    </div>



                                </div>
                                <div class="flex col-12 ">

                                    <div class="form-group col-6 m-1">
                                        <label for="datetime-local">Start Auction</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="startdate"
                                            >

                                    </div>
                                     <div class="form-group col-6 m-1">
                                        <label for="datetime-local">End Auction</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="enddate"
                                         >

                                    </div>


                                    
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary w-full m-1">Add</button>
                            </form>





                        </div>
                    </div>

    </main>
@endsection
