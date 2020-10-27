<?php $__env->startSection('title','Sale records'); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Sale List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>Invoice</th>
                        <th>Customer</th>                        
                        <th>Product</th>
                        <th>Amount</th>  
                        <th>Date</th>                      
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                       <tr>                       
                           <td>
                               <a href="<?php echo e(action('admin\SaleController@invoice',$data->id)); ?>">
                                    <?php echo e($data->inv_no); ?>

                               </a>
                            </td>

                           <td><?php echo e($data->customer->name); ?></td>
                           <td>
                               <?php $__currentLoopData = $data->sale_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <small>
                                        <?php echo e($data1->product->name); ?>,
                                    </small>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                           </td>
                           <td><?php echo e($data->total_amount-$data->total_discount); ?></td>                              
                           <td><?php echo e($data->date); ?></td>                    
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