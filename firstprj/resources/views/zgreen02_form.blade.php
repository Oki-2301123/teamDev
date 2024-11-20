@aso 
好きな動物の種類を入力！<br>
<form action="{{ route('zgreen02.submit') }}" method="post">
    @csrf
    <input type="text" name="text"><br>
    <input type="submit">
</form>