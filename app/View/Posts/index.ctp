<!-- File: /app/View/Posts/index.ctp -->

<h1>Zhiyuan's Page</h1>
<div id='Intro'>
    <div class='img'>
        <?php echo $this->Html->image('self.JPG', array('alt' => 'selfPhoto', 'width' => '300px', 'height' => '300px')); ?>
    </div>
    <div class='text'>
        <p> &nbsp; First Name: Zhiyuan</p>
        <p> &nbsp; Last Name: Guo</p>
        <p> &nbsp; Born Place: XinJiang, China</p>
        <p> &nbsp; College: Shanghai Jiao Tong University</p>
        <p> &nbsp; Graduate: Columbia University</p>
        <p> &nbsp; <?php echo $this->Html->link(
                    'Resume', array('action' => 'resume'));
                    ?>
        </p>
    </div>
    <div class='footer'>
    </div>

</div>


<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
