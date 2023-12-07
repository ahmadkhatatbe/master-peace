@extends('seller.sellernav')

@section('content')
                <!-- Main content -->
                <main>
                    <!-- Content header -->
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">Update Own Vehicles</h1>

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




                                        <form action="{{ route('seller.update', $vehicles->id) }}"  method="post"
                                            class=" col-12 ">

                                            @csrf
                                         @method('PUT')
                                         <input type="text" name="user_id" value="{{$vehicles->user_id}}" hidden>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-4 m-1">
                                                    <label for="make">Make</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="make"
                                                        value="{{ $vehicles->make }}"
                                                        placeholder="Make On The License">

                                                </div>

                                                <div class="form-group col-4 m-1">
                                                    <label for="model">Model</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="model"
                                                        value="{{ $vehicles->model }}"
                                                        placeholder="Model On The License">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="year">Year</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" name="year"
                                                        value="{{ $vehicles->year }}"
                                                        placeholder="year On The License">

                                                </div>
                                            </div>
                                            <div class="form-group col-12 m-1">
                                                <label for="vin">Vin</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    value="{{ $vehicles->vin }}" name="vin" placeholder="Vin">

                                            </div>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-4 m-1">
                                                    <label for="mileage">Mileage</label>
                                                    <input type="number" class="form-control"
                                                        value="{{ $vehicles->mileage }}" id="exampleInputEmail1"
                                                        name="mileage" placeholder="Mileage">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="titlecode">Title Code</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="title_code"
                                                        value="{{ $vehicles->title_code }}" placeholder="Title Code">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="color">Color</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="color"
                                                        value="{{ $vehicles->color }}"
                                                        placeholder="Color On the License">

                                                </div>
                                            </div>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-4 m-1">
                                                    <label for="Primary Damage">Primary Damage</label>
                                                    <select class="form-control" id="Primary Damage"
                                                        value="{{ $vehicles->primary_damage }}"
                                                        name="primary_damage">
                                                        <option value="NORMAL WEAR">Normal Wear</option>
                                                        <option value="FRONT">Front</option>
                                                        <option value="BACK">Back</option>
                                                        <option value="RIGHT SIDE">right-side</option>
                                                        <option value="LEFT SIDE">left-side</option>

                                                    </select>

                                                </div>
                                           
                                                <div class="form-group col-6 m-1">
                                                    <label for="secondarydamage">Secondary Damage</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" name="secondary_damage"
                                                        value="{{ $vehicles->secondary_damage }}"
                                                        placeholder=" Secondary Damage">

                                                </div> 
                                            </div>

                                            </div>
                                            <div class="flex col-12 ">
                                                <div class="form-group col-4 m-1">
                                                    <label for="current_bid">Retail Value</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" name="retail_value"
                                                        value="{{ $vehicles->retail_value }}"
                                                        placeholder="Retail Value">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="current_bid">Current Bid</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" name="current_bid"
                                                        value="{{ $vehicles->current_bid }}"
                                                        placeholder="Current Bid">

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="buynow">Buy Now Price</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" name="buy_now_price"
                                                        value="{{ $vehicles->buy_now_price }}"
                                                        placeholder="Buy Now Price">

                                                </div>
                                                
                                            </div>
                                            <div class="flex col-12 ">
                                          <div class="form-group col-4 m-1">
                                                    <label for="Primary Damage">Auction</label>
                                                    <select class="form-control" id="Primary Damage"
                                                        
                                                        name="auction_id">
                                                        @foreach ( $auctions as $auction )
                                                            <option value="{{$auction->id}}">{{$auction->title}}</option>
                                                        @endforeach
                                                        
                                                        

                                                    </select>

                                                </div>
                                                <div class="form-group col-4 m-1">
                                                    <label for="buynow">Target</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" name="target"
                                                        value="{{ $vehicles->target }}"
                                                        placeholder="Buy Now Price">

                                                </div>
                                                 
                                            </div>


                                            <br>
                                            <button type="submit" class="btn btn-primary w-full m-1">Update</button>
                                        </form>





                                    </div>
                                </div>

                </main>
@endsection