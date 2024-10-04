

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php $__sessionArgs = ['status'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Vehicle List
                            <a href="<?php echo e(url('vehicle/create')); ?>" class="btn btn-primary float-end">Add Vehicle</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>VIN</th>
                                    <th>Registration Number</th>
                                    <th>Capacity</th>
                                    <th>Current Status</th>
                                    <th>Maintenance Schedule</th>
                                    <th>Insurance Info</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $vehicle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($vehicles->id); ?></td>
                                        <td><?php echo e($vehicles->make); ?></td>
                                        <td><?php echo e($vehicles->model); ?></td>
                                        <td><?php echo e($vehicles->year); ?></td>
                                        <td><?php echo e($vehicles->vin); ?></td>
                                        <td><?php echo e($vehicles->registration_number); ?></td>
                                        <td><?php echo e($vehicles->capacity); ?></td>
                                        <td><?php echo e($vehicles->current_status); ?></td>
                                        <td><?php echo e($vehicles->maintenance_schedule || 'N/A'); ?></td>
                                        <td><?php echo e($vehicles->insurance_info || 'N/A'); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('vehicle.edit', $vehicles->id)); ?>"
                                                class="btn btn-success">Edit</a>
                                            <a href="<?php echo e(route('vehicle.show', $vehicles->id)); ?>"
                                                class="btn btn-info">Show</a>

                                            <form action="<?php echo e(route('vehicle.destroy', $vehicles->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\beabi\crud_laravel\resources\views/fleet/vehicle/index.blade.php ENDPATH**/ ?>