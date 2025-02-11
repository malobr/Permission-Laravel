<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
        <a href="{{route('roles.create')}}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <x-message></x-message>
           
            </table>
            <div class="my-3">
            </div>
        </div>
    </div>
    <x-slot name="script">
    <script type="text/javascript">
        function deletePermission(id) {
            if(confirm("Are you sure you want to delete this permission?")) {
                $.ajax({
                    url: '{{ route("permissions.destroy", ":id") }}'.replace(':id', id),
                    type: "POST",
                    data: {
                        id: id,
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "JSON",
                    success: function(response) {
                        window.location.href = '{{ route("permissions.index") }}';
                    },
                    error: function(xhr) {
                        alert("Error deleting permission");
                    }
                });
            }
        }
    </script>
</x-slot>

</x-app-layout>
