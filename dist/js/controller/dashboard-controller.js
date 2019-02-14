$(document).ready(function(){

    var ajaxConfig = {
        method:"GET",
        url:"api/Resident.php",
        data:{
            action:"count"
        },
        async:true
    }

    $.ajax(ajaxConfig).done(function(response){
        $("#lblResidentCount").text(response);
    });

    // $('#lblDoctorsCount').each(function () {
    //     $(this).prop('Counter',0).animate({
    //         Counter: $(this).text()
    //     }, {
    //         duration: 4000,
    //         easing: 'swing',
    //         step: function (now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //     });
    // });




    var ajaxconfig2 = {
        method: "GET",
        url:"api/TrashCollector.php",
        data:{
            action:"count"
        },
        async:true
    }
    $.ajax(ajaxconfig2).done(function (response) {
        $("#lblCollectorsCount").text(response);


    });
    var ajaxConfig3 = {

        method: "GET",
        url:"api/Vehicle.php",
        data:{
            action:"count"
        },
        async:true

    }
    $.ajax(ajaxConfig3).done(function (response) {
        $("#lblVehicleCount").text(response);

    });

    var ajaxConfig4 = {

        method: "GET",
        url:"api/Trash.php",
        data:{
            action:"count"
        },
        async:true
    }
    $.ajax(ajaxConfig4).done(function (response) {
        $("#lblTrashCount").text(response);

    });


});


