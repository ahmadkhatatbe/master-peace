<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/header.css') }}">

    <title>@yield('title', 'home')</title>
</head>

<body>
    <header>
        <div class="left-side">
            <img src="{{ url('/images/mylogo1.png') }}" alt="" srcset="">





        </div>
        <div class="mid-side">
            <form action="{{ route('search') }}" method="get"> <input id="search" type="search" name="search"
                    placeholder="Search by Make,and Vin,and Other....">
                <button type="submit"id="btn-search-header">Search Inventory</button>
            </form>
        </div>


        <div class="right-side">



            @if (Auth::check())
                <div class="main-user">
                    <span class="userimg"><img src="{{ url('/images/user.png') }}" alt=""><img
                            src="{{ url('/images/caret-down.png') }}" alt="" srcset=""></span>
                    <div class="usermain">
                        <li class="user"><a href="{{ route('profile.edit') }}">Profile</a> </li>
                        <li class="user">
                            <form class="form" method="POST" action="{{ route('logout') }}">
                                @csrf

                                <input type="submit" value="LogOut">

                            </form>
                        </li>

                    </div>
                </div>
            @endif


            @if (!Auth::check())
                <button id="register"><a href="{{ route('register') }}">register</a></button>
                <button id="signin"><a href="{{ route('login') }}">signIn</a></button>
            @endif
            <div class="buger">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <img src="{{ url('/images/menu-burger.png') }}" alt="burgermenu">
                </label>
            </div>
        </div>
        <div id="responsive-ul"class="responsive">
            <div>

                <ul>
                    <li class="link-responsive"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="link-responsive"><a href="{{ route('about') }}"> About </a></li>
                    <li class="link-responsive" id="auction"><a href="{{ route('contact') }}"> Contact </a></li>
                    <li class="link-responsive"><a href=""> How It works </a></li>
                    <li class="link-responsive"><a href=""> Inventory </a></li>
                    <li class="link-responsive" id="auction"><a href=""> Auction </a></li>
                    <li class="link-responsive"><a href="{{ route('services') }}"> Services&Support </a></li>
                    <li class="link-responsive"id="sell-responsive"><a href=""> Sell Your Vehicles </a></li>
                    <li class="link-responsive"><a href="{{ route('register') }}">register</a></li>
                    <li class="link-responsive"><a href="{{ route('login') }}">signIn</a></li>
                </ul>


            </div>
        </div>
    </header>
    <div class="part-two">
        <ul class="links">
            <li class="link"><a href="{{ route('home') }}"> Home </a></li>
            <li class="link"><a href="{{ route('about') }}"> About </a></li>
            <li class="link" id="auction"><a href="{{ route('contact') }}"> Contact </a></li>
            <li class="link"><a href=""> How It works </a></li>
            <li class="link"><a href=""> Inventory </a></li>
            <li class="link" id="auction"><a href="{{ route('auction') }}"> Auction </a></li>
            <li class="link"><a href="{{ route('services') }}"> Services&Support </a></li>

        </ul>
        <div id="sell-main">
            <p id="sell"><span>Sell Your Car</span> <img src="{{ url('/images/caret-down.png') }}" alt=""
                    srcset=""></p>
            <div class="drop">
                @if (!Auth::check())



                    <li class="down"> <a href="login">For Individual</a></li>
                    <li class="down"><a href="login"> For Dealers </a></li>
                @else
                    @if (Auth::user()->role == 'seller')
                        <li class="down"> <a href="{{ route('seller.index') }}">For Individual</a></li>
                        <li class="down"><a href="{{ route('seller.index') }}"> For Dealers </a></li>
                    @else
                        <li class="down"> <a href="{{ route('registertow') }}">For Individual</a></li>
                        <li class="down"><a href="{{ route('registertow') }}"> For Dealers </a></li>
                    @endif
                @endif
            </div>
        </div>
        <div class="search-tablet">
            <input type="search" name="search" id="search-tablet"
                placeholder="Search by Make,and Vin,and Other....">
            <div>
                <button id="btn-search"><img src="{{ url('/images/search.png') }}" alt=""></button>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////end header/////////////////////////////////////// -->
