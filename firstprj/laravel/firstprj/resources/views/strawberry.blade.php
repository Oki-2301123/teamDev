@aso
<form method="post" action="{{ route('strawberry.post') }}">
    @csrf

    感情一覧<br>
    <select name="emo">
        @foreach($feelings as $f)
        <option value={{$f->id}}>
            {{ $f->feeling_name}}
        </option>
        @endforeach
    </select>

    <p>更新後の気分を入力:<input type="text" name="update_feeling"></p>
    <p><button type="submit" name="update">更新！</button></p>
    <p><button type="submit" name="delete">削除！</button></p>

</form>
{{ session('text') }}