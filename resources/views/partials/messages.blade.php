<div class="container">
    <div class="row">
        <div class="col-lg-12">

            @if(Session::has('error-flash'))
                <div class="alert alert-danger">
                    {{ Session::get('error-flash') }}
                </div>
            @endif
            @if(Session::has('success-flash'))
                <div class="alert alert-success">
                    {{ Session::get('success-flash') }}
                </div>
            @endif
        </div>
    </div>
</div>
