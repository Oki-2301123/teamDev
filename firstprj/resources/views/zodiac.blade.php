@aso 
<form method="post" action="{{ route('zodiac.post') }}">
    @csrf 

    <p>特定のidの気分を表示: <input type="text" name="feeling_id"></p>
    <button name="delete" type="submit">表示！</button>
</form>

{{ session('message') }}