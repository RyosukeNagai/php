<?php 

//配列
$arry1 = [1,2,3];

$arry2 = [
  ['赤','青','黄'],
  ['緑','紫','黒']
];
echo '<pre>';
var_dump($arry2);
echo '</pre>';

$arry_member = [
  'name' => '本田',
  'height' => 170,
  'hobby' => 'サッカー'
];
echo $arry_member['name'];
var_dump($arry_member);

$arry_member2 = [
  '本田' => [
    'height' => 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height' => 168,
    'hobby' => 'サッカー'
  ]
];

echo $arry_member2['香川']['height'];

//演算子
$test_1 = 2;
$test_2 = 3;
$test_3 = $test_1 + $test_2;

echo '<pre>';
echo $test_3;
echo '</pre>';

//条件分岐
$height = 91;

// if($height >= 91) {
//   echo "身長は{$height}cmです。";
// }

// if($height <= 90) {
//   echo "身長は{$height}cmになります。";
// }

if($height != 90) {
  echo '身長は90cmではありません';
}

echo '<br>';
$signal = 'blue';

if($signal === 'red') {
  echo '止まれ';
} else if($signal === 'yellow') {
  echo '停止';
} else {
  echo 'すすむ';
}

echo '<br>';
$speed = 80;
if($signal === 'blue') {
  if($speed >= 80) {
    echo 'スピード違反';
  }
}

echo '<br>';
//データが入っているか empty(空) !empty(空でなかったら)
$test = 'a';

if(!empty($test)) {
  echo '変数はからではありません。';
}

echo '<br>';

//AND OR

$signal_1 ='red';
$signal_2 = 'yellow';

if($signal_1 === 'red' && $signal_2 === 'blue') {
  echo '赤と青です';
}
if($signal_1 === 'red' || $signal_2 === 'blue') {
  echo '赤です';
}

echo '<br>';
//forEach

$members = [
  'name' => '本田',
  'height' => 179,
  'weight' => 70
];
$members_2 = [
  '本田' => [
    'height' => 179,
    'weight' => 70
  ],
  '香川' => [
    'height' => 170,
    'weight' => 68
  ]
];

foreach($members as $key => $value) {
  echo "{$key}は{$value}です。";
}



//バリューのみ表示
// foreach($members as $member) {
//   echo $member;
// }

//キーとバリゥー表示
// foreach($member_2 as $member_1) {
//   foreach($member_1 as $member){
//     echo $member;
//   }
// }

echo '<br>';
//for文
//continue, break
for($i = 0; $i < 10; $i++ ) {
  if($i === 5){
    break;
  }
  echo $i;
}

echo '<br>';

//関数
// function test(引数) {
  //処理
//   return 戻り値;
// };
//引数なし
function test(){
  echo 'テスト';
}
test();
//引数あり
echo '<br>';
$comment2 = 'コメントだよー';
function getComment($string) {
  echo $string;
}

getComment($comment2);

echo '<br>';
//戻り値あり
function getNumberOfComment() {
  return 5;
}
$commentNumber = getNumberOfComment();
echo $commentNumber;

echo '<br>';
function sumPrice($int1, $int2) {
  $int3 = $int1 + $int2;
  return $int3;
}
$total = sumPrice(3,5);
echo $total;

//組み込み関数
?>