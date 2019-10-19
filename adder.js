
$(document).ready(function () {
    let game_add_name = $('#game_add_name');
    let add_game_button = $('#add_game_button');
    add_game_button.click(
        function () {
            alert(game_add_name.textContent);
        }
    );
});