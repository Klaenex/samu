"use strict";
import { sendForm, getResponse } from "./functions.js";

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

let eventSaved = document.querySelector("#event_saves");
if (eventSaved) {
  let url = "./functions/getEventSave.php";
  getResponse(url).then((data) => {
    let optionSave = document.createElement("option");
    optionSave.setAttribute("value", "0");
    optionSave.innerHTML = "Choisissez un événement";
    eventSaved.appendChild(optionSave);
    data.forEach((event) => {
      let option = document.createElement("option");
      option.setAttribute("value", event.id);
      option.innerHTML = event.name;
      eventSaved.appendChild(option);
    });

    eventSaved.addEventListener("change", function () {
      let idEvent = eventSaved.value;
      if (idEvent != 0) {
        let url = "./functions/getFormEventSave.php";
        getResponse(url, idEvent).then((data) => {
          let event = data.event;
          let img = data.eventImg;
          document.querySelector("#name_add_event").value = event.name;
          document.querySelector("#description_add_event").value =
            event.description;
          document.querySelector("#place_add_event").value = event.place;
          document.querySelector("#date_add_event").value = event.date;
          document.querySelector("#time_add_event").value = event.time;
          document.querySelector("#age_min_add_event").value = event.age_min;
          document.querySelector("#age_max_add_event").value = event.age_max;
          document.querySelector("#art_27_add_event").value = event.art_27;
          let saveCheckbox = document.querySelector("#save_event");
          saveCheckbox.setAttribute("disabled", "disabled");
          saveCheckbox.checked = false;
          let eventImg = document.querySelector("#img_preview_add_event");
          let route = "./images/events/" + img.img_name;
          eventImg.innerHTML = `<img class="img img-preview" src="${route}" alt="${img.img_name}" />`;
          let imgHidden = document.querySelector("#img_hidden_add_event");
          imgHidden.value = img.img_name;
        });
      } else {
        let addEvent = document.querySelector("#add_event");
        addEvent.reset();
        document.querySelector("#save_event").removeAttribute("disabled");
        document.querySelector("#img_preview_add_event").innerHTML = "";
      }
    });
  });
}

let eventImgPreview = document.querySelector("#img_add_event");
if (eventImgPreview) {
  eventImgPreview.addEventListener("change", function () {
    let file = eventImgPreview.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
      let imgPreview = document.querySelector("#img_preview_add_event");
      imgPreview.innerHTML = `<img class="img img-preview" src="${reader.result}" alt="${file.name}" />`;
    };
  });
}
