$(document).ready(loadAllVehicles);

var selected = false

$("#btnsave").click(function () {
console.log("button clicked");

    if (selected == true) {
        var ajaxVehicle={

            method: "POST",
            url: "api/Vehicle.php",
            data: $("#VehicleForm").serialize() + "&action=update",
            async: true
        }


        $.ajax(ajaxVehicle).done(function (response) {
            $("#tblVehicle tbody tr").remove();
            loadAllVehicles();
            $("#txtvehicleID").val("");
            $("#txtvehicleNo").val("");
            $("#txtvehicleType").val("");
            $("#txtlocation").val("");
            $("#txtvehicleID").focus();

        })
    } else {

        var ajaxVehicle = {
            method: "POST",
            url: "api/Vehicle.php",
            data: $("#VehicleForm").serialize() + "&action=save",
            async: true
        }

        $.ajax(ajaxVehicle).done(function (response) {
            console.log(ajaxVehicle)
            $("#tblVehicle tbody tr").remove();
            loadAllVehicles();
            $("#txtvehicleID").val("");
            $("#txtvehicleNo").val("");
            $("#txtvehicleType").val("");
            $("#txtlocation").val("");
            $("#txtvehicleID").focus();
        })


    }
})

$("#btnAddnew").click(function () {
    selected = false;

    $("#txtvehicleID").val("");
    $("#txtvehicleNo").val("");
    $("#txtvehicleType").val("");
    $("#txtlocation").val("");
    $("#txtvehicleID").focus();


})

function loadAllVehicles() {

    var ajaxConfig = {
        method: "GET",
        url: "api/Vehicle.php?action=all",
        async: true

    };
    console.log(ajaxConfig);

    $.ajax(ajaxConfig).done(function (response) {
        console.log(response);
        response.forEach(function(vehicle){
            var html = "<tr>" +
                "<td>" + vehicle.vehicle_Id + "</td>" +
                "<td>" + vehicle.vehicle_no + "</td>" +
                "<td>" + vehicle.type + "</td>" +
                "<td>" + vehicle.location + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-sign-out"></i></td>' +
                "</tr>";

            $("#tblVehicle tbody").append(html);



            $(".recycle").off();
            $(".recycle").click(function () {
                console.log("click unaaa");

                var vehicleID = ($(this).parents("tr").find("td:first-child").text());
                console.log(vehicleID);


                if (confirm("Are you sure that you want to delete?")) {

                    $.ajax({
                        method: "DELETE",
                        url: "api/Vehicle.php?id=" + vehicleID,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            console.log(response);
                            alert("Vehicle has been successfully deleted from DB");
                            $("#tblVehicle tbody tr").remove();
                            loadAllVehicles();
                        } else {
                            alert("Failed to delete the Vehicle");
                        }
                    });

                }

            });


        });
        $("#tblVehicle tbody tr").off();
        $("#tblVehicle tbody tr").mouseenter(function () {
            $("tr").css("cursor","pointer")

        })



        $("#tblVehicle tbody tr").click(function (eventData) {
            console.log("row Clicked");

            console.log(eventData);


            $vehicle_Id = ($($(this).find("td").get(0)).text());
            $vehicle_no = ($($(this).find("td").get(1)).text());
            $type = ($($(this).find("td").get(2)).text());
            $location = ($($(this).find("td").get(3)).text());


            $("#txtvehicleID").val($vehicle_Id);
            $("#txtvehicleNo").val($vehicle_no);
            $("#txtvehicleType").val($type);
            $("#txtlocation").val($location);



            selected= true;


        })

    });

}

