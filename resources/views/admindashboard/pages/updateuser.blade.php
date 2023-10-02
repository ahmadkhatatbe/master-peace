@extends('admindashboard.layouts.adminnav')

@section('content')

                <!-- Main content -->
                <main>
                    <!-- Content header -->
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">Update Users</h1>

                    </div>

                    <!-- Content -->
                    <div class="mt-2">


                        <!-- Charts -->
                        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-5">
                            <!-- Bar chart card -->
                            <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                                <!-- Card header -->
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Add Informtion</h4>
                                </div>
                                <div class=" p-4 border-b dark:border-primary">

                                    <div class=" col-12  ">
                                        {{-- form for update the users --}}






                                        <form action="{{ route('user.update', $users->id) }}" method="POST"
                                            class=" col-12 ">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="user_id" value="{{$users->id}}" hidden>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-6 m-1">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="name"
                                                        value="{{ $users->name }}" placeholder="Your Name">

                                                </div>

                                                <div class="form-group col-6 m-1">
                                                    <label for="email">email</label>
                                                    <input type="emmail" class="form-control"
                                                        id="exampleInputEmail1" name="email" placeholder="email"
                                                        value="{{ $users->email }}">

                                                </div>



                                            </div>

                                            <div class="form-group col-6 m-1">
                                                <label for="role">role</label>
                                                <select class="form-control" id="role" name="role"
                                                    value='{{ $users->role }}'>
                                                    <option value="buyer"> buyer</option>
                                                    <option value="seller">seller</option>


                                                </select>

                                            </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary w-full m-1">Update</button>
                                    </form>




                                </div>
                            </div>

                </main>

              @endsection