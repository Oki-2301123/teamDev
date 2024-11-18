@aso
<form method="post" action="{{ route('_challenge.post') }}">
  @csrf
  <p>実行するプログラム:
    <select name="func">
      @foreach ($funcs as $func)
        <option value={{ $func }}>
          {{ $func }}
        </option>
      @endforeach
    </select>
  </p>

  <p>パラメータ1 ($_1): <input type="text" name="_1"></p>
  <p>パラメータ2 ($_2): <input type="text" name="_2"></p>
  <p>パラメータ3 ($_3): <input type="text" name="_3"></p>
  <p><input type="submit" value="実行"></p>
</form>
