/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time: 01:52 AM
 */

function submitComplain(formdata, url, method) {
  $.ajax({
    method: 'POST',
    url: url,
    data: formdata,
    cache: false,
    contentType: false,
    processData: false,
    statusCode: {
      200: function (data) {
        $.notify(data.responseJSON, "success");
      },
      422: function (errors) {
        $.each(errors.responseJSON, function(key, value) {
          $.notify(value, "error");
        })
      },
      500: function (err){
        $.notify(err.responseJSON, "error");
      },
    }
  })
}

// Pass data to serve once submited
$('#complain-form').submit(function(e) {
  e.preventDefault()

  var formdata = new FormData(this)
  var complainUrl = $(this).attr('action')

  submitComplain(formdata, complainUrl)
})
