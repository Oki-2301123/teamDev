@aso 
<form action="{{ route('saveColor') }}" method="post">
    @csrf 
    名前を入力：<input type="text" name="name" required>
    好きな色を入力：<input type="text" name="color" required>
    <input type="submit" value="登録する">
</form>