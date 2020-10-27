<?php $__env->startSection('title','products'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-10 offset-md-1">
    <div class="card">
        <div class="card-header">
            Product list
        </div>
        <div class="card-body">
            <table id="data_table" class="table table-borderless">
                <thead>
                    <th>name</th>
                    <th>package</th>
                    <th>price</th>
                    <th>foc</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($data->name); ?></td>
                        <td><?php echo e($data->package->name); ?></td>
                        <td><?php echo e($data->price); ?></td>
                        <td><?php echo e($data->foc->name); ?></td>
                        <td> 
                            <a class="btn btn-sm btn-success" href="<?php echo e(action('admin\ProductController@edit',$data->id)); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>