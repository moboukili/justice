        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

				
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                
				console.log(data);
				$('#update_id').val(data[0]);
                $('#name').val(data[1]);
                $('#numeo').val(data[2]);
				$('input[name="sexe"]:checked').val(data[3]);
				$('input[name="type"]:checked').val(data[4]);
				$('#motif').val(data[5]);
                $('#date_deb').val(data[6]);
                $('#date_fin').val(data[7]);
            });
        });

		$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
showNotification();

function showNotification() {
  $(".success")
    .fadeIn()
    .css({ right: 150, position: "absolute" })
    .animate( 5000, function(){
		location.reload(1)
});
}
