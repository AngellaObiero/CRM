<div class="container-fluid">


        <form class="" action="/permission/store" method="post">
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Permission Name</label>
              <input type="text" name="name" required class="form-control" id="exampleInputPermission1" aria-describedby="permissionHelp" placeholder="Enter a Permission Name">
              <textarea type="text" name="description" required class="form-control" id="exampleInputPermission1" aria-describedby="permissionHelp" placeholder="Enter a Permission Description"/>

          </div>
          <button type="submit"  class="btn btn-primary" name="button">Save permission</button>
        </form>


</div>
