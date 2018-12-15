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
$(document).ready( function(){
//Редактирование задачи//
var dialog = document.querySelector('dialog');

$("tbody").on('click', ".show-dialog", function() {
	
	var id = $(this).attr("id");
	var button = $(this);
	dialog.showModal();
	
	$("#save").click(function(e) {
		e.stopImmediatePropagation();
		var txt = $("#sample5").val();
		$.ajax({
			type: "POST",
			url: "edit_task.php",
			data: {id: id, txt: txt},
			beforeSend: function(){
				jQuery(window).load(function() {
				    $(".loader-back").fadeOut();
				    $(this).delay(2000).fadeOut("slow");
				});
			},
			success:  function(){
				button.parent().parent().prev().text(txt);
				$("#sample5").val("");
				dialog.close();
			}
		});
	});
});

$("dialog").on('click', ".close", function() {
	dialog.close();
});

//Конец//
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
			var errMsg = $("#errMsg");
			if (errMsg) {
				$("#errMsg").hide();
			}
			$("tbody").append(html);
			$("div.mdl-layout__obfuscator.is-visible").trigger('click');
		}
    });
	$("#name").val("");
});

$("tbody").on("click", "button.mdl-button.mdl-js-button.mdl-button--icon.delete", function() {
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
jQuery(window).load(function() {
    $(".loader-back").fadeOut();
    $(this).delay(6000).fadeOut("slow");
});