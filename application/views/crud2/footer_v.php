</footer> -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script>
      $(document).ready( function () {
          var table = $('#myTable').DataTable({
			pageLength: 5,
			lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
			dom: 'lBfrtip',
        	buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			// order: [[ 2, "asc" ]]
			

		  });
		  table.buttons().container().appendTo($('#printbar'));
      });

</script>
</body>

</html>
