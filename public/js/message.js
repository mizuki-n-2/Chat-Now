$(function () {

  get_data();

  $('#icon-btn').on('click', function () {
    if ($("#file").is(":hidden")) {
      $('textarea').slideUp();
      $('#file,#msg-btn').removeClass('d-none');
      $('#photo-btn').addClass('d-none');
    } else {
      $('textarea').slideDown();
      $('#file,#msg-btn').addClass('d-none');
      $('#photo-btn').removeClass('d-none');
    }
  });
  
});

function get_data() {
  $.ajax({
    url: "result/ajax",
    dataType: "json",
    success: data => {
      // console.log(data);
      
     $("#msg-body")
        .find(".message-visible")
        .remove();

    for (var i = 0; i < data.messages.length; i++) {

      var messageClone = $('#message-data').clone(true).removeAttr('style').addClass('message-visible');
      messageClone.children('#name').first().append(data.messages[i].name);
      messageClone.children('#date').first().append(data.messages[i].date_time);

      if (data.messages[i].message) {
        messageClone.children('#message').first().append(data.messages[i].message);
      }

      if (data.messages[i].image) {
        var src = messageClone.children('#img').attr('src').replace('/image/001.JPG', '/storage/image/' + data.messages[i].image);
        messageClone.children('#img').first().attr('src', src);
        messageClone.children('#img').first().removeClass('d-none');
      }

      $('#msg-body').append(messageClone);

    }
    },
    error: () => {
        alert("ajax Error");
    }
  });

  setTimeout("get_data()", 5000);
}