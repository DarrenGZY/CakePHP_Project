<!-- File: /app/View/Photos/index.ctp -->

<h1 id='PhotosHead'>Zhiyuan's Page</h1>

<body id='Photos'>
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


<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $photos array, printing out photo info -->

    <?php foreach ($photos as $photo): ?>
    <tr>
        <td><?php echo $photo['Photo']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $photo['Photo']['title'],
                    array('action' => 'view', $photo['Photo']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $photo['Photo']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $photo['Photo']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $photo['Photo']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p><?php echo $this->Html->link('Add Photo', array('action' => 'add')); ?></p>
</body>   
