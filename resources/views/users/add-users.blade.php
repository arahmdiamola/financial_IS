<x-app-layout>

    <x-slot name="body_container">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                          </div>
                          <div class="mb-3">
                            <label for="organization" class="form-label">Organization</label>
                            <select class="form-control" name="organization" id="organization">
                                <option value="">Select Organization</option>
                                @foreach($organizations as $org)
                                    <option value="{{$org->id}}">{{$org->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="role" class="form-label">Designation</label>
                            <select class="form-control" name="role">
                                <option value="">Select User Designation</option>
                                @foreach(\App\Models\Designation::get() as $designation)
                                    <option value="{{ $designation->id}}">{{ $designation->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </x-slot>

    <!--start page wrapper -->

    <!--end page wrapper -->

    <x-slot  name="javascript">
        <script type="text/javascript">
            $('#organization').on('change', function(){
                var that = this
                $.ajax({
                    url:'/check_limit/'+this.value,
                    type:'get',
                    success: function(i) {
                        if(i == 1)
                        {
                            Swal.fire({
                                  title: "Error!",
                                  text: "This organization is at its user limit!",
                                  icon: "error"
                                });
                            $(that).val('').change();
                            return false;
                        }
                    }
                });
            });
        </script>
    </x-slot>

</x-app-layout>
    
