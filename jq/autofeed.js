
$('document').ready(function(e) {
		
		//variables
		var html = "<div><hr>";
		html += "<p>Specificatie categorie: <br>";
		html += "<input class='input' type='text' name='spec_categorie[]' id='child_spec_categorie' required maxlength='42'>";
		html += "</p>";

		html += "<p>Specificatie: <br>";
		html += "<input class='input' type='text' name='spec[]' id='child_spec' required maxlength='72'>";
		html += "</p>";

		html += "<p>Specificatie naam: <br>";
		html += "<input class='input' type='text' name='spec_naam[]' id='child_spec_naam' required maxlength='42'>";
		html += "</p>";

		html += "<p>";
		html += "<a class='btn btn-danger' href='#' id='verwijder'>x</a>";
		html += "</p></div>";

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
