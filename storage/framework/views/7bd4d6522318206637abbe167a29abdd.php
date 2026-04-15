<?php $__env->startSection('title', 'İletişim — UID Bosna Hersek'); ?>

<?php $__env->startSection('content'); ?>

<div class="relative h-[300px] w-full overflow-hidden bg-uid-navy md:h-[400px]">
    <img src="<?php echo e(asset('images/contact-banner.png')); ?>" alt="İletişim" class="h-full w-full object-cover opacity-60">
    <div class="absolute inset-0 flex items-center">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <div class="flex items-center gap-6 border-l-[6px] border-white pl-6">
                <h1 class="text-4xl font-bold uppercase tracking-wider text-white md:text-6xl">iletişim</h1>
            </div>
        </div>
    </div>
</div>


<div class="bg-white py-16 md:py-24">
    <div class="mx-auto max-w-2xl px-4 md:px-8">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="mb-8 rounded-lg bg-green-50 p-4 text-green-800 border border-green-100">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="mb-8 rounded-lg bg-red-50 p-4 text-red-800 border border-red-100">
                <ul class="list-disc pl-5 text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <li><?php echo e($error); ?></li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Ad Soyad</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Ad Soyad" required
                       class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue">
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-700">E-Mail</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="E-Mail" required
                       class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue">
            </div>

            <div>
                <label for="note" class="mb-2 block text-sm font-medium text-slate-700">Not</label>
                <textarea name="note" id="note" rows="5" placeholder="Not" required
                          class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue"><?php echo e(old('note')); ?></textarea>
            </div>

            <button type="submit" class="w-full rounded bg-uid-navy py-4 font-bold tracking-wide text-white transition hover:bg-uid-navy/90">
                Gönder
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\apps\uid\resources\views/site/pages/contact.blade.php ENDPATH**/ ?>