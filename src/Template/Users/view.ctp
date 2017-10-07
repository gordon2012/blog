<legend><?= __('User:') ?><em><?= $user->username ?></em></legend>

<h3><?= $user->username ?></h3>
<p><?= "$user->first_name $user->last_name" ?></p>

<?= $this->Html->link('Edit', ['action'=>'edit', $user->id]) ?>
