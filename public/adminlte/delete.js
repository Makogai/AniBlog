$(".delBtn").on("click", function(event) {
    let warning = $(".delBtn").data('warning');
    swal({
        title: "Are You sure?",
        text: warning,
        icon: "warning",
        dangerMode: true,
        buttons: ["Cancel", "Delete"],
    }).then(willDelete => {
        if (willDelete) {
            var form = $(this).parents('form:first');
            form.submit();
        } else {
            swal("Your data is safe!");
        }
    });
});

