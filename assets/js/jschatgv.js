
		$(function(){
			$("#chatbox").submit(function(){
				$.ajax({
					type: "POST",
					url: "models/function/nhantin.php",
					data: { tin_nhan : $("#tin_nhan").val(), may : $("#machathidden2").val(), may1 : $("#machathidden1").val(), may2 : $("#machathidden2").val() },
					success : function(data){
						$(".msg_history").html(data);
						$("#tin_nhan").val("");
					// luon scroll xuong khi chat
					$(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
				}
			});
				e.preventDefault();
			});
		// load lai khung khi co nguoi chat voi minh
		
		// setInterval(function(){
		// 	$(".container").load("index.php?controller=user&action=nhantingv .messaging", function(){
		// 		$(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
		// 	});
		// }, 10);
	});

		$(document).ready(function(){
			// setInterval(function(){
			// 	$("#CountMessNotSeen").load('index.php?controller=user&action=nhantingv .CountMessNotSeen')
			// 	$("#numberMessNotSeen").load('index.php?controller=user&action=nhantingv .numberMessNotSeen')
			// 	$("#listUserSendMess").load('index.php?controller=user&action=nhantingv .listUserSendMess')
		 //    }, 10);
		});
		$(document).ready(function(){
		  $("#goixem").click(function(){
		    alert("ok");
		  });
		});

function CheckSeenMessGVSV() {
  document.getElementById("checkSeenGVSV").value = "0";
}
function CheckSeenMessGVGV() {
  document.getElementById("checkSeenGVGV").value = "0";
}
