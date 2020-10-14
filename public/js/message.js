$(function () {
  get_data();
});

function get_data() {
  $.ajax({
    url: "result/ajax/",
    dataType: "json",
    success: data => {
      // console.log(data);
      
     $("#message-data")
        .find(".message-visible")
        .remove();

    for (var i = 0; i < data.messages.length; i++) {
        var html = `
                    <div class="message-visible mb-3">
                      <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title" id="name">${data.messages[i].name}</h5>
                        <h6 class="card-subtitle mb2 text-muted" id="created_at">${data.messages[i].created_at}</h6>
                      </div>
                      <p class="card-text ml-3" id="comment">${data.messages[i].message}</p>
                    </div>
                `;

        $("#message-data").append(html);
    }
    },
    error: () => {
        alert("ajax Error");
    }
  });

  setTimeout("get_data()", 5000);
}