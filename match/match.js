var i = document.querySelectorAll(".cardlike");

// Aparecer o valor do range
var $range = document.querySelector('#Aceita_pagar'),
$value = document.querySelector('span');

$range.addEventListener('#Aceita_pagar', function () {
    $value.textContent = this.value;
});


//fazer um foreach

i[0].style.display = "block";







function like(id_recebe, Id_da) {

    $.ajax({
        url: "match.php",
        type: "POST",
        data:{
            "id_recebe":id_recebe,
            "id_da": Id_da
    }
    }).done(function(resposta) {
        console.log(resposta);

    });

}


$(document).ready(function() {
    $(".btnlike").click(function () {
        $(this).parent().parent().parent().animate({marginLeft: "-1000px", opacity: 0}, 300).fadeOut(0);
        var numero = Number($(this).parent().parent().parent().attr("data-numero"));
        var proximo = ".card_" + (numero + 1);
        $(proximo).show();
        $.ajax({
            url: "match.php",
            type: "POST",
            data: onclick = "",


        }).done(function (resposta) {
            console.log(resposta);

        });


    });
}
    $(".btndeslike").click(function() {
        $(this).parent().parent().parent().animate({ marginRight: "-1000px", opacity: 0 }, 300).fadeOut(0);
        var numero = Number($(this).parent().parent().parent().attr("data-numero"));
        var proximo = ".card_"+(numero+1);
        $(proximo).show();


    });
});
