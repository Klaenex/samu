"use strict";
import { sendForm, getResponse } from "./functions.js";

let menu = document.querySelector(".button_burger");
menu.addEventListener("click", function () {
  let nav = document.querySelector(".nav");
  nav.classList.toggle("nav-on");
  let burger = document.querySelector(".burger");
  burger.classList.toggle("burger-on");
  let page = document.querySelectorAll(".page");
  page.forEach(function (item) {
    if (item.classList.contains("page-on")) {
      item.classList.remove("page-on");
    }
  });
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
    case "modify_resident":
      let modifyResident = document.querySelector("#modify_resident");
      let urlModifyResident = "./functions/modifyResident.php";
      sendForm(modifyResident, urlModifyResident).then((data) => {
        if (data.success) {
          console.log(data.success);
        } else {
          console.log(data.error);
        }
      });
      break;
    case "modify_event":
      let modifyEvent = document.querySelector("#modify_event");
      let urlModifyEvent = "./functions/modifyEvent.php";
      sendForm(modifyEvent, urlModifyEvent).then((data) => {
        if (data.success) {
          console.log(data.success);
        } else {
          console.log(data.error);
        }
      });
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
      console.log(eventSaved.value);
      let idEvent = `id=${eventSaved.value}`;

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

let listEvent = document.querySelector("#list_event");
if (listEvent) {
  let url = "./functions/getEventByCenter.php";
  getResponse(url).then((data) => {
    data.events.forEach((event) => {
      let eventLi = document.createElement("li");
      eventLi.classList.add("wrapper");
      eventLi.classList.add("wrapper_list-event");
      eventLi.setAttribute("data-event-name", event.name);
      eventLi.innerHTML = `
      <div class="list_event-name" data-id="${event.id}">${event.name}</div>
      <div>
        <button class="button button_modify-event" data-id="${event.id}">Modifier</button>
      </div>`;
      listEvent.appendChild(eventLi);
    });
    let button = document.querySelectorAll(".button_modify-event");
    button.forEach((button) => {
      button.addEventListener("click", function () {
        let idEvent = button.getAttribute("data-id");
        id = `id=${idEvent}`;
        let url = "./functions/getEventById.php";
        getResponse(url, id).then((data) => {});
      });
    });
  });
}

let searchEvent = document.querySelector("#list_event-search");
if (searchEvent) {
  searchEvent.addEventListener("keyup", function () {
    let searchValue = searchEvent.value.toLowerCase();
    let listEvent = document.querySelectorAll(".wrapper_list-event");
    listEvent.forEach((event) => {
      let name = event.getAttribute("data-event-name").toLowerCase();
      if (!name.includes(searchValue)) {
        event.style.display = "none";
      } else {
        event.style.display = "flex";
      }
    });
  });
}

let listResidents = document.querySelector("#list_resident");
if (listResidents) {
  let url = "./functions/getResidentByCenter.php";
  getResponse(url).then((data) => {
    data.users.forEach((user) => {
      let userLi = document.createElement("li");
      userLi.classList.add("wrapper");
      userLi.classList.add("wrapper_list-resident");
      userLi.setAttribute("data-user-name", user.name + " " + user.first_name);
      userLi.innerHTML = `
      <div class="list_resident-name" data-id="${user.id}">${user.name} ${user.first_name}</div>
      <div>
        <button class="button button_modify-resident link-page" data-id="${user.id}" data-page="modify_resident">Modifier</button>
      </div>`;
      listResidents.appendChild(userLi);
    });

    //MODIFY RESIDENT
    let button = document.querySelectorAll(".button_modify-resident");
    button.forEach((button) => {
      button.addEventListener("click", function () {
        let id = this.getAttribute("data-id");
        id = `id=${id}`;
        let url = "./functions/getResidentById.php";
        getResponse(url, id).then((data) => {
          let user = data.user;
          document.querySelector("#id_hidden_modify_resident").value = user.id;
          document.querySelector("#email_modify_resident").value = user.email;
          document.querySelector("#name_modify_resident").value = user.name;
          document.querySelector("#firstname_modify_resident").value =
            user.first_name;
          document.querySelector("#nationality_modify_resident").value =
            user.nationality;
          document.querySelector("#dob_modify_resident").value =
            user.date_of_birth;
          document.querySelector("#gender_modify_resident").value = user.gender;
          document.querySelector("#stib_modify_resident").value = user.stib;
        });
      });
    });
  });
}

let searchResident = document.querySelector("#list_resident-search");
if (searchResident) {
  searchResident.addEventListener("keyup", function () {
    let searchValue = searchResident.value.toLowerCase();

    let listResident = document.querySelectorAll(".wrapper_list-resident");
    listResident.forEach((resident) => {
      let name = resident.getAttribute("data-user-name").toLowerCase();
      if (!name.includes(searchValue)) {
        resident.style.display = "none";
      } else {
        resident.style.display = "flex";
      }
    });
  });
}

document.addEventListener("click", function () {
  const linkPage = document.querySelectorAll(".link-page");
  linkPage.forEach(function (link) {
    link.addEventListener("click", function () {
      let dataPage = link.getAttribute("data-page");
      let page = document.querySelectorAll(".page");
      page.forEach(function (el) {
        if (el.getAttribute("data-page") == dataPage) {
          el.classList.add("page-on");
        } else {
          el.classList.remove("page-on");
        }
      });
    });
  });
});

let backPage = document.querySelectorAll(".wrapper_arrow");
backPage.forEach(function (back) {
  back.addEventListener("click", function () {
    let page = document.querySelectorAll(".page");
    page.forEach(function (el) {
      el.classList.remove("page-on");
    });
  });
});
