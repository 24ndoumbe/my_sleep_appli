<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menu> $menus
 */
?>

<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .users.index.content {
            margin: 20px;
        }

        .button {
            background-color: #4d90fe;
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #3b7ad7;
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            color: #333;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            margin-right: 8px;
            color: #4d90fe;
            text-decoration: none;
            padding: 6px 12px;
            border: 1px solid #4d90fe;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #4d90fe;
            color: white;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
            list-style-type: none;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            padding: 8px 16px;
            color: #4d90fe;
            border: 1px solid #4d90fe;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #4d90fe;
            color: white;
        }

        .pagination .active a {
            background-color: #4d90fe;
            color: white;
        }

        .pagination .disabled a {
            color: #ccc;
            border-color: #ccc;
            pointer-events: none;
        }
    </style>
<div class="menus index content">
    <?= $this->Html->link(__('New Menu'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Menus') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ordre') ?></th>
                    <th><?= $this->Paginator->sort('intitule') ?></th>
                    <th><?= $this->Paginator->sort('lien') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu): ?>
                <tr>
                    <td><?= $this->Number->format($menu->id) ?></td>
                    <td><?= $this->Number->format($menu->ordre) ?></td>
                    <td><?= h($menu->intitule) ?></td>
                    <td><?= h($menu->lien) ?></td>
                    <td><?= h($menu->created) ?></td>
                    <td><?= h($menu->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>