 @extends('frontend_theme.frontend_layout') 
 @push('styles')



@endpush

@section('content')
    <div class="container">
        <div class="row">
       

            <div class="col-md-8 col-md-offset-2">
                <div class="card">
              <div class="alert alert-info"><h2 class="text-center text-success"> Create Address</h2></div>
                    <div class="card-body">
                        <a href="{{ url('address') }}" title="Back"><button class="btn btn-danger btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

             

                        <form method="POST" action="{{ url('address') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('frontend.address.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
