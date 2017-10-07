<legend><?= __('Edit User:') ?><em><?= $user->username ?></em></legend>

<?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
