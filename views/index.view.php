<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php'; ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>Hello <?= $_SESSION['user']['email'] ?? 'guest' ?>, this is the Home page.</p>
  </div>
</main>
<?php
require 'partials/foot.php';