<x-app-layout>

    <x-slot name="body_container">
        <div class="page-wrapper">
            <div class="page-content">
            <a href="users/create" class="btn btn-primary" type="button">Add User</a>
                <table id="users" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Organization</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->getOrg->name}} </td>
                            <td> {{$user->getRole->name}} </td>
                            <td> <button>Edit</button><button>Delete</button> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>

    <!--start page wrapper -->

    <!--end page wrapper -->

    <x-slot  name="javascript">
        <script type="text/javascript">
            let table = new DataTable('#users');
        </script>
    </x-slot>

</x-app-layout>
    
