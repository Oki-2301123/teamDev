@aso
実行結果 <br>

@if (count($data) == 0)
<li> からっぽだよ </li>
@else
  @foreach ($data as $element)
    <li> {{ $element }} </li>
  @endforeach
@endif
