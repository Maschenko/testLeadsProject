function validation() {
    var name = $('#name').val();
    if(name.length >=2) {
        $('#submit').removeAttr('disabled');
    } else {
        $('#submit').attr('disabled', 'disabled');
    }
}
////
var dialog = document.querySelector('dialog');
var showDialogButton = document.querySelector('#show-dialog');
if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
showDialogButton.addEventListener('click', function() {
    dialog.showModal();
});
dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
});
////

$('.textboxes').hide(

);

$(document).ready( function(){

    $(".editShow").hide(document.getElementsByClassName(".edit"));
    $( ".editShow" ).mouseenter(function() {
            $(this).show();
        });
        // .mouseleave(function() {
        //     $(".editShow").hide(this);
        // });
});


// $( "#edit" ).mouseenter(function() {
//     this.style.background = 'red';
//     if (mouseover){
//         this.style.background = '';
//     }
//
//     // alert("Hello");
//     console.log("Hello");
//     // $( this ).fadeOut( 100 );
//     // $( this ).fadeIn( 500 );
// });
////
$( "#edit1" ).mouseenter(function() {
    this.style.background = 'red';
});
$( "#edit2" ).mouseenter(function(e) {
    this.style.background = 'green';
    this.children[0].style.background = (e.relatedTarget === this.children[0] ? 'yellow' : '');
});
// document.body.onload = addElement;
// var my_div = newDiv = null;
//
// function addElement() {
//
//     // создаем новый элемент div
//     // и добавляем в него немного контента
//
//     var newDiv = document.createElement("div");
//     newDiv.innerHTML = "<h1>Привет!</h1>";
//
//     // добавляем только что созданый элемент в дерево DOM
//
//     my_div = document.getElementById("org_div1");
//     document.body.insertBefore(newDiv, my_div);
// }