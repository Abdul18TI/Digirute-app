var SweetAlert_custom = {
    init: function() {
        $('.sweet').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah anda yakin ingin menghapus data ??`,
                text: "data akan hilang selamanya.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                form.submit();
              }
            });
        });
    }

};
(function($) {
    SweetAlert_custom.init()
})(jQuery);