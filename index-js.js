//Валидация//
function validation() {
    var name = $('#name').val();
    if(name.length >= 2) {
        $('#submit').removeAttr('disabled'); {
            if(name.indexOf('!') >= 0) {
                $('#submit').attr('disabled', 'disabled');
                document.getElementById('wrongSim').style.cssText="visibility: visible";
            }
            else {
                document.getElementById('wrongSim').style.cssText="visibility: hidden";
            }
        }
    }
    else {
         $('#submit').attr('disabled', 'disabled');
    }
}
//Конец//
//Редактирование задачи//
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
//Конец//
//Показ-Редактирование//
$(document).ready( function(){
    $(".editShow").hide();
    $( ".edit" ).mouseenter(function() {
        $(this).find(".editShow").show();
    });
    $( ".edit" ).mouseleave(function() {
        $(this).find(".editShow").hide();
    });
});
//Конец//