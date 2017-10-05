
<div class="panel panel-default" style="margin-top: 30px;">
    <div class="panel-heading">
        <h1>
            <?= h($article->title) ?>
            <span class="pull-right"><?= $author ?></span>
        </h1>
    </div>
    <div class="panel-body">
        <div id="markdown"></div>
    </div>
</div>

<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>

<script>
    document.querySelector('#markdown').innerHTML = marked(<?= json_encode($article->body) ?>);
</script>
