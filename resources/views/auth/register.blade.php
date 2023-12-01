@extends('layouts.master')

<link rel="stylesheet" href="{{ url('/css/register.css') }}">
@section('content')
    <!--/////////////////// section-one//////////////////// -->

    <div class="label">
        <p>Registration</p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="members"> 
            <div>
            <p class="member-label">do you plan to bid as : </p>

            <div class="choices">
              <div class="subchoices">
                <div class="member" id="memberone">
                    <div class="memberradio"> <input type="radio" name="typeofbusiness" id="business" value="Business">
                    </div>
                    <img src="/images/business1.png" alt="" srcset="">
                    <p><span>Business</span>Holds business licenses(s)</p>
                </div>
                <div class="member" id="membertow">
                    <div class="memberradio"> <input type="radio" id="individual" name="typeofindividual"
                            value="Individual"></div>
                    <img src="/images/user1.png" alt="" srcset="">
                    <p><span>Individual</span>No business licenses(s)</p>
                </div>
            </div>

            </div> 
        </div>
        </div>


        <div class="form">
            <div class="form-main">
                <label for="">Legal Full Name :<br><small>Please enter your name exactly as it is listed on your
                        photo
                        ID and as it should appear on vehicle titles.</small><br>
                </label>
                <div id="business_name">

                </div>
                <label for="name">name:</label><br>
                <input id="name" class="names" type="text" name="name" :value="old('name')"
                    placeholder=" Full Name">
                    <input id="name" class="names" type="text" name="role" value="guest"
                    placeholder="role" hidden>
                <label for="email">email:</label><br>
                <input id="email" type="email" name="email" :value="old('email')" class="email"
                    placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <label for="password">password:</label><br>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="password"
                    placeholder="password"><br>
                <label for="password_confirmation">password confirmation:</label><br>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <input type="password" name="password_confirmation" class="password_confirmation"
                    placeholder="password confirmation "><br>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <input type="text" name="type_account" id="member_type" hidden>
                {{-- <input type="checkbox" name="agree"><small> By clicking this box, I agree that I am at least 18 years of age
                and that I have read and agreed to <bold>the Auction Electric
                    Vehicles Member Terms and Conditions,Website Terms of Service, and</bold> Privacy Policy.</small><br>
                    <a href="{{route('login')}}">Already registered</a> --}}
                <div id="create">
                    <input type="submit" value="Creat Auction Electric Vehicles" class="create">






                </div>

            </div>
        </div>

    </form>
    </div>






    <script src="{{ url('/javascript/register.js') }}"></script>
@endsection
</body>

</html>
