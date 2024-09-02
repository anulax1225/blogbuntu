import { darkMode } from "./commun"


if (localStorage.getItem("darkMode") && localStorage.getItem("darkMode") === "yes") {
    darkMode(true);
} else {
    darkMode(false);
}