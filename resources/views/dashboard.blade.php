<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dasboard
        </h2>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <video controls>
  <source src="DEMONSTRASI PENGGUNAAN WEBSITE.mp4" type="video/mp4">
  Browser Anda tidak mendukung tag video.
</video>
    </x-slot>


                <div class="text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
