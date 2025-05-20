<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="hero-gradient p-5 mb-5 position-relative" id="hero-section">
        <div class="animated-shape" id="shape1"></div>
        <div class="animated-shape" id="shape2"></div>
        <div class="animated-shape" id="shape3"></div>
        
        <div class="row align-items-center py-4 position-relative" style="z-index: 1;">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3" id="hero-title">Welcome to Book Manager</h1>
                <p class="lead mb-4" id="hero-text">A simple and efficient way to manage your book collection. Keep track of all your books in one place.</p>
                
                <?php if (!session()->get('isLogged')): ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="/login" class="btn btn-light btn-lg px-4 me-md-2" id="cta-button">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login
                        </a>
                    </div>
                <?php else: ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="/dashboard" class="btn btn-light btn-lg px-4 me-md-2" id="cta-button">
                            <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row py-5" id="features-section">
        <div class="col-12 text-center mb-5">
            <h2 class="fw-bold" id="features-title">Features</h2>
            <p class="text-muted" id="features-subtitle">Everything you need to manage your book collection</p>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm feature-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mb-3 mx-auto" style="width: 65px; height: 65px;">
                        <i class="bi bi-book text-primary" style="font-size: 1.75rem;"></i>
                    </div>
                    <h5 class="card-title">Book Management</h5>
                    <p class="card-text text-muted">Add, edit, and remove books from your collection with ease.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm feature-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mb-3 mx-auto" style="width: 65px; height: 65px;">
                        <i class="bi bi-search text-primary" style="font-size: 1.75rem;"></i>
                    </div>
                    <h5 class="card-title">Easy Search</h5>
                    <p class="card-text text-muted">Quickly find books in your collection with powerful search tools.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm feature-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mb-3 mx-auto" style="width: 65px; height: 65px;">
                        <i class="bi bi-shield-check text-primary" style="font-size: 1.75rem;"></i>
                    </div>
                    <h5 class="card-title">Secure Access</h5>
                    <p class="card-text text-muted">Your book collection is protected with secure authentication.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-5" id="cta-section">
        <div class="col-12">
            <div class="cta-section p-5 text-center position-relative">
                <h2 class="fw-bold mb-3" id="cta-title">Ready to organize your books?</h2>
                <p class="lead mb-4" id="cta-text">Start managing your book collection today.</p>
                
                <?php if (!session()->get('isLogged')): ?>
                    <a href="/login" class="btn btn-light btn-lg px-4" id="cta-button-bottom">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Get Started
                    </a>
                <?php else: ?>
                    <a href="/dashboard" class="btn btn-light btn-lg px-4" id="cta-button-bottom">
                        <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Create animated shapes in hero section
        const shape1 = document.getElementById('shape1');
        const shape2 = document.getElementById('shape2');
        const shape3 = document.getElementById('shape3');
        
        // Set initial properties for shapes
        gsap.set(shape1, {
            width: '300px',
            height: '300px',
            top: '-150px',
            right: '-150px',
            opacity: 0.2
        });
        
        gsap.set(shape2, {
            width: '200px',
            height: '200px',
            bottom: '-100px',
            left: '-100px',
            opacity: 0.15
        });
        
        gsap.set(shape3, {
            width: '150px',
            height: '150px',
            top: '50%',
            left: '20%',
            opacity: 0.1
        });
        
        // Animate shapes
        gsap.to(shape1, {
            rotation: 360,
            duration: 30,
            repeat: -1,
            ease: "none"
        });
        
        gsap.to(shape2, {
            rotation: -360,
            duration: 25,
            repeat: -1,
            ease: "none"
        });
        
        gsap.to(shape3, {
            x: "+=50",
            y: "+=30",
            duration: 8,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
        
        // Hero section animations
        const heroTl = gsap.timeline();
        
        heroTl.from("#hero-title", {
            y: 50,
            opacity: 0,
            duration: 0.8,
            ease: "power3.out"
        })
        .from("#hero-text", {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: "power3.out"
        }, "-=0.4")
        .from("#cta-button", {
            y: 20,
            opacity: 0,
            duration: 0.6,
            ease: "power3.out"
        }, "-=0.4");
        
        // Features section animations
        const featuresTl = gsap.timeline({
            scrollTrigger: {
                trigger: "#features-section",
                start: "top 80%"
            }
        });
        
        featuresTl.from("#features-title", {
            y: 30,
            opacity: 0,
            duration: 0.6
        })
        .from("#features-subtitle", {
            y: 20,
            opacity: 0,
            duration: 0.6
        }, "-=0.3")
        .from(".feature-card", {
            y: 40,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        }, "-=0.2");
        
        // CTA section animations
        const ctaTl = gsap.timeline({
            scrollTrigger: {
                trigger: "#cta-section",
                start: "top 80%"
            }
        });
        
        ctaTl.from("#cta-title", {
            y: 30,
            opacity: 0,
            duration: 0.6
        })
        .from("#cta-text", {
            y: 20,
            opacity: 0,
            duration: 0.6
        }, "-=0.3")
        .from("#cta-button-bottom", {
            y: 20,
            opacity: 0,
            duration: 0.6,
            ease: "back.out(1.7)"
        }, "-=0.2");
        
  
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -10,
                    boxShadow: "0 10px 30px rgba(0,0,0,0.1)",
                    duration: 0.3
                });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    boxShadow: "0 .125rem .25rem rgba(0,0,0,.075)",
                    duration: 0.3
                });
            });
        });
    });
</script>

<?= $this->endSection() ?>
