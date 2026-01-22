@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card-modern text-center">
                <h1 class="display-4 mb-3">
                    <i class="fas fa-gavel text-primary me-2"></i>
                    Bienvenue dans le Système de Gestion des Litiges RH
                </h1>
                <p class="lead text-muted">
                    Ministère de l'Éducation Nationale - Royaume du Maroc
                </p>
            </div>
        </div>
    </div>

    <!-- Slider Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="slider shadow-hover">
                <div class="slides">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80" alt="Éducation Nationale">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" alt="Formation">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80" alt="Ressources Humaines">
                </div>
            </div>
        </div>
    </div>

    <!-- Presentation Text -->
    <div class="row">
        <div class="col-12">
            <div class="presentation">
                <h2 class="text-center mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    À propos du Département des Ressources Humaines
                </h2>
                <p>
                    Le Département des Ressources Humaines et Formation des Cadres constitue l'un des piliers essentiels au bon fonctionnement et à la réussite stratégique de toute organisation moderne. En effet, ce département ne se limite pas à la simple gestion administrative du personnel, mais s'engage profondément dans l'optimisation du capital humain, considéré aujourd'hui comme l'actif le plus précieux et déterminant pour la compétitivité de l'entreprise. La gestion des ressources humaines englobe un large éventail de responsabilités, allant du recrutement rigoureux des talents les plus adaptés, à la planification stratégique des carrières, en passant par la mise en œuvre de politiques de développement professionnel et personnel. La formation des cadres représente un axe majeur de cette stratégie globale, visant à doter les managers et futurs leaders des compétences managériales, techniques et comportementales indispensables pour relever les défis organisationnels, accompagner les changements, et promouvoir une culture d'excellence et d'innovation. Dans ce contexte, le Service des Litiges RH joue un rôle fondamental en assurant une gestion juste, transparente et efficace des conflits internes pouvant surgir entre les employés et la direction. Ce service agit en médiateur impartial, facilitant le dialogue et la résolution rapide des différends, afin de préserver un climat social sain, la motivation des collaborateurs, et la continuité des activités. La complexité et la sensibilité de ces dossiers requièrent un suivi rigoureux et structuré, que cette application web est spécialement conçue pour faciliter. En centralisant toutes les données relatives aux litiges, cette plateforme offre une visibilité en temps réel sur l'état d'avancement des dossiers, permet la génération de rapports détaillés et personnalisés, et améliore la prise de décision par les responsables RH. De plus, elle favorise une communication fluide entre les différentes parties prenantes, garantissant ainsi la traçabilité des interventions et la transparence des procédures. Par ailleurs, cette solution technologique contribue également à la conformité réglementaire, en assurant une documentation exhaustive et un archivage sécurisé, répondant aux exigences légales en matière de droit du travail et de gestion des conflits. Ainsi, le département des Ressources Humaines et Formation des Cadres, grâce à cette application innovante, peut pleinement assumer son rôle stratégique, conciliant performance économique, bien-être social et responsabilité éthique, pour accompagner durablement le développement harmonieux de l'organisation.
                </p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ route('jugement.index') }}" class="card-modern text-decoration-none text-center h-100 d-block">
                <i class="fas fa-gavel fa-3x text-primary mb-3"></i>
                <h5>Gestion des Jugements</h5>
                <p class="text-muted small">Consulter et gérer les jugements</p>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ route('profile') }}" class="card-modern text-decoration-none text-center h-100 d-block">
                <i class="fas fa-user fa-3x text-info mb-3"></i>
                <h5>Mon Profil</h5>
                <p class="text-muted small">Gérer vos informations</p>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ route('support') }}" class="card-modern text-decoration-none text-center h-100 d-block">
                <i class="fas fa-headset fa-3x text-success mb-3"></i>
                <h5>Support</h5>
                <p class="text-muted small">Obtenir de l'aide</p>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ route('jugement.create') }}" class="card-modern text-decoration-none text-center h-100 d-block">
                <i class="fas fa-plus-circle fa-3x text-danger mb-3"></i>
                <h5>Nouveau Dossier</h5>
                <p class="text-muted small">Créer un nouveau litige</p>
            </a>
        </div>
    </div>
</div>
@endsection
