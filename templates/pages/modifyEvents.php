<div class="page page_modify_event" data-page="modify_event">
    <div class="wrapper wrapper_arrow" data-page="modify_event">
        <img src="./images/arrow-left.svg" alt="back last menu" class="img img-arrow">
    </div>
    <h2 class="title">Modifier un évènement</h2>

    <form class="form" id="modify_event" method="post" enctype="multipart/form-data" data-form="modify_event">
        <input type="hidden" name="id_hidden_modify_event" id="id_hidden_modify_event">
        <div class="wrapper wrapper_input">
            <label for="img_modify_event">Photo</label>
            <input type="file" name="img_modify_event" id="img_modify_event" accept="image/*">
            <input type="hidden" name="img_hidden_modify_event" id="img_hidden_modify_event">
            <span id="img_preview_modify_event"></span>

        </div>

        <div class="wrapper wrapper_input">
            <label for="name_modify_event">Nom</label>
            <input type="text" name="name_modify_event" id="name_modify_event" placeholder="Nom" required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="description_modify_event">Description</label>
            <textarea name="description_modify_event" id="description_modify_event" cols="30" rows="10" placeholder="Description" required></textarea>
        </div>
        <div class="wrapper wrapper_input">
            <label for="place_modify_event">Lieux</label>
            <input type="text" name="place_modify_event" id="place_modify_event" placeholder="Lieux" required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="date_modify_event">Date</label>
            <input type="date" name="date_modify_event" id="date_modify_event">
        </div>
        <div class="wrapper wrapper_input">
            <label for="time_modify_event">Heure</label>
            <input type="time" name="time_modify_event" id="time_modify_event">
        </div>

        <div class="wrapper wrapper_input">
            <label for="age_min_modify_event">Age min.</label>
            <input type="number" name="age_min_modify_event" id="age_min_modify_event" placeholder="Age min." required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="age_max_modify_event">Age max.</label>
            <input type="number" name="age_max_modify_event" id="age_max_modify_event" placeholder="Age max." required>
        </div>

        <div class="wrapper wrapper_input wrapper_input-checkbox">
            <label for="art_27_modify_event">Art.27</label>
            <input type="checkbox" name="art_27_modify_event" id="art_27_modify_event">
        </div>
        <input type="submit" value="Modifier évènement">
    </form>

</div>