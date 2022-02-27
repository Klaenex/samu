<div class="page page_add_resident" data-page="add_resident">
    <div class="wrapper wrapper_arrow" data-page="add_resident">
        <img src="./images/arrow-left.svg" alt="back last menu" class="img img-arrow">
    </div>
    <h2 class="title">Ajouter un résidents</h2>
    <form class="form" method="post" data-form="add_resident" id="add_resident">
        <div class="wrapper wrapper_input">
            <label for="email_add_resident">Email</label>
            <input type="email" name="email_add_resident" id="email_add_resident" placeholder="Email" required>
        </div>

        <div class="wrapper wrapper_input">
            <label for="name_add_resident">Nom</label>
            <input type="text" name="name_add_resident" id="name_add_resident" placeholder="Nom" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="firstname_add_resident">Prénom</label>
            <input type="text" name="firstname_add_resident" id="firstname_add_resident" placeholder="Prénom" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="nationality_add_resident">Nationalité</label>
            <input type="text" name="nationality_add_resident" id="nationality_add_resident" placeholder="Nationalité" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="dob_add_resident">Date de naissance</label>
            <input type="date" name="dob_add_resident" id="dob_add_resident" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="gender_add_resident">Sexe</label>
            <select name="gender_add_resident" id="gender_add_resident">
                <option value="0">Homme</option>
                <option value="1">Femme</option>
            </select>
            <label for="stib_add_resident">Abonnement stib</label>
            <select name="stib_add_resident" id="stib_add_resident">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <input type="submit" value="Ajouter résident">
    </form>
</div>