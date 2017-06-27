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
  })
  .done(function(data){
    for (var i = 0; i < data.length; i++) {
      // console.log();
      $.notify(data[i], "error");
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
