<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>商品管理ページ</title>
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="stylesheet" href="./css/responsive.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="top">
                <span class="logo"><a href="./item_list.php">NANDEMO-YA</a></span>
                <span class="menu">
                    <a href="./logout.php" class="str">ログアウト</a>
                </span>
            </div>
        </header>   
        
        
        <!--エラーメッセージの表示-->
        
        <section>
        <?php foreach($err as $value){ ?>
            <p class="red"><?php echo $value; ?></p>
        <?php } ?>
        <?php foreach($msg as $value){ ?>
            <p class="red"><?php echo $value; ?></p>
        <?php } ?>            
        </section>


        <!--商品追加フォーム-->

        <section>
            <h2><i class="fas fa-pencil-alt"></i> 商品を追加する</h2>
            
            <form enctype="multipart/form-data" action="insert.php" method="post">
                <input type="hidden" name="mode" value="insert">
                
                <p>商品名：<input type="text" name="name" class="insert_form"></p>
                <p>値　段：<input type="text" name="price" class="insert_form"></p>
                <p>個　数：<input type="text" name="stock" class="insert_form"></p>
                <p>商品画像：<input type="file" name="img" value="ファイルを選択"></p>
                <p>ステータス：
                    <select name="status">
                        <option value="0">非公開</option>
                        <option selected value="1">公開</option>
                    </select>
                </p>
                
                <input type="submit" class="insert_btn" value="商品を登録する">
            </form>
        </section>
        
        
        <!--商品一覧-->
        
        <section>
        <h2><i class="fas fa-pencil-alt"></i> 商品情報を変更する</h2>
        
        <table>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>ステータス</th>
            <th>操作</th>
            
            <?php foreach($disp_data as $value){
                if((int)$value['status'] === 0){ ?>
            <tr class="background">
            <?php } else { ?>
            <tr>
            <?php } ?>
            
            
                <!--商品情報 / 画像 / 商品名 / 値段-->
            
                <td><img src="./img/<?php echo $value['img']; ?>" class="insert_img"></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['price']; ?>円</td>
                
                
                <!--在庫数変更-->
                
                <form method="post">
                    <td><input type="text" name="stock_chg" class="stock_chg" value="<?php echo $value['stock']; ?>">個　<input type="submit" class="insert_chg" value="変更"></td>
                    <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                    <input type="hidden" name="mode" value="update_stock">
                </form>
                
                
                <!--公開、非公開設定の変更-->
                
                <form method="post">
                    <?php if((int)$value['status'] === 0){ ?>
                    <td><input type="submit" name="status_chg" class="insert_chg" value="非公開→公開にする"></td>
                    <?php } else { ?>
                    <td><input type="submit" name="status_chg" class="insert_chg" value="公開→非公開にする"></td>
                    <?php } ?>
                    <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                    <input type="hidden" name="status" value="<?php echo $value['status']; ?>">
                    <input type="hidden" name="mode" value="update_status">
                </form>
                
                
                <!--削除ボタン-->
                
                <form method="post">
                <td><input type="submit" name="delete" class="insert_chg" value="削除する"></td>
                    <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                    <input type="hidden" name="mode" value="delete">
                </form>
                
            </tr>
            <?php } ?>

        </table>
        </section>
        
        
        <!--ページネーション-->
        
        <section class="page">
            <?php for($i = 1; $i <= $max_page; $i++){
                if($i == $now){ ?>
                    <span><?php echo $now; ?></span>　
                <?php } else { ?>
                    <a href="insert.php?page_id=<?php echo $i; ?>"><?php echo $i; ?></a>　
                <?php }
            } ?>
        </section>
    </body>
</html>