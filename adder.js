let game_add_name;
let add_game_button;


$(document).ready(function () {

    game_add_name = $('#game_add_name');
    add_game_button = $('#add_game_button');
    add_game_button.click(
        function () {
            add_game(game_add_name.val());
        }
    );
    game_add_name.keyup(function(event){
        if(event.keyCode === 13){

            add_game(game_add_name.val());

        }
    });
});

function add_game(game_name) {

    $.get( 'add_game.php',
        {game_name: game_name
    }, function( data ) {

        alert( data );
    });

}