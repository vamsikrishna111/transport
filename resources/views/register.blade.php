<!DOCTYPE html>
<html lang="en">

<body>
   @include('dashboard')
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
               <form method="post" action="{{url('')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="col-md-12 mt-5">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" value='<?php echo $users[0]->vehiclenumber; ?>' name="vehiclenumber" placeholder="vehiclenumber">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" value='<?php echo $users[0]->startlocation; ?>'  name="startlocation" placeholder="start location">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="endlocation" value='<?php echo $users[0]->endlocation; ?>' placeholder="end location">
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="tripcost" value='<?php echo $users[0]->tripcost; ?>' placeholder="tripcost ">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="advance" value='<?php echo $users[0]->advance; ?>' placeholder="advance">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="totalkm" value='<?php echo $users[0]->totalkm; ?>' placeholder="total km">
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="dieselcost" value='<?php echo $users[0]->dieselcost; ?>' placeholder="diesel cost ">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="existingdiesel" value='<?php echo $users[0]->existingdiesel; ?>' placeholder="existing diesel">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="fillup" value='<?php echo $users[0]->fillup; ?>' placeholder="fillup">
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="text" class="form-control" name="totaldiesel" value='<?php echo $users[0]->totaldiesel; ?>' placeholder="totaldiesel">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="formgroup">
                              <input type="file" name="filename" class="form-control" value="<?php echo $users[0]->finalbill;?>" />
                          </div><br>
                            <div>
                                 <img src="{{asset ('/images/'.$users[0]->finalbill) }}" style="height:70px; width:70px"/>
         
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class='pull-right' style="float:right">
                     <button class="btn btn-default">cancel</button>
                     <button class="btn btn-primary ml-3 mt-3 mb-4">edit</button>

                  </div>



               </form>
            </div>
</div>

</div>
</body>
</html>