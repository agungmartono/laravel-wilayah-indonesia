$("#province").change(function(){
    $.ajax({
        url: "home/getKabupaten?provinsi_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#city').html(data.html);
        }
    });
});

$("#city").change(function(){
    $.ajax({
        url: "home/getKecamatan?kabupaten_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#kecamatan').html(data.html);
        }
    });
});

$("#kecamatan").change(function(){
    $.ajax({
        url: "home/getDesa?kecamatan_id=" + $(this).val(),
        method: 'GET',
        success: function(data) {
            $('#desa').html(data.html);
        }
    });
});