<?php $__env->startSection('title','Welcome'); ?>;

<?php $__env->startSection('content'); ?>
<H1>Welcome to my applications</H1>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>