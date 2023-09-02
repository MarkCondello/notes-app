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
    <footer class="pt-5 flex items-center justify-start">
      <a
        href="/note/edit?id=<?= $note['id'] ?>"
        class="text-sm text-blue-500 border border-current p-4 pt-2 pb-2 rounded mr-4"
      >Edit</a>
      <form  method="POST" action="/note">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="hidden" name="id" value="<?= $note['id'] ?>" />
        <button type="submit"
          class="text-sm text-red-500 border border-current p-4 pt-2 pb-2 rounded"

        >Delete</button>
      </form>
    </footer>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');