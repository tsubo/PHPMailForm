<?php ob_start() ?>
お名前: <?= $inputs['name'] ?> 
メールアドレス: <?= $inputs['email'] ?> 
件名: <?= $inputs['subject'] ?> 

内容:
<?= $inputs['message'] ?> 
<?php
$content = ob_get_clean();
return $content;
