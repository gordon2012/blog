<h1>Blog articles</h1>

<?= $this->Html->link('Add Article', ['action'=>'add']) ?>

<br>

<?php foreach($articles as $article): ?>
    <div class="col-sm-6 col-md-4 col-lg-3" style="padding: 5px 15px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?= $article->title ?></h4>
            </div>

            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
                    <img src="http://placehold.it/200x100" alt="" style="width: 100%;">
                </div>
            </div>

            <div class="panel-body">
                <h6 class="span-wrap">
                    <?= $this->Time->nice($article->created) ?>
                    <span class="span-right"><?= $authors[$article->user_id] ?></span>
                </h6>
            </div>
        </div>
    </div>
<?php endforeach; ?>
