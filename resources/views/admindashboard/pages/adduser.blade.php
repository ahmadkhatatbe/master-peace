@extends('admindashboard.layouts.adminnav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Add Users</h1>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-5">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Add Informtion user
                        </h4>
                    </div>
                    <div class=" p-4 border-b dark:border-primary">

                        <div class=" col-12  ">
                            {{-- form for Add the Vehicles --}}




                            <form action="{{ route('user.store') }}" method="post" class=" col-12 ">
                                @csrf
                                <div class="flex col-12 ">
                                    <div class="form-group col-6 m-1">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                            placeholder="Your Name">

                                    </div>

                                    <div class="form-group col-6 m-1">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="email"
                                            placeholder="email">

                                    </div>



                                </div>
                                <div class="flex col-12 ">

                                    <div class="form-group col-6 m-1">
                                        <label for="password">password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                                            placeholder="year On The License">

                                    </div>


                                    <div class="form-group col-6 m-1">
                                        <label for="Primary Damage">role</label>
                                        <select class="form-control" id="Primary Damage" name="role">
                                            <option value="buyer"> buyer</option>
                                            <option value="seller">seller</option>


                                        </select>

                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary w-full m-1">Add</button>
                            </form>





                        </div>
                    </div>

    </main>
@endsection
