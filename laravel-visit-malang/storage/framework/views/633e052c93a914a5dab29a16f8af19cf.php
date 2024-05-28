<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<body>
    <h1>Login as <?php echo e(ucfirst($role)); ?></h1>
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="role" value="<?php echo e($role); ?>">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
    <?php if($role == 'visitor'): ?>
        <p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Register here</a></p>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\adnan\Documents\Programming\HTML\VisitMalang\laravel-visit-malang\resources\views/auth/login.blade.php ENDPATH**/ ?>