<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b> Name</b></td>
        <td><b>companyname</b></td>
        <td><b>vehiclenumber</b></td> 
        <td><b> startlocation</b></td>
        <td><b>endlocation</b></td>
        <td><b>tripcost</b></td> 
        <td><b>advance</b></td>
        <td><b>totalkm</b></td>
        <td><b>dieselcost</b></td> 
        <td><b>existingdiesel</b></td>
        <td><b>fillup</b></td>
        <td><b>totaldiesel</b></td>  
        <td><b>startdate</b></td>
        <td><b>enddate</b></td>
      </tr>
      </thead>
      <tbody>
      <tr>
          @foreach($data as $value)
        <td>
          {{$value->name}}
        </td>
        <td>
          {{$value->companyname}}
        </td>
        <td>
          {{$value->vehiclenumber}}
        </td>
        <td>
        {{$value->startlocation}}

       
        </td>
        <td>
          {{$value->endlocation}}
        </td>
        <td>
          {{$value->tripcost}}
        </td>
        <td>
          {{$value->advance}}
        </td>
        <td>
          {{$value->totalkm}}
        </td>
        <td>
          {{$value->dieselcost}}
        </td>
        <td>
          {{$value->existingdiesel}}
        </td>
        <td>
          {{$value->fillup}}
        </td>
        <td>
          {{$value->totaldiesel}}
        </td>
        <td>
          {{$value->startdate}}
        </td>
        <td>
          {{$value->enddate}}
        </td>
      
      </tr>
      @endforeach
      </tbody>
    </table>
  </body>
</html>