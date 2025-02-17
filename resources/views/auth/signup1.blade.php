<html>
    <head>
        <title>Register Customer </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    
    <body style="">
        <form method="POST" action="{{ route('signup.build') }}">
            @csrf
            @method('POST')
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">LastName</span>
  <input type="text" class="form-control" name="lastname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email Address</span>
  <input type="text" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$valmail}}">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
  <input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
                
                  <input type="submit" value="submit" class="btn btn-dark"/>
                  
                  </div>
              
        </form>
    </body></html>