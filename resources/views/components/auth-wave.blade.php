{{--
    Shared bottom wave for every auth page: three layered ribbons
    (soft navy, soft red, solid red) with the copyright line on top.
    Fixed height (80px), so it looks the same on phones and wide monitors.
    Place inside a `relative` container.
--}}
<div class="pointer-events-none absolute inset-x-0 bottom-0 h-20">
    <svg class="absolute inset-0 h-full w-full" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 14 C 240 2, 480 2, 720 10 S 1200 26, 1440 6 V48 H0 Z" fill="#1d3b6e" opacity=".12"/>
        <path d="M0 22 C 260 10, 520 12, 760 20 S 1220 30, 1440 14 V48 H0 Z" fill="#9b111e" opacity=".25"/>
        <path d="M0 30 C 280 18, 560 20, 800 28 S 1240 36, 1440 24 V48 H0 Z" fill="#9b111e"/>
    </svg>
    <p class="absolute inset-x-0 bottom-3 text-center text-[11px] tracking-wide text-white/85">
        &copy; {{ date('Y') }} Amaryllis Cove Resorts
    </p>
</div>
