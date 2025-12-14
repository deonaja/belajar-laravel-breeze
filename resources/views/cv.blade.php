<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

        <style>
            /* --- DARK MODE CARD --- */
            .profile-card {
                background-color: #1e293b; /* slate-800 */
                border-radius: 12px;
                padding: 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
                color: #f1f5f9; /* slate-100 */
            }

            /* --- HEADER GRADIENT --- */
            .profile-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 32px;
                border-radius: 12px 12px 0 0;
                color: white;
            }

            .profile-header h1 {
                font-weight: 700;
            }

            /* --- TEXT COLORS ---*/
            .text-muted-dark {
                color: #cbd5e1 !important; /* slate-300 */
            }

            .text-secondary-dark {
                color: #94a3b8 !important; /* slate-400 */
            }

            /* --- BADGES --- */
            .skill-badge {
                display: inline-block;
                background-color: #334155; /* slate-700 */
                color: #e2e8f0; /* slate-200 */
                padding: 0.35rem 0.75rem;
                border-radius: 999px;
                margin: 4px;
                font-size: 0.8rem;
                border: 1px solid #475569; /* slate-600 */
            }

            /* --- SECTION TITLE --- */
            .section-title {
                margin-bottom: 1.2rem;
                position: relative;
                font-weight: 600;
            }

            .section-title::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: -4px;
                width: 50px;
                height: 3px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 2px;
            }

            /* --- TIMELINE ITEMS --- */
            .timeline-item {
                margin-bottom: 1.8rem;
                position: relative;
                padding-left: 24px;
                color: #e2e8f0; /* slate-200 */
            }

            .timeline-item::before {
                content: '';
                position: absolute;
                width: 12px;
                height: 12px;
                background: linear-gradient(135deg, #667eea, #764ba2);
                border-radius: 50%;
                left: 0;
                top: 4px;
            }
        </style>
    @endpush

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4">

            <div class="profile-card">

                <!-- HEADER -->
                <div class="profile-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                             style="width: 90px; height: 90px;">
                            <span class="display-5 fw-bold text-dark">D</span>
                        </div>

                        <div class="ms-4">
                            <h1 class="mb-1">Deon</h1>
                            <h4 class="mb-2 text-secondary-dark">Mahasiswa</h4>
                            <p class="mb-0 text-muted-dark">
                                Mahasiswa Telkom University yang sedang belajar webpro, karena webpro itu asik.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="p-4">

                    {{-- CONTACT --}}
                    <div class="mb-5">
                        <h3 class="section-title">Contact Information</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fas fa-envelope me-2"></i><strong>Email:</strong> deonpwa@gmail.com</p>
                                <p><i class="fas fa-phone me-2"></i><strong>Phone:</strong> +628 12345678</p>
                                <p><i class="fas fa-birthday-cake me-2"></i><strong>Date of Birth:</strong> January 1, 2004</p>
                            </div>

                            <div class="col-md-6">
                                <p><i class="fas fa-map-marker-alt me-2"></i><strong>Address:</strong> Bandung, Indonesia</p>
                                <p><i class="fas fa-globe me-2"></i><strong>Nationality:</strong> Indonesia</p>
                                <p><i class="fab fa-linkedin me-2"></i><strong>LinkedIn:</strong> linkedin.com/in/deonpwa</p>
                                <p><i class="fab fa-github me-2"></i><strong>GitHub:</strong> github.com/deonpwa</p>
                            </div>
                        </div>
                    </div>

                    {{-- SKILLS --}}
                    <div class="mb-5">
                        <h3 class="section-title">Skills & Expertise</h3>
                        <div>
                            @foreach (['Laravel','PHP','JavaScript','Vue.js','React','MySQL','PostgreSQL','Git','Docker','AWS'] as $skill)
                                <span class="skill-badge">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- EXPERIENCE --}}
                    <div class="mb-5">
                        <h3 class="section-title">Work Experience</h3>

                        <div class="timeline-item">
                            <h5 class="mb-1">Asisten Praktikum</h5>
                            <p class="text-secondary-dark mb-1">Telkom University</p>
                            <p class="text-primary mb-1">Sep 2024 – Present</p>
                            <p class="text-muted-dark">Membantu dosen dalam kegiatan praktikum.</p>
                        </div>

                        <div class="timeline-item">
                            <h5 class="mb-1">Web Developer</h5>
                            <p class="text-secondary-dark mb-1">Freelance</p>
                            <p class="text-primary mb-1">Jan 2024 – Present</p>
                            <p class="text-muted-dark">Mengembangkan beberapa website untuk client.</p>
                        </div>
                    </div>

                    {{-- EDUCATION --}}
                    <div class="mb-3">
                        <h3 class="section-title">Education</h3>

                        <div class="timeline-item">
                            <h5 class="mb-1">S1 Teknologi Informasi</h5>
                            <p class="text-secondary-dark mb-1">Telkom University</p>
                            <p class="text-primary mb-1">2023 - 2027</p>
                            <p class="text-muted-dark">Aktif kuliah.</p>
                        </div>
                    </div>

                </div> <!-- END BODY -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush

</x-app-layout>
