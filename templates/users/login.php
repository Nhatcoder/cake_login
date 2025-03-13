<!-- src/Template/Users/login.ctp -->
<?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>
    <?= $this->Form->control('email', ['label' => 'Email']) ?>
    <?= $this->Form->control('password', ['label' => 'Password', 'type' => 'password']) ?>
    <?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
