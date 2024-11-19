@aso 
<form action="{{ route('updateColor') }}" method="post">
    @csrf 
    <p>
        名前：<input type="text" name="name" value=<?= $res->name ?>>
        色名：<input type="text" name="color" value=<?= $res->color ?>>
        <input type="submit" name="update" value="更新">
    </p>

</form>