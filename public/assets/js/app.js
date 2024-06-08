$(document).ready(function () {
    const baseUrl = "http://localhost/mon-biblio"

    $('.card').hover(function () {
        $(this).addClass('shadow')
    }, function () {
        $(this).removeClass('shadow')
    })

    $("#search-php").on("keyup", function () {
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
                                <a 
                                    href="${baseUrl}/index.php?p=update-livre&amp;id=${livres[i].id}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <a 
                                    href="${baseUrl}/index.php?p=delete-livre&amp;id=${livres[i].id}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Supprimer
                                </a>
                            </td>
                        </tr>`

                        $("#liste-livre").append(listeLivreRow)
                    }
                }
            },
            error: function (response) {
                console.log(response.responseText)
            }
        })
    })

    $("#search-card").on("keyup", function () {
        $("#card-livre").html("")

        $.ajax({
            type: "POST",
            url: "?p=Livre-by-key",
            data: { 'search': $(this).val() },
            success: function (response) {
                const livres = response

                if (livres.length <= 0) {
                    const noResult = `
                    <div class="col-12 mb-4" >
                        <p class="lead text-center card-text my-5">Aucune correspondance trouvé ! </p>
                    </div>`

                    $("#card-livre").append(noResult)
                } else {
                    for (let i in livres) {
                        let dateEdition = new Date(livres[i].date_edition)

                        let searchResult = `
                        <div class="col-md-6 col-lg-4 mb-4" >
                            <div class="card">
                                <div class="card-body" style="height:250px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="${baseUrl}/public/imgs/uploads/${livres[i].image}" alt="${livres[i].titre}" title="${livres[i].titre}" class="img-fluid" loading="lazy" />
                                        </div>
                                        <div class="col-8">
                                            <h4 class="card-title font-weight-bolder mb-5">${livres[i].titre}</h4>
                                            <p class="card-text mb-4">
                                                C'est un livre écrit par <strong>${livres[i].auteur}</strong>, et a été publié en <strong>${dateEdition.getFullYear()}</strong>.
                                            </p>
                                            <a href="${baseUrl}/index.php?p=info-livre&amp;id=${livres[i].id}" class="btn btn-primary btn-block btn-sm">Plus d'info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div >`

                        $("#card-livre").append(searchResult)
                    }
                }
            },
            error: function (response) {
                console.log(response.responseText)
            }
        })
    })
})