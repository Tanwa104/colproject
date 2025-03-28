<html>
    <head>
        <title>find new Clients</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
        
            <form class="row g-3" action="{{route('fliter.build')}}" method="get">
                
                @if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif
<div class="col-md-6">
    @foreach($items as $item)
    <label for="name" class="form-label">Name </label>
    <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}"/>
    <label for="lastname" class="form-label">lastname </label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$item->lastname}}"/>
    @endforeach
</div>
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">enter the time for work</label>
                  <span id="inputEmail4" class="form-control">
                  <select name="bhours">
                    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                   </select>
                   <select name="bmin" >
                    <option value=":00">:00</option> 
                    <option value=":15">:15</option>
                    <option value=":30">:30</option>
                    <option value=":45">:45</option>
                   </select>
                   <select name="bampm">
                    <option value="am">am</option> 
                    <option value="pm">pm</option>
                    </select> to <select name="ahours">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                    </select>
                    <select name="amins">
                     <option value=":00">:00</option> 
                     <option value=":15">:15</option>
                     <option value=":30">:30</option>
                     <option value=":45">:45</option>
                    </select>
                    <select name="aampm">
                     <option value="am">am</option> 
                     <option value="pm">pm</option>
                    </select>
                    </span>
        <br><br>
                </div>
                

            
                <div class="col-md-6">
            <label for="inputEmail5" class="form-label">enter number of days for work</label>
            <span id="inputEmail5" class="form-control">
            <input type="checkbox" class="btn-check" id="btn-check-4" autocomplete="off" name="weekdays[]" value="monday">
<label class="btn" for="btn-check-4">Monday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-5" autocomplete="off" name="weekdays[]" value="tuesday">
<label class="btn" for="btn-check-5">Tuesday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-6" autocomplete="off" name="weekdays[]" value="wednesday">
<label class="btn" for="btn-check-6">Wednesday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-7" autocomplete="off" name="weekdays[]" value="thursday">
<label class="btn" for="btn-check-7">Thursday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-8" autocomplete="off" name="weekdays[]" value="friday">
<label class="btn" for="btn-check-8">Friday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-9" autocomplete="off" name="weekdays[]" value="saturday">
<label class="btn" for="btn-check-9">Saturday</label><br>
<input type="checkbox" class="btn-check" id="btn-check-10" autocomplete="off" name="weekdays[]" value="sunday">
<label class="btn" for="btn-check-10">Sunday</label><br><br>
            </span>
          </div>
          <div class="col-md-6">
            <label for="inputEmail6" class="form-label">want to work for </label>
            <span id="inputEmail6" class="form-control">
                <input type="radio" class="btn-check" name="options" id="singletime" autocomplete="off" value="singletime">
                <label class="btn btn-outline-danger" for="singletime">Singletime</label>&nbsp;&nbsp;
                
                or&nbsp;&nbsp;
                
                <input type="radio" class="btn-check" name="options" id="fulltime" autocomplete="off" value="fulltime">
                <label class="btn btn-outline-danger" for="fulltime">Fulltime</label>
             </span></div></div>
<input type="submit" value="confirm">


<a href="{{route('user.build')}}" class="btn btn-primary col-md-3">Back</a>     

        </form>
    </body>
</html>