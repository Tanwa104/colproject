<html>
    <head> <title>find Assistence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </head>
   @php
    $n=count($users);   
    $no=count($usernanny);
   @endphp
   @for($i=0;$i<$n;$i++)      
<div class="card text-center">
    <div class="card-header">
      Find Assistence
    </div>
    <div class="card-body">
       
      <h5 class="card-title">{{$users[$i]->name}}&nbsp;{{$users[$i]->lastname}}</h5>
    <p>{{$useradd[$i]->address_line_1}}&nbsp;{{$useradd[$i]->address_line_2}}&nbsp;{{$useradd[$i]->city}}&nbsp;{{$useradd[$i]->state}}</p>
    {{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}<br>
    <p class="card-text">{{$usertime[$i]->weekdays}}</p>
    <table border  class="card-text">
        <tr><th>childname</th>
            <th>age</th>
            <th>gender</th></tr>

      @php
      $no=count($usernanny[$usertime[$i]->id]);
      @endphp
      @for($j=0;$j<$no;$j++)
      <tr><td>{{$usernanny[$usertime[$i]->id][$j]->childname}}</td><td>{{$usernanny[$usertime[$i]->id][$j]->childage}}</td><td>{{$usernanny[$usertime[$i]->id][$j]->childgender}}</td></tr>
      
      @endfor</table>
      @php
      $num=$usertime[$i]->id
      @endphp
      <a href="{{route('propsee.build',[$num])}}" class="btn btn-primary">View Proposals</a>
    </div>
    <div class="card-footer text-body-secondary">
      
    </div>
  </div><br><br>
  @endfor

    
