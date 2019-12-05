<div class="container-fluid">


        <form class="" action="/permission/update/{{$permission->id}}" method="post">
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Permission Name</label>
              <input type="text" value="{{$permission->name}}" name="name" required class="form-control" id="exampleInputPermission1" aria-describedby="permissionHelp" placeholder="Enter a Permission Name">
              <textarea type="text"  name="description" required class="form-control" id="exampleInputPermission1" aria-describedby="permissionHelp" placeholder="Enter a Permission Description">{{$permission->description}}</textarea>

          </div>
          <button type="submit"  class="btn btn-primary" name="button">Save permission</button>
        </form>


</div>
