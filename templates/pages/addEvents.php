<div class="page page_addEvent">
    <div class="arrow_container">
        <img src="./images/arrow-left.svg" alt="back last menu">
    </div>
    <h2 class="title">Ajouter un évènement</h2>
    <div class="wrapper wrapper_input">
        <label for="event_saves">Événements enregistrer</label>
        <select name="event_saves" id="event_saves">

        </select>
    </div>
    <form class="form" id="add_event" method="post" enctype="multipart/form-data" data-form="add_event">
        <div class="wrapper wrapper_input">
            <label for="img_add_event">Photo</label>
            <input type="file" name="img_add_event" id="img_add_event" accept="image/*" required>
            <input type="text" name="img_hidden_add_event" id="img_hidden_add_event" hidden>
            <span id="img_preview_add_event"></span>
        </div>

        <div class="wrapper wrapper_input">
            <label for="name">Nom</label>
            <input type="text" name="name_add_event" id="name_add_event" placeholder="Nom" required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="description_add_event">Description</label>
            <textarea name="description_add_event" id="description_add_event" cols="30" rows="10" placeholder="Description" required></textarea>

        </div>
        <div class="wrapper wrapper_input">
            <label for="place_add_event">Lieux</label>
            <input type="text" name="place_add_event" id="place_add_event" placeholder="Lieux" required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="date_add_event">Date</label>
            <input type="date" name="date_add_event" id="date_add_event">
        </div>
        <div class="wrapper wrapper_input">
            <label for="time_add_event">Heure</label>
            <input type="time" name="time_add_event" id="time_add_event">
        </div>

        <div class="wrapper wrapper_input">
            <label for="age_min_add_event">Age min.</label>
            <input type="number" name="age_min_add_event" id="age_min_add_event" placeholder="Age min." required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="age_max_add_event">Age max.</label>
            <input type="number" name="age_max_add_event" id="age_max_add_event" placeholder="Age max." required>
        </div>

        <div class="wrapper wrapper_input wrapper_input-checkbox">
            <label for="art_27_add_event">Art.27</label>
            <input type="checkbox" name="art_27_add_event" id="art_27_add_event">
        </div>
        <div class="wrapper wrapper_input wrapper_input-checkbox">
            <label for="save_event">Enregistrer l'évènement</label>
            <input type="checkbox" name="save_event" id="save_event">
        </div>
        <input type="submit" value="Ajouter évènement">
    </form>

</div>