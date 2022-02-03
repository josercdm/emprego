$(document).ready(function () {
    var userid = $('#userid').val();
    var session = $('#session').val();
    if (userid !== undefined || session !== undefined) {
        var conn_status = false;
        var conn;
        if (conn_status) {
            conn.close();
            conn_status = false;
        }

        conn = new ab.Session('ws://127.0.0.1:8123', function (e) {

            conn_status = true;
            conn.subscribe('notification', function (topic, data) {
                if (session == 'admin') {

                    $('#notifie').text(data.status);
                    $('#notifieBody').html('');
                    for (var i in data.userData) {
                        var element = '<div class="dropdown-divider"></div>';
                        element += '<a href="#" class="dropdown-item">';
                        element += '<i class="fas fa-file mr-2"></i> ' + data.userData[i].name;
                        element += '<span class="float-right text-muted text-sm"> Está logado! </span>';
                        element += '</a>';
                        $('#notifieBody').append(element);

                        $('#online' + data.userData[i].id).text('Online');
                        $('#online' + data.userData[i].id).addClass('text-success');
                    }

                    if (data.close == 1) {
                        $('#online' + data.userid).text('Offline');
                        $('#online' + data.userid).removeClass('text-success');
                    }

                    console.log(data);
                }
            });
            conn.publish('notification', {'closed': 0, 'userid': userid}, [conn._session_id]);
        },
                function () {
                    console.warn('WebSocket connection closed');
                },
                {'skipSubprotocolCheck': true}
        );
    }

    $('body').on('click', '.logout', function (e) {
        e.preventDefault();
        var userid = $(this).attr('data-user');

        logout(userid, conn);
    });
});

function logout(userid, conn) {

    $.ajax({
        type: 'POST',
        url: 'app/triggers/loginTrigger.php',
        data: {logout: true, userid: userid},
        beforeSend: function () {
            showBefore('Saindo do sistema...');
        },
        success: function (res) {
            if (res == 'ok') {
                conn.unsubscribe('notification');
                conn.publish('notification', {closed: 1, userid: userid});
                showSuccess('Você saiu, volte logo!', '/');
            }
        }
    });
}