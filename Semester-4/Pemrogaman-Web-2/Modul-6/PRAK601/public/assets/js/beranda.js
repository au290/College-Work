document.addEventListener('DOMContentLoaded', () => {
    // GSAP Animations
    gsap.from("#title", {
        opacity: 0,
        y: 50,
        duration: 1,
        delay: 0.2
    });

    gsap.from("#subtitle", {
        opacity: 0,
        y: 30,
        duration: 1,
        delay: 0.5
    });

    gsap.from("#creator-name, #id-number", {
        opacity: 0,
        x: -30,
        duration: 0.8,
        stagger: 0.2,
        delay: 0.8
    });

    // Particle effect
    class Particle {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = canvas.getContext('2d');
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 1 - 0.5;
            this.speedY = Math.random() * 1 - 0.5;
            this.color = `rgba(${Math.floor(Math.random() * 100 + 155)}, ${Math.floor(Math.random() * 100 + 155)}, ${Math.floor(Math.random() * 255)}, ${Math.random() * 0.5 + 0.3})`;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x > this.canvas.width || this.x < 0) {
                this.speedX = -this.speedX;
            }

            if (this.y > this.canvas.height || this.y < 0) {
                this.speedY = -this.speedY;
            }
        }

        draw() {
            this.ctx.fillStyle = this.color;
            this.ctx.beginPath();
            this.ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            this.ctx.fill();
        }
    }

    const particlesContainer = document.getElementById('particles');
    const canvas = document.createElement('canvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    particlesContainer.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    const particles = [];

    for (let i = 0; i < 100; i++) {
        particles.push(new Particle(canvas));
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();
        }

        requestAnimationFrame(animate);
    }

    animate();

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
});