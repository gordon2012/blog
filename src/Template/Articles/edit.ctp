<h1>Edit Article</h1>

<pre class="panel">
    <?php if(false) var_dump($categories->find('all')); ?>
</pre>

<?= $this->Form->create($article) ?>
    <?= $this->Form->control('category_id', ['options'=>$category_names, 'empty'=>'--Uncategorized--']); ?>
    <?= null//$this->Form->control('category_id'); ?>
    <?= $this->Form->control('title') ?>
    <?= $this->Form->control('body', ['rows'=>'3']) ?>
    <?= $this->Form->button(__('Save Article')) ?>
<?= $this->Form->end() ?>
