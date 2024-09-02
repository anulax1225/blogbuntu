export function addEvent(btn, func) {
    if(btn) func(btn);
}

export function darkMode(state) {
    let page = document.querySelector("html");
    if (state && !page.classList.contains("dark")) {
        page.classList.add("dark");
        localStorage.setItem("darkMode", "yes");
    } else {
        localStorage.setItem("darkMode", "no");
        page.classList.remove("dark");
    }
}