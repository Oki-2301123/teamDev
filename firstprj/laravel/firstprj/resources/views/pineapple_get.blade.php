@aso 
<form method="post" action="{{ route('pineapple.post') }}">
    @csrf 

    <button name="bakuhatsu" type="submit">爆発！</button>
    <button name="enjou" type="submit">炎上！</button>
    <button name="saikyo" type="submit">最強！</button>
</form>