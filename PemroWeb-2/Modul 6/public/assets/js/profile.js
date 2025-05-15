document.addEventListener('DOMContentLoaded', () => {
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // Hero section animations
    gsap.from("#profile-info", {
        opacity: 0,
        x: -50,
        duration: 1,
        delay: 0.2
    });

    gsap.from("#profile-image", {
        opacity: 0,
        x: 50,
        duration: 1,
        delay: 0.5
    });

    // Create parallax effect for backgrounds
    const sections = ["hero", "major", "hobbies", "skills"];
    const colors = [
        "linear-gradient(135deg, #1a1a2e 0%, #16213e 100%)",
        "linear-gradient(135deg, #0f3443 0%, #34e89e 100%)",
        "linear-gradient(135deg, #5f2c82 0%, #49a09d 100%)",
        "linear-gradient(135deg, #000428 0%, #004e92 100%)"
    ];

    sections.forEach((section, index) => {
        const bg = document.getElementById(`${section}-bg`);
        bg.style.background = colors[index];

        gsap.to(`#${section}-bg`, {
            scrollTrigger: {
                trigger: `#${section}`,
                start: "top bottom",
                end: "bottom top",
                scrub: true
            },
            y: 100,
            ease: "none"
        });
    });

    // Major section animations
    ScrollTrigger.create({
        trigger: "#major",
        start: "top center",
        onEnter: () => {
            gsap.to("#major .card", {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out"
            });
        },
        once: true
    });

    gsap.set("#major .card", {
        opacity: 0,
        y: 50
    });

    // Hobbies section animations
    const hobbyCards = document.querySelectorAll("#hobbies .card");
    gsap.set(hobbyCards, {
        opacity: 0,
        y: 50
    });

    ScrollTrigger.create({
        trigger: "#hobbies",
        start: "top center",
        onEnter: () => {
            gsap.to(hobbyCards, {
                opacity: 1,
                y: 0,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            });
        },
        once: true
    });

    // Skills section animations
    const skillCards = document.querySelectorAll("#skills .skill-card");
    gsap.set(skillCards, {
        opacity: 0,
        scale: 0.8
    });

    ScrollTrigger.create({
        trigger: "#skills",
        start: "top center",
        onEnter: () => {
            gsap.to(skillCards, {
                opacity: 1,
                scale: 1,
                duration: 0.5,
                stagger: 0.1,
                ease: "back.out(1.7)"
            });
        },
        once: true
    });

    // Smooth scrolling for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

