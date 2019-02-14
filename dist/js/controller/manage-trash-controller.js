$(document).ready(loadAllTrash);

var selected = false

$("#btnsave").click(function () {

    console.log("clickedddd");

    if(selected==true){
        var ajaxTrash={

            method : "POST",
            url : "api/Trash.php",
            data:$("#TrashForm").serialize() + "&action=update",
            async : true
        }
        $.ajax(ajaxTrash).done(function (response) {
            $("#tblTrash tbody tr").remove();
            loadAllTrash();
            $("#txttrashtype").val("");
            $("#txtweight").val("");
            $("#txtvalue").val("");
            $("#txttrashtype").focus();



    })



}else {
        var ajaxTrash={

            method : "POST",
            url : "api/Trash.php",
            data:$("#TrashForm").serialize()  + "&action=save",
            async : true

        }

        $.ajax(ajaxTrash).done(function (response) {


            $("#tblTrash tbody tr").remove();

            loadAllTrash();
            $("#txttrashtype").val("");
            $("#txtweight").val("");
            $("#txtvalue").val("");
            $("#txttrashtype").focus();

        })

    }
    })

$("#btnAddnew").click(function () {

    selected= false
    $("#txttrashtype").val("");
    $("#txtweight").val("");
    $("#txtvalue").val("");
    $("#txttrashtype").focus();

})

function loadAllTrash(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Trash.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (trash){
            var html = "<tr>" +
                "<td>" + trash.trash_type + "</td>" +
                "<td>" + trash.weight + "</td>" +
                "<td>" + trash.value + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";



            $("#tblTrash tbody").append(html);





            $(".recycle").off();
            $(".recycle").click(function(){

                var TrashType = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/Trash.php?id=" + TrashType,
                        async: true
                    }).done(function(response){
                        if (response){
                            alert("Trash has been successfully deleted");
                            $("#tblTrash tbody tr").remove();
                            loadAllTrash();
                        } else{
                            alert("Failed to delete !");
                        }
                    });

                }

            });
        });
        $("#tblTrash tbody tr").off();
        $("#tblTrash tbody tr").mouseenter(function(){
            $("tr").css("cursor","pointer");
        })

        $("#tblTrash tbody  tr").click(function (eventData) {
            console.log(eventData);
            console.log("raw eka click kraa");
            $trash_type = ($($(this).find("td").get(0)).text());
            $weight = ($($(this).find("td").get(1)).text());
            $value = ($($(this).find("td").get(2)).text());

            // $trash_type,$weight,$value

            $("#txttrashtype").val($trash_type);
            $("#txtweight").val($weight);
            $("#txtvalue").val($value);


            console.log($trash_type);
            selected = true;




        })






    });




}


