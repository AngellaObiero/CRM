<div class="container-fluid">


        <form class="" action="/role/store" method="post">
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Role Name</label>
              <input type="text" id="name" name="name" required class="form-control" id="exampleInputRole1" aria-describedby="roleHelp" placeholder="Enter a Role Name">
              <label for="description">Enter a Role Description</label>
              <textarea type="text" id="description" name="description" required class="form-control" id="exampleInputRole1" aria-describedby="roleHelp" placeholder="Enter a Role Description"/>
              <label for="permission_id">Select permissions</label>
              <select style="width: 100%;" id="permission_id" name="permission_id[]" multiple>
                @foreach ($permissions as $permission)
                <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
              </select>
              <label for="landing_page">Landing Page(Optional)</label>
              <input type="text" id="landing_page" name="landing_page" required class="form-control" id="landing_page" aria-describedby="roleHelp" placeholder="Enter a Landing page path">
          </div>
          <button type="submit"  class="btn btn-primary" name="button">Save role</button>
        </form>


</div>
<script type="text/javascript">
$(document).ready(function() {
  // $('#department_id').select2();
  $('#permission_id').select2({
    width: 'resolve' // need to override the changed default
});

});
</script>
