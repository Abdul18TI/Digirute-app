var SweetAlert_custom = {
    init: function() {
        document.querySelector('.sweet-1').onclick = function(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            })
    }
    }

};
(function($) {
    SweetAlert_custom.init()
})(jQuery);