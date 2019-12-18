$(document).ready(function() {
    var table = $('#tableBaiGiang').DataTable();
    $('#tableBaiGiang tbody tr').on('click', '#EditRow', function() {
        var data = table.row( this ).data();
       	var mabaigiang = document.getElementById('mabaihocEdit');
       	var maloaibaigiang = document.getElementById('maloai');
       	var mamonhoc = document.getElementById('mamon');
       	var lienket = document.getElementById('lienket');
       	var tenbaigiang = document.getElementById('tenbaihoc');
        var btnUpdate = document.getElementById('updatebaigiang');
        var btnUpload = document.getElementById('uploadbaigiang');
       	tenbaigiang.value = data[0];
       	mabaigiang.value = data[3];
       	lienket.value = data[4];
       	mamonhoc.value = data[5];
       	maloaibaigiang.value = data[6];
        btnUpdate.style.visibility = "visible";
        btnUpload.style.visibility = "hidden";
     $('html,body').animate({
        scrollTop: $(".formupdate").offset().top},
        'slow');
    });
    $('#tableBaiGiang tbody tr').on('click', '#DeleteRow', function() {
        var data = table.row( this ).data();
        var mabaigiang = document.getElementById('mabaihocDel');
        mabaigiang.value = data[3];
        if (confirm('Do you really want to delete?')) {
		    $('#deletebaigiang').click();
		} else {
		    // Do nothing!
		}
        
    } );
} );

// js bài giảng sv

$(document).ready(function() {
    var table = $('#tableBaiGiangSV').DataTable();
    $('#tableBaiGiangSV tbody tr').on('click', '#EditRow', function() {
        var data = table.row( this ).data();
        var mabaigiang = document.getElementById('mabaihocEditsv');
        var maloaibaigiang = document.getElementById('maloaisv');
        var mamonhoc = document.getElementById('mamonsv');
        var lienket = document.getElementById('lienketsv');
        var tenbaigiang = document.getElementById('tenbaihocsv');
        var btnUpdate = document.getElementById('updatebaigiangsv');
        var btnUpload = document.getElementById('uploadbaigiangsv');
        tenbaigiang.value = data[0];
        mabaigiang.value = data[3];
        lienket.value = data[4];
        mamonhoc.value = data[5];
        maloaibaigiang.value = data[6];
        btnUpdate.style.visibility = "visible";
        btnUpload.style.visibility = "hidden";
     $('html,body').animate({
        scrollTop: $(".formupdate").offset().top},
        'slow');
    });
    $('#tableBaiGiangSV tbody tr').on('click', '#DeleteRow', function() {
        var data = table.row( this ).data();
        var mabaigiang = document.getElementById('mabaihocDel');
        mabaigiang.value = data[3];
        if (confirm('Do you really want to delete?')) {
        $('#deletebaigiang').click();
    } else {
        // Do nothing!
    }
        
    } );
} );