<legend><?= __('Users') ?></legend>

<ul>
    <?php foreach($users as $user): ?>
        <li><?= $this->Html->link($user->username, ['action'=>'view', $user->id]) ?></li>
    <?php endforeach; ?>
</ul>
