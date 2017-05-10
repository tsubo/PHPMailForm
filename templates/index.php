<?php $title = 'お問い合わせ' ?>

<?php ob_start() ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1><?= $title ?></h1>
        <br>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $key => $error): ?>
                        <?php if(!empty($error)): ?>
                            <li><?= $error ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="confirm.php" method="POST">
            <input type="hidden" name="csrf_name" value="<?= $csrfKeyPair['csrf_name'] ?>">
            <input type="hidden" name="csrf_value" value="<?= $csrfKeyPair['csrf_value'] ?>">

            <div class="form-group <?= present($errors, 'name') ? 'has-error' : '' ?>">
                <label for="name">お名前</label>
                <input type="text" class="form-control" name="name"
                       placeholder="鈴木一朗"
                       value="<?= presence($inputs, 'name', '') ?>">
                <span class="help-block"><?= presence($errors, 'name', '') ?></span>
            </div>
            <div class="form-group <?= present($errors, 'email') ? 'has-error' : '' ?>">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email"
                       placeholder="youremail@domain.com"
                       value="<?= presence($inputs, 'email', '') ?>">
                <span class="help-block"><?= presence($errors, 'email', '') ?></span>
            </div>
            <div class="form-group <?= present($errors, 'email_confirm') ? 'has-error' : '' ?>">
                <label for="email_confirm">メールアドレス（確認）</label>
                <input type="email" class="form-control" name="email_confirm"
                       placeholder="youremail@domain.com"
                       value="<?= presence($inputs, 'email_confirm', '') ?>">
                <span class="help-block"><?= presence($errors, 'email_confirm', '') ?></span>
            </div>
            <div class="form-group <?= present($errors, 'subject') ? 'has-error' : '' ?>">
                <label for="subject">件名</label>
                <input type="text" class="form-control" name="subject"
                       placeholder="お問い合わせの件"
                       value="<?= presence($inputs, 'subject', '') ?>">
                <span class="help-block"><?= presence($errors, 'subject', '') ?></span>
            </div>
            <div class="form-group <?= present($errors, 'message') ? 'has-error' : '' ?>">
                <label for="message">内容</label>
                <textarea class="form-control" name="message" rows="10"><?= presence($inputs, 'message', '') ?></textarea>
                <span class="help-block"><?= presence($errors, 'message', '') ?></span>
            </div>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'templates/layout.php' ?>
