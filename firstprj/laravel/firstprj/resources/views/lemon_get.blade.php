@aso 
<form method="post" action="{{ route('lemon.post') }}">
    @csrf 
    <p>idが1の気分を更新:
        <input type="text" name="fname" required>
    </p>
    <p><input type="submit" value="更新!"></p>
</form>