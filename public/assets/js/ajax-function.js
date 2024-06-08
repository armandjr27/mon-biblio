function showAllLivres() {
    $.ajax({
        type: "GET",
        url: "?p=livres",
        success: function (response) {
            $("#liste-livre").html("")
            const livres = response
            row(livres)
        },
        error: function (response) {
            console.log(response.responseText)
        }
    })
}

$("#save").click(function (event) {
    event.preventDefault()

    if (!$("#id").val()) {
        insertLivre()
    } else {
        updateLivre()
    }
})

$("#ajout").click(function () {
    $("#id").val("")
    $("#titre").val("")
    $("#auteur").val("")
    $("#date_edition").val("")
    $("#image").val("")
})

$("#delete-livre").click(function () {
    const id = $(this).attr("data-id-livre")

    $.ajax({
        type: "GET",
        url: "?p=delete-livre-by-ajax&id=" + id,
        success: function (response) {
            showAllLivres()
            $("#delete-modal").modal('hide')
            $("#alert-msg-delete").html(response.message).fadeIn("slow").fadeOut(5500)
        },
        error: function (response) {
            console.log(response.responseText)
        }
    })
})

function insertLivre() {
    const data = {
        titre: $("#titre").val(),
        auteur: $("#auteur").val(),
        date_edition: $("#date_edition").val(),
        image: $("#image")[0].files[0],
    }

    const form = new FormData()
    form.append("titre", data.titre)
    form.append("auteur", data.auteur)
    form.append("date_edition", data.date_edition)
    form.append("image", data.image)

    if (data.titre && data.auteur && data.date_edition) {
        $.ajax({
            type: "POST",
            url: "?p=save-livre-by-ajax",
            data: form,
            contentType: false,
            processData: false,
            success: function (response) {
                showAllLivres()
                $("#form-modal").modal('hide')
                $("#alert-msg-add").html(response.message).fadeIn("slow").fadeOut(5500)
            },
            error: function (response) {
                console.log(response.responseText)
            }
        })
    }
}

function updateLivre() {
    const data = {
        id: $("#id").val(),
        titre: $("#titre").val(),
        auteur: $("#auteur").val(),
        date_edition: $("#date_edition").val(),
        image: $("#image")[0].files[0],
    }

    const form = new FormData()
    form.append("id", data.id)
    form.append("titre", data.titre)
    form.append("auteur", data.auteur)
    form.append("date_edition", data.date_edition)
    form.append("image", data.image)

    if (data.id && data.titre && data.auteur && data.date_edition) {
        $.ajax({
            type: "POST",
            url: "?p=save-livre-by-ajax",
            data: form,
            contentType: false,
            processData: false,
            success: function (response) {
                showAllLivres()
                $("#form-modal").modal('hide')
                $("#alert-msg-update").html(response.message).fadeIn("slow").fadeOut(5500)
            },
            error: function (response) {
                console.log(response.responseText)
            }
        })
    }
}

function editLivre(id) {
    $.ajax({
        type: "GET",
        url: "?p=livre&id=" + id,
        success: function (response) {
            const livre = response;

            $("#id").val(livre.id)
            $("#titre").val(livre.titre)
            $("#auteur").val(livre.auteur)
            $("#date_edition").val(livre.date_edition)
            $("#image").val("")
        },
        error: function (response) {
            console.log(response.responseText)
        }
    })
}

function showLivre(id) {
    $.ajax({
        type: "GET",
        url: "?p=livre&id=" + id,
        success: function (response) {
            const livre = response
            
            const attributes = {
                src: `public/imgs/uploads/${livre.image}`,
                alt: livre.titre,
                title: livre.titre,
            }

            $("#numero-livre").text(livre.id)
            $("#info-card-img").attr(attributes)
            $("#li-id").text(livre.id)
            $("#li-titre").text(livre.titre)
            $("#li-auteur").text(livre.auteur)
            $("#li-date-edition").text(livre.date_edition)
        },
        error: function (response) {
            console.log(response.responseText)
        }
    })
}

function deleteLivre(id) {
    $("#delete-livre").attr("data-id-livre", id)
}

$("#search-ajax").on("keyup", function () {
    $("#liste-livre").html("")

    $.ajax({
        type: "POST",
        url: "?p=Livre-by-key",
        data: { 'search': $(this).val() },
        success: function (response) {
            const livres = response

            if (livres.length <= 0) {
                const noResult = `
                <tr> 
                    <td class="lead text-center card-text py-5" colspan="6"> Aucune correspondance trouvé ! </td>
                </tr>`

                $("#liste-livre").append(noResult)
            } else {
                row(livres)
            }
        },
        error: function (response) {
            console.log(response.responseText)
        }
    })
})

function row(livres) {
    for (let i in livres) {

        let listeLivreRow = `
                <tr>
                    <td>${livres[i].id}</td>
                    <td>
                        <img src="public/imgs/uploads/${livres[i].image}" alt="${livres[i].titre}" title="${livres[i].titre}" height="110" loading="lazy"/>
                    </td>
                    <td class="text-left">${livres[i].titre}</td>
                    <td class="text-left">${livres[i].auteur}</td>
                    <td>${livres[i].date_edition}</td>
                    <td>
                        <button 
                            type="button" class="btn btn-info btn-sm" 
                            data-toggle="modal" data-target="#info-modal" 
                            onclick="showLivre(${livres[i].id})">
                            <i class="fa fa-eye"></i> Afficher
                        </button>
                            <button 
                            type="button" class="btn btn-success btn-sm" 
                            data-toggle="modal" data-target="#form-modal" 
                            onclick="editLivre(${livres[i].id})">
                            <i class="fa fa-edit"></i> Modifier
                        </button>
                            <button 
                            type="button" class="btn btn-danger btn-sm" 
                            data-toggle="modal" data-target="#delete-modal" 
                            onclick="deleteLivre(${livres[i].id})">
                            <i class="fa fa-trash"></i> Supprimer
                        </button>
                    </td>
                </tr>`

        $("#liste-livre").append(listeLivreRow)
    }
}