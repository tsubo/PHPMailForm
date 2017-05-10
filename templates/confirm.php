<?php $title = 'お問い合わせ（確認）' ?>

<?php ob_start() ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1><?= $title ?></h1>
        <br>
        <table class="table">
            <tr>
                <th>お名前</th>
                <td><?= h($inputs['name']) ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= h($inputs['email']) ?></td>
            </tr>
            <tr>
                <th>件名</th>
                <td><?= h($inputs['subject']) ?></td>
            </tr>
            <tr>
                <th>内容</th>
                <td><?= nl2br(h($inputs['message'])) ?></td>
            </tr>
        </table>
        <form action="sendmail.php" method="POST">
            <input type="hidden" name="name" value="<?= $inputs['name']; ?>">
            <input type="hidden" name="email" value="<?= $inputs['email']; ?>">
            <input type="hidden" name="subject" value="<?= $inputs['subject']; ?>">
            <input type="hidden" name="message" value="<?= $inputs['message']; ?>">
            <a href="index.php" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'templates/layout.php' ?>
