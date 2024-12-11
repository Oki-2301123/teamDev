@aso 
<form action=" {{ route('findColor') }}" method="post" >
    @csrf
<p>データを表示<input type="text" name="data">
<input type="submit" name="find" value="検索する"></p>
</form>