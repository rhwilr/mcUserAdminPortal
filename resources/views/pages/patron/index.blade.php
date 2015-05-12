@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Become a Patron</h1>

                <div class="alert alert-warning">
                    <strong>Attention!</strong> All Information on this site is temporary and will change before the public release of the server..
                </div>

            </div>



            <div class="col-md-12">
                <p><b>{{ Config::get('app.appname') }}</b> is supported by the fans like yourself.
                We want to build a server that we would be proud to play on.
                If you enjoy playing on here and are interested in supporting the server, becoming a Patron.</p>

                <p>All the money that we get from Patron and VIP goes straight to maintaining and improving the server!</p>
            </div>
            <div class="col-md-12">
                <p><b>With a Patron Membership you get some nice extras:</b></p>
                <ul>
                    <li>The ability to use Chunk-Loaders</li>
                    <li>The ability to use Mystcraft</li>
                    <li>A Patron Badge in the chat.</li>
                </ul>
            </div>
        </div>
        <p></p>

        @if(\Auth::user()->patron_active)
            <div class="row">
                <div class="col-lg-2">
                    <img src="/images/diamond.png">
                </div>
                <div class="col-lg-10">
                    <h1>You are a Patron. Thank You!</h1>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td width="160"><b>Current membership:</b></td>
                            <td>{{\Auth::user()->patron_plan}}</td>
                        </tr>
                        <tr>
                            <td><b>Ends:</b></td>
                            <td>{{ \Carbon\Carbon::parse(\Auth::user()->plan_ends_at)->toDayDateTimeString()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(\Auth::user()->minecraft_username == '')
            <div class="alert alert-info">
                <strong>Heads up!</strong> Before you can become a Patron you have to set your Minecraft-Username in your <a href="/profile#/minecraft" class="alert-link">Profile</a>.
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

                    <p>CHF 16.-</p>

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

                    <p>CHF 21.-</p>

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