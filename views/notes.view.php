<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php'; ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>All the notes</p>
    <ul>
    <?php foreach ($notes as $note): ?>
    <li>
      <a href="/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
      <?= $note['body'] ?>
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
require 'partials/foot.php';