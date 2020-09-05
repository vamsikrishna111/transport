

<!DOCTYPE html>
<html lang="en">


@include('head')
<body>

@include('nav')
<div class="container-fluid mt-3">
<form method="post" action="{{url('selectlorry')}}">
    {{csrf_field()}}
<div class="row">
    <div class="col-md-3">
    <div class="formgroup">
                              <input class="date form-control"  type="date" id="datepicker1" name="startdate">
                              @if ($errors->has('startdate'))
                    <span class="text-danger">{{ $errors->first('startdate') }}</span>
                @endif
                           </div>
    </div>
    <div class="col-md-3">
    <div class="formgroup">
                              <input class="date form-control"  type="date" id="datepicker2" name="enddate">
                              @if ($errors->has('enddate'))
                    <span class="text-danger">{{ $errors->first('enddate') }}</span>
                @endif
                           </div>
    </div>

    <div class="col-md-3">
    <div class="formgroup">
    <input type="text" class="form-control" name="vehiclenumber" placeholder="vehiclenumber">
    @if ($errors->has('vehiclenumber'))
                    <span class="text-danger">{{ $errors->first('vehiclenumber') }}</span>
                @endif
                           </div>
    </div>

    <div class="col-md-3">
    <div class="formgroup">
    <input type="submit" value="search" class="btn btn-primary"></button>

                           </div>
    </div>
    <form>
</div>





<div class="row ml-2 mt-3">

<table class="table table-striped">
   <tr>
      <td>s.no</td>
      <td>companyname</td>
      <td>name</td>
      <td>vehiclenumber</td>
      <td>startlocation</td>
      <td>endlocation</td>
      <td>tripcost</td>
     

      <!-- <td>dieselcost</td>
      <td>existingdiesel</td>
      <td>fillup</td>
      <td>totaldiesel</td> 
      <td>finalbill</td> -->
   </tr>


   <tr>
   @if(empty($users))
   <div class="alert alert-warning">
        <strong>Sorry!</strong> No Product Found.
    </div> 
     
@else

@foreach($users as $key=>$book)
<td>{{ $key + 1 }}</td>
                     <td>{{ $book->name}}</td>
                     <td>{{ $book->companyname }}</td>
                     <td>{{ $book->vehiclenumber}}</td>
                     <td>{{ $book->startlocation}}</td>
                     <td>{{ $book->endlocation}}</td>
                     <td>{{ $book->tripcost}}</td>



  
                  </tr>
                  @endforeach
                  @endif         
               </table>


            </div>
</div>

</body>

</html>
