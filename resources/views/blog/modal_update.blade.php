<dialog id="modal-update" modal-disable
class="modal w-2/3 p-10 border rounded-lg border-black dark:border-white dark:bg-black dark:text-white">
    <div class="flex flex-row-reverse">
        <button id="close-modal" class="rounded-lg bg-red-500 text-white p-2 w-fit">Cancel</button>
    </div>
    <h1 class="text-6xl font-bold  pb-3 mb-5 border-b border-black dark:border-white">Update blog</h1>
    <form id="update-form" class="flex flex-col items-center">
        <div class="grid grid-cols-4 w-full">
            <p>Title</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="title" type="text" value="{{ old('title') ?  old('title') : $blog->title }}">
            <p>Image</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="image" type="file" value="{{ old('image') ?  old('image') : $blog->image  }}">
            <p>Epilog</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="epilog" type="text">{{ old('epilog') ? old('epilog') : $blog->epilog }}</textarea>
            <p>Content</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="containt" type="text">{{ old('containt') ? old('containt') : $blog->containt }}</textarea>
        </div>
        <button id="btn-blog-update" data-id="{{ $blog->id }}"
        class="rounded-lg bg-blue-500 text-white p-2 w-fit">Update</button>
        @csrf
    </form>

</dialog>