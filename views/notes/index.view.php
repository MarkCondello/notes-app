<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>All the notes</p>
    <ul>
    <?php foreach ($notes as $note): ?>
    <li>
      <a href="/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
      <?= htmlspecialchars($note['body']) ?>
      </a>
    </li>
    <?php endforeach ?>
    </ul>
    <p class="mt-5">
      <a href="/note/create" class="text-blue-500 hover:underline">Create a note</a>
    </p>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');