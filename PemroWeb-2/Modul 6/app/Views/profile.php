<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Creative Portfolio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>" />


</head>

<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    <?= $this->include('layout/header') ?>

    <!-- Hero Section -->
    <section class="section" id="hero">
        <div class="parallax-bg" id="hero-bg"></div>
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="md:w-1/2" id="profile-info">
                    <h1 class="text-5xl font-bold mb-4"><?= $mahasiswa['nama']; ?></h1>
                    <div class="flex items-center mb-6">
                        <div class="px-4 py-2 bg-white/10 rounded-lg backdrop-blur-sm">
                            <span class="text-sm text-gray-300">NIM</span>
                            <p class="font-bold"><?= $mahasiswa['nim']; ?></p>
                        </div>
                    </div>
                    <p class="text-xl mb-6"><?= $mahasiswa['deskripsi']; ?></p>
                    <div class="flex gap-4">
                        <a href="#major" class="px-6 py-2 bg-white text-purple-700 rounded-full font-medium hover:bg-opacity-90 transition-all duration-300">
                            Explore
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center" id="profile-image">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur-2xl opacity-30"></div>
                        <img src="image/pp.png" alt="Profile" class="w-64 h-64 object-cover rounded-full profile-img relative z-10">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Major Section -->
    <section class="section" id="major">
        <div class="parallax-bg" id="major-bg"></div>
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <div class="card p-8 rounded-2xl">
                    <h2 class="text-3xl font-bold mb-6 text-center">My Major</h2>
                    <div class="text-center">
                        <div class="inline-block p-2 bg-white/10 rounded-lg mb-4">
                            <span class="text-sm text-gray-300">Field of Study</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4"><?= $mahasiswa['jurusan']; ?></h3>
                        <p class="text-gray-300 mb-6">
                            <?= $mahasiswa['jurusan_deskripsi']; ?>
                        </p>
                        <div class="flex justify-center">
                            <a href="#hobbies" class="px-6 py-2 bg-white/10 rounded-full font-medium hover:bg-white/20 transition-all duration-300">
                                Next: Hobbies
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hobbies Section -->
    <section class="section" id="hobbies">
        <div class="parallax-bg" id="hobbies-bg"></div>
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-10 text-center">My Hobbies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card p-6 rounded-xl" id="hobby-1">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold"><?= $mahasiswa['hobi'][0]['nama']; ?></h3>
                        </div>
                        <p class="text-gray-300"><?= $mahasiswa['hobi'][0]['deskripsi']; ?>
                        </p>
                    </div>


                    <div class="card p-6 rounded-xl" id="hobby-2">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-pink-500 flex items-center justify-center mr-4">
                                <!-- Gaming controller SVG -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.5 7h-5a4.5 4.5 0 00-4.5 4.5v1a4.5 4.5 0 004.5 4.5h5a4.5 4.5 0 004.5-4.5v-1A4.5 4.5 0 0014.5 7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 10h.01M7.5 10H9m0 0v1.5M15 12h.01M16.5 10.5h.01" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold"><?= $mahasiswa['hobi'][1]['nama']; ?></h3>
                        </div>
                        <p class="text-gray-300"><?= $mahasiswa['hobi'][1]['deskripsi']; ?>
                        </p>
                    </div>


                    <div class="card p-6 rounded-xl" id="hobby-3">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold"><?= $mahasiswa['hobi'][2]['nama']; ?></h3>
                        </div>
                        <p class="text-gray-300"><?= $mahasiswa['hobi'][2]['deskripsi']; ?>
                        </p>
                    </div>

                    <div class="card p-6 rounded-xl" id="hobby-3">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold"><?= $mahasiswa['hobi'][3]['nama']; ?></h3>
                        </div>
                        <p class="text-gray-300"><?= $mahasiswa['hobi'][3]['deskripsi']; ?>
                        </p>


                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <a href="#skills" class="px-6 py-2 bg-white/10 rounded-full font-medium hover:bg-white/20 transition-all duration-300">
                    Next: Skills
                </a>
            </div>
        </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="section" id="skills">
        <div class="parallax-bg" id="skills-bg"></div>
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold mb-10 text-center">My Skills</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="skill-card card p-6 rounded-xl" id="skill-1">
                        <div class="h-16 w-16 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-2"><?= $mahasiswa['skills'][0]['nama']; ?></h3>
                        <p class="text-gray-300 text-center"><?= $mahasiswa['skills'][0]['deskripsi']; ?></p>
                    </div>

                    <div class="skill-card card p-6 rounded-xl" id="skill-5">
                        <div class="h-16 w-16 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-2"><?= $mahasiswa['skills'][1]['nama']; ?></h3>
                        <p class="text-gray-300 text-center"><?= $mahasiswa['skills'][1]['deskripsi']; ?></p>
                    </div>

                    <div class="skill-card card p-6 rounded-xl" id="skill-6">
                        <div class="h-16 w-16 rounded-xl bg-gradient-to-r from-pink-500 to-rose-500 flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-2"><?= $mahasiswa['skills'][2]['nama']; ?></h3>
                        <p class="text-gray-300 text-center"><?= $mahasiswa['skills'][2]['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('assets/js/profile.js') ?>"></script>
</body>

</html>