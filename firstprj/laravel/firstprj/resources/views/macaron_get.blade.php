@aso 
<form method="post" action="{{ route('macaron.post') }}">
    @csrf 
    <p>idが1の気分を削除</p>
    <p><input type="submit" value="削除!"></p>
</form>