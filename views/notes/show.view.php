<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-5">
      <a href="/notes" class="text-blue-500 underline">Go back</a>
    </p>
    <p><?= htmlspecialchars($note['body']) ?></p>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');