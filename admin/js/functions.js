var id = "";

$(document).ready(function(){
  $('input[type=file]').bootstrapFileInput();

  setupPhotoModal();
  setupDeleteFile();
  setTitle();
  setupTip();
});

function setupPhotoModal(){
  $('.thumb').click(function(){
    $('#photoModal .modal-body').empty();
    var title = $(this).parent('a').attr("title");
    $('#photoModal .modal-title').html(title);
    var img = '<img src="' + $(this).attr('src') + '" alt="' + title + '">';
    $(img).appendTo('#photoModal .modal-body');
    $('#photoModal').modal({show:true});
  });
}

function setupDeleteFile(){
  $('.file-delete').click(function(){
    $('#askModal').modal({show:true});
    id = $(this).attr('name');
  });

  $('#delete-yes').click(function(){
      var id = window.id;
      var form = $('input[name="'+id+'"]').parent();
      var name = id.replace('-','');
      form.find('input[name="'+name+'"]').click();
  });
}

function setTitle(){
  $('img[id|="info"]').each(function() {
    var id = $(this).attr("id");
    var name = id.substr(5,id.length);
    var info = '<img src="img/' + name + '.png" alt="" class="theme-tooltip">';
    $(this).attr('title',info);
  });
}

function setupTip(){
  $('img[id|="info"]').tooltip({
    html : true,
    placement : "right"
  });
}

function checkAll(){
  $('.list-images input').prop('checked', true);
}

function uncheckAll(){
  $('.list-images input').prop('checked', false);
}