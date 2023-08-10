<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php'; ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
      method="POST"
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
         ></textarea>
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
require 'partials/foot.php';