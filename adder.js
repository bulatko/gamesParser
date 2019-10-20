let link_add_name;
let add_link_button;
let game_add_name;
let add_game_button;
let super_checkbox;
let checked = 0;


$(document).ready(function () {
    super_checkbox = $('#super_checkbox');
    game_add_name = $('#game_add_name');
    add_game_button = $('#add_game_button');
    link_add_name = $('#link_add_name');
    add_link_button = $('#add_link_button');
    add_game_button.click(
        function () {
            add_game(game_add_name.val());
        }
    );
    game_add_name.keyup(function (event) {
        if (event.keyCode === 13) {

            add_game(game_add_name.val());

        }
    });
    $(".game_name").click(function () {
        let game_id = $(this).attr('game_id');
        window.location += '?game_id=' + game_id;
    });

    add_link_button.click(
        function () {
            add_link($('#choose_site').attr('game_id'), $('#choose_site').val(), link_add_name.val());
        }
    );
    super_checkbox.click(function () {
        if(checked){
            checked = 0;
            $('body input:checkbox').prop('checked', false);


        }  else {

            checked = 1;

            $('body input:checkbox').prop('checked', true);
        }

    })
});

function add_game(game_name) {

    $.get('add_game.php',
        {
            game_name: game_name
        }, function (data) {

            alert(data);
        });

}

function add_link(game_id, type, link) {

    $.get('add_link.php',
        {
            game_id: game_id,
            type: type,
            link: link,

        }, function (data) {

            if (data === 'ok') location.reload();
            else alert('error');
        });

}