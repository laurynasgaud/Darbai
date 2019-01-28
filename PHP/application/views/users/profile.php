<?php echo validation_errors();?>
<div class="modal fade " id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document" id="myfrom">
    <div class="modal-content">
      <form method="post" accept-charset="utf-8">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCenterTitle"><?php echo lang('e_info') ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning">
                <input type="checkbox" autocomplete="off"> <?php echo lang('fname') ?>
              </label>
            </div>
            <input value="<?php echo($this->session->userdata('fname')) ?>" name="fname" type="text" class="form-control" aria-describedby="fname" disabled="disabled">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning">
                <input type="checkbox" autocomplete="off"> <?php echo lang('lname') ?>
              </label>
            </div>
            <input value="<?php echo($this->session->userdata('lname')) ?>" name="lname" type="text" class="form-control" aria-describedby="lname" disabled="disabled">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning">
                <input type="checkbox" autocomplete="off"> <?php echo lang('login_name') ?>
              </label>
            </div>
            <input value="<?php echo($this->session->userdata('email')) ?>" name="email" type="text" class="form-control" aria-describedby="email" disabled="disabled">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning">
                <input type="checkbox" autocomplete="off"> <?php echo lang('password') ?>
              </label>
            </div>
            <input name="pword" type="text" class="form-control" aria-describedby="pword" disabled="disabled">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('close') ?></button>
          <button id="submit" onclick="isit_good()" type="submit" class="btn btn-primary"><?php echo lang('s_changes') ?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><?php echo($this->session->userdata('fname')) ?> <?php echo($this->session->userdata('lname')) ?><button data-toggle="modal" data-target="#ModalCenter" type="button" class="btn btn-outline-dark btn-lg"><i class="fas fa-cog"></i></button>
          <button data-toggle="" data-target="" type="button" class="btn btn-outline-dark btn-lg"><i class="fas fa-briefcase"></i></button>
      <div class="container">
        <div class="row">
          <div class="col col-lg-3"><?php echo lang('fname') ?>:</div>
          <div class="col"><?php echo($this->session->userdata('fname')) ?></div>
          <div class="w-100"></div>
          <div class="col col-lg-3"><?php echo lang('lname') ?>:</div>
          <div class="col"><?php echo($this->session->userdata('lname')) ?></div>
          <div class="w-100"></div>
          <div class="col col-lg-3"><?php echo lang('login_name') ?>:</div>
          <div class="col"><?php echo($this->session->userdata('email')) ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

  var seubas = {fname:true, lname:true, email:true, pword:true};

  $("input[type='checkbox']").change(function() {
    var input = $(this).parents(".input-group").find("input[type='text']")
    if($(this).is(':checked')){
      input.removeAttr("disabled");
    }
    else{
      var name = input.attr('value');
      input.val(name);
      var kve = input.attr('name');
      seubas[kve] = true;
      input.attr("disabled", true);
      input.removeClass("is-invalid");
      input.removeClass("is-valid");
    }
  });

  function isit_good(){
    if(seubas.fname && seubas.lname && seubas.email && seubas.pword){
      console.log('noo');
      $('form').submit();
    }
    else{
      event.preventDefault();
    }
  }

  $("input[name='fname']").on('keyup change', function() {
    var val = $(this).val().trim();
    var val_l = val.length;
    if(val_l<3 || !/^[a-zA-Z]+$/.test(val)){
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      seubas.fname = false;
    }
    else{
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      seubas.fname = true;
    }
  })

  $("input[name='lname']").on('keyup change', function() {
    var val = $(this).val().trim();
    var val_l = val.length;
    if(val_l<3 || !/^[a-zA-Z]+$/.test(val)){
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      seubas.lname = false;
    }
    else{
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      seubas.lname = true;
    }
  })

  $("input[name='email']").on('keyup change', function() {
    var val = $(this).val().trim();
    var val_l = val.length;
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    if(val_l<6 || !pattern.test(val)){
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      seubas.email = false;
    }
    else{
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      seubas.email = true;
    }
  })

  $("input[name='pword']").on('keyup change', function() {
    var val = $(this).val().trim();
    var val_l = val.length;
    if(val_l<6 || !/^[a-zA-Z0-9]+$/.test(val)){
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      seubas.pword = false;
    }
    else{
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      seubas.pword = true;
    }
  })
</script>
</body>
</html>
