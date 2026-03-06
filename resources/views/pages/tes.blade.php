@extends('layouts.main')
@section('title', 'Curriculum Vitae')

@section('content')
<div class="min-h-screen bg-background pt-24 pb-32 px-6 relative overflow-hidden">
    
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 32px 32px;">
    </div>

    <div class="max-w-6xl mx-auto relative z-10">
        
        <header class="border-b border-border/50 pb-10 mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6 relative">
            <div class="absolute top-0 right-0 w-16 h-16 border-t-2 border-r-2 border-primary/20 pointer-events-none"></div>

            <div class="space-y-3">
                <div class="flex items-center gap-3 font-mono text-[10px] uppercase tracking-widest text-primary">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
                    >> INIT_USER_PROFILE
                </div>
                <h1 class="text-4xl md:text-6xl font-bold uppercase tracking-tighter text-text leading-none">
                    Fadlan Firdaus
                </h1>
                <p class="text-sm md:text-base font-mono text-muted">
                    <span class="text-primary">></span> Fullstack Web Developer & System Architect
                </p>
            </div>

            <div class="flex gap-3 w-full md:w-auto">
                <button onclick="window.print()" class="flex-1 md:flex-none px-6 py-3 border border-border text-muted font-mono text-xs font-bold uppercase tracking-widest hover:text-text hover:border-text transition-colors flex items-center justify-center gap-2 group">
                    <i class="fa-solid fa-print group-hover:scale-110 transition-transform"></i> [ PRINT ]
                </button>
                <a href="#" class="flex-1 md:flex-none px-6 py-3 bg-primary/10 border border-primary text-primary font-mono text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-background transition-colors flex items-center justify-center gap-2 group shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.1)]">
                    <i class="fa-solid fa-download group-hover:-translate-y-1 transition-transform"></i> [ PDF_EXPORT ]
                </a>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            
            <aside class="lg:col-span-4 space-y-12">
                
                <div class="space-y-6">
                    <h2 class="text-xs font-mono font-bold uppercase tracking-widest text-text flex items-center gap-2">
                        <i class="fa-solid fa-server text-primary"></i> SYS.INFO
                    </h2>
                    
                    <ul class="space-y-4 font-mono text-xs">
                        <li class="flex flex-col gap-1 border-l-2 border-border/50 pl-3 hover:border-primary transition-colors">
                            <span class="text-muted uppercase tracking-widest text-[9px]">Location</span>
                            <span class="text-text">Indonesia, WITA Zone</span>
                        </li>
                        <li class="flex flex-col gap-1 border-l-2 border-border/50 pl-3 hover:border-primary transition-colors">
                            <span class="text-muted uppercase tracking-widest text-[9px]">Email_Protocol</span>
                            <a href="mailto:fadlanfirdaus220@gmail.com" class="text-text hover:text-primary transition-colors">fadlanfirdaus220@gmail.com</a>
                        </li>
                        <li class="flex flex-col gap-1 border-l-2 border-border/50 pl-3 hover:border-primary transition-colors">
                            <span class="text-muted uppercase tracking-widest text-[9px]">Secure_Comm</span>
                            <a href="https://wa.me/6282210732928" target="_blank" class="text-text hover:text-primary transition-colors">+62 822-1073-2928</a>
                        </li>
                        <li class="flex flex-col gap-1 border-l-2 border-border/50 pl-3 hover:border-primary transition-colors">
                            <span class="text-muted uppercase tracking-widest text-[9px]">Repository</span>
                            <a href="https://github.com/Fadlan079" target="_blank" class="text-text hover:text-primary transition-colors">github.com/Fadlan079</a>
                        </li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <h2 class="text-xs font-mono font-bold uppercase tracking-widest text-text flex items-center gap-2">
                        <i class="fa-solid fa-microchip text-primary"></i> TECH_STACK
                    </h2>
                    
                    <div class="space-y-5">
                        <div>
                            <div class="flex justify-between font-mono text-[10px] mb-2 uppercase tracking-widest">
                                <span class="text-text">PHP / Laravel</span>
                                <span class="text-primary">95%</span>
                            </div>
                            <div class="flex gap-1 h-1.5 w-full">
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-border flex-1"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between font-mono text-[10px] mb-2 uppercase tracking-widest">
                                <span class="text-text">JavaScript / Alpine / Vue</span>
                                <span class="text-primary">85%</span>
                            </div>
                            <div class="flex gap-1 h-1.5 w-full">
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary/30 flex-1"></div>
                                <div class="h-full bg-border flex-1"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between font-mono text-[10px] mb-2 uppercase tracking-widest">
                                <span class="text-text">Tailwind / CSS</span>
                                <span class="text-primary">90%</span>
                            </div>
                            <div class="flex gap-1 h-1.5 w-full">
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary/30 flex-1"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between font-mono text-[10px] mb-2 uppercase tracking-widest">
                                <span class="text-text">MySQL / Database Design</span>
                                <span class="text-primary">80%</span>
                            </div>
                            <div class="flex gap-1 h-1.5 w-full">
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-primary flex-1 shadow-[0_0_5px_var(--color-primary)]"></div>
                                <div class="h-full bg-border flex-1"></div>
                                <div class="h-full bg-border flex-1"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-xs font-mono font-bold uppercase tracking-widest text-text flex items-center gap-2">
                        <i class="fa-solid fa-language text-primary"></i> LINGUISTICS
                    </h2>
                    <div class="flex flex-wrap gap-2 font-mono text-[10px] uppercase tracking-widest text-muted">
                        <span class="px-3 py-1 border border-border bg-surface/30">Indonesian [Native]</span>
                        <span class="px-3 py-1 border border-border bg-surface/30">English [Professional]</span>
                    </div>
                </div>

            </aside>

            <main class="lg:col-span-8 space-y-16">
                
                <div class="p-6 border border-border bg-surface/30 relative group">
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary"></div>
                    
                    <p class="font-mono text-xs text-primary mb-3 uppercase tracking-widest">> Exec_Summary</p>
                    <p class="text-sm text-text leading-relaxed font-sans opacity-90">
                        Dedicated Web Developer with a strong focus on backend architecture using Laravel and frontend interactivity using Alpine/Vue. Passionate about building highly optimized, secure, and visually distinctive web applications. Seeking to leverage my technical skills to solve complex problems and deliver robust systems.
                    </p>
                </div>

                <div class="space-y-8">
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-text flex items-center gap-3">
                        <span class="text-primary">>_</span> Execution History
                    </h2>
                    
                    <div class="relative border-l-2 border-border/50 pl-8 space-y-12">
                        
                        <div class="relative group cursor-pointer">
                            <div class="absolute -left-[39px] top-1.5 w-4 h-4 bg-background border-2 border-border rounded-full group-hover:border-primary group-hover:bg-primary/20 transition-colors"></div>
                            <div class="absolute -left-[38px] top-1.5 bottom-0 w-0.5 bg-primary scale-y-0 group-hover:scale-y-100 origin-top transition-transform duration-500"></div>

                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between mb-2">
                                <h3 class="text-lg font-bold text-text group-hover:text-primary transition-colors uppercase">Lead Web Developer</h3>
                                <span class="font-mono text-[10px] text-primary uppercase tracking-widest bg-primary/10 px-2 py-1 mt-2 sm:mt-0 w-max">Present - 2023</span>
                            </div>
                            <h4 class="font-mono text-xs text-muted mb-4 uppercase tracking-widest">Freelance / Independent Contractor</h4>
                            
                            <ul class="space-y-3 text-sm text-text/80 font-sans list-none">
                                <li class="relative pl-4 before:content-['>'] before:absolute before:left-0 before:text-primary before:font-mono">
                                    Engineered and deployed comprehensive backend architectures for multiple client projects using the Laravel framework.
                                </li>
                                <li class="relative pl-4 before:content-['>'] before:absolute before:left-0 before:text-primary before:font-mono">
                                    Integrated dynamic frontend interfaces using Alpine.js and Tailwind CSS, reducing page load times and improving UX.
                                </li>
                                <li class="relative pl-4 before:content-['>'] before:absolute before:left-0 before:text-primary before:font-mono">
                                    Implemented secure authentication protocols, database migrations, and RESTful APIs for seamless data flow.
                                </li>
                            </ul>
                        </div>

                        <div class="relative group cursor-pointer">
                            <div class="absolute -left-[39px] top-1.5 w-4 h-4 bg-background border-2 border-border rounded-full group-hover:border-primary group-hover:bg-primary/20 transition-colors"></div>
                            <div class="absolute -left-[38px] top-1.5 bottom-0 w-0.5 bg-primary scale-y-0 group-hover:scale-y-100 origin-top transition-transform duration-500"></div>

                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between mb-2">
                                <h3 class="text-lg font-bold text-text group-hover:text-primary transition-colors uppercase">Junior Programmer</h3>
                                <span class="font-mono text-[10px] text-muted uppercase tracking-widest border border-border px-2 py-1 mt-2 sm:mt-0 w-max">2022 - 2023</span>
                            </div>
                            <h4 class="font-mono text-xs text-muted mb-4 uppercase tracking-widest">Tech Solutions Inc.</h4>
                            
                            <ul class="space-y-3 text-sm text-text/80 font-sans list-none">
                                <li class="relative pl-4 before:content-['>'] before:absolute before:left-0 before:text-primary before:font-mono">
                                    Assisted in the maintenance and debugging of legacy PHP applications.
                                </li>
                                <li class="relative pl-4 before:content-['>'] before:absolute before:left-0 before:text-primary before:font-mono">
                                    Developed internal dashboard modules to visualize company metrics, utilizing Chart.js and raw SQL queries.
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="space-y-8 pt-8">
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-text flex items-center gap-3">
                        <span class="text-primary">>_</span> Knowledge Base
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="p-6 border border-border bg-surface/20 hover:border-primary/50 transition-colors group">
                            <div class="font-mono text-[10px] text-primary uppercase tracking-widest mb-3">2020 - 2024</div>
                            <h3 class="text-base font-bold text-text mb-1 uppercase">S1 Teknik Informatika</h3>
                            <h4 class="font-mono text-xs text-muted mb-4 uppercase">Universitas Komputer</h4>
                            <p class="text-sm text-text/80 leading-relaxed">
                                Focus on Software Engineering, Database Systems, and Advanced Algorithms. Graduated with a focus on web security.
                            </p>
                        </div>

                        <div class="p-6 border border-border bg-surface/20 hover:border-primary/50 transition-colors group">
                            <div class="font-mono text-[10px] text-primary uppercase tracking-widest mb-3">2017 - 2020</div>
                            <h3 class="text-base font-bold text-text mb-1 uppercase">Rekayasa Perangkat Lunak</h3>
                            <h4 class="font-mono text-xs text-muted mb-4 uppercase">SMK Negeri Teknologi</h4>
                            <p class="text-sm text-text/80 leading-relaxed">
                                Early foundation in programming logic, HTML/CSS, basic PHP, and fundamental computer networking.
                            </p>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
@endsection