@aso 
<form method="post" action=" {{ route('orange.post') }}">
    @csrf
    <button type="submi" name="magical">
        データベースに魔法をかけるボタン！
    </button>
</form>