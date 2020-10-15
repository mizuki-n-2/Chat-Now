$(function () {

  get_data();
  
});

function get_data() {
  $.ajax({
    url: "result/ajax/",
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
        messageClone.children('#message').first().append(data.messages[i].message);
        $('#msg-body').append(messageClone);

    }
    },
    error: () => {
        alert("ajax Error");
    }
  });

  setTimeout("get_data()", 5000);
}