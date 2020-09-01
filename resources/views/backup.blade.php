<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}" />

    <title>Manage Posts</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
    {{-- <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css"> --}}

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .panel-heading {
            padding: 0;
        }

        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .panel-heading li {
            float: left;
            border-right: 1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }

        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }

        .panel-heading li:last-child {
            border-right: none;
        }

        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
    </style>

</head>
<body>
   @include('nav')
   @section('content')

  
   <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Manage Posts</h2>
        <br />
        <div class="row">
          <div class="col-md-4">
              <p></p>
          </div>
          <div class="col-md-2">
          <a href="#" class="add-modal">
                        <button class="bg-primary btn btn-primary  mb-3">Add a Post</button>
                    </a>
          </div>


        </div>
        
       

            <div class="panel-body mt-3">
                <table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th valign="middle">#</th>
                            <td>bookname</td>
                            <td>price</td>
                            <td>quantity</td>
                            <td>action</td>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <tbody>
                        @foreach($users as $indexkey => $post)
                        <tr class="item">
                            <td class="col1">{{$indexkey+1}}</td>
                            <td>{{$post->vehiclenumber}}</td>
                            <td>
                                {{($post->companyname)}}
                            </td>
                            <td>
                                {{($post->name)}}
                            </td>
                            <td>
                            <button class="show-modal btn btn-success" data-id="{{$post->id}}" data-vehiclenumber="{{$post->vehiclenumber}}" data-companyname="{{$post->companyname}}" data-name="{{$post->name}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                <button class="edit-modal btn btn-info" data-id="{{$post->id}}" data-vehiclenumber="{{$post->vehiclenumber}}" data-companyname="{{$post->companyname}}" data-name="{{$post->name}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                    <button class="delete-modal btn btn-danger" data-id="{{$post->id}}" data-vehiclenumber="{{$post->vehiclenumber}}"  data-companyname="{{$post->companyname}}" data-name="{{$post->name}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                  
                           </td>
                           </tr>
                           @endforeach

          <!------------------ start edit modal book ---------------------------------------->              
                      
                        <div id="editModal" class="modal fade" role="dialog">
                       
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
          
                    <!-- <form  action="{{url('booklistedit',$post->id)}}"  method="POST" role="form"> -->
                    <form  role="form">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="vehiclenumber">vehiclenumber:</label>
                            <div class="col-sm-10">
                                <input type="text" name="vehiclenumber" class="form-control" id="vehiclenumber_edit" autofocus>
                                <p class="errorvehiclenumber text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="companyname">companyname:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="companyname" id="companyname_edit" cols="40" rows="5"></textarea>
                                <p class="errorcompanyname text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-2" for="name">name:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="name" id="name_edit" cols="40" rows="5"></textarea>
                                <p class="errorname text-center alert alert-danger hidden"></p>
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
   

                      
                    </tbody>
                </table>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->

    <!------------------------------ end modal for edit book ---------------------------------------------->
  
  <!----------------------  Modal form to add a post  ----------------------------------------->
  <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form"  name="campaignForm" id="campaignForm" enctype="multipart/form-data">

                     <!--------------------------   1 st row------------------------------------------>  
                       <div class="row">
                          <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Vehiclenumber"  id="vehiclenumber_add" autofocus>
                              
                                <p class="errorvehiclenumber  bg-danger text-danger hidden"></p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">

                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Start Location" id="startlocation_add" autofocus>
                                <p class="errorstartlocation text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">

                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="End Location" id="endlocation_add" autofocus>
                                <p class="errorendlocation text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                       </div>

                        </div>

                    <!----------------------------second row -------------------------------------------------->    
                       

                       <div class="row">

                      <div class="col-md-4">

                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Trip Cost" id="tripcost_add" autofocus>
                                <p class="errortripcost text-center alert alert-danger hidden"></p>
                            </div>
                        </div></div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Advance" id="advance_add" autofocus>
                                <p class="erroradvance text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Total Km" id="totalkm_add" autofocus>
                                <p class="errortotalkm text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        </div>
                        </div>

   <!--------------------------------------third row  ----------------------------------------------->
                      <div class="row">
                         <div class="col-md-4">
                        <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Diesel Cost" id="dieselcost_add" autofocus>
                         
                                <p class="errordieselcost text-center alert alert-danger hidden"></p>
                           
                        </div>
                         </div>
                        </div>
                         <div class="col-md-4">
                        <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Existing Diesel" id="existingdiesel_add" autofocus>
                            
                                <p class="errorexistingdiesel text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                         </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Fill Up" id="fillup_add" autofocus>
                                <p class="errorfillup text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                         </div>

                        </div>



                        <!-------------------------------fourth row ------------------------->
                        <div class="row">
                         <div class="col-md-4">
                        <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Total Diesel" id="totaldiesel_add" autofocus>
                         
                                <p class="errortotaldiesel text-center alert alert-danger hidden"></p>
                           
                        </div>
                         </div>
                        </div>
                         <div class="col-md-4">
                        <div class="form-group">
                        <div class="col-sm-10">
                        <input type="file" class="form-control" placeholder="finalbill" id="finalbill_add" autofocus>
                            
                                <p class="errorfinalbill text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                         </div>
                        

                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!---------------------- end  Modal form to  add a post  ----------------------------------------->

   <!---------------------- start  Modal form to  view a post  ----------------------------------------->
   <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="vehiclenumber">vehiclenumber:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="vehiclenumber_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="companyname">companyname:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="companyname_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">name:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="name_show" cols="40" rows="5" disabled></textarea>
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


   <!---------------------- end  Modal form to  view a post  ----------------------------------------->
 <!-- --------------------- start Modal form to delete a form         ------------------------------------- -->
 <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="vehiclenumber">vehiclenumber:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="vehiclenumber_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



  <!-- --------------------- end Modal form to delete a form         ------------------------------------- -->

    <!-- jQuery -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function() {
            $('#postTable').removeAttr('style');
        })
    </script>

   <script type="text/javascript" >
   //////////////////////////////////////        add a post                /////////////////////////////////////////////////////////////
   $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
         var form = document.forms.namedItem("campaignForm"); // high importance!, here you need change "yourformname" with the name of your form
    var formData = new FormData(form);
   
            $.ajax({
                type: 'POST',
                url: 'insertlorrydetails',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'vehiclenumber': $('#vehiclenumber_add').val(),
                    'startlocation': $('#startlocation_add').val(),
                    'endlocation': $('#endlocation_add').val(),
                    'tripcost': $('#tripcost_add').val(),
                    'advance': $('#advance_add').val(),
                    'totalkm': $('#totalkm_add').val(),
                    'dieselcost': $('#dieselcost_add').val(),
                    'existingdiesel': $('#existingdiesel_add').val(),
                    'fillup': $('#fillup_add').val(),
                    'totaldiesel': $('#totaldiesel_add').val(),

                    'finalbill': $('#finalbill_add').val()

                },
                success: function(data) {
                 
                    $('.errorvehiclenumber').addClass('hidden');
                    $('.errorstartlocation').addClass('hidden');
                    $('.errorendlocation').addClass('hidden');
                    $('.errortripcost').addClass('hidden');
                    $('.erroradvance').addClass('hidden');
                    $('.errortotalkm').addClass('hidden');
                    $('.errordieselcost').addClass('hidden');
                    $('.errorexistingdiesel').addClass('hidden');
                    $('.errorfillup').addClass('hidden');
                    $('.errortotaldiesel').addClass('hidden');
                    $('.errorfinalbill').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
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
                        if (data.errors.adavnce) {
                            $('.erroradvance').removeClass('hidden');
                            $('.erroradvance').text(data.errors.adavnce);
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
                        // if (data.errors.finalbill) {
                        //     $('.errorfinalbill').removeClass('hidden');
                        //     $('.errorfinalbill').text(data.errors.quantity);
                        // }
                       
                      
                    } else { 
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        
                        
                       
                    }
                },
            });
        });
              
              
      ////////////////////////                  show a post             /////////////////////////////////////

      $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#vehiclenumber_show').val($(this).data('vehiclenumber'));
            $('#companyname_show').val($(this).data('companyname'));
            $('#name_show').val($(this).data('name'));
            $('#showModal').modal('show');
        });
     
     
     
        ////////////////////////                  edit a post             /////////////////////////////////////
        $(document).on('click', '.edit-modal', function() {
         
         // $('.modal-title').text('Edit');
          $('#id_edit').val($(this).data('id'));
          $('#vehiclenumber_edit').val($(this).data('vehiclenumber'));
          $('#companyname_edit').val($(this).data('companyname'));
          $('#name_edit').val($(this).data('name'));

          id = $('#id_edit').val();
        //   title= $('#title_edit').val();
        //   content=$('#content_edit').val();
        //   quantity=$('#quantity_edit').val();
         // alert(quantity)
         $('#editModal').modal('show');
     });


       
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'post',
                url: 'booklistedit/' +id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'vehiclenumber': $('#vehiclenumber_edit').val(),
                    'companyname': $('#companyname_edit').val(),
                    'name': $('#name_edit').val()
                },
                success:function(data) {
                    $('.errorvehiclenumber').addClass('hidden');
                    $('.errorcompanyname').addClass('hidden');
                    $('.errorname').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.vehiclenumber) {
                            $('.errorvehiclenumber').removeClass('hidden');
                            $('.errorvehiclenumber').text(data.errors.vehiclenumber);
                        }
                        if (data.errors.companyname) {
                            $('.errorcompanyname').removeClass('hidden');
                            $('.errorcompanyname').text(data.errors.companyname);
                        }
                        if (data.errors.name) {
                            $('.errorname').removeClass('hidden');
                            $('.errorname').text(data.errors.quantity);
                        }
                    } else {
                        
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                    }
                
               }
      })
       
            })


             // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#vehiclenumber_delete').val($(this).data('vehiclenumber'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'POST',
                url: 'delete/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                }
            });
        });
               
     
    
    </script>

</body>

</html>