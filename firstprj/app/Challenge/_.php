<?php

namespace App\Challenge;

class _
{
  private $injecters = [
    'Alpha' => [],
    'Bravo' => [],
    'Charlie' => [],
    'Delta' => [],
    'Europe' => [],
    'Foxtrot' => [],
    'Golf' => [],
    'Hotel' => [],
    'India' => ['ウキー', 'ピヨ', 'メー'],
    'Juliet' => ['ワン', 'ワン', 'ワン', 'ニャー', 'ワン', 'ニャー'],
    'Kilo' => [],
    'Lima' => ['イヌです！', 'ネコです！', 'ウサギです！'],
    'Mike' => ['cat' => ['タマ', 'ミケ', 'ニャン次郎'], 'dog' => ['ティナ', 'ナノ', 'ヒメ']],
    'November' => ['foods' => ['スシ', 'テンプラ', 'キンピラ'], 'drink' => 'ミズ'],
    'Oscar' => [],
    'Papa' => [],
    'Quebec' => [],
    'Romeo' => [],
    'Sierra' => [],
    'Tango' => ['base' => 2, 'max' => 1000, 'min' => 0],
    'Uniform' => ['I\' am cat', 'You are dog', 'I think so', 'We must respect all cat'],
    'Victor' => [],
    'Whisky' => [],
    'Xray' => [],
    'Yankee' => [],
    'Zulu' => [],
  ];

  public function _generateFuncList()
  {
    $files = scandir('../app/Challenge');
    $files = array_diff($files, array('.', '..', '_.php'));

    $list = [
      'funcs' => []
    ];

    foreach ($files as $file) {
      array_push($list['funcs'], pathinfo($file, PATHINFO_FILENAME));
    }

    return $list;
  }

  public function _executeFunc(string $className, $lambda, $_1, $_2, $_3)
  {
    $reflectionClass = new \ReflectionClass('App\Challenge\\' . $className);
    $instance = $reflectionClass->newInstance();

    $this->_init();
    return $instance->process($lambda, $_1, $_2, $_3, $this->injecters[$className]);
  }

  private function _init()
  {
    $this->_prepare_victor();
    $this->_prepare_whisky();
    $this->_prepare_xray();
    $this->_prepare_yankee();
    $this->_prepare_zulu();
  }

  private function _prepare_victor()
  {
    $deco1 = function ($arg) {
      return '*** ' . $arg . ' ***';
    };
    $deco2 = function ($arg) {
      return '卍 ' . $arg . ' 卍';
    };
    $deco3 = function ($arg) {
      return '$$ ' . $arg . ' $$';
    };

    $this->injecters['Victor']['funcs'] = [$deco1, $deco2, $deco3];
  }

  private function _prepare_whisky()
  {
    $loop = function ($behavior) {
      for ($i = 0; $i <= 100; $i += 5) {
        $behavior($i);
      }
    };
    $this->injecters['Whisky']['func'] = $loop;
  }

  private function _prepare_xray()
  {
    $gacha_system = function ($n, $ssr_behavior, $sr_behavior, $r_behavior, $n_behavior) {
      for ($i = 0; $i < $n; $i++) {
        $r = mt_rand(1, 100);
        if ($r < 3) $ssr_behavior($r);
        elseif ($r < 10) $sr_behavior($r);
        elseif ($r < 40) $r_behavior($r);
        else $n_behavior($r);
      }
    };
    $this->injecters['Xray']['gacha'] = $gacha_system;
  }

  private function _prepare_yankee()
  {
    $sw_system = function ($out, $sw1, $sw2) {
      $r1 = $sw1(50);
      $r2 = $sw2(200);
      if ($r1 && $r2) {
        $out('どちらも条件を満たした！');
        return 'and';
      } elseif ($r1) {
        $out('1つ目の条件のみ満たした！');
        return 'or1';
      } elseif ($r2) {
        $out('2つ目の条件のみ満たした！');
        return 'or2';
      } else {
        $out('どちらも条件を満たさなかった！');
        return 'no';
      }
    };
    $this->injecters['Yankee']['func'] = $sw_system;
  }

  private function _prepare_zulu()
  {
    $auth_system = function ($out, $guess) {
      $alp = str_split('+-*/@[]#$%');
      $generator = function () {
        $sum = 0;
        for ($i = 1; $i < 2024; $i++) {
          $sum += $i;
        }
        return $sum;
      };
      $target = $generator();
      $pass = '';
      while ($target != 0) {
        $pass .= $alp[$target % count($alp)];
        $target = floor($target / count($alp));
      }
      $out($pass == $guess ? '突破!' : 'ダメ!');
    };
    $this->injecters['Zulu']['auth'] = $auth_system;
  }
}
