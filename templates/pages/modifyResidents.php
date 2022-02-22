<div class="page page_modify_residents" data-page="modify_resident">
    <div class="wrapper wrapper_arrow" data-page="modify_resident">
        <img src="./images/arrow-left.svg" alt="back last menu" class="img img-arrow">
    </div>
    <h2 class="title">Modifier un résidents</h2>
    <form class="form" method="post" data-form="modify_resident" id="modify_resident">
        <input type="hidden" name="id_hidden_modify_resident" id="id_hidden_modify_resident">

        <div class="wrapper wrapper_input">
            <label for="email_modify_resident">Email</label>
            <input type="email" name="email_modify_resident" id="email_modify_resident" placeholder="Email" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="name_modify_resident">Nom</label>
            <input type="text" name="name_modify_resident" id="name_modify_resident" placeholder="Nom" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="firstname_modify_resident">Prénom</label>
            <input type="text" name="firstname_modify_resident" id="firstname_modify_resident" placeholder="Prénom" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="nationality_modify_resident">Nationalité</label>
            <input type="text" name="nationality_modify_resident" id="nationality_modify_resident" placeholder="Nationalité" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="dob_modify_resident">Date de naissance</label>
            <input type="date" name="dob_modify_resident" id="dob_modify_resident" required>
        </div>
        <div class="wrapper wrapper_input">
            <label for="gender_modify_resident">Sexe</label>
            <select name="gender_modify_resident" id="gender_modify_resident">
                <option value="0">Homme</option>
                <option value="1">Femme</option>
            </select>
            <label for="stib_modify_resident">Abonnement stib</label>
            <select name="stib_modify_resident" id="stib_modify_resident">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <input type="submit" value="Modifier un résident">
    </form>
</div>