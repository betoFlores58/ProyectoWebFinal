$(document).ready(function () {

    $("#loginForm").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario Correcto...",
                        callback:function() {
                            window.location.href = "../Slider Jquery/index.php";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o password incorrectos"
                    });
                }
            },
            error: function () {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrectos"
                });
            }
        });
        return false;
    });
});