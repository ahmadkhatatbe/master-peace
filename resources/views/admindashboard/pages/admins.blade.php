@extends('admindashboard.layouts.adminnav')

@section('content')

          <!-- Main content -->
          <main>
            <!-- Content header -->
            <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
              <h1 class="text-2xl font-semibold">Dashboard</h1>
              
            </div>

            <!-- Content -->
            <div class="mt-2">
             

              <!-- Charts -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                    <div class="flex items-center space-x-2">
                      






                      
                    </div>
                  </div>
                 
          </main>

         @endsection