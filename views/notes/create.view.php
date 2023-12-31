<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
      method="POST"
      action="/notes"
    >
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
          Note content
        </label>
        <textarea
          rows="10"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="body"
          name="body"
        ><?= $_POST['body'] ?? '' ?></textarea>
         <?php if (isset($errors['body'])): ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['body']; ?></p>
         <?php endif;
         ?>
      </div>
      <div class="flex items-center justify-between">
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
          Create note
        </button>
      </div>
    </form>
  </div>
</main>
<?php
require basePath('views/partials/foot.php');