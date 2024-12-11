更新する色を選択してください:<br>
<form action=" {{ route('showUpdateForm') }}" method="post">
    @csrf 
    @foreach($res as $r)
        <p><input type="radio" name="color_id" value=<?= $r->id ?>>{{ $r->name }} ( {{$r->color}} )</p>
    @endforeach
    <input type="submit" name="update" value="更新する">
</form>