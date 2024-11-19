@aso 
<form method="post" action=" {{ route('nuts.post') }}">
    @csrf 
    <p>idを入力:<input type="text" name="fid" required></p>
    <p><input type="submit" value="見る！"></p>
</form>