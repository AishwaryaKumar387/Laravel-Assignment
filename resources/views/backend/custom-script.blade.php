<script>
    // Create a new Date object
    var today = new Date();

    // Get the day of the month (1-31)
    var day = today.getDate();

    // Get the month name (January-December)
    var month = today.toLocaleString('default', {
        month: 'long'
    });

    // Get the year (4 digits)
    var year = today.getFullYear();

    // Format the date string
    var formattedTodayDate = day + getOrdinalSuffix(day) + ' ' + month + ' ' + year;

    // Function to get the ordinal suffix for the day (st, nd, rd, th)
    function getOrdinalSuffix(day) {
        if (day >= 11 && day <= 13) {
            return 'th';
        }
        switch (day % 10) {
            case 1:
                return 'st';
            case 2:
                return 'nd';
            case 3:
                return 'rd';
            default:
                return 'th';
        }
    }


    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /**Firefox Whitespace**/
    $(document).on('keyup', 'input[type="email"]', function(e) {
        let element = $(this);
        if (element.val() != '') {
            var val = element.val();
            val = val.replace(/\s/g, '');
            if (val != element.val()) {
                element.val(val);
            }
        }
    })
    $(document).on('blur', 'input[type="email"]', function(e) {
        let element = $(this);
        if (element.val() != '') {
            var val = element.val();
            val = val.replace(/\s/g, '');
            if (val != element.val()) {
                element.val(val);
            }
        }
    })

    /*On delete*/
    $(document).on('click', '.trash_data', function(e) {
        e.preventDefault();
        $(document).find('.alert').remove();
        var self = $(this);
        var post_url = $(this).attr('href');
        var data_title = $(this).data('title');
        //swal 
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: post_url,
                        type: 'DELETE', // destroy
                        dataType: "json",
                        success: function(result) {
                            if (result.status == "success") {
                                swal('Proof! ' + data_title + ' has been deleted!', {
                                    icon: "success",
                                });
                                self.addClass('d-none');
                                self.parents("tr").find('.restore_data').removeClass('d-none');
                                self.parents("tr").find('td:nth-child(9)').html(formattedTodayDate)
                            } else {
                                swal(data_title + ' is safe!');
                            }

                        }
                    });
                } else {
                    swal(data_title + ' is safe!');
                }
            });
    })

    //on changing checkbox of status
    $(document).on("change", ".status_checkbox", function(e) {
        e.preventDefault();
        var self = $(this);
        var post_id = $(this).data('id');
        var post_url = $(this).data('href');
        var post_val = $(this).val();
        var data_title = $(this).data('title');
        var status_val = 1;
        var self = $(this);
        if ((post_id != '')) {
            if (post_val == 1) {
                status_val = 0;
            }
            var data = {
                id: post_id,
                value: status_val
            };
            var text_for_swal = data_title + ' will be active !';
            if (data_title == "Lottery") {
                var text_for_swal = 'Only one ' + data_title + ' of smilar category will be active !';
                var text_for_swal = data_title + ' will be active !';
            }

            if (post_val == 1) {
                var text_for_swal = data_title + ' will be deactivated!';
            }
            //swal 
            swal({
                    title: "Are you sure?",
                    text: text_for_swal,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: post_url,
                            type: 'POST', // change status
                            data: data,
                            dataType: "json",
                            success: function(result) {
                                if (result.status == "success") {

                                    if (result.val == 1) {
                                        if ((typeof result.quick_message !== 'undefined') && (
                                                result.quick_message != "")) {
                                            swal(result.quick_message, {
                                                icon: "success",
                                            });
                                        } else {
                                            swal(data_title + " has activated!", {
                                                icon: "success",
                                            });
                                        }
                                        self.val(result.val);
                                        self.prop('checked', true);
                                    } else if (result.val == 3) {
                                        if ((typeof result.quick_message !== 'undefined') && (
                                                result.quick_message != "")) {
                                            swal(result.quick_message, {
                                                icon: "success",
                                            });
                                        } else {
                                            swal(data_title + " has activated!", {
                                                icon: "success",
                                            });
                                        }
                                        self.val(result.val);
                                        self.prop('checked', true);
                                        // setTimeout(() => {
                                        //     location.reload();
                                        // }, 1000);
                                    } else {
                                        if ((typeof result.quick_message !== 'undefined') && (
                                                result.quick_message != "")) {
                                            swal(result.quick_message, {
                                                icon: "success",
                                            });
                                        } else {
                                            swal(data_title + " has deactivated!", {
                                                icon: "success",
                                            });
                                        }
                                        self.val(result.val);
                                        self.prop('checked', false);
                                    }

                                } else if (result.status == "empty_error") {
                                    if (self.is(':checked')) {
                                        self.prop('checked', false);
                                    } else {
                                        self.prop('checked', true);
                                    }
                                    swal(result.message);
                                } else if (result.status == "expired_error") {
                                    if (self.is(':checked')) {
                                        self.prop('checked', false);
                                    } else {
                                        self.prop('checked', true);
                                    }
                                    swal(result.msg);
                                } else {
                                    if (self.is(':checked')) {
                                        self.prop('checked', false);
                                    } else {
                                        self.prop('checked', true);
                                    }
                                    swal(data_title + " status not changed!");
                                }

                            }
                        });
                    } else {
                        if (self.is(':checked')) {
                            self.prop('checked', false);
                        } else {
                            self.prop('checked', true);
                        }
                        swal(data_title + " status not changed!");
                    }
                });
        }
    })
</script>
