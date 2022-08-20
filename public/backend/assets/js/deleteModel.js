function actionDelete(e) {
    e.preventDefault();
    let urlRequest = $(this).data("url");
    let btn = $(this);
    swal({
        title: 'Bạn chắc chứ ?',
        text: 'Sau khi xóa, bạn sẽ không thể khôi phục tệp này!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {

                    if (data.message === "success") {
                        btn.parent().parent().parent().remove();
                        swal('Ok rồi ! Bạn đã xóa thành công ', {
                            icon: 'success',
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }else{
            swal('OK ! Vẫn giữ bản ghi hiện tại');
        }
    });
}


$(function () {
    $(document).on("click", ".delete-category", actionDelete);
});
