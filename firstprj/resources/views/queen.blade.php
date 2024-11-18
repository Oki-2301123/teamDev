@aso 
<form method="get" action="{{ route('queen.get') }}">
    @csrf 
    <button name="get" type="submiT">GET!</button>
</form>

<form method="post" action="{{ route('queen.post') }}">
    @csrf 
    <button name="post" type="submit">POST!</button>
</form>

{{ session('message') }}