<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ログイン</title>
        <link rel="stylesheet" href="./css/shopping.css">
        <link rel="stylesheet" href="./css/responsive.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="top">
                <span class="logo"><a href="./top.php">NANDEMO-YA</a></span>
            </div>
        </header>
        <section class="login">
            
        
        <!--エラーメッセージ-->

        <?php if($err !== ''){ ?>
            <p class="red"><?php echo $err; ?></p>
        <?php } ?>
        
        
            <!--入力フォーム-->
        
            <form method="post" action="./top_login.php">
                <p>ユーザーID：<input type="text" name="user_name" class="login_form" value="<?php echo $user_name; ?>"></p>
                <p>パスワード：<input type="password" name="password" class="login_form" value="<?php echo $password; ?>"></p>
                <input type="submit" class="login_btn" value="ログイン">
            </form>
            
            
            <!--新規会員の方は登録ページへ案内-->
            
            <div class="login_info">
                <p>NANDEMO-YAは会員様のみご利用頂けます</p>
                <p>未登録の方は<a href="create_id.php">こちら</a>よりご登録ください</p>
            </div>            
        
        </section>
    </body>
</html>