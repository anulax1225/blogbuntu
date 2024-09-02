<dialog class="modal w-2/3 p-10 border rounded-lg border-black dark:border-white dark:bg-black dark:text-white"
id="modal-update"  modal-disable>
    <div class="flex flex-row-reverse">
        <button id="close-modal" class="rounded-lg bg-red-500 text-white p-2 w-fit">Cancel</button>
    </div>
    <h1 class="text-6xl font-bold  pb-3 mb-5 border-b border-black dark:border-white">Update user info</h1>
    <form id="update-form" class="flex flex-col items-center" >
        <div class="grid grid-cols-4 w-full">
            <p>Username :</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="username" type="text" value="{{ old('username') ? old('username') : $user->username }}">
            <p>Name (Optional):</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="name" type="text" value="{{ old('name') ? old('name') : $user->name }}">
            <p>Image</p><input class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse" 
            name="image" type="file" value="{{ old('image') ?  old('image') : $user->image  }}">
            <p>Description (Optional):</p><textarea class="border border-gray-300 rounded-lg col-span-3 mb-5 p-2 dark:bg-black focus:animate-pulse"
            name="description" type="text">{{ old('description') ? old('description') : $user->description }}</textarea>
        </div>
        @csrf
        <button id="btn-user-update" data-id="{{$user->id}}" class="rounded-lg bg-blue-500 text-white p-2 w-fit">Send</button>
    </form>
</dialog>