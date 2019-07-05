<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>購入完了ページ</title>
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
        
        <section class="cart_list">
            
            
            <!--購入完了メッセージ、またはエラーメッセージ-->
            
            <?php if(count($err) === 0){ ?>
            <p class="finish_msg">ご購入ありがとうございました</p>
            <?php } else { ?>
            <?php foreach($err as $value){ ?>
            <p class="red"><?php echo $value; ?></p>
            <?php } ?>
            <?php } ?>
            
            
            <!--購入したものリスト-->
            
            <table>
                <th></th>
                <th></th>
                <th></th>
                <th>価格</th>
                <th>数量</th>
                
                <?php foreach($item_data as $value){ ?>
                <tr>
                    <td><img src="./img/<?php echo $value['img']; ?>"></td>
                    <td><?php echo $value['name']; ?></td>
                    <td></td>
                    <td class="red">¥<?php echo $value['price']; ?>(税込)</td>
                    <td><?php echo $value['amount']; ?></td>
                    <input type="hidden" name="cart_id" value="cart_id">
                    <input type="hidden" name="item_id" value="item_id">
                </tr>
                <?php } ?>
                
                
                <!--合計-->
                
                <tr class="bottom">
                    <td></td>
                    <td></td>
                    <td>合計</td>
                    <td class="sum">¥<?php echo $sum; ?>(税込)</td>
                    <td></td>
                </tr>
            </table>
        </section>
    </body>
</html>