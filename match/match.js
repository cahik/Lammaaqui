var i = document.querySelectorAll(".cardlike");




//fazer um foreach

i[0].style.display = "block";







// function like() {
//
//     $.ajax({
//         url: "match.php",
//         type: "POST",
//         data:onclick = like ,
//
//
//
//
//
//     }).done(function(resposta) {
//         console.log(resposta);
//
//     });


//}

// function deslike() {
//     $.ajax({
//         url: "index.php",
//         type: "POST",
//         data:onclick = deslike ,
//
//
// //
// //
// //     }
$(document).ready(function() {
    $(".btnlike").click(function() {
        $(this).parent().parent().parent().animate({ marginLeft: "-1000px", opacity: 0 }, 300).fadeOut(0);
        var numero = Number($(this).parent().parent().parent().attr("data-numero"));
        var proximo = ".card_"+(numero+1);
        $(proximo).show();



    });
    $(".btndeslike").click(function() {
        $(this).parent().parent().parent().animate({ marginRight: "-1000px", opacity: 0 }, 300).fadeOut(0);
        var numero = Number($(this).parent().parent().parent().attr("data-numero"));
        var proximo = ".card_"+(numero+1);
        $(proximo).show();


    });
});
