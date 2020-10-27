<?php $__env->startSection('title','Categories'); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Category List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ပုံစံ</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($data->id); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->form->name); ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?php echo e(action('admin\CategoryController@edit',$data->id)); ?>">
                                    edit
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>