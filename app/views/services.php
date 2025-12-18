<?php require_once 'data/services.php'?>

<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Nos Services</h2>

    <div class="grid md:grid-cols-3 gap-8">
        <?php foreach ($services as $title => $description): ?>
            <div class="service-item">
                <div class="bg-white p-6 shadow-md rounded-lg">
                    <h3 class="text-xl font-bold mb-2"><?php echo $title; ?></h3>
                    <p class="text-gray-600"><?php echo $description; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
