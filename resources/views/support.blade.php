@extends('layouts.app')

@section('title', 'Support')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-modern text-center mb-4">
                <i class="fas fa-headset fa-4x text-primary mb-3"></i>
                <h2>Centre de Support</h2>
                <p class="subtitle">Nous sommes là pour vous aider</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-modern text-center h-100">
                <i class="fas fa-phone fa-3x text-success mb-3"></i>
                <h5>Contact Téléphonique</h5>
                <p class="text-muted">Appelez-nous pour une assistance immédiate</p>
                <p class="fw-bold">+212 XXX XXX XXX</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern text-center h-100">
                <i class="fas fa-envelope fa-3x text-info mb-3"></i>
                <h5>Email</h5>
                <p class="text-muted">Envoyez-nous un email</p>
                <p class="fw-bold">support@education.gov.ma</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern text-center h-100">
                <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                <h5>Heures d'Ouverture</h5>
                <p class="text-muted">Lundi - Vendredi</p>
                <p class="fw-bold">8h00 - 17h00</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card-modern">
                <h4 class="mb-3">
                    <i class="fas fa-question-circle me-2"></i>Questions Fréquentes
                </h4>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Comment créer un nouveau litige ?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Accédez à la section "Jugement" puis cliquez sur le bouton "إضافة قضية جديدة" pour créer un nouveau dossier.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Comment modifier mes informations de profil ?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Allez dans la section "Profil" et cliquez sur "Modifier le Profil" pour mettre à jour vos informations.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
