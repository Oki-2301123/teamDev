@aso
削除する色を選択してください:<br>
<form action="{{ route('deleteColor') }}" method="post">
    @csrf 
    @foreach($res as $r)
        <p><input type="radio" name="id" value=<?= $r->id ?>>{{ $r->name }} ( {{$r->color}} )</p>
    @endforeach
    <input type="submit" name="update" value="削除する">
</form>