<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creative Portfolio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/beranda.css') ?>" />
</head>
<body class="bg-gray-900 text-white">
  <!-- Navigation -->
  <?= $this->include('layout/header') ?>

  <!-- Hero Section -->
  <div class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">
    <div class="absolute inset-0 z-0">
      <div id="particles" class="absolute inset-0"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
      <div class="flex flex-col items-center justify-center text-center">
        <div class="hero-card p-8 rounded-2xl max-w-2xl mx-auto floating">
          <h1 class="text-5xl md:text-7xl font-bold mb-6" id="title"><?= $mahasiswa['title'];?></h1>
          <h2 class="text-2xl md:text-3xl font-light mb-8" id="subtitle"><?= $mahasiswa['subtitle'];?></h2>
          
          <div class="bg-white/10 p-6 rounded-xl backdrop-blur-sm">
            <div class="mb-4">
              <span class="text-gray-300 text-sm">Creator</span>
              <h3 class="text-2xl font-bold" id="creator-name"><?= $mahasiswa['nama'];?></h3>
            </div>
            
            <div>
              <span class="text-gray-300 text-sm">NIM</span>
              <h3 class="text-2xl font-bold" id="id-number"><?= $mahasiswa['nim'];?></h3>
            </div>
          </div>
          
          <div class="mt-10">
            <a href="profile" class="px-8 py-3 bg-white text-purple-700 rounded-full font-medium hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105">
              View Profile
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="absolute bottom-10 left-0 right-0 flex justify-center">
      <div class="animate-bounce">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/js/beranda.js') ?>"></script>
</body>
</html>
