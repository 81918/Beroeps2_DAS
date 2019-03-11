
$('document').ready(function(e) {
		
		//variables
		var html = "<div><p>Specificatie categorie: <input type='text' name='spec_categorie[]' id='child_spec_categorie' required maxlength='42'></p><p>Specificatie naam: <input type='text' name='spec_naam[]' id='child_spec_naam' required maxlength='42'></p><p>Specificatie: <input type='text' name='spec[]' id='child_spec' required maxlength='72'></p><p><a href='#' id='verwijder'>x</a></p></div>";
		var maxRows = 50;
		var i = 1;

		//voeg rijen toe
		$('#add').click(function(e){
			if(i <= maxRows){
				$("#container").append(html);
				i++;
			}
		});

		//verwijder rijen
		$("#container").on('click', '#verwijder' ,function(e){
			$(this).parent().parent('div').remove();
			i--;
		});

	});
