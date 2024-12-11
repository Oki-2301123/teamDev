@aso
<h1>検索結果</h1>
<ul>
        @foreach($res as $r)
           <li> {{$r->name}}:{{$r->color}}</li>
        @endforeach
</ul>