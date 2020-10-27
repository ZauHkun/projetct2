<?php $__env->startSection('title','Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <div class="col-md-10 offset-md-1">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <p class="alert alert-danger"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php if(session('status')): ?>
            <p class="alert alert-success"><?php echo e(session('status')); ?></p>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h3>Edit User's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" disabled style="cursor: not-allowed;" class="form-control" value="<?php echo e($user->name); ?>" name="name" id="name" >              
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" disabled style="cursor: not-allowed;" class="form-control" name="email" value="<?php echo e($user->email); ?>" id="email">
                    </div>

                    <div class="form-group">
                        Roles:
                        <select name="role[]" multiple class="form-control">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                            <option value="<?php echo e($data->name); ?>"
                                <?php if(in_array($data->name,$selectedRole)): ?>
                                    selected="selected"
                                <?php endif; ?>
                            ><?php echo e($data->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="<?php echo e(url('admin/user')); ?>" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>