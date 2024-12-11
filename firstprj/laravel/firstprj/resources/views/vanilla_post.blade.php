@aso 
画像をアップロード完了<br>

@foreach($magazine as $m)
    @if(!is_null($m->photograph))
    <img src={{ asset('storage/' .$m->photograph) }}>
    @endif
@endforeach