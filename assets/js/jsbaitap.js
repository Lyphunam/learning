$(document).ready(function(){
	var socau = document.getElementById('socauhoi');
	var mamon = document.getElementById('mamon');
	var thoihan = document.getElementById('thoihan');
	var tenbt = document.getElementById('tenbaitap');
	////
	var cauhoi = document.getElementById('frmcauhoi');
	var khoitao = document.getElementById('frmkhoitao');
	////
	var getsocau = document.getElementById('getsocau');
	var getmamon = document.getElementById('getmamon');
	var getthoihan = document.getElementById('getthoihan');
	var gettenbt = document.getElementById('gettenbaitap');
	/////
	var psocau = document.getElementById('psocau');
	var pmonhoc = document.getElementById('pmonhoc');
	var pthoihan = document.getElementById('pthoihan');
	var ptenbaitap = document.getElementById('ptenbaitap');
	////
	//var tbody = document.getElementById('addTrCauHoi');
	$("#khoitaobaitap").click(function(){
        cauhoi.style.display = "block";
        khoitao.style.display = "none";
        // add vào form hidden
        getsocau.value = socau.value;
        getmamon.value = mamon.value;
        getthoihan.value = thoihan.value;
        gettenbt.value = tenbt.value;
        // add vào thẻ p
        ptenbaitap.innerHTML = "Tên bài tập: " + tenbt.value;
        psocau.innerHTML = "Số câu hỏi: " + socau.value;
        pmonhoc.innerHTML = "Môn học: " + myNewFunction(mamon);
        if (thoihan.value == "") {
        	pthoihan.innerHTML = "Thời hạn nộp bài: Không có thời hạn nộp";
        }
        else{
        	pthoihan.innerHTML = "Thời hạn nộp bài: " + thoihan.value[8] + thoihan.value[9] + "-" + thoihan.value[5] + thoihan.value[6] + "-" + thoihan.value[0] + thoihan.value[1] + thoihan.value[2] + thoihan.value[3];
        }
        // thêm các tr
   
		for (var i = socau.value; i > 0; i--){
        	  var table = document.getElementById("addTrCauHoi");
			  var row = table.insertRow(0);
			  var cell1 = row.insertCell(0);
			  var cell2 = row.insertCell(1);
			  var cell3 = row.insertCell(2);
			  var cell4 = row.insertCell(3);
			  var cell5 = row.insertCell(4);
			  var cell6 = row.insertCell(5);
			  var cell7 = row.insertCell(6);
			  cell1.innerHTML = 'Câu ' + i;
			  cell2.innerHTML = '<input type="text" class="form-control" name="tencauhoi'+i+'" id="tencauhoi'+i+'">';
			  cell3.innerHTML = '<input type="text" class="form-control" name="dapana'+i+'" id="dapana'+i+'">';
			  cell4.innerHTML = '<input type="text" class="form-control" name="dapanb'+i+'" id="dapanb'+i+'">';
			  cell5.innerHTML = '<input type="text" class="form-control" name="dapanc'+i+'" id="dapanc'+i+'">';
			  cell6.innerHTML = '<input type="text" class="form-control" name="dapand'+i+'" id="dapand'+i+'">';
			  cell7.innerHTML = '<input type="text" class="form-control" name="dapandung'+i+'" id="dapandung'+i+'">';
        }
   });
	// event quay lai
    $("#quaylai").click(function(){
        cauhoi.style.display = "none";
        khoitao.style.display = "block";
        for (var i = socau.value -1 ; i >= 0; i--){
        	document.getElementById("addTrCauHoi").deleteRow(i);
        }
   });
    // event edit table baitap
    var table = $('#tableBaiTap').DataTable();
	$('#tableBaiTap tbody tr').on('click', '#EditRow', function() {
	        var data = table.row( this ).data();
	        var mabtEdit = document.getElementById('mabaitapEdit');
	        var tenbt = document.getElementById('tenbaitap');
	        var mamonhoc = document.getElementById('mamon');
	        var thoigian = document.getElementById('thoihan');
	        var socau = document.getElementById('socauhoi');
	        tenbt.value = data[0];
	        mamonhoc.value = data[5];
	        thoigian.value = data[6];
	        socau.value = data[2];
	        mabtEdit.value = data[4];
	        var btnUpdate = document.getElementById('updatebaitap');
	        var btnKhoitao = document.getElementById('khoitaobaitap');
	        btnUpdate.style.visibility = "visible";
	        btnKhoitao.style.visibility = "hidden";
	     $('html,body').animate({
	        scrollTop: $(".formupdate").offset().top},'slow');
	    });
	// event delete
	$('#tableBaiTap tbody tr').on('click', '#DeleteRow', function() {
        var data = table.row( this ).data();
        var mabaitapDel = document.getElementById('mabaitapDel');
        mabaitapDel.value = data[4];
        if (confirm('Do you really want to delete?')) {
		    $('#deleteBaiTap').click();
		} else {
		    // Do nothing!
		}
        
    });
});

function myNewFunction(sel) {
  return sel.options[sel.selectedIndex].text;
}
