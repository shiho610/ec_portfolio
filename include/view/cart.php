<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ショッピングカートページ</title>
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
        
        
        <!--カートに入れたもの一覧-->
        
        <section class="cart_list">
            <h1><i class="fas fa-shopping-cart cart"></i> カート</h1>
        
        
        <!--エラーメッセージまたは変更完了メッセージ-->
            
        <?php foreach($err as $value){ ?>
            <p class><?php echo $value; ?></p>
        <?php } ?>
        <?php foreach($msg as $value){ ?>
            <p class><?php echo $value; ?></p>
        <?php } ?>        
        
        
        <!--カートに入れたもの一覧、テーブル-->
            
            <table>
                <th></th>
                <th></th>
                <th>数量</th>
                <th>価格</th>
                <th></th>
                
                <?php foreach($item_data as $value){ ?>
                <tr>
                    <td class="img"><img src="./img/<?php echo $value['img']; ?>"></td>
                    <td><?php echo $value['name']; ?></td>
                    
                    
                    <!--個数変更-->
                    
                    <form method="post">
                        <td><p><input type="text" name="amount_chg" class="amount_chg" value="<?php echo $value['amount']; ?>"> 個</p>
                        <input type="submit" class="chg" value="変更"></td>
                        <input type="hidden" name="cart_id" value="<?php echo $value['cart_id']; ?>">
                        <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                    </form>
                    
                    
                    <!--税込表示-->
                    
                    <td class="red">¥<?php echo ceil($value['price']); ?>(税込)</td>
                    
                    
                    <!--削除ボタン-->
                    
                    <form method="post">
                        <td><input type="submit" name="delete" class="delete" value="削除"></td>
                        <input type="hidden" name="cart_id" value="<?php echo $value['cart_id']; ?>">
                    </form>                    
                </tr>
                <?php } ?>
                
                <tr>
                    
                    
                    <!--合計-->
                    
                    <td></td>
                    <td></td>
                    <td>合計</td>
                    <td class="sum"><p>¥<?php echo $sum; ?>(税込)</td>
                    <td>
                        
                        
                        <!--購入ボタン-->
                        
                        <form action="./confirm.php" method="post">
                            <input type="submit" name="buy" class="buy_btn" value="購入する">
                        </form>
                    </td>
                </tr>
            </table>
            
        </section>
    </body>
</html>