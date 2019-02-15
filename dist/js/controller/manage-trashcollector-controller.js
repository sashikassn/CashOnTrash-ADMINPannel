$(document).ready(loadAllTrashCollectors);

var selected = false

$("#btnsavedoc").click(function () {

console.log("buton click working");
    if(selected==true){
        var ajaxTrashCollector={

            method : "POST",
            url : "api/TrashCollector.php",
            data:$("#CollectorForm").serialize() + "&action=update",
            async : true

        }

        $.ajax(ajaxTrashCollector).done(function (response) {
            $("#tblTrashCollectors tbody tr").remove();
            loadAllTrashCollectors();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtTelephone").val("");
            $("#txtId").focus();


        })
    }else{

        var ajaxTrashCollector={

            method : "POST",
            url : "api/TrashCollector.php",
            data:$("#CollectorForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxTrashCollector).done(function (response) {


            $("#tblTrashCollectors tbody tr").remove();
            loadAllTrashCollectors();
            $("#txtId").val("");
            $("#txtName").val("");
            $("#txtTelephone").val("");
            $("#txtId").focus();


            if(response) {
                alert("Trash Collector Has been Added Successfully");


            }else {
                alert("Failed to save the Trash Collector")
            }

        })
    }





})

$("#btnAddnew").click(function () {
    selected =  false;
    $("#txtId").val("");
    $("#txtName").val("");
    $("#txtTelephone").val("");
    $("#txtId").focus();
})


function loadAllTrashCollectors(){

    var ajaxConfig = {
        method: "GET",
        url:"api/TrashCollector.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        console.log(response);
        response.forEach(function (trashcollector){
            var html = "<tr>" +
                "<td>" + trashcollector.user_Id + "</td>" +
                "<td>" + trashcollector.name + "</td>" +
                "<td>" + trashcollector.telephone + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";

            $("#tblTrashCollectors tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var TrashCollectorID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){


                    $.ajax({
                        method:"DELETE",
                        url:"api/TrashCollector.php?id=" + TrashCollectorID,
                        async: true
                    }).done(function(response){
                       if (response){
                           console.log(response);
                           alert("Trash Collector has been successfully deleted");
                           $("#tblTrashCollectors tbody tr").remove();
                           loadAllTrashCollectors();
                       } else{
                           alert("Failed to delete the Trash Collector");
                       }
                    });

                }

            });
       });
        $("#tblTrashCollectors tbody tr").off();
        $("#tblTrashCollectors tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })


        $("#tblTrashCollectors tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");
            $user_Id = ($($(this).find("td").get(0)).text());
            $name = ($($(this).find("td").get(1)).text());
            $telephone = ($($(this).find("td").get(2)).text());



            $("#txtId").val($user_Id);
            $("#txtName").val($name);
            $("#txtTelephone").val($telephone);

    console.log($userid);
            selected = true;





        })






    });



}
//
// $(document).on("click","#tblDoctors tbody tr",function () {
//
//     selected = true;
//     $("#txtId").val($(this).find("td:nth-child(1)").text());
//
//     $("#txtName").val($(this).find("td:nth-child(2)").text());
//     $("#txtAddress").val($(this).find("td:nth-child(3)").text());
//
//
// });