@extends('admin.master.app')
@section('content')


@endsection

<!--
@section('script')
<script>
  $(document).ready(function() {
    $('#search-input-div').hide()

    $('#search-type').on('change', function() {
      $('#search-input-div').show()
    });

    $('#search-button').on('click', function(event) {
      event.preventDefault();
      var type = $('#search-type').val();
      var data = $('#search-input').val();

      if (type != '' && data != '') {
        $.ajax({
          type: "GET",
          url: "/admin/search",
          dataType: 'json',
          data: {
            type: type,
            data: data
          },
          success: function(response) {
            $('#table-result').html("")

            console.log(response.agents.length);
            if (response.agents.length > 0) {
              $.each(response.agents, function(i, item) {
                var $tr = $('<tr>').append(
                  $('<td>').text(item.city),
                  $('<td>').text(item.name),
                  $('<td> ').text(item.email),
                  $('<td>').text(item.phone),
                  $('<td>').text(item.birth_date),




                  $('<td>').text(""),

                  $('<td ">'),

                  // $('<td>').html"( <button class="btn btn-danger" type="submit">Delete</button>)"
                )
                $('#table-result').append($tr)
              });

            } else {

              var $tr = $('<tr>').append(
                $('<th colspan="5">').text(response.message),
              )
              $('#table-result').append($tr);
            }

          },
          error: function(err) {
            console.log(err);
          }
        });
      }
    });
  })
</script>
@stop -->