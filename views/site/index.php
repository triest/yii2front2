<?php

    /* @var $this yii\web\View */

    $this->title = 'Users and skills';

?>
<?php try {
    $this->registerJsFile(Yii::$app->request->baseUrl . '/js/users.js',
            ['depends' => [\yii\web\JqueryAsset::className()]]);
} catch (\yii\base\InvalidConfigException $e) {
} ?>
<div class="site-index">
    <button class="btn btn-primary" onclick="addNewUser()"> Add new user</button>
    <div class="body-content">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Место жительства</th>
                <th>Навыки</th>
                <th>Действия</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
