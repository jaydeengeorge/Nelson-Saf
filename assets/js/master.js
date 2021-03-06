/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time: 01:52 AM
 */

function httpCall(formdata, url) {
  $.ajax({
    method: 'POST',
    url: url,
    data: formdata,
    cache: false,
    contentType: false,
    processData: false,
    statusCode: {
      200: function (data) {
        $.notify(data, "success");
        setTimeout(function (errors) {
          // window.location.reload();
        }, 2000)
      },
      404: function (errors) {
        $.notify('Error: 404! Not Found!', "error");
      },
      422: function (errors) {
        $.each(errors.responseJSON, function(key, value) {
          $.notify(value, "error");
        })
      },
      500: function (err){
        $.notify(err.responseJSON, "error");
        setTimeout(function () {
          window.location.reload();
        }, 2000)
      },
    }
  })
}

// Pass data to serve once submited
$('#complain-form').submit(function(e) {
  e.preventDefault()

  var formdata = new FormData(this)
  var complainUrl = $(this).attr('action')

  httpCall(formdata, complainUrl);
})

// Submitting log in form
$('#login-form').submit(function(e) {
  e.preventDefault()

  var formdata = new FormData(this)
  var complainUrl = $(this).attr('action')

  httpCall(formdata, complainUrl);
})

// Delete complain
$('.btn-delete').click(function(e){
  e.preventDefault()
  data = {
    id: 4,
    name: 'joram'
  }
  var formdata = new FormData()
  formdata.values = data

  console.log(formdata);
  httpCall(formdata, delComplain);
});

// Assign issues to agent
$('.assign-to').click(function (e) {
  e.preventDefault()
  var compalain_id = $(this).attr('value')

  $.get(listAgents).done(
    function (data) {
      $('#agentsModal').modal('toggle')
        console.log(data.agents);
      $.each(data.agents, function (key, agent) {
        $('#agent_list').append("<li>"+agent.name+"</li>")
      })
    }
  )
})
