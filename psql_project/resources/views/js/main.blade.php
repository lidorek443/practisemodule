<!-- toasts -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {

        $('#table-structure').DataTable({
            "bDestroy": true,
            "bLengthChange": false,
        });

        let db_name = '';

        // Task 4, 6, 8: Add AJAX calls below



        $(document).on("click", ".showTables", function(event) {
            event.stopPropagation();
            $("#showErdBtn").css('visibility', 'visible');
            $('.showTables li').remove();
            $('.table-name-nav').text('');
            $(".table-nav-dropdown").css('visibility', 'hidden');
            $('#table-structure').DataTable().clear().draw();
            db_name = $(this).text();
            $('.db-name-nav').text(db_name);
            $(".db-nav-dropdown").css('visibility', 'visible');

            let url = "{{URL('showTables')}}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    db_name: db_name
                },
                dataType: 'json',
                success: function(dataResult) {
                    $.each(dataResult.data, function(index, value) {
                        $("#" + db_name).append('<li class="li-table-name" style="font-weight:normal;"><a><span>' + value.table_name + '</span></a></li>');
                    });
                    $('.reference-table').append($('<option>', {
                        value: 0,
                        text: 'Select Table'
                    }));
                    $.each(dataResult.data, function(i, item) {
                        $('.reference-table').append($('<option>', {
                            value: item.table_name,
                            text: item.table_name
                        }));
                    });
                }
            });
        });



        $(document).on("click", "li", function(event) {
            event.stopPropagation();

            let table_name = $(this).text();
            $('.table-name-nav').text(table_name);
            $(".table-nav-dropdown").css('visibility', 'visible');

            $('#table-structure').DataTable({
                "bDestroy": true,
                "bLengthChange": false,
                "ajax": {
                    "url": "{{URL('showTableStructure')}}",
                    "type": "GET",
                    "data": {
                        _token: '{{ csrf_token() }}',
                        table_name: table_name
                    }
                },
                dataType: 'json',
                'columns': [{
                        'data': 'column_name'
                    },
                    {
                        render: function(data, type, row) {
                            if (row.column_name == row.primary_key) {
                                return "Primary Key";
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        'data': 'data_type',
                    },
                    {
                        'data': 'character_maximum_length'
                    },
                    {
                        'data': 'datetime_precision'
                    },
                    {
                        'data': 'numeric_precision'
                    },
                    {
                        'data': 'is_nullable'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },

                ]
            });
        });

        $('body').on('click', '.ConfirmAddTableCol', function() {
            let new_column_name = $(".new-col-name").val();
            let new_col_datatype = $(".new-col-datatype").val();
            let new_col_isNullable = $(".new-col-isNullable").val();
            let table_name = $('.table-name-nav').text();
            $.ajax({
                "url": "{{URL('addNewTableCol')}}",
                "type": "POST",
                "data": {
                    _token: '{{ csrf_token() }}',
                    new_column_name: new_column_name,
                    new_col_datatype: new_col_datatype,
                    new_col_isNullable: new_col_isNullable,
                    table_name: table_name
                },
                success: function(success) {
                    $('#table-structure').DataTable().ajax.reload();
                    $(".new-col-name").val('');
                    $('#addTableColModel').modal('hide');
                    Toastify({
                        text: "Column Added Successfully",
                        duration: 3000
                    }).showToast();
                },
                error: function(xhr) {
                    let err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        });


        $('body').on('click', '.ConfirmUpdateTableCol', function() {
            let column_name = $(".old-table-col-name").text();
            let table_name = $('.table-name-nav').text();
            let btn_id = this.id;
            let url = "{{URL('updateTableColumn/')}}";
            url = url + '/' + btn_id;
            let updated_isPk = 'no';
            if ($('#edit-col-updated_isPk').is(':checked')) {
                updated_isPk = 'yes';
            }
            $.ajax({
                "url": url,
                "type": "POST",
                "data": {
                    _token: '{{ csrf_token() }}',
                    column_name: column_name,
                    table_name: table_name,
                    updated_column_name: $('.edit-col-name').val(),
                    updated_data_type: $('.edit-col-datatype').val(),
                    updated_isNullable: $('.edit-col-isNullable').val(),
                    updated_isPk: updated_isPk,
                },
                success: function(success) {
                    $('#table-structure').DataTable().ajax.reload();
                    Toastify({
                        text: "Column updated Successfully",
                        duration: 3000
                    }).showToast();
                    $('#editTableColModel').modal('hide');
                },
                error: function(xhr) {
                    let err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        });

        $('.addForeignKey').on('click', function(e) {
            $(".reference-table").val(0).change();
            $('#addForeignKeyModel').modal('toggle');
            let table_name = $('.table-name-nav').text();
            $.ajax({
                "url": "{{URL('getColumnsOfTable')}}",
                "type": "get",
                "data": {
                    _token: '{{ csrf_token() }}',
                    table_name: table_name,
                },
                success: function(dataResult) {
                    $('.referenced-tables-cols').empty();
                    $('.local-table-cols').empty();
                    $.each(dataResult, function(i, item) {
                        $('.local-table-cols').append($('<option>', {
                            value: item.column_name,
                            text: item.column_name
                        }));
                    });
                }
            });
        });

        $('.dropTable').on('click', function(e) {
            let table_name = $('.table-name-nav').text();

            if (table_name != "") {
                $('.drop-table-name').text(table_name);
                $('#dropTableModel').modal('toggle');
            } else {
                Toastify({
                    text: "Please select a Table",
                    duration: 3000
                }).showToast();
            }
        });


        $('.createTable').on('click', function(e) {
            $('#createTableModel').modal('toggle');
        });

        $('.addTableCol').on('click', function(e) {
            $('#addTableColModel').modal('toggle');
        });


        $('body').on('click', '.delete', function() {
            let id = $(this).data('id');
            $('#deleteTableColModel').modal('toggle');
            $('.table-col-name').text(id);
        });


        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');
            let table_name = $('.table-name-nav').text();
            $(".old-table-col-name").text(id);

            $.ajax({
                "url": "{{URL('getTableColValues')}}",
                "type": "get",
                "data": {
                    _token: '{{ csrf_token() }}',
                    table_name: table_name,
                    column_name: id,
                },
                success: function(dataResult) {
                    $('#editTableColModel').modal('toggle');

                    $.each(dataResult.col_values, function(index, value) {
                        $('.edit-col-name').val(value.column_name);
                        $(".edit-col-datatype").val(value.data_type).change();
                        $(".edit-col-isNullable").val(value.is_nullable).change();
                    });
                    if (dataResult.pk_col.length == 0) {
                        $('#edit-col-updated_isPk').prop('checked', false);
                    }
                    $.each(dataResult.pk_col, function(index, value) {
                        if ($('.old-table-col-name').text() == value.attname) {
                            $('#edit-col-updated_isPk').prop('checked', true);
                        } else {
                            $('#edit-col-updated_isPk').prop('checked', false);
                        }
                    });
                },
                error: function(xhr) {
                    let err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        });

        $('body').on('click', '.addForeignKeyBtn', function() {
            let table_name = $('.table-name-nav').text();
            $.ajax({
                "url": "{{URL('addForeignKey')}}",
                "type": "post",
                "data": {
                    _token: '{{ csrf_token() }}',
                    table_name: table_name,
                    local_column_name: $('.local-table-cols').val(),
                    reference_table: $('.reference-table').val(),
                    referenced_table_col: $('.referenced-tables-cols').val(),
                },
                success: function() {
                    Toastify({
                        text: "FK Added Successfully",
                        duration: 3000
                    }).showToast();
                    $('#table-structure').DataTable().ajax.reload();
                    $('#addForeignKeyModel').modal('hide');
                },
                error: function(xhr) {
                    let err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        });



        $(".reference-table").change(function() {
            let table_name = this.value;
            $.ajax({
                "url": "{{URL('getColumnsOfTable')}}",
                "type": "get",
                "data": {
                    _token: '{{ csrf_token() }}',
                    table_name: table_name,
                },
                success: function(dataResult) {
                    $('.referenced-tables-cols').empty();
                    $.each(dataResult, function(i, item) {
                        $('.referenced-tables-cols').append($('<option>', {
                            value: item.column_name,
                            text: item.column_name
                        }));
                    });
                }
            });
        });

        $('.closeModal').on('click', function(e) {
            $('#addTableColModel').modal('hide');
            $('#createTableModel').modal('hide');
            $('#dropTableModel').modal('hide');
            $('#deleteTableColModel').modal('hide');
            $('#editTableColModel').modal('hide');
            $('#addForeignKeyModel').modal('hide');
        });
    });

    function showErdDiagram() {
        let db_name = $('.db-name-nav').text();
        let url = "{{ URL('showErdDiagram/') }}";
        url = url + '/' + db_name;
        document.location.href = url;
    }
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
