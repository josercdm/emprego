$(document).ready(function () {
    $('body').on('click', '.register', function (e) {
        e.preventDefault();

        var form = $('#formRegister').serialize();

        register(form);
    });

    $('body').on('click', '.login', function (e) {
        e.preventDefault();

        var form = $('#formLogin').serialize();

        login(form);
    });

    $('body').on('click', '.deletar', function (e) {
        e.preventDefault();

        var userid = $(this).attr('data-user');

        deleteUser(userid);
    });

    $('body').on('click', '.editar', function (e) {
        e.preventDefault();

        var nameText = $(this).parents('tr').children('td:first-child').text();

        $(this).text('Concluir').addClass('update').removeClass('editar');

        $(this).parents('tr').children('td:first-child').html('<input type="text" id="nameEdit" value="' + nameText + '">');

    });

    $('body').on('click', '.update', function (e) {
        e.preventDefault();

        var userid = $(this).attr('data-user');
        var name = $('#nameEdit').val();
        updateUser(userid, name);
    });
});

function register(form) {
    var formData = new FormData();
    formData.append('data', form);
    formData.append('register', true);

    $.ajax({
        type: 'POST',
        url: 'app/triggers/registerTrigger.php',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            showBefore('Salvando dados...');
        },
        success: function (res) {

            if (res.status == 'ok') {
                showSuccess('Usuário cadastrado com sucesso!', '/login');
            } else {
                showError(res.status);
            }
        }
    });
}

function login(form) {
    var formData = new FormData();
    formData.append('data', form);
    formData.append('login', true);

    $.ajax({
        type: 'POST',
        url: 'app/triggers/loginTrigger.php',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            showBefore('Validando dados...');
        },
        success: function (res) {

            if (res.status == 'ok') {
                showSuccess('Logado com sucesso!', '/');
            } else {
                showError(res.status);
            }
        }
    });
}

function deleteUser(id) {
    var formData = new FormData();
    formData.append('userid', id);
    formData.append('deletar', true);

    var confirma = confirm('Deseja realmente excluir esses dados?');
    if (confirma) {
        $.ajax({
            type: 'POST',
            url: 'app/triggers/deletarTrigger.php',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function () {
                showBefore('Apagando dados...');
            },
            success: function (res) {

                if (res.status == 'ok') {
                    showSuccess('Apagado com sucesso!', '/');
                } else {
                    showError(res.status);
                }
            }
        });
    }
}

function updateUser(id, name) {
    var formData = new FormData();
    formData.append('userid', id);
    formData.append('name', name);
    formData.append('update', true);

    $.ajax({
        type: 'POST',
        url: 'app/triggers/upgradeTrigger.php',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            showBefore('Atualizando dados...');
        },
        success: function (res) {

            if (res.status == 'ok') {
                showSuccess('Dados atualizados com sucesso!', '/');
            } else {
                showError(res.status);
            }
        }
    });
}

function showSuccess(msg, url) {
    Swal.fire({
        position: "center",
        icon: "success",
        title: msg,
        showConfirmButton: true,
    }).then(function () {
        window.location = url;
    });
}

function showBefore(title) {
    let timerInterval;
    Swal.fire({
        position: "center",
        title: title,
        html: "Aguarde...",
        timer: 5000,
        timerProgressBar: true,
        onBeforeOpen: () => {
            Swal.showLoading();
            timerInterval = setInterval(() => {
                const content = Swal.getContent();
                if (content) {
                    const b = content.querySelector("b");
                    if (b) {
                        b.textContent = Swal.getTimerLeft();
                    }
                }
            }, 100);
        },
        onClose: () => {
            clearInterval(timerInterval);
        },
    });
}

function showError(msg) {
    Swal.fire({
        position: "center",
        icon: "error",
        title: msg,
        showConfirmButton: true
    });
}