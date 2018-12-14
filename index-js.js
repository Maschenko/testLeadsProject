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
if (dialog) {
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
}
//Конец//
//Показ-Редактирование//
$(document).ready( function(){
    $(".editShow").hide();
    $( "tbody" ).on("mouseenter", ".edit", function() {
        $(this).find(".editShow").show();
    });
    $("tbody" ).on("mouseleave", ".edit",  function() {
        $(this).find(".editShow").hide();
    });
	
$("#submit").click(function() {
	var txt = $("#name").val();
	 $.ajax({
		type: "POST",
		url: "add_task.php",
		data: {txt: txt},
		beforeSend: function(){
		},
		success:  function(html){
			$("tbody").append(html);
		}
    });
	$("#name").val("");
});

$("tbody").on("click", "button.mdl-button.mdl-js-button.mdl-button--icon", function() {
	var button = $(this);
	var id = $(this).attr("id");
	$.ajax({
        type: "POST",
        url: "delete_task.php",
		data: {id: id},
		success:  function(){
			button.parent().parent().remove();
		}
    });
});

});
//Конец//