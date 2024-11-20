<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge\_;

class _ChallengeController extends Controller
{
  private $_;
  private $_data = [
    'data' => []
  ];

  public function __construct()
  {
    $this->_ = new _();
  }

  public function getView()
  {
    return view('_challenge_get', $this->_->_generateFuncList());
  }

  public function receivePost(Request $request)
  {
    $this->_->_executeFunc(
      $request->func,
      function (string $arg) {
        array_push($this->_data['data'], $arg);
      },
      $request->_1,
      $request->_2,
      $request->_3
    );
    return view('_challenge_post', $this->_data);
  }
}
