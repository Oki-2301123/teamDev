@aso 
<form method="post" action="{{ route('raspberry.post') }}">
    @csrf 

    感情一覧<br>
    <select name="feeling">
        @foreach($feelings as $feeling)
        <option value={{ $feeling->id }}>
            {{ $feeling->feeling_name}}
        </option>
        @endforeach
    </select>

    <p>↑を更新！:<input type="text" name="fname_update"></p>
    <input type="submit" value="更新!">



</form>
{{ session('message') }}