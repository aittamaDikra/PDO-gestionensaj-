$(document).ready(function () {
    $.ajax({
        url: '../dist/controller/gestionClasse.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btnc').click(function () {
        var code = $("#codec");
        var id_filiere = $("#id_filierec");
        if ($('#btnc').text() == 'Ajouter') {
            $.ajax({
                url: '../dist/controller/gestionClasse.php',
                data: {op: 'add', id_filiere: id_filiere.val(), code: code.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    code.val('');
                    id_filiere.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }

    });

    $(document).on('click', '.supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: '../dist/controller/gestionClasse.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    $(document).on('click', '.modifier', function () {
        var btn = $('#btnc');
        var id = $(this).closest('tr').find('th').text();
        var code = $(this).closest('tr').find('td').eq(0).text();
        var id_filiere = $(this).closest('tr').find('td').eq(1).text();
        btn.text('Modifier');
        $("#codec").val(code);
        $("#id_filierec").val(id_filiere);
        $("#id").val(id);

        btn.click(function () {
            if ($('#btnc').text() == 'Modifier') {
                $.ajax({
                    url: '../dist/controller/gestionClasse.php',
                    data: {op: 'update', id: id, id_filiere: $("#id_filierec").val(), code: $("#codec").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        $("#codec").val('');
                        $("#id_filierec").val('');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].id_filiere + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }

});