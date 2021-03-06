$(document).ready(function() {

	$('#mensagens').niceScroll({
		cursorcolor: '#2c3e50',
		cursoropacitymax: 0.4,
		cursorwidth: '10px',
		cursorborder: '0px'
	});

	$('#mensagens').scrollTop($('#mensagens')[0].scrollHeight);

	$('#mensagens').scroll(function(e) {
		if (e.target.scrollTop < 342) {
			$('.chat__input').addClass('--scrolling');
		} else {
			$('.chat__input').removeClass('--scrolling');
		}
	});


	function sendMessage(e) {
		var id_enviou = $('#id_enviou').val();
		var id_recebeu = $('#id_recebeu').val();
		var mensagem = $('#mensagem').val();

		$.ajax({
			url: "classes/chat_ajax.php",
			type: "POST",
			data: {
				"mensagem": mensagem,
				"id_enviou": id_enviou,
				"id_recebeu": id_recebeu,
				"acao": "enviar"
			}
		}).done(function (resposta) {
			if (resposta != 0) {

				hora = new Date();
				hora  = hora.getDate() + '/' + hora.getMonth() + '/' + hora.getFullYear() + ' ' + hora.getHours() + ':' + hora.getMinutes();

				$('#mensagens').append(
					'<div class="answer right mb-2 px-5">' +
					'<div class="text">' + mensagem + '</div>' +
					'<div class="time">' + hora  + '</div>'+
					'</div>'
					);
				$('#mensagem').val(null);
				$('#mensagens').scrollTop($('#mensagens')[0].scrollHeight);
			}
		});
	}

	

	 

	

	$('#botao_enviar').click(sendMessage);
	// $('#botao_enviar').click(top());

	$("input").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			sendMessage();
		}
	});

	setInterval(function(){

		var id_enviou = $('#id_enviou').val();
		var id_recebeu = $('#id_recebeu').val();

		$.ajax({
			url: "classes/chat_ajax.php",
			type: "POST",
			data: {
				"id_enviou": id_enviou,
				"id_recebeu": id_recebeu,
				"acao": "receber"
			}
		}).done(function (resposta) {
			console.log(resposta);			
			if (resposta != 0) {
				hora = new Date();
				hora  = hora.getDate() + '/' + hora.getMonth() + '/' + hora.getFullYear() + ' ' + hora.getHours() + ':' + hora.getMinutes();


				$('#mensagens').append(
					'<div class="answer left mb-2 px-5">' +
					'<div class="text">' + resposta + '</div>' +
					'<div class="time">' + hora  + '</div>'+
					'</div>'
					);
					$('#mensagens').scrollTop($('#mensagens')[0].scrollHeight);

			}

		});

	}, 1500);

});