@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>About</h1>
            </div>

            <div class="col-md-12">
                <p><b>{{ Config::get('app.appname') }}</b> and all services running under this Domain are hosted and maintained by Ralph Huwiler.</p>

                <p></p>
            </div>

        </div>
    </div>
@endsection
