

<!DOCTYPE html>
<html lang="en">


@include('head')
<body>

@include('nav')
@yield('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center bg-success">lorries</div>
                <div class="card-body text-center bg-danger">
             <h4>   @foreach(Session::get('lcount') as $data)
{{$data->lcount}}@endforeach</h4>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
