<x-default-layout title="Major" section_title="Majors">
    <div class="flex mb-4">
        <a href="{{ route('majors.create') }}"
            class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Major</div>
        </a>
    </div>

    <div class="col-span-3 sm:col-span-2 overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Major Name</th>
                    <th class="py-3 px-6 text-center">Total Students</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @foreach ($majors as $index => $major)
                    <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                        <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $major->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $major->total_students }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('majors.show', $major->id) }}"
                                class="bg-blue-50 border border-blue-500 p-2 inline-block">
                                <i class="ph ph-eye block text-blue-500"></i>
                            </a>
                            <a href="{{ route('majors.edit', $major->id) }}"
                                class="bg-yellow-50 border border-yellow-500 p-2 inline-block">
                                <i class="ph ph-note-pencil block text-yellow-500"></i>
                            </a>
                            <form action="{{ route('majors.destroy', $major->id) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this major?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 border border-red-500 p-2">
                                    <i class="ph ph-trash-simple block text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-default-layout>
