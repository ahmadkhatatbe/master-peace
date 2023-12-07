@extends('admindashboard.layouts.adminnav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Auction </h1>
            <div>
    <a class="btn btn-primary w-full m-1" href="{{route('addauction')}}"> Add Auction</a>
</div>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6" style="margin-bottom:200px">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary ">


<div class=" col-12">
                        <div class=" col-12 ">



                            <table class="table  ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">title</th>
                                        <th scope="col">description</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($auctions as $auction)
                                        <tr>
                                            <th scope="row">{{ $auction->id }}</th>

                                            <td>{{ $auction->title }}</td>
                                            <td>{{ $auction->description }}</td>
                                            <td>{{ $auction->start_datetime }}</td>
                                              <td>{{ $auction->end_datetime }}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('auction.edit', $auction->id) }}">Update</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('auction.destroy', $auction->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                </form>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>





</div>
                        </div>




                    </div>

    </main>
@endsection
