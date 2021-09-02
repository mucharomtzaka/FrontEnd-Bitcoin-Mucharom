<h1><center>{{ $data['title'] }}</center></h1>
  <center> Kurs 1 USD = 14.000 IDR 
  <br>
  <br>
  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
  
  {{  
    Form::open(array('url' => 'post_idr_btc'))
  }}
  
   <input name='amount' type="number"/>
   <button type="submit" name="send">Convert</button>
  
  {{
   Form::close()
  }}
  
 <h1> {{ $data['result'] }} </h1>
  
<br>
<a href="{{ url('/') }}" >Back to Home </a>
</center>