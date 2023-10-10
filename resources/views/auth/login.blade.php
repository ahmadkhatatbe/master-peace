
    
   @extends('layouts.master')
@section('title','siginin')

@section('content') 
   <link rel="stylesheet" href="{{url('/css/signin.css')}}">

      <div class="label"><h2>LogIn</h2></div>  

   
    <div class="container">
       
        <div class="form">




                <form action="{{ route('login') }}" method="post">
                  @csrf
                  
                 <label for="email">Email : </label><br>
                 <input type="email" name="email" :value="old('email')" placeholder="example@exmaple.com" required><br>
                 <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red" />
                 <label for="password">Password :</label><br>
                 <input  type="password" name="password" placeholder="Enter your Password" required>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" style="color:red" />
                     {{-- <a href="">Forgot my password</a> --}}
               <br>
                 <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>  <br>
            @endif

                 <input type="submit" value="Sign In" class="btn-form"><br>
        </div>
                 <span>or</span><br>
                
 <button class="btn-gmail"> <img src="" alt="" srcset="">Continue with Gmail</button>
                <button class="btn-facbook"><img src="" alt="" srcset="">Continue with Facebook</button>
                </form>

        </div>
    </div>
    </div>
    


    <script src="{{url('/javascript/signin.js')}}"></script>
    @endsection
</body>
</html>