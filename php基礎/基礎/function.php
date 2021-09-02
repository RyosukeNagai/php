<?php 
$globalVariable = 'グローバル変数です';

function checkScope(){
  $locallVariable = 'ローカル変数です';
  global $globalVariable;
  echo $globalVariable;
}

echo $globalVariable;

checkScope();
?>