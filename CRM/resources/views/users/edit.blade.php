<div class="container-fluid">


        <form class="" action="/user/update/{{$user->id}}" method="post">
          @csrf
          <div class="form-group">
          <input readonly type="hidden" value="0" name="is_new" required class="form-control" id="" >
          <label for="exampleInputUser1">User Name</label>
          <input readonly type="text" value="{{$user->name}}" name="name" required class="form-control" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Enter a User Name">
          </div>
          <div class="form-group">
          <label for="email">User Name</label>
          <input readonly type="email"  name="email" required class="form-control" id="email" aria-describedby="userHelp" placeholder="Enter a User Email" value = "{{$user->email}}">
          </div>
        <div class="form-group">
        <label for="role_id">Please select roles</label>
              <select class="" id="role_id" name="role_id[]" style="width: 100%; " multiple="multiple">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>

          </div>
          <button type="submit"  class="btn btn-primary" name="button">Save user</button>
        </form>


</div>
<script type="text/javascript">
$(document).ready(function() {
  // $('#department_id').select2();
  $('#role_id').select2({
    width: 'resolve' // need to override the changed default
});

var rol=[];
  @foreach ($user->roles()->get() as $role)
    rol.push({{$role->id}});
  @endforeach
  $("#role_id").val(rol);
  $("#role_id").trigger('change');






});
</script>
