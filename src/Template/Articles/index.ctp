<div class="article-fc">
    <?php foreach($articles as $article): ?>
        <div class="article-fi">
            <div class="article panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <?= $this->Html->link($article->title, ['action'=>'view', $article->id]) ?>
                        <?= $this->Html->tag('i', $this->Html->link('', ['action'=>'edit',$article->id], ['class'=>'fa fa-pencil pull-right'])) ?>
                    </h4>
                </div>

                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
                        <img src="http://placehold.it/1000x500" alt="" style="width: 100%;">
                    </div>
                </div>

                <div class="panel-body">
                    <h6 class="span-wrap">
                        <?= $this->Time->nice($article->created) ?>
                        <span class="span-right"><?= $authors[$article->user_id]['first_name'] . ' ' . $authors[$article->user_id]['last_name'] ?></span>
                    </h6>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->Html->link('Add Article', ['action'=>'add']) ?>
