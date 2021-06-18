$(".delBtn").on("click", function(event) {
    swal({
        title: "Jeste li sigurni?",
        text: "Da li ste sigurni da želite da obrišite podatke?",
        icon: "warning",
        dangerMode: true,
        buttons: ["Odustani", "Izbriši"],
    }).then(willDelete => {
        if (willDelete) {
            var form = $(this).parents('form:first');
            form.submit();
        } else {
            swal("Vaši podaci su sigurni!");
        }
    });
});

