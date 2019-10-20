
let checked = 0;
let count;


$(document).ready(function () {
    let super_checkbox = $('#super_checkbox');
    let game_add_name = $('#game_add_name');
    let add_game_button = $('#add_game_button');
    let link_add_name = $('#link_add_name');
    let add_link_button = $('#add_link_button');
    let links_action_button = $('#links_action_button');
    let links_action_select = $('#links_action_select');
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
            if($(this).attr('disabled')!=='disabled') {
                $(this).attr('disabled', 'disabled');
                add_link($('#choose_site').attr('game_id'), $('#choose_site').val(), link_add_name.val());
            }
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

    });
    links_action_button.click(function () {

        if($(this).attr('disabled')!=='disabled') {
            $(this).text('Загрузка');
            $(this).attr('disabled', 'disabled');
            count = $(':checkbox:checked:not(last)').length;
            console.log(links_action_select.val());
            $('input:checkbox:checked:not(last)').each(function () {
                $.get('link_actions.php',
                    {
                        link_id: $(this).val(),
                        action: links_action_select.val(),

                    }, function (data) {

                        count--;
                        if (!count) location.reload();
                    });

            })
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