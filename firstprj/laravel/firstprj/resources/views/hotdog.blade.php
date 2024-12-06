@if( $rand  === 0)
{{ $rand }} おはよう<br>
<form method="post" action="{{ route('icecream') }}">
    @csrf
    <p>今の気分は？
        <select name="text">
            <option value="サイコ～でーす">サイコ～</option>
            <option value="フツー">フツー</option>
            <option value="びみょー">びみょうー</option>
            <option value="もうだめ">もうだめ</option>
        </select>
    </p>
    <input type="submit" name="submit">
</form>
@elseif( $rand  === 1)
{{ $rand }} こんにちは<br>
@elseif( $rand  === 2)
{{ $rand }} こんばんは<br>
@endif