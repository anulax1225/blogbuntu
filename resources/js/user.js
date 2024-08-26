import './bootstrap';

window.addEventListener("DOMContentLoaded", () => {
    let modal = document.querySelector('#modal-update');
    let openModalBtn = document.querySelector("#open-modal");
    let closeModalBtn = document.querySelector(".close-modal");
    let deleteUserBtn = document.querySelector(".btn-user-delete");
    let updateUserBtn = document.querySelector(".btn-user-update");
    let followBtn = document.querySelector(".btn-follow");

    followBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        fetch(`/follow/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-Token": token
            }
        }).then((res) => {
            if (res.status === 400) alert("Couldn't follow this user");
            //else if (res.status === 200) window.location.href = "/profile/" + id;
        });
    });
    
    openModalBtn.addEventListener("click", (e) => {
        modal.showModal();
    });
    
    closeModalBtn.addEventListener("click", (e) => {
        modal.close();
    });

    updateUserBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        let form = document.querySelector('.update-form');
        let formData = new FormData(form);
        fetch(`/user/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-Token": token
            },
            body: formData
        }).then((res) => {
            window.location.href = "/profile/" + id;
        });
    });
    
    deleteUserBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        fetch(`/user/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-Token": token
            }
        }).then((res) => {
            window.location.href = "/"
        });
    });
})