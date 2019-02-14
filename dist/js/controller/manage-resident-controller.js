$(document).ready(loadAllResidents);

var selected = false

$("#btnsave").click(function () {

    console.log("buton click working");
    if(selected==true){
        var ajaxResident={

            method : "POST",
            url : "api/Resident.php",
            data:$("#ResidentForm").serialize() + "&action=update",
            async : true

        }

        $.ajax(ajaxResident).done(function (response) {
            $("#tblResident tbody tr").remove();
            loadAllResidents();
            $("#txtuserid").val("");
            $("#txtname").val("");
            $("#txtaddress").val("");
            $("#txttelephone").val("");
            $("#txtlevel").val("");
            $("#txtpoint").val("");
            $("#txtuserid").focus();


        })
    }else{

        var ajaxResident={

            method : "POST",
            url : "api/Resident.php",
            data:$("#ResidentForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxResident).done(function (response) {


            $("#tblResident tbody tr").remove();
            loadAllResidents();
            $("#txtuserid").val("");
            $("#txtname").val("");
            $("#txtaddress").val("");
            $("#txttelephone").val("");
            $("#txtlevel").val("");
            $("#txtpoint").val("");
            $("#txtuserid").focus();
        })
    }





})

$("#btnAddnew").click(function () {
    selected =  false
    $("#txtuserid").val("");
    $("#txtname").val("");
    $("#txtaddress").val("");
    $("#txttelephone").val("");
    $("#txtlevel").val("");
    $("#txtpoint").val("");
    $("#txtuserid").focus();
})


function loadAllResidents(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Resident.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (resident){
            var html = "<tr>" +
                "<td>" + resident.user_Id + "</td>" +
                "<td>" + resident.name + "</td>" +
                "<td>" + resident.address + "</td>" +
                "<td>" + resident.telephone + "</td>" +
                "<td>" + resident.level + "</td>" +
                "<td>" + resident.points + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";



            $("#tblResident tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var User_ID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/Appointment.php?id=" + User_ID,
                        async: true
                    }).done(function(response){
                        if (response){
                            alert("Resident has been successfully removed !");
                            $("#tblResident tbody tr").remove();
                            loadAllResidents();
                        } else{
                            alert("Failed to delete the Resident");
                        }
                    });

                }

            });
        });
        $("#loadAllResidents tbody tr").off();
        $("#loadAllResidents tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })
        // $("# tbody  tr").click(function (eventData) {
        //     console.log("raw eka click kraa");
        //
        //     $id = ($($(this).find("td").get(0)).text());
        //     $name = ($($(this).find("td").get(1)).text());
        //     $address = ($($(this).find("td").get(2)).text());
        //
        //     $("#txtId").val($id);
        //     $("#txtName").val($name);
        //     $("#txtAddress").val($address);

        $("#loadAllResidents tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");

            //$user_Id,$name,$address,$telephone,$level,$points

            $user_Id = ($($(this).find("td").get(0)).text());
            $name = ($($(this).find("td").get(1)).text());
            $address = ($($(this).find("td").get(2)).text());
            $telephone = ($($(this).find("td").get(3)).text());
            $level = ($($(this).find("td").get(4)).text());
            $points = ($($(this).find("td").get(5)).text());

            $("#txtuserid").val($user_Id);
            $("#txtname").val($name);
            $("#txtaddress").val($address);
            $("#txttelephone").val($telephone);
            $("#txtlevel").val($level);
            $("#txtpoint").val($points);

            console.log($user_Id);
            selected = true;




        })






    });



}
//
// $(document).on("click","# tbody tr",function () {
//
//     selected = true;
//     $("#txtId").val($(this).find("td:nth-child(1)").text());
//
//     $("#txtName").val($(this).find("td:nth-child(2)").text());
//     $("#txtAddress").val($(this).find("td:nth-child(3)").text());
//
//
// });