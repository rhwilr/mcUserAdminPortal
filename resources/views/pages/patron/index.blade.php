@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Become a Patron</h1>
            </div>

            <div class="col-md-12">
                <p><b>{{ Config::get('app.appname') }}</b> is supported by the fans like yourself.
                We want to build a server that we would be proud to play on.
                If you enjoy playing on here and are interested in supporting the server, becoming a Patron.</p>

                <p>All the money that we get from Patron and VIP goes straight to maintaining and improving the server!</p>
            </div>
            <div class="col-md-12">
                <ul>
                    <li>Access to the Patron only UHC Beta</li>
                    <li>The ability to join games that are full. (Up to 20 Patrons can join games that are already full!)</li>
                    <li>Colored username in the lobby for your player name and chat name!</li>
                    <li>Access to the Patron Chest once a day which grants you silver to buy vanity items to use in the lobby or the Mindcrack Island plot server!</li>
                    <li>Extra loot! When playing mini games, you will earn extra goodies in your loot bag every time! This extra loot could be silver and other fun items to play with in the lobby or plot server!</li>
                    <li>50% bonus experience! Leveling up grants you access to special quests, items and events on PlayMindcrack!</li>
                    <li>Bonus Silver! you get an aditional 50% silver added on to the gold you get each game!</li>
                </ul>
            </div>
        </div>

        @if( \Auth::user()->patron_active)
            <div class="row">
                <div class="col-lg-2">
                    <img src="/images/diamond.png">
                </div>
                <div class="col-lg-10">
                    <h1>You are a Patron. Thank you!</h1>
                    <p>Your {{\Auth::user()->patron_plan}} membership ends {{ \Carbon\Carbon::parse(\Auth::user()->plan_ends_at)->diffForHumans()}}.</p>
                </div>
            </div>
        @else

            <div class="row">
                <div class="col-lg-3 text-center">
                    <img src="/images/wrenchItem.png">
                    <h2>30 Days</h2>
                    <p>CHF 10.-</p>

                    {!! Form::open(['url' => route('payment'), 'class' => 'col-lg-8 col-lg-offset-2 ']) !!}
                        {!!Form::hidden('plan','30')!!}
                        <div class="form-group">
                                {!!Form::submit('Buy now',['class' => 'btn btn-primary'])!!}
                        </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-lg-3 text-center">
                    <img src="/images/diamondGearItem.png">
                    <h2>60 Days</h2>
                    <p>CHF 19.-</p>

                    {!! Form::open(['class' => 'col-lg-8 col-lg-offset-2 ']) !!}
                    {!!Form::hidden('plan','60')!!}
                    <div class="form-group">
                        {!!Form::submit('Buy now',['class' => 'btn btn-primary'])!!}
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-lg-3 text-center">
                    <img src="/images/reactorUraniumQuad.png">
                    <h2>90 Days</h2>
                    <p>CHF 27.-</p>

                    {!! Form::open(['class' => 'col-lg-8 col-lg-offset-2 ']) !!}
                    {!!Form::hidden('plan','90')!!}
                    <div class="form-group">
                        {!!Form::submit('Buy now',['class' => 'btn btn-primary'])!!}
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-lg-3 text-center">
                    <img src="/images/overclockerUpgrade.png">
                    <h2>VIP (90 Days)</h2>
                    <p>CHF 35.-</p>

                    {!! Form::open(['class' => 'col-lg-8 col-lg-offset-2 ']) !!}
                    {!!Form::hidden('plan','vip')!!}
                    <div class="form-group">
                        {!!Form::submit('Buy now',['class' => 'btn btn-primary'])!!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>

        @endif

    </div>
@endsection