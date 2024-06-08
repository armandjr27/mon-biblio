$("#form-inscription").submit(function (e) { 
    e.preventDefault();
    
    const dataForm = {
        prenom     : $("#prenom").val(),
        nom        : $("#nom").val(),
        email      : $("#email").val(),
        naissance  : $("#naissance").val(),
        genre      : $("input:checked").val(),
        pass       : $("#pass").val(),
        repass     : $("#repass").val(),
        inscription: $("#inscription").val(),
    }

    let isValidate   = 1

    if (!dataForm.prenom) {
        $("#error-prenom").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        $("#error-prenom").html("")
    }

    if (!dataForm.nom) {
        $("#error-nom").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        $("#error-nom").html("")
    }

    if (!dataForm.email) {
        $("#error-email").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        $.ajax({
            type: "GET",
            url: "?p=users",
            success: function (response) {
                usersEmail = response.map(user => user.email)

                if (usersEmail.includes(dataForm.email)) {
                    $("#error-email").text(" * L'e-mail que vous avez entré est déjà pris.")
                    isValidate   = 0
                } else {
                    $("#error-email").html("")
                }
            },
            error: function (response) {  
                console.error(response.responseText);
            }
        });
    }

    if (!dataForm.naissance) {
        $("#error-naissance").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        $("#error-naissance").html("")
    }

    if (!dataForm.genre) {
        $("#error-genre").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        $("#error-genre").html("")
    }

    if (!dataForm.pass) {
        $("#error-pass").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        if(dataForm.pass.length < 6) {
            $("#error-pass").text(" * Le mot de passe doit avoir au moins 6 caractères.")
            isValidate   = 0
        } else {
            $("#error-pass").html("")
        }
    }

    if (!dataForm.repass) {
        $("#error-repass").text(" * Le champs est obligatoire.")
        isValidate   = 0
    } else {
        if (dataForm.pass != dataForm.repass) {
            $("#error-repass").text(" * Les deux mot de passe ne sont pas identiques.")
            isValidate   = 0
        } else {
            $("#error-repass").html("")
        }
    }

    if (isValidate) {
        $.ajax({
            type: "POST",
            url: "?p=inscription",
            data: dataForm,
            success: function (response) {
                window.location.assign("?p=connexion")
            },
            error: function (response) {  
                console.error(response.responseText);
            }
        });
    }
})