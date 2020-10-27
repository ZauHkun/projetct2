<?php $__env->startSection('title','stock'); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Stock Balance</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Balance</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($data->id); ?></td>
                            <td><?php echo e($data->product->name); ?></td>
                            <td><?php echo e($data->balance); ?></td>
                            <td>
                                <a href="<?php echo e(action('admin\StockController@refill',$data->id)); ?>" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> refill</a>
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