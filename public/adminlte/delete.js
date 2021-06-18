$(".delBtn").on("click", function(event) {
    swal({
        title: "Are You sure?",
        text: "Are You sure You want to delete this entry?",
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

