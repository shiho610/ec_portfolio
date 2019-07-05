<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>商品一覧ページ</title>
        <link rel="stylesheet" href="./css/shopping.css">
        <link rel="stylesheet" href="./css/responsive.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="top">
                <span class="logo"><a href="./item_list.php">NANDEMO-YA</a></span>
                
                <span class="menu">
                    <?php echo $user_name; ?>さん　
                    <a href="./want.php" class="heart"><i class="fas fa-heart"></i></a>
                    <a href="./cart.php" class="cart"><i class="fas fa-shopping-cart"></i></a>
                    <a href="./logout.php" class="str">ログアウト</a>
                </span>
            </div>
        </header>


        <!--商品一覧-->
        
        <section class="item_list">
            
            
            <!--処理が完了、またはエラーがあればメッセージ表示-->
            
            <?php foreach($msg as $value){ ?>
            <p><?php echo $value; ?></p>
            <?php } ?>
            
            
            <!--商品一覧表示-->
            
            <?php foreach($disp_data as $value){ ?>
            <div class="item">
                <img src="./img/<?php echo $value['img']; ?>">
                <div class="item_info">
                    <p class="item_name"><?php echo $value['name']; ?></p>
                    <p class="item_price">¥<?php echo ceil($value['price']); ?>(税込)</p>
                </div>
                
                
                <!--ほしい物リストボタン-->
                
                <form method="post">
                    <input type="submit" class="want_btn fas" name="want_btn" value="&#xf004; ほしい">
                    <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                </form>
                
                
            <!--カートボタン / 在庫が０でなければカートに入る-->
                
            <?php if((int)$value['stock'] === 0){ ?>
                <p class="red">売り切れ</p>
            <?php } else { ?>
                <form method="post">
                    <input type="submit" class="cart_btn" name="cart_btn" value="カートに入れる">
                    <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                </form>
            <?php } ?>
            
            </div>
            <?php } ?>
        </section>
        
        
        <!--ページネーション-->
        
        <section class="page">
            <?php for($i = 1; $i <= $max_page; $i++){
                if($i == $now){ ?>
                    <span><?php echo $now; ?></span>　
                <?php } else { ?>
                    <a href="item_list.php?page_id=<?php echo $i; ?>"><?php echo $i; ?></a>　
                <?php }
            } ?>
        </section>
    </body>
</html>