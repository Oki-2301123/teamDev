@aso 
<body>
    <h1>雑誌管理システム</h1>
    <form action="{{ route('unicorn.post') }}"method="post">
        @csrf 
        <fieldset>
            <legend>追加</legend>
            雑誌名:
            <input type="text" name="add1"><br>
            感想:
            <textarea name="add2" rows="4"></textarea><br>
            <input type="submit" name="add" value="追加">
        </fieldset><br>

        <filedset>
            <legend>削除</legend>
            ID:
            <input type="number" name="id"><br>
            <input type="submit" name="del" value="削除">
        </filedset>
    </form>

---------------------------<br>
登録雑誌データ一覧<br>
---------------------------<br>
@foreach($magazine as $m)
    {{ $m->id }}:{{ $m->title }}:{{ $m->impression }}<br>
@endforeach


</body>