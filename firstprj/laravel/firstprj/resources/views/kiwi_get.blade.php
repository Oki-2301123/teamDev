@aso
<form method="post" action="{{ route('kiwi.post') }}">
    @csrf 
    <p>作成したい気分を入力：<input tpye="text" name="fname" required></p>
    <p><input type="submit" value="作成！"></p>
</form>