@aso 
<form method="post" action="{{ route('xenon.post') }}">
    @csrf 
    <p>元気ですか？<input type="text" name="date" required></p>
    <p><input type="submit" value="答える！"></p>
</form>