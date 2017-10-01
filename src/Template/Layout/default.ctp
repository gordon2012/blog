<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <span class="brand">Gordon Doskas</span>
        <nav><ul>
            <?= $this->Html->link('Blog', ['controller'=>'articles', 'action'=>'index']) ?>
        </ul></nav>
        <span class="pull-right">
            <?php if(is_null($this->request->session()->read('Auth.User.username'))): ?>
                <?= $this->Html->link('Login', ['controller'=>'users', 'action'=>'login']) ?>
            <?php else: ?>
                <span class="user"><?= $this->request->session()->read('Auth.User.username') ?></span>
                <?= $this->Html->link('Logout', ['controller'=>'users', 'action'=>'logout']) ?>
            <?php endif; ?>
        </span>
    </header>

    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
    <footer>
        Copyright <?= date('Y') ?> Gordon Doskas
    </footer>
</body>
</html>
