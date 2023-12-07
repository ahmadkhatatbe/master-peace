@extends('admindashboard.layouts.adminnav')

@section('content')
    <!-- Main content -->
    <main>
        <!-- Content header -->
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Users</h1>
            <div>
                <a class="btn btn-primary" href="{{ route('adduser') }}">Add</a>
            </div>

        </div>

        <!-- Content -->
        <div class="mt-2">


            <!-- Charts -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-6">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">

                        <div class="flex items-center space-x-2 col-12">



                            <table class="table ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Show</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            
                                            {{-- <td><a class="btn btn-primary" href="{{ route('sellers') }}">Show</a> --}}
                                            </td>
                                            <td>

                                                <a class="btn btn-primary"
                                                    href="{{ route('user.edit', $user->id) }}">Update</a>
                                            <td>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
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

    </main>
@endsection
