<?php

    /* @var $this yii\web\View */

    $this->title = 'My Yii Application';
?>
<?php try {
    $this->registerJsFile(Yii::$app->request->baseUrl . '/js/users.js',
            ['depends' => [\yii\web\JqueryAsset::className()]]);
} catch (\yii\base\InvalidConfigException $e) {
} ?>
<div class="site-index">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <div class="body-content">
        <div id="app6">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Место жительства</th>
                        <th>Навыки</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users">
                        <td>{{user.user.name}}</td>
                        <td>{{user.city.name}}</td>
                        <td>
                            <div v-for="skill in user.skills">
                                {{skill.title}}
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger" @click="deleteUser(user.id)">Удалить</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
