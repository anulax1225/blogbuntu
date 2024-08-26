import './bootstrap';
window.addEventListener("DOMContentLoaded", () => {
    let modal = document.querySelector('#modal-update');
    let openModalBtn = document.querySelector("#open-modal");
    let closeModalBtn = document.querySelector(".close-modal");
    let deleteBlogBtn = document.querySelector(".btn-blog-delete");
    let updateBlogBtn = document.querySelector(".btn-blog-update");
    let likeBtn = document.querySelector(".btn-like");
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
            //else window.location.href = "/profile/" + id;
        });
    });

    likeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        fetch(`/blog/like/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-Token": token
            }
        }).then((res) => {
            if (res.status === 400) alert("Blog already liked");
            else window.location.href = "/blog/" + id;
        });
    });
    
    openModalBtn.addEventListener("click", (e) => {
        modal.showModal();
    });
    
    closeModalBtn.addEventListener("click", (e) => {
        modal.close();
    });

    updateBlogBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        let form = document.querySelector('.update-form');
        let formData = new FormData(form);
        fetch(`/blog/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-Token": token
            },
            body: formData
        }).then((res) => {
            window.location.href = "/blog/" + id;
        });
    });
    
    deleteBlogBtn.addEventListener("click", (e) => {
        e.preventDefault();
        let id = e.target.getAttribute("data-id");
        let token = document.querySelector('input[name=_token]').value;
        fetch(`/blog/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-Token": token
            }
        }).then((res) => {
            window.location.href = "/blogs"
        });
    });
})