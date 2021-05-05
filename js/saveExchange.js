$(document).on('click','#btn-add',function(e) {
     
	 var data = $("#user_form").serialize();
	 var file = $("#image").files[0];
	 data.append('fileAjax', file, file.name);
	 alert(data);
     $.ajax({
        data: data,
        type: "POST",
        url: "/saveExchange.php",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#addEmployeeModal').modal('hide');
                alert('Data added successfully !');
                location.reload();
            }
            else{
                alert(dataResult);
            }
        }
    });  
});