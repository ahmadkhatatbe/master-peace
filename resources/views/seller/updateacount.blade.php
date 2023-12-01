@extends('seller.sellernav')

@section('content')

                <!-- Main content -->
                <main>
                    <!-- Content header -->
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">Update To Seller</h1>
                        

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
                                        {{-- form for Add the Vehicles --}}




                                        <form action="{{ route('account_updated') }}" method="post"  class=" col-12 ">
                                            @csrf
                                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-4 m-1">
                                                    <label for="make">business name	</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="business_name	"
                                                        placeholder="business name">

                                                </div>

                                                <div class="form-group col-4 m-1">
                                                    <label for="model">contact address</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="contact_address"
                                                        placeholder="contact address">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="make">Phone	</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="contact_phone	"
                                                        placeholder="Phone">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="role"
                                                        value="seller"
                                                        placeholder="year On The License" hidden>

                                                </div>
                                                
                                            </div>
                                            
                                                
                                            
                                            <br>
                                            <button type="submit" class="btn btn-primary w-full m-1">Update Account</button>
                                        </form>





                                    </div>
                                </div>

                </main>

              @endsection