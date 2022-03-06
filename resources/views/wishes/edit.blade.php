<x-app-layout>

    <x-wish-form title="Aanpassen" :action="route('update-wish', ['id' => $id])" :wish="$wish"/>

</x-app-layout>
