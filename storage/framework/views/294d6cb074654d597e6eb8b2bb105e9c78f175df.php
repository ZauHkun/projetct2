<?php $__env->startSection('title','Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-md-10 offset-md-1">        
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <p class="alert alert-danger"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <div class="card">
            <div class="card-header">
                <h3>User Login</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php echo e(csrf_field()); ?>                    
                    <div class="form-group">
                        <label for="email">Email :</label>                        
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>"  placeholder="Enter an email">              
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" name="password" id="password1" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fas fa-sign-in-alt"></i> login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>