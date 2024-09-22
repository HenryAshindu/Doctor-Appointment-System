<x-layout>
    
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold mb-6">Scheduled Appointments</h2>
        <table class="min-w-full bg-white shadow-md rounded">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">Patient Name</th>
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Date</th>
                    <th class="py-2 px-4">Time</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop over appointments -->
                @foreach($appointments as $appointment)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $appointment->patient_name }}</td>
                    <td class="py-2 px-4">{{ $appointment->title }}</td>
                    <td class="py-2 px-4">{{ $appointment->date }}</td>
                    <td class="py-2 px-4">{{ $appointment->time }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('appointments.show', ['id' => $appointment->id]) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-green-600 hover:underline ml-4">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>