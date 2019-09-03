var i = document.querySelectorAll(".cardlike");

//fazer um foreach
array.forEach(function (i) {
    i[0].style.display = "block";
    i[1].style.display = "none";
});





function like() {

    $.ajax({
        url: "index.php",
        type: "POST",
        data:onclick = like ,





    }).done(function(resposta) {
        console.log(resposta);

    });


}

function deslike() {
    $.ajax({
        url: "index.php",
        type: "POST",
        data:onclick = deslike ,


//
//
//     }