"use strict";
import { sendForm } from "./functions.js";

let menu = document.querySelector(".button_burger");
menu.addEventListener("click", function () {
  let nav = document.querySelector(".nav");
  nav.classList.toggle("nav-on");
  let burger = document.querySelector(".burger");
  burger.classList.toggle("burger-on");
});

// sendForm
document.addEventListener("submit", function (e) {
  e.preventDefault();
  let formData = e.target.getAttribute("data-form");
  switch (formData) {
    case "login_residents":
      let loginResidents = document.querySelector("#login_residents");
      let url = "./functions/loginResidents.php";
      sendForm(loginResidents, url).then((data) => {
        if (data.success) {
          window.location.href = "./index.php";
        } else {
          console.log(data.error);
        }
      });
      break;
    case "add_resident":
      let addResident = document.querySelector("#add_resident");
      let urlAddResident = "./functions/addResident.php";
      sendForm(addResident, urlAddResident).then((data) => {
        if (data.success) {
          console.log(data.success);
        } else {
          console.log(data.error);
        }
      });
      break;
    case "add_event":
      let addEvent = document.querySelector("#add_event");
      let urlAddEvent = "./functions/addEvent.php";
      sendForm(addEvent, urlAddEvent).then((data) => {
        if (data.success) {
          console.log(data.success);
        } else {
          console.log(data.error);
        }
      });
      break;
  }
});

// disconnect
let logout = document.querySelector(".button_logout");
if (logout) {
  logout.addEventListener("click", function () {
    fetch("./functions/logout.php").then(() => {
      window.location.href = "./index.php";
    });
  });
}
