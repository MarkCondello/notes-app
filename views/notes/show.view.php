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
    <p><?= '/note' ?></p>
    <!-- <form> -->
    <form method="POST" action="/note">
      <input type="hidden" name="_method" value="DELETE" />
      <input type="hidden" name="id" value="<?= $note['id'] ?>" />
      <button type="submit" class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');