<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title>Valentine? 💘</title>
    <style>
        :root {
            --pink: #ff4d88;
            --red: #ff2e63;
            --lav: #8a5cff;
            --bg1: #ffd1dc;
            --bg2: #fff0f7;
            --card: #ffffffcc;
            --shadow: 0 22px 70px rgba(0, 0, 0, .16);
            --txt: #2b2b2b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100svh;
            /* mobile friendly */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-family: ui-rounded, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--txt);
            background:
                radial-gradient(1200px 800px at 20% 15%, var(--bg2), transparent 60%),
                radial-gradient(900px 650px at 85% 25%, #fff7fb, transparent 55%),
                linear-gradient(135deg, var(--bg1), #ffe3ef 45%, #fff2f8);
            padding: 16px;
        }

        /* Floating hearts background */
        .float-heart {
            position: absolute;
            width: 18px;
            height: 18px;
            transform: rotate(45deg);
            background: rgba(255, 46, 99, .22);
            border-radius: 4px;
            animation: floatUp linear infinite;
            pointer-events: none;
        }

        .float-heart::before,
        .float-heart::after {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            background: inherit;
            border-radius: 50%;
        }

        .float-heart::before {
            left: -9px;
            top: 0;
        }

        .float-heart::after {
            top: -9px;
            left: 0;
        }

        .float-heart i {
            position: absolute;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .75);
            top: 3px;
            left: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, .65);
            opacity: .85;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(25vh) rotate(45deg) scale(.85);
                opacity: 0;
            }

            12% {
                opacity: 1;
            }

            100% {
                transform: translateY(-130vh) rotate(45deg) scale(1.45);
                opacity: 0;
            }
        }

        /* Card */
        .card {
            position: relative;
            width: min(720px, 92vw);
            padding: 28px 22px 22px;
            border-radius: 30px;
            background: var(--card);
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, .70);
            text-align: center;
            overflow: hidden;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: conic-gradient(from 200deg,
                    rgba(255, 46, 99, .0),
                    rgba(255, 46, 99, .35),
                    rgba(138, 92, 255, .25),
                    rgba(255, 46, 99, .35),
                    rgba(255, 46, 99, .0));
            filter: blur(18px);
            opacity: .75;
            animation: spin 7s linear infinite;
            z-index: -1;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(255, 77, 136, .25);
            box-shadow: 0 10px 25px rgba(255, 46, 99, .12);
            font-weight: 800;
            user-select: none;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #fff, var(--red));
            box-shadow: 0 0 0 6px rgba(255, 46, 99, .14);
            animation: pulse 1.6s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.25)
            }
        }

        h1 {
            margin: 14px 0 8px;
            font-size: clamp(24px, 5.6vw, 42px);
            line-height: 1.12;
        }

        .subtitle {
            margin: 0 auto 18px;
            max-width: 60ch;
            font-size: 16px;
            opacity: .82;
        }

        /* Arena */
        .arena {
            position: relative;
            margin: 14px auto 0;
            width: min(520px, 92%);
            height: 160px;
            border-radius: 22px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 46, 99, .18);
            box-shadow: 0 14px 30px rgba(0, 0, 0, .08);
            overflow: hidden;
            touch-action: none;
            /* IMPORTANT for mobile pointer tracking */
        }

        .arena::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 46, 99, .14), transparent 35%),
                radial-gradient(circle at 80% 40%, rgba(138, 92, 255, .10), transparent 35%),
                radial-gradient(circle at 40% 80%, rgba(255, 77, 136, .10), transparent 35%);
            pointer-events: none;
        }

        button {
            border: none;
            cursor: pointer;
            font-weight: 900;
            font-size: 18px;
            padding: 14px 22px;
            border-radius: 999px;
            outline: none;
            user-select: none;
            position: absolute;
            transition: left .12s ease-out, top .12s ease-out, transform .12s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .yes {
            background: linear-gradient(135deg, var(--red), var(--pink));
            color: #fff;
            box-shadow: 0 16px 35px rgba(255, 46, 99, .30);
            left: 32%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 6;
            /* keep YES generally on top */
        }

        .no {
            background: rgba(255, 255, 255, .95);
            color: #444;
            border: 2px dashed rgba(255, 46, 99, .35);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .10);
            left: 68%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 7;
            /* will be randomized in JS */
        }

        .hint {
            margin-top: 10px;
            font-size: 12px;
            opacity: .65;
        }

        /* Modal */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 10, 20, .35);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 50;
        }

        .overlay.show {
            display: flex;
        }

        .modal {
            width: min(560px, 92vw);
            background: rgba(255, 255, 255, .94);
            border: 2px solid rgba(255, 255, 255, .75);
            border-radius: 28px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            padding: 22px 18px;
            text-align: center;
        }

        .close {
            margin-top: 6px;
            background: rgba(255, 255, 255, .9);
            border: 1px solid rgba(0, 0, 0, .12);
            font-size: 16px;
            padding: 10px 16px;
            border-radius: 999px;
        }

        /* Confetti hearts */
        .pop {
            position: fixed;
            width: 14px;
            height: 14px;
            transform: rotate(45deg);
            background: rgba(255, 46, 99, .95);
            border-radius: 3px;
            pointer-events: none;
            animation: pop 900ms ease-out forwards;
            z-index: 9999;
        }

        .pop::before,
        .pop::after {
            content: "";
            position: absolute;
            width: 14px;
            height: 14px;
            background: inherit;
            border-radius: 50%;
        }

        .pop::before {
            left: -7px;
            top: 0;
        }

        .pop::after {
            top: -7px;
            left: 0;
        }

        @keyframes pop {
            0% {
                transform: translate(0, 0) rotate(45deg) scale(.6);
                opacity: 1;
            }

            100% {
                transform: translate(var(--dx), var(--dy)) rotate(45deg) scale(1.2);
                opacity: 0;
            }
        }

    </style>
</head>

<body>
    <div id="bg"></div>

    <main class="card">
        <div class="pill"><span class="dot"></span><span>tiny heart, big feelings 💗</span></div>

        <h1>{!! isset($questions['questions_array']['title']) ? $questions['questions_array']['title'] : "Hey you… 🥺👉👈<br />will you basdaaaaaaaaaaaaaae my Valentine? 💘" !!}</h1>



        <p class="subtitle">
            {!! isset($questions['questions_array']['subtitle']) ? $questions['questions_array']['subtitle'] : "If you say yes, I’ll send you hugs, smiles, and a lifetime supply of “good morning” texts 😌💞" !!}

        </p>

        @if(!empty($answer))
        <div class="arena" style="background: #fffbe6; min-height: 80px; display: flex; align-items: center; justify-content: center;">
            <div style="font-size: 1.3em; color: #d63384;">
                {{-- <strong>You already answered!</strong><br> --}}
                <span>Your answer is: <span style="color:#20c997;">{{ $answer }}</span></span>
            </div>
        </div>
        @else
        <form method="POST" action="{{ route('valentine.answer', ['id' => $questionId]) }}">
            @csrf
            <div class="arena" id="arena">
                <button type="submit" name="answer" value="Yes 💖" class="yes" id="yesBtn">{!! isset($questions['questions_array']['button_1']) ? $questions['questions_array']['button_1'] : "Yes 💖" !!}</button>
                <button type="button" class="no" id="noBtn">{!! isset($questions['questions_array']['button_2']) ? $questions['questions_array']['button_2'] : "No 🙈" !!}</button>
            </div>
        </form>
        <div class="hint">Try to touch “No” 😄 (it floats anywhere inside the box)</div>
        @endif
    </main>

    <section class="overlay" id="overlay" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal">
            <h2 id="modalTitle">Yaaaaay!! 💞</h2>
            <p>You just made my day 1000× cuter 💗</p>
            <p>Virtual hug incoming 🫶✨</p>
            <button class="close" id="closeBtn">Close</button>
        </div>
    </section>

    <script>
        // Background hearts
        const bg = document.getElementById('bg');
        for (let i = 0; i < 30; i++) {
            const h = document.createElement('div');
            h.className = 'float-heart';
            const size = 10 + Math.random() * 18;
            h.style.width = size + 'px';
            h.style.height = size + 'px';
            h.style.left = Math.random() * 100 + 'vw';
            h.style.animationDuration = (6 + Math.random() * 9) + 's';
            h.style.animationDelay = (-Math.random() * 10) + 's';
            h.style.opacity = (0.22 + Math.random() * 0.55).toFixed(2);
            const dot = document.createElement('i');
            h.appendChild(dot);
            bg.appendChild(h);
        }

        const arena = document.getElementById('arena');
        const noBtn = document.getElementById('noBtn');
        const yesBtn = document.getElementById('yesBtn');

        const TRIGGER_DIST = 90; // distance to start escaping (good for mobile)

        // Convert NO to px-based positioning (important for consistent movement)
        function initNoToPx() {
            requestAnimationFrame(() => {
                const a = arena.getBoundingClientRect();
                const b = noBtn.getBoundingClientRect();
                noBtn.style.left = (b.left - a.left) + 'px';
                noBtn.style.top = (b.top - a.top) + 'px';
                noBtn.style.transform = 'translate(0,0)';
            });
        }
        initNoToPx();

        function moveNoAnywhere() {
            const a = arena.getBoundingClientRect();
            const b = noBtn.getBoundingClientRect();
            const pad = 8;

            const left = pad + Math.random() * (a.width - b.width - pad * 2);
            const top = pad + Math.random() * (a.height - b.height - pad * 2);

            noBtn.style.left = left + 'px';
            noBtn.style.top = top + 'px';
            noBtn.style.transform = 'translate(0,0)';

            // Random z-index => sometimes behind YES, sometimes in front
            // YES is z-index 6 in CSS
            noBtn.style.zIndex = (Math.random() > 0.5) ? 3 : 8; // behind or above
        }

        // Pointer move (works for mouse + touch)
        arena.addEventListener('pointermove', (e) => {
            const b = noBtn.getBoundingClientRect();
            const bx = b.left + b.width / 2;
            const by = b.top + b.height / 2;
            const dist = Math.hypot(bx - e.clientX, by - e.clientY);

            if (dist < TRIGGER_DIST) {
                moveNoAnywhere();
            }
        });

        // If it still gets focused/entered, escape immediately
        noBtn.addEventListener('pointerenter', (e) => {
            moveNoAnywhere();
        });

        // Prevent clicking NO
        noBtn.addEventListener('click', (e) => {
            e.preventDefault();
            moveNoAnywhere();
        });

        // YES modal + confetti
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('closeBtn');

        function popHeartsBurst() {
            const bursts = 26;
            const cx = window.innerWidth / 2;
            const cy = window.innerHeight / 2;
            for (let i = 0; i < bursts; i++) {
                const p = document.createElement('div');
                p.className = 'pop';
                p.style.left = (cx + (Math.random() * 60 - 30)) + 'px';
                p.style.top = (cy + (Math.random() * 40 - 20)) + 'px';
                p.style.setProperty('--dx', (Math.random() * 560 - 280) + 'px');
                p.style.setProperty('--dy', (-Math.random() * 440 - 120) + 'px');
                document.body.appendChild(p);
                setTimeout(() => p.remove(), 950);
            }
        }

        yesBtn.addEventListener('click', () => {
            popHeartsBurst();
            overlay.classList.add('show');
        });

        closeBtn.addEventListener('click', () => overlay.classList.remove('show'));
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) overlay.classList.remove('show');
        });

        // Keep working after rotate/resize
        window.addEventListener('resize', () => {
            initNoToPx();
            moveNoAnywhere();
        });

    </script>
</body>

</html>
