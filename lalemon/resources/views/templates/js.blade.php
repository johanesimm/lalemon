<!-- Core JS files -->
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>

<script type="text/javascript">
    const ModalResponse = (responses) => {
        if(responses.status) {
            swal({
                title: "Congratulation!",
                text: responses.message,
                confirmButtonColor: "#66BB6A",
                type: "success",
            }, function() {
                location.reload();
            });
        } else {
            swal({
                title: "Error!",
                text: responses.message,
                confirmButtonColor: "#EF5350",
                type: "error"
            });
        }
    }
</script>