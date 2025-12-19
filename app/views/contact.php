

<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-6 text-center">Contact Us</h2>

    <form method="post" action=""
          class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-4">

        <?php if (!empty($success)): ?>
            <p class="text-green-600 text-center font-semibold"><?=  $success; ?></p>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Your Name" 
               class="w-full border px-4 py-2 rounded-lg" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        <?php if (isset($errors["nameErr"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["nameErr"] ?></span>
        <?php endif;?>

        <input type="email" name="email" placeholder="Your Email" 
               class="w-full border px-4 py-2 rounded-lg" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php if (isset($errors["emailErr"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["emailErr"] ?></span>
        <?php endif;?>


        <textarea name="message" placeholder="Your Message" 
                  class="w-full border px-4 py-2 rounded-lg"></textarea>

          <?php if (isset($errors["messageError"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["messageError"] ?></span>
          <?php endif;?>

        <input type="submit" value="Send"
               class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-blue-700 cursor-pointer">
    </form>
</section>
