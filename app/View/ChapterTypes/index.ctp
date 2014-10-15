<div class="well-lg">
    <h2>Danh mục loại kỹ năng</h2>
    <div class="col-md-6 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $this->Paginator->sort('name', 'Tên loại'); ?></th>
                    <th><?php echo $this->Paginator->sort('description', 'Miêu tả'); ?></th>
                    <th class="actions">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>

                <?php foreach ($chapterTypes as $chapterType): ?>
                    <tr>
                        <td><?php echo $stt++; ?>&nbsp;</td>
                        <td><?php echo h($chapterType['ChapterType']['name']); ?>&nbsp;</td>
                        <td><?php echo h($chapterType['ChapterType']['description']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link("<i class='fa fa-pencil-square-o'></i>", array('action' => 'edit', $chapterType['ChapterType']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "left", 'title' => "sửa")); ?>
                            <?php echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('action' => 'delete', $chapterType['ChapterType']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "left", 'title' => "xóa"), __('Are you sure you want to delete # %s?', $chapterType['ChapterType']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $this->element('pagination'); ?>
    </div>


</div>
