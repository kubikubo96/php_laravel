<script language="javascript">
        function createPost() {
            // $.ajaxSetup : setup ms dùng đc ajax gửi dữ liệu trong laravel
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // phải có để lấy update của CKEDITOR
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            /*
            * sử dụng form data ms update được ảnh
            * */
            var formData = new FormData();
            formData.append('title', $('#title').val());
            formData.append('title_link', $('#title').val());
            formData.append('content_post', $('#content_post').val());
            formData.append('image', $('input[type=file]')[0].files[0]);
            $.ajax({
                url: "{{ route('post.add') }}",
                type: "post",
                dateType: "text",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (result) {
                    if (result.status == 1) {
                        $('.error_post').removeClass('hidden');
                        $('.error_post').text(result.message);
                    } else {
                        $('.error_post').removeClass('hidden');
                        $('.error_post').removeClass('text-danger');
                        $('.error_post').addClass(' text-success');
                        $('.error_post').text(result);
                    }
                    // console.log(1);
                }
            });
            // để ẩn modal
            $('#modal').modal('hide');
        }
    </script>