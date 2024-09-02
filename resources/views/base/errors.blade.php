<div class="w-full flex flex-col items-center fixed mt-5">
        @foreach($errors->all() as $key => $error)
                <p class="w-1/4  text-center bg-red-600 rounded-lg border-[7px] border-red-300 py-2 px-1 text-2xl mb-3">{{ $error }}</p>
        @endforeach
</div>