@aso 
<form action="{{ route('updateColor') }}" method="post">
    @csrf 
    @foreach ($res as $item)
    <p>
        <input type="hidden" name="id" value="{{ $item->id }}">
        名前：<input type="text" name="name" value="{{ $item->name }}">
        色名：<input type="text" name="color" value="{{ $item->color }}">
        <input type="submit" name="update" value="更新">
    </p>
    @endforeach

</form>