<?php
    $onDark = $onDark ?? false;
    $class = $class ?? '';
?>

<a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 <?php echo e($class); ?>">
    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-uid-teal to-uid-navy shadow-sm ring-2 <?php echo e($onDark ? 'ring-white/20' : 'ring-uid-navy/10'); ?>" aria-hidden="true">
        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 3c-1.5 3-4 5.5-4 9a4 4 0 108 0c0-3.5-2.5-6-4-9z"/>
        </svg>
    </span>
    <span class="text-xl font-bold tracking-tight <?php echo e($onDark ? 'text-white' : 'text-uid-navy'); ?>">UID</span>
</a>
<?php /**PATH C:\apps\uid\resources\views/site/partials/logo.blade.php ENDPATH**/ ?>