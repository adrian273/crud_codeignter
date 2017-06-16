<div class="row" style="padding-top:5px;">
  <div class="col-md-6">
    <!--Panel-->
<div class="card">
  <div class="card-header default-color-dark  white-text">
      Contactos <i class="fa fa-users"></i>
  </div>
  <div class="">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
          </tr>
        </thead>
          <tbody>
              <tr>
                  <?php foreach ($view_user as $user): ?>
                      <td><?=$user->username;?></td>
                      <td><?=$user->email;?></td>
                      <td><a href="#!"><i class="fa fa-remove"></i></a></button></td>
                      <td><a href="#!" style="color:red;"><i class="fa fa-pencil"></i></a></td>
                  <?php endforeach; ?>
              </tr>
          </tbody>
      </table>
  </div>
</div>
<!--/.Panel-->
  </div>
  <div class="col-md-6">
      <div class="">
        <div class="card">
          <div class="card-header default-color-dark  white-text">
              Ingresar Nuevo Contacto <i class="fa fa-plus"></i>
          </div>
          <div class="card-block">
            <div class="md-form">
                <input placeholder="Agregar Nombre" type="text" id="add_username" class="form-control">
                <label for="add_username">Nombre</label>
            </div>
            <div class="md-form">
                <input placeholder="Agregar Email" type="text" id="add_email" class="form-control">
                <label for="add_email">Email</label>
            </div>
            <div class="md-form">
                <button type="submit" name="button" class="btn btn-success btn-block">Enviar</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</div><!-- fin container -->
