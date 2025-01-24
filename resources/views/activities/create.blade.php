@extends('layouts.admin')

@section('title', 'Créer une Activité')
@section('header_title', 'Créer une Activité')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ route('activities.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Titre</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('title') }}"
                           placeholder="Titre de l'activité">
                    @error('title')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              placeholder="Description détaillée de l'activité">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-slate-700">Date</label>
                    <input type="date" name="date" id="date" required
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('date') }}">
                    @error('date')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700">Statut</label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Actif</option>
                        <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Terminé</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-6">
                    <a href="{{ route('activities.index') }}"
                       class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-800 focus:outline-none">
                        Annuler
                    </a>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Créer l'activité
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
