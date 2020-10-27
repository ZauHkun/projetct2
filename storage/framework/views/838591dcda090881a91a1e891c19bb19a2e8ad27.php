<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?> ">Project 3</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
            </ul>            
            
            <ul class="navbar-nav">   
                <?php if(Auth::check()): ?>                                       
                    <?php if(Auth::user()->hasRole('manager')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('admin/panel')); ?>">
                                <i class="fas fa-cogs" title="tools"></i>                            
                            </a>
                        </li>   
                    <?php endif; ?>  
                <?php endif; ?>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if(Auth::check()): ?>
                            <?php echo e(Auth::user()->name); ?>

                        <?php else: ?>
                            action
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if(Auth::check()): ?>
                            <a class="dropdown-item" href="<?php echo e(url('logout')); ?>">
                                <i class="fas fa-users-cog"></i> options
                            </a>
                            <a class="dropdown-item" href="<?php echo e(url('logout')); ?>">
                               <i class="fas fa-sign-out-alt"></i> logout
                            </a>
                        <?php else: ?>
                        <a class="dropdown-item" href="<?php echo e(url('login')); ?>">
                            <i class="fas fa-sign-in-alt"></i> login
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=" <?php echo e(url('register')); ?> ">
                            <i class="fas fa-user-plus"></i> register
                        </a>
                        <?php endif; ?>                    
                    </div>
                </li>            
            </ul>
        </div>
    </div>
</nav>
