<!DOCTYPE html>
<head>
  <title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container mt-5">
<div class="col-md-4">
<form method="POST" action="{{url('dashboard')}}">
 {{csrf_field()}}

  <div class="formgroup">
   <select class="form-control" id="sel1" name="companyname">
       <option value="" selected disabled>Company</option>
       @if (is_array($users))
     
       @foreach ($users as $key=>$book)
     
       value="{{old('email')}}"
       <option value="{{$book->companyname}}">{{$book->companyname}}</option>
       @endforeach 
       @endif

         
        
       </select>  </div>
       <button class="btn btn-danger">continue</button>

       </form>
       </div></div>
     </body>
     </html>