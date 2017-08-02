$(function(){

    /*var Kicker = $.kicker({
        url: 'hallo',
        enabled: false,
        before: function() {
            console.log('BEFORE');
        },
        after: function() {
            console.log('AFTER');
        },
        initialized: function() {
            console.log('sdasdasd')
        }
    })[0].kicker;

    Kicker.enable();
    Kicker.loaded();
    // Kicker.loaded();*/

	$('.side button').click(function(){       	
	 	$('.active').removeClass('active')
        $(this).addClass('active');

        /*Filter Event*/

        if ($(this).hasClass("black_b")){
        	$('#feld_aussen').removeClass('all');
        	$('#feld_aussen').removeClass('silver');
        	$('#feld_aussen').addClass('black');
        }
        else if ($(this).hasClass("silver_b")){
        	$('#feld_aussen').removeClass('all');
        	$('#feld_aussen').removeClass('black');
        	$('#feld_aussen').addClass('silver');
        }
        else {
        	$('#feld_aussen').removeClass('silver');
        	$('#feld_aussen').removeClass('black')
        	$('#feld_aussen').addClass('all');
        }
    });
    
    $('.register').click(function(){
        $('#login').toggleClass();
        $('#register').addClass('show');
    });


    $('.stop').click(function(){
        $('#register').toggleClass();
        $('#login').addClass('show');
    });
    
    $('.go').click(function(){
        //console.log('elo');
        // event.preventDefault();
        $('#start').toggleClass();
        $('#game_silver').addClass('show');
    });

    $('.end').click(function(){
        //console.log('elo');
        $('#game_silver').toggleClass();
        $('#start').addClass('show');
    });

/*    $('.begin').click(function(){
        $('#start').toggleClass();
        $('#game').addClass('show');
    });
    $('.end').click(function(){
        $('#game').toggleClass();
        $('#start').addClass('show');
    });*/

    $('select.player_select').change(function(){
        //Im ersten Schritt wird das Attribut auf "false" gesetzt 
        $('select.player_select option[value="'+$(this).data('value')+'"]').prop('disabled',false);
        //Hier wird die Option mit dem oberen Value in den Select geschrieben
        $(this).attr('data-value',$(this).val());
        //Im letzten Schritt wir die Option mit dem übergebenen Value in allen Selects deaktiviert bis ein anderer ausgewählt wird
        $('select.player_select').not(this).children('option[value="'+$(this).val()+'"]').prop('disabled',true);

        //Selector in Variable speichern "attr"    
        var attr = $('select#player_1').attr('data-value');
        var attr1 = $('select#player_2').attr('data-value');


        //Abfrage ob player_1 und player_2 noch nicht gesetzt sind    
        if ((typeof attr !== typeof undefined && attr !== false) && (typeof attr1 !== typeof undefined && attr1 !== false))  {
            $('.go').prop('disabled', false);
        }
    });




    /*Ajax Test*/
    console.log("hallo");
    $('form#test').submit(function(e) {
    var formData = $(this).serialize(); // player1=1&player2=3
    // serializeArray()

    console.log('FORM DATA',formData);

    e.preventDefault();

    $.ajax({
            url: 'new_game.php',
            method: 'POST',
            dataType: 'json', // erwartet auch JSON zurück
            data: formData,
            success: function(data) {
                if(data.success === 1) {
                    console.log('JSON',data);
                }
            }
        });
    });
});