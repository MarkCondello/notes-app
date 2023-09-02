<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
      method="POST"
      action="/note"
    >
      <input type="hidden" name="_method" value="patch">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
          Note content
        </label>
        <textarea
          rows="10"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="body"
          name="body"
        ><?= $note['body'] ?? '' ?></textarea>
         <?php if (isset($errors['body'])): ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['body']; ?></p>
         <?php endif;
         ?>
      </div>
      <div class="flex items-center justify-between">
        <a
          href="/note?id=<?= $note['id'] ?>"
          class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >Back to note</a>
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
          Update note
        </button>
      </div>
    </form>

    <form class="mt-6" method="POST" action="/notes">
      <input type="hidden" name="_method" value="DELETE" />
      <input type="hidden" name="id" value="<?= $note['id'] ?>" />
      <button type="submit" class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');