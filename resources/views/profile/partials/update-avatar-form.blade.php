<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Add an avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure to have a image with a size less than 1024mb
        </p>
    </header>

    <form method="POST"
          action="{{ route('user.updateAvatar') }}"
          enctype="multipart/form-data"
          class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-text-input id="avatar" name="img_avatar" type="file" class="mt-1 block w-full"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Upload</x-primary-button>
        </div>
    </form>
</section>
