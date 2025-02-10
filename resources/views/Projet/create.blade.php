<x-card-dashboard>
    <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t pb-8">
        <div class="flex justify-center text-2xl mt-3 mb-14 text-gray-700">
            <h2>NOUVEAU PROJET</h2>
        </div>
        <form action="{{route('project.store')}}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row">
                <label for="name" class="text-gray-700 font-semibold mx-5 text-nowrap" for="">Nom Project</label>
                <input id="name" name="nom_projet" class="h-9 rounded mx-5 w-full border-gray-300" type="text" required>
            </div>
            <div class="flex flex-row">
                <label for="date" class="text-gray-700 font-semibold  mr-[4.8rem] ml-5 text-nowrap" for="">Date</label>
                <input id="date" name="date" class="h-9 rounded mx-5 w-full border-gray-300" type="datetime-local"  value="{{ date('Y-m-d\TH:i') }}" >
            </div>
            <div class="flex flex-row">
                <label for="files" class="text-gray-700 font-semibold mr-14 ml-5 text-nowrap">Fichiers</label>
                <input id="files" name="fichier[]" class="mx-5" type="file" multiple required>
            </div>
            <div>
                <button type="submit" class="mt-2 mx-4 px-4 py-1 bg-green-600 hover:bg-green-700 transition ease-in-out text-white">ENREGISTRER</button>
            </div>
        </form>
    </div>
</x-card-dashboard>
