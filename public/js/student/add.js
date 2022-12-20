$(document).ready(function() {
    $("#roll_no").on("change", function() { //update student record by dropdown select 
        var id = this.value;
        $.ajax({
            url: "/students/fetch-student/" + id,
            type: "GET",
            dataType: 'json',
            success: function(result) {
                $.each(result, function(key, value) {
                    $("#student_name").val(value.student_name);
                    $("#age").val(value.age);
                });
            },
        });
    });
    $(document).on("click", "#clearbtn", function(e) { //for cancel button
        e.preventDefault();
        $(".studentForm")[0].reset();
        $("#message").html("");
        $("span").html("");
        $("#roll_no").val("");
        $("#student_name").val("");
        $("#age").val("");
        $(".invalid-feedback").hide();
        $(".form-group").find('.is-invalid').removeClass("is-invalid");
    });
    $('form input[type=text]').focus(function() {//hide error msg when you click input box
        $(this).siblings(".invalid-feedback").hide();
        $(this).parent(".form-group").find('.is-invalid').removeClass("is-invalid");
    });
});