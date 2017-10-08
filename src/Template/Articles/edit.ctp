<?= $this->Form->create($article, ['class'=>'form-horizontal']) ?>
    <div class="panel panel-default" style="margin-top: 30px;">
        <div class="panel-body">

            <div class="form-group">
                <label for="title" class="col-sm-2 col-sm-offset-0 control-label text-right">Title</label>
                <div class="col-sm-9">
                    <?= $this->Form->control('title', ['label'=>false, 'class'=>'form-control']) ?>
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="col-sm-2 col-sm-offset-0 control-label text-right">Category</label>
                <div class="col-sm-9">
                    <?= $this->Form->select('category_id', $category_names, ['empty'=>'--Uncategorized--', 'class'=>'form-control']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="bodyx" class="control-label" style="padding: 0 0 5px 15px;">Body</label>
        <div class="col-xs-12">
            <?= $this->Form->control('body', ['rows'=>'15', 'label'=>false, 'class'=>'form-control']) ?>
        </div>
    </div>

    <?= $this->Form->button(__('Save'), ['class'=>'btn btn-lg btn-success']) ?>
<?= $this->Form->end() ?>
