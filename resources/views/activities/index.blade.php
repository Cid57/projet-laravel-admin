@extends('layouts.admin')

@section('title', 'Gestion des Activités')
@section('header_title', 'Gestion des Activités')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Liste des activités</h2>
        <a href="{{ route('activities.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Nouvelle activité
        </a>
    </div>

    <!-- Liste des activités -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($activities as $activity)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-slate-900">{{ $activity->title }}</h3>
                        <span class="px-3 py-1 text-sm rounded-full {{ $activity->status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">
                            {{ ucfirst($activity->status) }}
                        </span>
                    </div>
                    
                    <p class="text-slate-600 mb-4 line-clamp-3">{{ $activity->description }}</p>
                    
                    <div class="flex items-center text-sm text-slate-500 mb-4">
                        <i class="far fa-calendar mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}</span>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                        <div class="flex space-x-2">
                            <a href="{{ route('activities.edit', $activity->id) }}" 
                               class="p-2 text-amber-600 hover:text-amber-700 transition-colors">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-600 hover:text-rose-700 transition-colors" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('activities.show', $activity->id) }}" 
                           class="text-sm text-indigo-600 hover:text-indigo-700 font-medium transition-colors">
                            Voir les détails
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12 bg-white rounded-xl">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-plus text-slate-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900 mb-2">Aucune activité</h3>
                    <p class="text-slate-500 mb-6">Commencez par créer votre première activité</p>
                    <a href="{{ route('activities.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Nouvelle activité
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    @if($activities->isNotEmpty())
        <!-- Pagination -->
        <div class="mt-6">
            {{ $activities->links() }}
        </div>
    @endif
@endsection
