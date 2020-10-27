<?php $__env->startSection('title','add stock'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-md-10 offset-md-1">        
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <p class="alert alert-danger"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php if(session('status')): ?>
        <p class="alert alert-success"><?php echo e(session('status')); ?></p>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h3>refill stock</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <select name="product_id" id="" class="form-control">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($data->id); ?>"> <?php echo e($data->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="role">Role Name :</label> -->
                        <input type="number" class="form-control" name="qty" value="<?php echo e(old('qty')); ?>">              
                    </div>                    
                    
                    <button type="submit" class="btn btn-success float-right">add</button>
                </form>
            </div>
        </div>
    </div>
</div>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>