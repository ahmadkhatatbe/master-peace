@extends('admindashboard.layouts.adminnav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Winners In Auction</h1>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3" style="margin-bottom:200px">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                        <div class="flex items-center space-x-2 col-12">



                            <table class="table  ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">winner</th>

                                    </tr>
                                </thead>
                                <tbody>

                              
                                    
                                
                                    @foreach ($users as $user)
                                   
                                       
                                               
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{$user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->winner }}</td>
                                                        


                                                    </tr>
                                                   
                                        
                                                
                                                 

                                            
                                        
                                    @endforeach
                                   
                                </tbody>
                            </table>






                        </div>
                    </div>

    </main>
@endsection
