<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Fadlan</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-bg text-text overflow-x-hidden">
  <x-navbar 
    brand="Fadlan"
    :menus="[
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Skills', 'href' => '#skills'],
        ['label' => 'Experience', 'href' => '#experience'],
        ['label' => 'Projects', 'href' => '#projects'],
        ['label' => 'Education', 'href' => '#education'],
        ['label' => 'Contact', 'href' => '#contact'],

    ]"
  />

  <main>
    <section id="home" class="relative min-h-screen flex items-center px-6 bg-bg">@include('sections.hero')</section>
    
    <section id="about" class="py-20 bg-surface ">@include('sections.about')</section>

    <section id="skills" class="py-20 bg-bg">@include('sections.skills')</section>

    <section id="experience" class="py-20 bg-bg">@include('sections.experience')</section>

    <section id="projects" class="py-20 bg-surface">@include('sections.project')</section>

    <section id="education" class="py-24 bg-bg">@include('sections.education')</section>

    <section id="contact" class="py-24 bg-bg">@include('sections.contact')</section>
  </main>

  <x-footer
    brand="Fadlan"
    description="Full Stack Developer yang membangun aplikasi web modern dengan antarmuka responsif, backend yang terstruktur, dan pengelolaan data yang rapi."
    :links="[
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Experience', 'href' => '#experience'],
        ['label' => 'education', 'href' => '#education'],
        ['label' => 'Projects', 'href' => '#projects'],
        ['label' => 'Contact', 'href' => '#contact'],
        ['label' => 'Skills', 'href' => '#skills'],
    ]"
    :socials="[
        ['icon' => 'fa-brands fa-github', 'href' => 'https://github.com/Fadlan079'],
        ['icon' => 'fa-brands fa-linkedin', 'href' => 'https://www.linkedin.com/in/fadlan-firdaus-148344386/'],
        ['icon' => 'fa-brands fa-instagram', 'href' => 'https://instagram.com/fdln007'],
        ['icon' => 'fa-solid fa-envelope', 'href' => 'mailto:fadlanfirdaus220@gmail.com'],
        ['icon' => 'fa-brands fa-whatsapp', 'href' => 'https://wa.me/6282210732928'],
    ]"
  />
</body>
</html>