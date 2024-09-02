import './bootstrap';
import { addEvent } from "./commun"

window.addEventListener("DOMContentLoaded", () => {
    let modal = document.querySelector('#modal-update');
    let openModalBtn = document.querySelector("#open-modal");
    let closeModalBtn = document.querySelector("#close-modal");
    let deleteBlogBtn = document.querySelector("#btn-blog-delete");
    let updateBlogBtn = document.querySelector("#btn-blog-update");
    let likeBtn = document.querySelector("#btn-like");
    let followBtn = document.querySelector("#btn-follow");

    addEvent(followBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            let id = e.target.getAttribute("data-id");
            let token = document.querySelector('input[name=_token]').value;
            fetch(`/follow/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-Token": token
                },
            }).then(response => {
                if (response.redirected) {
                  window.location.href = response.url; 
                  return;
                }
              });
        });
    });

    addEvent(likeBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            let id = e.target.getAttribute("data-id");
            let token = document.querySelector('input[name=_token]').value;
            fetch(`/blog/like/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-Token": token
                },
            }).then(response => {
                if (response.redirected) {
                  window.location.href = response.url; 
                }
              });
        });
    });

    addEvent(openModalBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            modal.showModal();
        });
    });
    
    addEvent(closeModalBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            modal.close();
        });
    });

    addEvent(updateBlogBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            let id = e.target.getAttribute("data-id");
            let token = document.querySelector('input[name=_token]').value;
            let form = document.querySelector('#update-form');
            let formData = new FormData(form);
            fetch(`/blog/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-Token": token
                },
                body: formData,
            }).then(response => {
                if (response.redirected) {
                  window.location.href = response.url; 
                }
              });
        });
    });

    addEvent(deleteBlogBtn, (btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            let id = e.target.getAttribute("data-id");
            let token = document.querySelector('input[name=_token]').value;
            fetch(`/blog/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-Token": token
                },
            }).then(response => {
                if (response.redirected) {
                  window.location.href = response.url; 
                }
              });
        });
    });
})