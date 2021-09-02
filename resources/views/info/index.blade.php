<table border='1' align='center'>
  <legend><h1><center>
    Harga Bitcoin Hari Ini
    </center>
  </h1>
  </legend>
  <thead>
    <th>Mata Uang</th>
    <th>Harga Beli Bitcoin</th>
    <th>Harga Jual Bitcoin</th>
  </thead>
  <tbody>
    
    @foreach($list as $data => $value)
    
    <tr>
      <td>
        {{ $value['symbol'] }}
      </td>
      <td>{{ $value['buy'] }} </td>
      <td>{{ $value['sell'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<br>

<center><a href="{{ url('/') }}" >Back to Home </a>
</center>