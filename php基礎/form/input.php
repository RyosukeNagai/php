<?php

require 'validation.php';

header('X_FRAME-OPTIONS:DENY');

//スーパーグローバル変数 php 9種類
//連想配列

if (!empty($_POST)) {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
}

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//入力、確認、完了 input.php, confirm.php, thanks.php
//CSRF
//input.php

$pageFlag = 0;
$errors = validation($_POST);

if(!empty($_POST['btn_confirm']) && empty($errors)) {
  $pageFlag = 1;
}

if(!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  
  <?php if ($pageFlag === 0) : ?>

    <?php if(!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
      <?php  echo '<ul>' ; ?>
      <?php  
        foreach($errors as $error) {
          echo "<li> {$error} </li>";
        }
      ?>
      <?php echo '</ul>' ; ?>
    <?php endif ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="input.php" method="POST">
          <div class="form-group">
            <label for="your_name">氏名</label>
            <input type="text" class="form-control" id="your_name" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name']);} ?>" required>
          </div>
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($_POST['email'])) {echo h($_POST['email']);} ?>" required>
          </div>
          <div class="form-group">
            <label for="url">ホームページ</label>
            <input type="url" class="form-control" id="url" name="url" value="<?php if(!empty($_POST['url'])) {echo h($_POST['email']);} ?>">
          </div>
          性別
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="gender1" name="gender" value="0" 
            <?php  if(isset($_POST['gender']) && $_POST['gender'] === '0') 
            { echo 'checked';}?>>
            <label class="form-check-label" for="gender1">男性</label>
            <input type="radio" class="form-check-input" name="gender2" value="1"
            <?php  if(isset($_POST['gender']) && $_POST['gender'] === '1') 
            { echo 'checked';}?>>
            <label class="form-check-label" for="gender2">女性</label>
          </div>

          <div class="form-group">
            <label for="age">年齢</label>
            <select class="form-control" name="age" id="age">
              <option value="">選択してください</option>
              <option value="1">〜19歳</option>
              <option value="2">20歳〜29歳</option>
              <option value="3">30歳〜39歳</option>
              <option value="4">40歳〜49歳</option>
              <option value="5">50歳〜59歳</option>
              <option value="6">60歳〜69歳</option>
            </select>
          </div>

          <div class="form-group">
            <label for="contact">お問い合わせ内容</label>
            <textarea name="contact" class="form-control" id="contact" row="3">
              <?php if(!empty($_POST['contact'])) {echo h($_POST['contact']);} ?>
            </textarea>
          </div>
      
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="caution" id="caution" value="1">
            <label class="form-check-label" for="caution">注意事項にチェックする</label>
          </div>

          <input type="submit" class="btn btn-info" name="btn_confirm" value="確認する">
          </form>
        </div><!-- .col-md-6 -->
      </div>
    </div>

  <?php endif; ?>
  
  <?php if ($pageFlag === 1) : ?>
    <form action="input.php" method="POST">
      氏名
      <?php echo h($_POST['your_name']); ?>
      <br>
      メールアドレス
      <?php echo h($_POST['email']); ?>
      <br>
      ホームページ
      <?php echo h($_POST['url']); ?>
      <br>
      性別
      <?php
        if($_POST['gender'] === '0'){
          echo '男性';
        }
        if($_POST['gender'] === '1'){
          echo '女性';
        }
      ?>
      <br>
      年齢
      <?php
        if($_POST['age'] === '1'){ echo '〜19歳' ;}
        if($_POST['age'] === '2'){
          echo '20歳〜29歳';
        }
        if($_POST['age'] === '3'){
          echo '30歳〜39歳';
        }
        if($_POST['age'] === '4'){
          echo '40歳〜49歳';
        }
        if($_POST['age'] === '5'){
          echo '50歳〜59歳';
        }
        if($_POST['age'] === '6'){
          echo '60歳〜69歳';
        }
      ?>
      <br>
      お問い合わせ内容
      <?php echo h($_POST['contact']); ?>
      <br>
      <input type="submit" name="back" value="戻る">
      <input type="submit" name="btn_submit" value="送信する">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
      <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
      <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
      <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
      <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
    </form>
  <?php endif; ?>

  <?php if ($pageFlag === 2) : ?>
    送信が完了しました。
  <?php endif; ?>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>

</html>