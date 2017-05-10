<?php $title = 'お問い合わせ' ?>

<?php ob_start() ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1><?= $title ?></h1>
        <br>
        <div class="alert alert-success" role="alert">
            <p>お問い合わせ、ありがとうございました。</p>
            <p>内容を確認後、別途メールにて返信させていただきます。</p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'templates/layout.php' ?>
