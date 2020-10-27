<?php $__env->startSection('title','invoice'); ?>

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
                <h3 style="text-align: center;">Business Name</h3>
                <h4>invoices</h4>
            </div>
            
            <div class="card-body">
            <div id="inv">                
                <div id="inv-my-address" class="row"> 
                    <div class="col-md-4 col-sm-4" style="text-align: left;">
                        <h6><?php echo e($sale->customer->name); ?></h6>
                        <h6><?php echo e($sale->customer->phone); ?>, <?php echo e($sale->customer->address); ?></h6>
                        
                    </div>
                    <div class="col-md-4 col-sm-4" >
                        <!-- Left a space between two divs -->
                    </div>
                    <div class="col-md-4 col-sm-4" style="text-align: right;">
                        <h6>Invoice No : <?php echo e($sale->inv_no); ?></h6>
                        <h6>Date : <?php echo e($sale->date); ?>		</h6>
                        
                    </div>
                </div>
                
                
                <div>
                    <table class="table table-hover">
                        <tr>
                            <thead class="bg-secondary" style="text-align: center;">
                                <th width="10">No</th>                                
                                <th width="40%">Contents</th>
                                <th>Qty</th>
                                <th>Foc</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </thead>
                        </tr>			
                        <tbody class="inv-row">
                        <?php $__env->startSection('someSection'); ?>
                            <?php echo e($counter = 1); ?>

                        <?php $__env->stopSection(); ?>

                        <?php $__currentLoopData = $sale->sale_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td width="10" style="text-align: right;padding-right: 15px;"><?php echo e($counter); ?></td>                            
                            <td width="40%" style="text-align: center;"><?php echo e($data->product->name); ?></td>
                            <td style="text-align: center;"><?php echo e($data->qty); ?></td>
                            <td style="text-align: center;"><?php echo e($data->foc); ?></td>
                            <td style="text-align: center;"><?php echo e($data->product->price); ?></td>
                            <td style="text-align: center;"><?php echo e($data->amount); ?></td>
                        </tr>
                        <?php $__env->startSection('someSection'); ?>
                            <?php echo e($counter ++); ?>

                        <?php $__env->stopSection(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php for($i=$counter; $i < 10 ; $i++): ?>                     
                        <tr>
                            <td width="10" style="text-align: right;padding-right: 15px;">
                            
                            </td>                            
                            <td width="40%"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endfor; ?>
                        <tr  >
                            <td style="border-bottom: 3px solid #fff;border-left: 3px solid #fff;" rowspan="4" colspan="4" >
                                <div class="row">
                                    <div class="col-md-6 col-sm-6" style="text-align: center; margin-top: 80px;">
                                        Customer
                                    </div>
                                    <div class="col-md-6 col-sm-6" style="text-align: center; margin-top: 80px;">Inspector
                                    </div>                                    
                                </div>
                            </td>
                            <td class="border-hide">Subtotal :</td>
                            <td style="text-align: center;" height="15">
                            <?php echo e($sale->total_amount); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="border-hide">Discount :</td>
                            <td style="text-align: center;">
                            	<?php echo e($sale->total_discount); ?>

                            </td>
                        </tr>
                       
                        <tr>
                            <td class="border-hide">Total :</td>
                            <td style="text-align: center;">
                               <?php echo e($sale->total_amount - $sale->total_discount); ?>

                            </td>
                        </tr>
                        </tbody>
                        
                    </table>		
                </div>                
            </div>
        </div>
        </div>
    </div>
</div>    <br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>