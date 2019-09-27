$(document).ready(function() {

	$('.chat__bubbles').niceScroll({
		cursorcolor: '#2c3e50',
		cursoropacitymax: 0.4,
		cursorwidth: '10px',
		cursorborder: '0px'
	});

	$('.chat__bubbles').getNiceScroll(0).doScrollTop(1000, 0);

	$('.chat__bubbles').scroll(function(e) {
		if (e.target.scrollTop < 342) {
			$('.chat__input').addClass('--scrolling');
		} else {
			$('.chat__input').removeClass('--scrolling');
		}
	});

	$('.chat__heading').click(function() {
		$(this).parent().children('.chat__bubbles').fadeToggle();
		$(this).parent().children('.chat__input').fadeToggle();
	});

	$('#botao_enviar').click(function() {
		var id_enviou = $(this).parent().children().children()[0];
		var id_recebeu = $(this).parent().children().children()[1];
		var mensagem = $(this).parent().children().children()[2];

		id_enviou = id_enviou.value;
		id_recebeu = id_recebeu.value;
		mensagem = mensagem.value;

		$.ajax({
			url: "chat1.php",
			type: "POST",
			data: {
				"mensagem": mensagem,
				"id_enviou": id_enviou,
				"id_recebeu": id_recebeu
			}
		}).done(function (resposta) {
			if (!console.log(resposta)) {
				return;
			}
			$(this).parent().parent('.chat__bubbles');
			const novo_balao = document.getElementById('balao');
			console.log(novo_balao);
			novo_balao.insertAdjacentHTML('afterend', ' <div class="chat__bubbles" id="balao">
			<?php $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $a->resultado[$chave]['Id']);
			foreach($mensagens as $key => $mensagem
			{
				if ($mensagem['id_enviou'] == $_SESSION['dados']['Id']) {
					echo' <div class="chat__bubble --right">'.$mensagem['mensagem'].'</div>';
				} else if ($mensagem['id_enviou'] == $a->resultado[$chave]['Id']) {
					echo' <div class="chat__bubble --left">'.$mensagem['mensagem'].'</div>';
				}
			}
				?>
				</div>');

		});

	});





});