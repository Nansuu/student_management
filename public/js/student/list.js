$(document).ready(function () {
    let $modal = $("#deletemodal");
    $("#stuTable").on("click", ".del_", function (e) {//for delete modal
        e.preventDefault();
        let stu_id = $(this).attr("data-id");
        $modal.modal("show");
        $("#stu_id").val(stu_id);
    });
    $(".dateFilter").datepicker({//datepicker
        dateFormat: "yy-mm-dd",
        maxDate: new Date(),
    });
    $(".icon").on("click", function () {//if you click on icon , i want to open datepicker automatically
        $(".dateFilter").focus();
    });
    $("#searchInput").change(function () {//make datepicker selection as on change to retrieve related data
        stuTable.draw();
    });
    var stuTable = $("#stuTable").DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        language: { //change language for datatable information
            zeroRecords: "検索データがありません。",
            infoEmpty: "0 エントリ中 0 から 0 を表示",
            infoFiltered: "(合計 _MAX_ 件のエントリからフィルタリング)",
            info: "_MAX_ 件のエントリから _PAGE_ページ中の _PAGES_",
            lengthMenu: "表示 _MENU_ エントリ",
            paginate: {
                previous: "前へ",
                next: "次へ",
            },
        },
        ajax: {
            url: "/students/fetch-student-list",
            data: function (data) {
                data.search = $("#searchInput").val();
            },
        },
        columns: [
            {
                data: "SrNo",//for serial no of row count dynamically
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                searchable: false,
                sortable: false,
            },
            {
                data: "roll_no",
            },
            {
                data: "student_name",
            },
            {
                data: "age",
            },
            {
                data: "reg_date",
            },
            {
                data: "edit",
                searchable: false,
                sortable: false,
            },
            {
                data: "action",
                searchable: false,
                sortable: false,
            },
        ],
        rowCallback: function (row, data) {//change the color of row table
            $(row).css("background-color", "#F0E68C");
        },
    });
});
