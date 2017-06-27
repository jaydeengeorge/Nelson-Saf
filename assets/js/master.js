/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time: 01:52 AM
 */
console.log('we here');

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
    console.log(data);
  })
  .fails(function(err){
    console.log(err);
  })
}

// Pass data to serve once submited
$('#complain-form').submit(function(e) {
  e.preventDefault()

  var formdata = new FormData(this)
  var complainUrl = $(this).attr('action')

  submitComplain(formdata, complainUrl)
})
