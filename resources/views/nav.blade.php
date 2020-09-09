<div id="page-content-wrapper">

<div class="col-md-12" >
    <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
  
     <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->
     <div class="col-md-1" id="menu-toggle">
    
     <div id="toggleIcon"></div>
<div id="toggleIcon"></div>
<div id="toggleIcon"></div>


</div>
<div class="col-md-2">
<img src="images/lorry1.jpg" alt=""   width="40" height="30">

@foreach ($data  as $value)
<a href="viewdashboard">{{$value->companyname}}</a>

@endforeach	
</div>
<div class="col-md-5">
</div>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

    
     <div class="col-md-4">

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           @foreach ($data  as $value)
{{$value->name}}

@endforeach


           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{url('/')}} ">logout</a>
             </div>
         </li>
       </ul>
     </div>
     </div>
   </nav>
   </div>
    
   

   
   <!-- /#page-content-wrapper -->

 </div>


  <div class="d-flex" id="wrapper" >
  
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >

      <div class="sidebar-heading">
  </div>
      <div class="list-group list-group-flush" >
        <a href="{{url('lorrydetails')}}" class="list-group-item list-group-item-action bg-light">lorry Details</a>
        <a  href="{{url('picklorry')}}" class="list-group-item list-group-item-action bg-light">Select lorry</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">menu3</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">menu4</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
   
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
 