<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                <div class="sm:w-1/2 mb-10 px-4">
                  <div class="rounded-lg h-64 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1201x501">
                  </div>
                  <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Buyer</h2>
                  <p class="leading-relaxed text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, tempore repellat veniam obcaecati atque recusandae exercitationem similique, aperiam voluptas minima aspernatur magnam quod quibusdam porro nisi suscipit. Nemo, quidem similique?</p>
                  <a href="/register?buyer" class="block mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Be a Buyer</a>
                </div>
                <div class="sm:w-1/2 mb-10 px-4">
                  <div class="rounded-lg h-64 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1202x502">
                  </div>
                  <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Seller</h2>
                  <p class="leading-relaxed text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, tempore repellat veniam obcaecati atque recusandae exercitationem similique, aperiam voluptas minima aspernatur magnam quod quibusdam porro nisi suscipit. Nemo, quidem similique?</p>
                  <a href="/register?seller" class="block mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Be a Seller</a>
                </div>
              </div>
            </div>
          </section>
    </body>
</html>

