<?php $__env->startSection('title','Edit Product'); ?>
<?php $__env->startSection('content'); ?>
<div class="container"><br>
    <div class="col-md-10 offset-md-1">
        
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <p class="alert alert-danger"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php if(session('status')): ?>
        <p class="alert alert-success"><?php echo e(session('status')); ?></p>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                Edit product
            </div>
            <div class="card-body">
                <form method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Product Name :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="text" class="form-control" name="product_name" value="<?php echo e($product->name); ?>">
                        </div>                                               
                    </div>      
                    <br>              
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Category Name :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="cat_id" class="form-control">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"
                                    <?php if($product->cat_id == $data->id): ?>    
                                    selected="selected"
                                    <?php endif; ?>
                                    > <?php echo e($data->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Price (mmk) :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="number" class="form-control" name="price" value="<?php echo e($product->price); ?>">
                        </div>                                               
                    </div>      
                    <br>             
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Package Size :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="package_id" class="form-control">
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" 
                                    <?php if($product->package_id == $data->id): ?>    
                                    selected="selected"
                                    <?php endif; ?>    
                                    > <?php echo e($data->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Foc rate :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="foc_id" class="form-control">
                                <?php $__currentLoopData = $focs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" 
                                    <?php if($product->foc_id == $data->id): ?>    
                                    selected="selected"
                                    <?php endif; ?>    
                                    > <?php echo e($data->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Description :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <textarea name="descripion" class="form-control" cols="30" rows="1"><?php echo e($product->descriptino); ?> </textarea>
                        </div>                                               
                    </div>                               
                    <br>
                    <!-- <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Photo :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="file" name="photo" >
                        </div>                                               
                    </div>           
                    <br> -->
                    <button type="submit" class="btn btn-success float-right">Save</button>
                </form>
            </div>
        </div><br>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>