@aso 
<form action="{{ route('zgreen03.submit') }}" method="post">
    @csrf 
    名前を入力：<input type="text" name="name"><br>
    年齢を入力：<input type="text" name="age"><br>
    趣味を入力：<input type="text" name="hobby"><br>
    <input type="submit" ><br>
</form>