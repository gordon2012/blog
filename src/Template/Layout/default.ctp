<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('marked-0.3.6.min.js') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <header class="flex-c">
        <div class="flex-i">
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
        </div>
    </header>

    <?= $this->Flash->render() ?>
    <main class="flex-c">
        <div class="flex-i">
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="flex-c">
        <div class="flex-i">
            Copyright <?= date('Y') ?> Gordon Doskas
        </div>
    </footer>



</body>
</html>
