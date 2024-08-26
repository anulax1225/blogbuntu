<dialog id="modal-update"  modal-disable>
    <button class="close-modal">Cancel</button>
    <form class="update-form">
        @csrf
        <input name="name" type="text" required value="{{ $user->name }}">
        <button class="btn btn-user-update" data-id="{{$user->id}}">Update</button>
    </form>

</dialog>