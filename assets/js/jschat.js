
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
		setInterval(function(){
			$(".container").load("index.php?controller=user&action=nhantin .messaging", function(){
				$(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
			});
		}, 10);
	});

$(document).ready(function(){
	setInterval(function(){
		$("#numberMessNotSeen").load('index.php?controller=user&action=nhantin .numberMessNotSeen')
		$("#CountMessNotSeen").load('index.php?controller=user&action=nhantin .CountMessNotSeen')
		$("#listUserSendMess").load('index.php?controller=user&action=nhantin .listUserSendMess')
    }, 10);
});
function CheckSeenMessSVGV() {
  document.getElementById("checkSeenSVGV").value = "0";
}
// function CheckSeenMessSVSV() {
//  document.getElementById("yesyauto").click();
// }
// $(document).ready(function () {

//     $('#yesyauto').click(function (event) {
//         alert("Đã có lick");
        
//     });
// });
