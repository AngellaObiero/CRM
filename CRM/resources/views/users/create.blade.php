<div class="container-fluid">


        <form class="" action="/user/store" method="post">
          @csrf
          <div class="form-group">
          <input readonly type="hidden" value="0" name="is_new" required class="form-control" id="" >
          <label for="exampleInputUser1">User Name</label>
          <input  type="text"  name="name" required class="form-control" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Enter a User Name">
          </div>
          <div class="form-group">
          <label for="email">Email</label>
          <input  type="email"  name="email" required class="form-control" id="email" aria-describedby="userHelp" placeholder="Enter a User Email">
          </div>
        <div class="form-group">
        <label for="role_id">Please select roles</label>
              <select class="" id="role_id" name="role_id[]" style="width: 100%; " multiple="multiple">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>

          </div>
          <div class="form-group">
              <label for="password" class="">{{ __('Password') }}</label>


                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            
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
});
</script>
