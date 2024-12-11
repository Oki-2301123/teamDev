@aso 
<form action=" {{ route('vanilla.post') }}" method="post" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="img"><br>
    <input type="submit" name="add" value="追加">
</form>