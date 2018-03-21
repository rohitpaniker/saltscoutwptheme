jQuery(document).ready( function($) {
  var ppp = -1; // Post per page
  var pageNumber = 1;
  // $('#menu-primary-menu-links').addClass('navbar-nav ml-auto');
  // document.getElementById('menu-primary-menu-links').classList.add('navbar-nav');
  // document.getElementById('menu-primary-menu-links').classList.add('ml-auto')
  // document.getElementById('menu-primary-menu-links').classList.remove('menu')
  $('.navbar-nav').removeAttr('id');
  //
  // $(".menu-item").addClass("nav-item");
  // $('.nav-item').removeAttr('id');
  // console.log($('nav-item'))
  // $('.nav-item').removeClass('menu-item-type-post_type');
  // $('.nav-item').removeClass('menu-item-object-page');
  // $('.nav-item').removeClass('menu-item-has-children');
  // $('.nav-item').removeClass('menu-item-55');
  // $('.nav-item').removeClass('menu-item');
  //
  // $('.nav-item a').addClass('nav-link dropdown-toggle commonMenuStyle');

  function load_posts(){
      pageNumber++;
      var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
      console.log('ajax_posts.ajaxurl', ajax_posts.ajaxurl);
      $.ajax({
          type: "POST",
          dataType: "html",
          url: ajax_posts.ajaxurl,
          data: str,
          success: function(data){
              var $data = $(data);
              if($data.length){
                  $("#ajax-posts").empty().append($data);
                  $('#more_posts').addClass('viewAllBtnHide');
                  $("#more_posts").attr("disabled",false);
              } else{
                  $("#more_posts").attr("disabled",true);
              }
          },
          error : function(jqXHR, textStatus, errorThrown) {
              $("#ajax-posts").html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
          }

      });
      return false;
  }

  function submitData(formdata, action) {
    $.ajax({
      type: 'POST',
      url: ajax_posts.ajaxurl,
      data: {
        action: action,
        data: formdata,
        security: ajax_posts.security
      },
      success: function(response) {
        $('div.callToAction').empty().append('<div class="alert alert-success">'+response+'</div>');
      },
      error: function(err) {
        $('div.callToAction').empty().append('<div class="alert alert-success">'+err+'</div>');
      }
    });
    return false;
  }

  $("#more_posts").on("click",function(e){ // When btn is pressed.
      $("#more_posts").attr("disabled",true); // Disable the button, temp.
      console.log('clicked more posts!!');
      console.log('ajax_posts.ajaxurl', ajax_posts.ajaxurl);
      load_posts();
  });

  $("#joinUsBtn").on("click", function(e) {
    // e.preventDefault();
    submitData({email: document.getElementById('userEmailTextArea').value}, 'form_action_function');
  });
});
