<dialog id="modal-update"  modal-disable>
    <button class="close-modal">Cancel</button>
    <form class="update-form">
        @csrf
        <p>Title</p><input name="title" type="text" value="{{ old('title') ?  old('title') : $blog->title }}">
        <p>Image</p><input name="image" type="file" value="{{ old('image') ?  old('image') : $blog->image  }}">
        <p>Epilog</p><textarea name="epilog" type="text">{{ old('epilog') ? old('epilog') : $blog->epilog }}</textarea>
        <p>Content</p><textarea name="containt" type="text">{{ old('containt') ? old('containt') : $blog->containt }}</textarea>
        <br>
        <button class="btn btn-blog-update" data-id="{{$blog->id}}">Update</button>
    </form>

</dialog>