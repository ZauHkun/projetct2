<?php $__env->startSection('title','refill stock'); ?>

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

                    <h2>
                        <?php echo e($stock->product->name); ?>

                        <small> 
                            <?php echo e($stock->product->cat->name); ?> 
                            <?php echo e($stock->product->cat->form->name); ?> 
                        </small>
                    </h2>
                    
                    <div class="form-group">
                        <input name="product_id" value="<?php echo e($stock->id); ?>" type="hidden">
                        product quantity : <input class="form-control" type="number" name="qty" value="<?php echo e(old('qty')); ?>">
                    </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"> add</i></button>
                        <a href="<?php echo e(url('admin/stock')); ?>" class="btn btn-warning">back</a>
                </form>
            </div>
        </div>
    </div>
</div>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>