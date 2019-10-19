let game_add_name;
let add_game_button;


$(document).ready(function () {

    game_add_name = $('#game_add_name');
    add_game_button = $('#add_game_button');
    add_game_button.click(
        function () {
            alert(game_add_name.val());
        }
    );
});