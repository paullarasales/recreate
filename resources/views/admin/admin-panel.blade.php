<x-admin-layout>
    <div class="flex flex-col h-screen p-6">
        <div class="flex flex-col w-full h-12 gap-5">
            <h1 class="p-5 text-xl font-semibold">
                Users
            </h1>
             <!-- Table -->
             @if($users && count($users) > 0)
             <table class="w-full border-collapse">
                     <thead class="bg-gray-50 border-b-2 border-gray-200">
                         <tr>
                            <th class="p-3 text-md font-semibold tracking-wide text-left">ID</th>
                            <th class="p-3 text-md font-semibold tracking-wide text-left">User Name</th>
                            <th class="p-3 text-md font-semibold tracking-wide text-left">Full Name</th>
                            <th class="p-3 text-md font-semibold tracking-wide text-left">User Type</th>
                         </tr>
                     </thead>
                 <tbody class="bg-gray-50 border-b-2 border-gray-200">
                     <!-- Loop through events and display them -->
                     @foreach ($users as $user)
                         <tr>
                            <td class="p-3 text-md text-gray-700">#{{ $user->id }}</td>
                            <td class="p-3">
                                <div class="flex flex-row items-center justify-start">
                                    @if ($user->profile)
                                    <img src="{{ $user->profile }}" alt="Profile Image" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 100px;">
                                    @else
                                        <img src="default-profile-image.png" alt="Default Profile Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                    @endif
                                    <span>{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="p-3 text-md text-gray-700">{{ $user->fullname }}</td>
                            <td class="p-3 text-md text-gray-700">{{ $user->usertype }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         @else
             <p>No users found.</p>
         @endif
        </div>

    </div>
</x-admin-layout>
