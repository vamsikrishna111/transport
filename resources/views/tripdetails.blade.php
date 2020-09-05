<!DOCTYPE html>
<html lang="en">
@include('head')

<body>
   @include('nav')
   @section('content')

   <div class="container-fluid mt-3">
      <div class="col-md-12">
         <div class="wrapper">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="row">
               <div class="col-md-4">
                  <h4 class="mt-2">LORRY DETAILS</h4>
               </div>
               <div class="col-md-5">
               </div>
               <div class="col-md-3 mt-2">
                  <!-- <button class="btn btn-danger">submit</button> -->
               </div>
            </div>
            <div class="row">
               <form method="post" action="{{url('insertlorrydetails')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="col-md-12 mt-5">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="vehiclenumber" placeholder="vehiclenumber">
                              @if ($errors->has('vehiclenumber'))
                              <span class="text-danger">{{ $errors->first('vehiclenumber') }}</span>
                              @endif
                           </div>

                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="startlocation" placeholder="start location">
                              @if ($errors->has('startlocation'))
                              <span class="text-danger">{{ $errors->first('startlocation') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="endlocation" placeholder="end location">
                              @if ($errors->has('endlocation'))
                              <span class="text-danger">{{ $errors->first('endlocation') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="tripcost" placeholder="tripcost ">
                              @if ($errors->has('tripcost'))
                              <span class="text-danger">{{ $errors->first('tripcost') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="advance" placeholder="advance">

                              @if ($errors->has('advance'))
                              <span class="text-danger">{{ $errors->first('advance') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="totalkm" placeholder="total km">
                              @if ($errors->has('totalkm'))
                              <span class="text-danger">{{ $errors->first('totalkm') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="dieselcost" placeholder="diesel cost ">
                              @if ($errors->has('dieselcost'))
                              <span class="text-danger">{{ $errors->first('dieselcost') }}</span>
                              @endif

                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="existingdiesel" placeholder="existing diesel">
                              @if ($errors->has('existingdiesel'))
                              <span class="text-danger">{{ $errors->first('existingdiesel') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="fillup" placeholder="fillup">
                              @if ($errors->has('fillup'))
                              <span class="text-danger">{{ $errors->first('fillup') }}</span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="text" class="form-control" name="totaldiesel" placeholder="totaldiesel">
                              @if ($errors->has('totaldiesel'))
                              <span class="text-danger">{{ $errors->first('totaldiesel') }}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">

                              <input type="file" class="form-control" name="filename">
                              @if ($errors->has('filename'))
                              <span class="text-danger">{{ $errors->first('filename') }}</span>
                              @endif
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="formgroup">
                              <!-- <input type="date" class="form-control" id="birthday" name="birthday"> -->
                              <input class="date form-control" type="date" id="datepicker1" name="startdate">

                           </div>
                        </div>


                     </div>

                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">
                              <!-- <input type="date" class="form-control" id="birthday" name="birthday"> -->
                              <input class="date form-control" type="date" id="datepicker2" name="enddate">

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class='pull-right' style="float:right">
                     <button class="btn btn-default">cancel</button>
                     <button class="btn btn-primary ml-3 mt-3 mb-4">submit</button>

                  </div>



               </form>
            </div>
            <div class="row">

               <table class="table table-striped">
                  <tr>
                     <td>s.no</td>
                     <td>companyname</td>
                     <td>name</td>
                     <td>vehiclenumber</td>
                     <td>startlocation</td>
                     <td>endlocation</td>
                     <td>tripcost</td>
                     <td>action</td>

                     <!-- <td>dieselcost</td>
                     <td>existingdiesel</td>
                     <td>fillup</td>
                     <td>totaldiesel</td> 
                     <td>finalbill</td> -->
                  </tr>
                  @foreach ($users as $key=>$book)


                  <tr>
                     <td>{{ $key + 1 }}</td>
                     <td>{{ $book->name}}</td>
                     <td>{{ $book->companyname }}</td>
                     <td>{{ $book->vehiclenumber}}</td>
                     <td>{{ $book->startlocation}}</td>
                     <td>{{ $book->endlocation}}</td>
                     <td>{{ $book->tripcost}}</td>

                     <td>
                        <button class="show-modal btn btn-info" data-id="{{$book->id}}" data-vehiclenumber="{{ $book->vehiclenumber}}" data-startlocation="{{$book->startlocation}}" data-endlocation="{{$book->endlocation}}" data-tripcost="{{$book->tripcost}}" data-advance="{{$book->advance}}" data-totalkm="{{$book->totalkm}}" data-dieselcost="{{$book->dieselcost}}" data-existingdiesel="{{$book->existingdiesel}}" data-fillup="{{$book->fillup}}" data-totaldiesel="{{$book->totaldiesel}}" data-finalbill="{{asset ('/images/'.$book->finalbill) }}">
                           <span class="glyphicon glyphicon-edit"></span> show</button>

                        <button class="edit-modal btn btn-info" data-id="{{$book->id}}" data-vehiclenumber="{{ $book->vehiclenumber}}" data-startlocation="{{$book->startlocation}}" data-endlocation="{{$book->endlocation}}" data-tripcost="{{$book->tripcost}}" data-advance="{{$book->advance}}" data-totalkm="{{$book->totalkm}}" data-dieselcost="{{$book->dieselcost}}" data-existingdiesel="{{$book->existingdiesel}}" data-fillup="{{$book->fillup}}" data-totaldiesel="{{$book->totaldiesel}}" data-finalbill="{{asset ('/images/'.$book->finalbill) }}">
                           <span class="glyphicon glyphicon-edit"></span> Edit</button>


                        <a href="delete/{{$book->id}}"><i class="fa fa-trash" style="font-size:24px"></i></a>
                        <!-- <a href="download/{{$book->finalbill}}"><i class="fa fa-download" aria-hidden="true"></i></a></td> -->
                     <!-- <td>
    <img src="{{asset ('/images/'.$book->finalbill) }}" style="height:40px; width:30px"/>
               
                </td> -->

                  </tr>
                  @endforeach
               </table>


            </div>


         </div>
      </div>
   </div>

   <!-----------------------input fileds------------------------------------------>
   <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h2 class="text-danger">edit Lorry Details</h2>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" id=edit_form role="form">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_edit" disabled hidden>
                     </div>
                  </div>
                  <!-------------------first row ------------------------------------------>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">vehiclenumber:</label>

                           <input type="text" class="form-control" name="vehiclenumber" placeholder="Vehiclenumber" id="vehiclenumber_edit" autofocus>
                           <p class="errorvehiclenumber text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">startlocation:</label>

                           <input type="text" class="form-control" name="startlocation" placeholder="StartLocation" id="startlocation_edit" autofocus>
                           <p class="errorstartlocation text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>
                  <!--------------------------second row ------------------------------------->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">endlocation:</label>

                           <input type="text" class="form-control" name="endlocation" placeholder="EndLocation" id="endlocation_edit" autofocus>
                           <p class="errorendlocation text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">tripcost:</label>

                           <input type="text" class="form-control" name="tripcost" placeholder="TripCost" id="tripcost_edit" autofocus>
                           <p class="errortripcost text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>


                  <!--------------------------  third row----------------------------------------->


                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">Advance:</label>

                           <input type="text" class="form-control" name="advance" placeholder="Advance" id="advance_edit" autofocus>
                           <p class="erroradvance text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">Totalkm:</label>

                           <input type="text" class="form-control" name="totalkm" placeholder="Totalkm" id="totalkm_edit" autofocus>
                           <p class="errortotalkm text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>


                  <!------------------------------fourth row ------------------------------------------>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">DieslCost:</label>

                           <input type="text" class="form-control" name="dieselcost" placeholder="DieslCost" id="dieselcost_edit" autofocus>
                           <p class="errordieselcost text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">ExistingDiesel:</label>

                           <input type="text" class="form-control" name="existingdiesel" placeholder="ExistingDiesel" id="existingdiesel_edit" autofocus>
                           <p class="errorexistingdiesel text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>

                  <!----------------------firth row----------------------------------------------->

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">FillUp:</label>

                           <input type="text" class="form-control" name="fillup" placeholder="FillUp" id="fillup_edit" autofocus>
                           <p class="errorfillup text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">totaldiesel:</label>

                           <input type="text" class="form-control" name="totaldiesel" placeholder="Total Diesel" id="totaldiesel_edit" autofocus>
                           <p class="errortotaldiesel text-center bg-light text-danger hidden mt-3"></p>


                        </div>
                     </div>
                  </div>



                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">Finalbill:</label>

                           <input type="file" class="form-control" name="finalbill" id="finalbill_edit" autofocus>
                           <p class="errorfinalbill text-center bg-light text-danger hidden"></p>
                           <div>

                              <iframe id="myImage" src="#" style="height:70px; width:70px"></iframe>
                           </div>
                        </div>
                     </div>
                  </div>












               </form>
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                     <span class='glyphicon glyphicon-check'></span> Edit
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                     <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>









   <!-----------------------------start show ------------------------------------------------->
   <div id="showModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h2 class="text-danger">Show Lorry Details</h2>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" id=show_form role="form">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_show" disabled hidden>
                     </div>
                  </div>
                  <!-------------------first row ------------------------------------------>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">vehiclenumber:</label>

                           <input type="text" class="form-control" name="vehiclenumber" placeholder="Vehiclenumber" id="vehiclenumber_show" autofocus>
                           <p class="errorvehiclenumber text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">startlocation:</label>

                           <input type="text" class="form-control" name="startlocation" placeholder="StartLocation" id="startlocation_show" autofocus>
                           <p class="errorstartlocation text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>
                  <!--------------------------second row ------------------------------------->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">endlocation:</label>

                           <input type="text" class="form-control" name="endlocation" placeholder="EndLocation" id="endlocation_show" autofocus>
                           <p class="errorendlocation text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">tripcost:</label>

                           <input type="text" class="form-control" name="tripcost" placeholder="TripCost" id="tripcost_show" autofocus>
                           <p class="errortripcost text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>


                  <!--------------------------  third row----------------------------------------->


                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">Advance:</label>

                           <input type="text" class="form-control" name="advance" placeholder="Advance" id="advance_show" autofocus>
                           <p class="erroradvance text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">Totalkm:</label>

                           <input type="text" class="form-control" name="totalkm" placeholder="Totalkm" id="totalkm_show" autofocus>
                           <p class="errortotalkm text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>


                  <!------------------------------fourth row ------------------------------------------>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">DieslCost:</label>

                           <input type="text" class="form-control" name="dieselcost" placeholder="DieslCost" id="dieselcost_show" autofocus>
                           <p class="errordieselcost text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">ExistingDiesel:</label>

                           <input type="text" class="form-control" name="existingdiesel" placeholder="ExistingDiesel" id="existingdiesel_show" autofocus>
                           <p class="errorexistingdiesel text-center bg-light text-danger hidden mt-3"></p>

                        </div>
                     </div>
                  </div>

                  <!----------------------firth row----------------------------------------------->

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">FillUp:</label>

                           <input type="text" class="form-control" name="fillup" placeholder="FillUp" id="fillup_show" autofocus>
                           <p class="errorfillup text-center bg-light text-danger hidden"></p>

                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="vehiclenumber">totaldiesel:</label>

                           <input type="text" class="form-control" name="totaldiesel" placeholder="Total Diesel" id="totaldiesel_show" autofocus>
                           <p class="errortotaldiesel text-center bg-light text-danger hidden mt-3"></p>


                        </div>
                     </div>
                  </div>



                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">

                           <label class="control-label col-sm-2" for="vehiclenumber">Finalbill:</label>

                            <p class="errorfinalbill text-center bg-light text-danger hidden"></p>
                           <div>

                              <iframe id="file" src="#" style="height:250px; width:250px"></iframe>
                              <a href="#" id="download" name="download"><i class="fa fa-download" style="font-size:24px;" aria-hidden="true"></i></a>download</td>

                           </div>
                        </div>
                     </div>
                  </div>












               </form>
               <div class="modal-footer">
               
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                     <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>





   <!---------------------------------------end show ----------------------------------------------->
   <script type="text/javascript">
      $('#datepicker').datepicker({
         autoclose: true,
         format: 'yyyy-mm-dd'
      });
   </script>
   <script type="text/javascript">
      $(document).on('click', '.edit-modal', function() {
         $('.modal-title').text('Edit');
         $('#id_edit').val($(this).data('id'));
         $('#vehiclenumber_edit').val($(this).data('vehiclenumber'));
         $('#startlocation_edit').val($(this).data('startlocation'));
         $('#endlocation_edit').val($(this).data('endlocation'));
         $('#tripcost_edit').val($(this).data('tripcost'));
         $('#advance_edit').val($(this).data('advance'));
         $('#totalkm_edit').val($(this).data('totalkm'));
         $('#dieselcost_edit').val($(this).data('dieselcost'));
         $('#existingdiesel_edit').val($(this).data('existingdiesel'));
         $('#fillup_edit').val($(this).data('fillup'));
         $('#totaldiesel_edit').val($(this).data('totaldiesel'));
         $('#myImage').val($(this).data('finalbill'));
         var imgvalue = $('#myImage').val();
             // alert(imgvalue)
         $('#myImage').attr('src', imgvalue);
     
         id = $('#id_edit').val();

         $('#editModal').modal('show');
      });
      $('.modal-footer').on('click', '.edit', function() {
         // $.ajax({
         //    type: 'POST',
         //    url: 'lorrydetailsedit/' + id,
         //    data: {
         //       '_token': $('input[name=_token]').val(),
         //       'id': $("#id_edit").val(),
         //       'vehiclenumber': $('#vehiclenumber_edit').val(),
         //       'startlocation': $('#startlocation_edit').val(),
         //       'endlocation': $('#endlocation_edit').val(),
         //       'tripcost': $('#tripcost_edit').val(),
         //       'advance': $('#advance_edit').val(),
         //       'totalkm': $('#totalkm_edit').val(),
         //       'dieselcost': $('#dieselcost_edit').val(),
         //       'existingdiesel': $('#existingdiesel_edit').val(),
         //       'fillup': $('#fillup_edit').val(),
         //       'totaldiesel': $('#totaldiesel_edit').val(),

         //    },
         $.ajax({

            url: 'lorrydetailsedit/' + id,
            data: new FormData($("#edit_form")[0]),


            dataType: 'json',
            async: false,
            type: 'post',
            processData: false,
            contentType: false,
            success: function(data) {

               $('.errorvehiclenumber').addClass('hidden');
               $('.errorstartlocation').addClass('hidden');
               $('.errorendlocation').addClass('hidden');
               $('.errorcompanyname').addClass('hidden');
               $('.errortripcost').addClass('hidden');
               $('.erroradvance').addClass('hidden');
               $('.errortotalkm').addClass('hidden');
               $('.errordieselcost').addClass('hidden');
               $('.errorexistingfdiesel').addClass('hidden');
               $('.errorfillup').addClass('hidden');
               $('.errortotaldiesel').addClass('hidden');
               if ((data.errors)) {
                  setTimeout(function() {
                     $('#editModal').modal('show');
                     toastr.error('Validation error!', 'Error Alert', {
                        timeOut: 5000
                     });
                  }, 500);

                  if (data.errors.vehiclenumber) {

                     $('.errorvehiclenumber').removeClass('hidden');
                     $('.errorvehiclenumber').text(data.errors.vehiclenumber);
                  }
                  if (data.errors.startlocation) {
                     $('.errorstartlocation').removeClass('hidden');
                     $('.errorstartlocation').text(data.errors.startlocation);
                  }
                  if (data.errors.endlocation) {
                     $('.errorendlocation').removeClass('hidden');
                     $('.errorendlocation').text(data.errors.endlocation);
                  }
                  if (data.errors.tripcost) {
                     $('.errortripcost').removeClass('hidden');
                     $('.errortripcost').text(data.errors.tripcost);
                  }
                  if (data.errors.advance) {
                     $('.erroradvance').removeClass('hidden');
                     $('.erroradvance').text(data.errors.advance);
                  }
                  if (data.errors.totalkm) {
                     $('.errortotalkm').removeClass('hidden');
                     $('.errortotalkm').text(data.errors.totalkm);
                  }
                  if (data.errors.dieselcost) {
                     $('.errordieselcost').removeClass('hidden');
                     $('.errordieselcost').text(data.errors.dieselcost);
                  }
                  if (data.errors.existingdiesel) {
                     $('.errorexistingdiesel').removeClass('hidden');
                     $('.errorexistingdiesel').text(data.errors.existingdiesel);
                  }
                  if (data.errors.fillup) {
                     $('.errorfillup').removeClass('hidden');
                     $('.errorfillup').text(data.errors.fillup);
                  }
                  if (data.errors.totaldiesel) {
                     $('.errortotaldiesel').removeClass('hidden');
                     $('.errortotaldiesel').text(data.errors.totaldiesel);
                  }

               } else {
                  alert(hello)
                  toastr.success('Successfully updated Post!', 'Success Alert', {
                     timeOut: 5000
                  });
               }
            }
         })
      })

    

      $(document).on('click', '.show-modal', function() {
         $('.modal-title').text('Show');
         $('#id_show').val($(this).data('id'));
         $('#vehiclenumber_show').val($(this).data('vehiclenumber'));
         $('#startlocation_show').val($(this).data('startlocation'));
         $('#endlocation_show').val($(this).data('endlocation'));
         $('#tripcost_show').val($(this).data('tripcost'));
         $('#advance_show').val($(this).data('advance'));
         $('#totalkm_show').val($(this).data('totalkm'));
         $('#dieselcost_show').val($(this).data('dieselcost'));
         $('#existingdiesel_show').val($(this).data('existingdiesel'));
         $('#fillup_show').val($(this).data('fillup'));
         $('#totaldiesel_show').val($(this).data('totaldiesel'));
         $('#file').val($(this).data('finalbill'));
         var imgvalue = $('#file').val();
        
         
         $('#file').attr('src', imgvalue);
       
         //alert(imgvalue);
      var res = imgvalue.substr(39)
     
         $('#download').attr('href', 'download/' + res);
    

         id = $('#id_show').val();

         $('#showModal').modal('show');
      })
   </script>

</body>

</html>