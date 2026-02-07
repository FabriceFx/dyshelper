<?php
// Dys-Helper (Version Finale v2.1)
// - Ajout Footer Crédits + Impression
session_start();

$available_langs = ['fr', 'en'];
$default_lang = 'fr';

if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs)) {
  $lang = $_GET['lang'];
  $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang']) && in_array($_SESSION['lang'], $available_langs)) {
  $lang = $_SESSION['lang'];
} else {
  $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'fr', 0, 2);
  $lang = in_array($browser_lang, $available_langs) ? $browser_lang : $default_lang;
}

$trans = [
  'fr' => [
    'title' => 'Dys-Helper',
    'subtitle' => 'Assistant de lecture et mise en page inclusive',
    'input_label' => '1. Texte source (Tapez, collez ou importez)',
    'input_placeholder' => 'Collez votre texte ici ou glissez un fichier Word (.docx) / .txt…',
    'import_btn' => 'Importer un fichier',
    'settings_label' => '2. Paramètres',
    'profile_label' => 'Profil',
    'profile_new' => 'Nouveau',
    'profile_rename' => 'Renommer',
    'profile_delete' => 'Supprimer',
    'profile_preset' => 'Preset',
    'preset_default' => 'Standard',
    'preset_fatigue' => 'Fatigabilité',
    'preset_focus' => 'Concentration',
    'preset_beginner' => 'Début lecture',
    'font_type' => 'Police',
    'font_size' => 'Taille',
    'line_height' => 'Interligne',
    'word_spacing' => 'Espacement mots',
    'letter_spacing' => 'Espacement lettres',
    'background' => 'Fond',
    'bg_white' => 'Blanc',
    'bg_beige' => 'Beige',
    'bg_gray' => 'Gris doux',
    'visual_aids' => '3. Aides visuelles',
    'ruler_mode' => 'Lignes alternées (règle)',
    'guided_mode' => 'Lecture guidée',
    'guided_off' => 'Off',
    'guided_sentence' => 'Par phrase',
    'guided_paragraph' => 'Par paragraphe',
    'guided_prev' => 'Précédent',
    'guided_next' => 'Suivant',
    'guided_show_window' => 'Fenêtre de lecture',
    'syllable_mode' => 'Segmentation (syllabes)',
    'syllable_off' => 'Off',
    'syllable_color' => 'Couleur alternée',
    'syllable_underline' => 'Soulignement alterné',
    'syllable_separators' => 'Séparateurs ·',
    'syllable_color_a' => 'Couleur A',
    'syllable_color_b' => 'Couleur B',
    'confusions' => 'Confusions',
    'confusion_help' => 'Choisissez les lettres/groupes à mettre en évidence',
    'tts' => '4. Lecture vocale (TTS)',
    'tts_voice' => 'Voix',
    'tts_rate' => 'Vitesse',
    'tts_pitch' => 'Pitch',
    'tts_karaoke' => 'Surlignage pendant lecture',
    'tts_read_selection' => 'Lire la sélection si existante',
    'tts_play' => 'Lire',
    'tts_pause' => 'Pause',
    'tts_resume' => 'Reprendre',
    'tts_stop' => 'Stop',
    'print_btn' => 'Imprimer',
    'export_btn' => 'Exporter config',
    'import_cfg_btn' => 'Importer config',
    'reset_btn' => 'RàZ',
    'tip_selection' => 'Astuce : sélectionnez un passage dans l’aperçu puis cliquez sur Lire.',
    'footer_tip' => 'Si mon travail vous aide, un café fait toujours plaisir ☕',
    'footer_credit' => 'Développé par Fabrice Faucheux'
  ],
  'en' => [
    'title' => 'Dys-Helper',
    'subtitle' => 'Inclusive layout and reading assistant',
    'input_label' => '1. Source text (type, paste or import)',
    'input_placeholder' => 'Paste text here or drop a Word (.docx) / .txt file…',
    'import_btn' => 'Import file',
    'settings_label' => '2. Settings',
    'profile_label' => 'Profile',
    'profile_new' => 'New',
    'profile_rename' => 'Rename',
    'profile_delete' => 'Delete',
    'profile_preset' => 'Preset',
    'preset_default' => 'Default',
    'preset_fatigue' => 'Low fatigue',
    'preset_focus' => 'Focus',
    'preset_beginner' => 'Beginner',
    'font_type' => 'Font',
    'font_size' => 'Size',
    'line_height' => 'Line height',
    'word_spacing' => 'Word spacing',
    'letter_spacing' => 'Letter spacing',
    'background' => 'Background',
    'bg_white' => 'White',
    'bg_beige' => 'Beige',
    'bg_gray' => 'Soft gray',
    'visual_aids' => '3. Visual aids',
    'ruler_mode' => 'Alternating lines (ruler)',
    'guided_mode' => 'Guided reading',
    'guided_off' => 'Off',
    'guided_sentence' => 'By sentence',
    'guided_paragraph' => 'By paragraph',
    'guided_prev' => 'Previous',
    'guided_next' => 'Next',
    'guided_show_window' => 'Reading window',
    'syllable_mode' => 'Segmentation (syllables)',
    'syllable_off' => 'Off',
    'syllable_color' => 'Alternating color',
    'syllable_underline' => 'Alternating underline',
    'syllable_separators' => 'Separators ·',
    'syllable_color_a' => 'Color A',
    'syllable_color_b' => 'Color B',
    'confusions' => 'Confusions',
    'confusion_help' => 'Select letters/groups to highlight',
    'tts' => '4. Text-to-speech (TTS)',
    'tts_voice' => 'Voice',
    'tts_rate' => 'Rate',
    'tts_pitch' => 'Pitch',
    'tts_karaoke' => 'Highlight while reading',
    'tts_read_selection' => 'Read selection if any',
    'tts_play' => 'Read',
    'tts_pause' => 'Pause',
    'tts_resume' => 'Resume',
    'tts_stop' => 'Stop',
    'print_btn' => 'Print',
    'export_btn' => 'Export config',
    'import_cfg_btn' => 'Import config',
    'reset_btn' => 'Reset',
    'tip_selection' => 'Tip: select text in preview, then click Read.',
    'footer_tip' => 'If my work helps you, a coffee is always appreciated ☕',
    'footer_credit' => 'Developed by Fabrice Faucheux'
  ],
];

function t($key) {
  global $trans, $lang;
  return $trans[$lang][$key] ?? $trans['fr'][$key] ?? $key;
}
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dys-Helper</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Lexend:wght@300;400;500;600;700&family=Atkinson+Hyperlegible:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/opendyslexic@1.0.3/open-dyslexic.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

  <style>
    :root {
      --paper-bg: #ffffff;
      --syl-a: #1e40af; /* bleu sombre */
      --syl-b: #0f766e; /* teal (évite rouge/vert pur) */
      --conf-color: #b45309; /* ambre */
      --lh-multiplier: 1.6;
    }

    body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; color: #0f172a; }

    /* Font families */
    .font-arial { font-family: Arial, sans-serif; }
    .font-verdana { font-family: Verdana, sans-serif; }
    .font-comic { font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif; }
    .font-dys { font-family: 'OpenDyslexic', sans-serif; }
    .font-lexend { font-family: 'Lexend', sans-serif; }
    .font-atkinson { font-family: 'Atkinson Hyperlegible', sans-serif; }

    /* Sliders */
    input[type=range] { -webkit-appearance: none; width: 100%; background: transparent; }
    input[type=range]::-webkit-slider-thumb { -webkit-appearance: none; height: 16px; width: 16px; border-radius: 50%; background: #3b82f6; margin-top: -6px; cursor: pointer; box-shadow: 0 1px 3px rgba(0,0,0,0.3); transition: transform 0.1s; }
    input[type=range]::-webkit-slider-thumb:hover { transform: scale(1.1); }
    input[type=range]::-webkit-slider-runnable-track { width: 100%; height: 4px; cursor: pointer; background: #e2e8f0; border-radius: 2px; }

    /* A4 page */
    .a4-page {
      width: 210mm; min-height: 297mm;
      background: var(--paper-bg); padding: 20mm;
      box-shadow: 0 10px 30px -10px rgba(0,0,0,0.15);
      margin: 0 auto; color: #000;
      overflow-wrap: break-word;
      text-align: justify;
    }

    /* Ruler effect (paragraph level) */
    .ruler-effect p {
      background-image: linear-gradient(to bottom, transparent 50%, rgba(148,163,184,0.16) 50%);
      background-size: 100% calc(2em * var(--lh-multiplier, 1.6));
      background-attachment: local;
      background-position: 0 0.2em;
    }

    /* Syllable styling */
    .syl-a { color: var(--syl-a); }
    .syl-b { color: var(--syl-b); }
    .syl-ua { text-decoration: underline; text-decoration-thickness: 2px; text-decoration-color: var(--syl-a); text-underline-offset: 0.18em; }
    .syl-ub { text-decoration: underline; text-decoration-thickness: 2px; text-decoration-color: var(--syl-b); text-underline-offset: 0.18em; }
    .syl-sep { opacity: .75; }

    .conf-letter { font-weight: 900; color: var(--conf-color); }

    /* Karaoke */
    .karaoke-word { transition: background-color .12s ease; border-radius: 2px; padding: 0 1px; }
    .karaoke-active { background-color: #fef08a; }

    /* Reading window */
    .reading-window {
      position: sticky;
      top: 0;
      z-index: 10;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 14px 16px;
      box-shadow: 0 10px 24px -18px rgba(0,0,0,0.35);
    }

    /* Drag and drop */
    .drag-active { border-color: #3b82f6 !important; background-color: #eff6ff !important; }

    /* Print Footer (Hidden by default) */
    #print-credit { display: none; }

    /* Print */
    @media print {
      body { background: white; }
      #sidebar, header, footer, .no-print { display: none !important; }
      #preview-container { width: 100%; padding: 0; margin: 0; height: auto; overflow: visible; }
      .a4-page { box-shadow: none; margin: 0; width: 100%; padding: 0; min-height: auto; }
      .reading-window { display:none !important; }
      
      /* Afficher le crédit uniquement à l'impression */
      #print-credit { 
        display: block !important; 
        margin-top: 30px; 
        text-align: center; 
        font-size: 10px; 
        color: #94a3b8; 
        font-family: sans-serif;
        page-break-inside: avoid;
      }
    }
  </style>
</head>

<body class="h-screen flex flex-col overflow-hidden">
<header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-6 z-20 shadow-sm flex-shrink-0">
  <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-md">
      <i class="fas fa-glasses text-lg"></i>
    </div>
    <div>
      <h1 class="text-xl font-bold text-slate-800 leading-tight"><?php echo t('title'); ?></h1>
      <p class="text-[10px] text-slate-500 font-medium uppercase tracking-wide hidden sm:block"><?php echo t('subtitle'); ?></p>
    </div>
  </div>

  <div class="flex items-center gap-2">
    <div class="hidden md:flex items-center gap-2 bg-slate-100 p-1 rounded-lg mr-2 no-print">
      <button id="btn-speak" class="w-8 h-8 rounded-md hover:bg-white hover:text-blue-600 hover:shadow-sm transition flex items-center justify-center text-slate-600" title="<?php echo t('tts_play'); ?>">
        <i class="fas fa-play text-xs"></i>
      </button>
      <button id="btn-pause" class="w-8 h-8 rounded-md hover:bg-white hover:text-amber-600 hover:shadow-sm transition flex items-center justify-center text-slate-600" title="<?php echo t('tts_pause'); ?>">
        <i class="fas fa-pause text-xs"></i>
      </button>
      <button id="btn-resume" class="w-8 h-8 rounded-md hover:bg-white hover:text-emerald-600 hover:shadow-sm transition flex items-center justify-center text-slate-600" title="<?php echo t('tts_resume'); ?>">
        <i class="fas fa-play-circle text-xs"></i>
      </button>
      <button id="btn-stop" class="w-8 h-8 rounded-md hover:bg-white hover:text-red-500 hover:shadow-sm transition flex items-center justify-center text-slate-600" title="<?php echo t('tts_stop'); ?>">
        <i class="fas fa-stop text-xs"></i>
      </button>
    </div>

    <div class="flex bg-slate-100 rounded-lg p-1 text-xs font-bold no-print">
      <a href="?lang=fr" class="px-3 py-1 rounded-md transition-all <?php echo $lang === 'fr' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-400 hover:text-slate-600'; ?>">FR</a>
      <a href="?lang=en" class="px-3 py-1 rounded-md transition-all <?php echo $lang === 'en' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-400 hover:text-slate-600'; ?>">EN</a>
    </div>

    <button id="btn-print" class="bg-slate-900 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm no-print">
      <i class="fas fa-print mr-2"></i><?php echo t('print_btn'); ?>
    </button>
  </div>
</header>

<main class="flex-1 flex overflow-hidden">
  <aside id="sidebar" class="w-[380px] max-w-[92vw] bg-white border-r border-slate-200 overflow-y-auto p-5 flex flex-col gap-6">
    
    <div class="flex-1 space-y-5">
      <section class="space-y-2">
        <div class="flex items-center justify-between">
          <h2 class="text-sm font-extrabold text-slate-800"><?php echo t('input_label'); ?></h2>
          <div class="flex gap-2">
            <input id="file-input" type="file" class="hidden" accept=".txt,.docx" />
            <button id="btn-import" class="text-xs font-bold px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition">
              <i class="fas fa-upload mr-2"></i><?php echo t('import_btn'); ?>
            </button>
          </div>
        </div>

        <div id="drop-zone" class="border-2 border-dashed border-slate-200 rounded-2xl p-3 bg-slate-50">
          <textarea id="input-text" class="w-full h-32 resize-y outline-none bg-transparent text-sm leading-relaxed"
            placeholder="<?php echo htmlspecialchars(t('input_placeholder'), ENT_QUOTES, 'UTF-8'); ?>"></textarea>
          <p class="text-[11px] text-slate-500 mt-2"><?php echo t('tip_selection'); ?></p>
        </div>
      </section>

      <section class="space-y-2">
        <h2 class="text-sm font-extrabold text-slate-800"><?php echo t('settings_label'); ?></h2>

        <div class="grid grid-cols-2 gap-2">
          <div class="col-span-2">
            <label class="text-xs font-bold text-slate-600"><?php echo t('profile_label'); ?></label>
            <div class="flex gap-2 mt-1">
              <select id="profile-select" class="flex-1 text-sm bg-white border border-slate-200 rounded-xl px-3 py-2"></select>
              <button id="profile-new" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-bold" title="<?php echo t('profile_new'); ?>"><i class="fas fa-plus"></i></button>
              <button id="profile-rename" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-bold" title="<?php echo t('profile_rename'); ?>"><i class="fas fa-pen"></i></button>
              <button id="profile-delete" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-bold" title="<?php echo t('profile_delete'); ?>"><i class="fas fa-trash"></i></button>
            </div>
          </div>

          <div class="col-span-2">
            <label class="text-xs font-bold text-slate-600"><?php echo t('profile_preset'); ?></label>
            <div class="flex gap-2 mt-1">
              <select id="preset-select" class="flex-1 text-sm bg-white border border-slate-200 rounded-xl px-3 py-2">
                <option value="default"><?php echo t('preset_default'); ?></option>
                <option value="fatigue"><?php echo t('preset_fatigue'); ?></option>
                <option value="focus"><?php echo t('preset_focus'); ?></option>
                <option value="beginner"><?php echo t('preset_beginner'); ?></option>
              </select>
              <button id="preset-apply" class="px-3 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-extrabold">OK</button>
            </div>
          </div>
        </div>
      </section>

      <section class="space-y-3">
        <div class="grid grid-cols-2 gap-3">
          <div class="col-span-2">
            <label class="text-xs font-bold text-slate-600"><?php echo t('font_type'); ?></label>
            <select id="font-family" class="w-full text-sm bg-white border border-slate-200 rounded-xl px-3 py-2 mt-1">
              <option value="font-lexend">Lexend</option>
              <option value="font-atkinson">Atkinson Hyperlegible</option>
              <option value="font-dys">OpenDyslexic</option>
              <option value="font-verdana">Verdana</option>
              <option value="font-arial">Arial</option>
              <option value="font-comic">Comic Sans</option>
            </select>
          </div>

          <div class="col-span-2">
            <label class="text-xs font-bold text-slate-600"><?php echo t('background'); ?></label>
            <div class="grid grid-cols-3 gap-2 mt-1">
              <button data-bg="white" class="bg-choice px-2 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50"><?php echo t('bg_white'); ?></button>
              <button data-bg="beige" class="bg-choice px-2 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50"><?php echo t('bg_beige'); ?></button>
              <button data-bg="gray" class="bg-choice px-2 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50"><?php echo t('bg_gray'); ?></button>
            </div>
          </div>

          <div class="col-span-2">
            <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('font_size'); ?>: <span id="val-font-size" class="font-extrabold">18</span>px</label></div>
            <input id="font-size" type="range" min="12" max="34" step="1" value="18" />
          </div>

          <div class="col-span-2">
            <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('line_height'); ?>: <span id="val-line-height" class="font-extrabold">1.6</span></label></div>
            <input id="line-height" type="range" min="1.2" max="2.4" step="0.05" value="1.6" />
          </div>

          <div>
            <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('word_spacing'); ?>: <span id="val-word-spacing" class="font-extrabold">0.10</span>em</label></div>
            <input id="word-spacing" type="range" min="0" max="0.6" step="0.02" value="0.10" />
          </div>

          <div>
            <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('letter_spacing'); ?>: <span id="val-letter-spacing" class="font-extrabold">0.03</span>em</label></div>
            <input id="letter-spacing" type="range" min="0" max="0.2" step="0.01" value="0.03" />
          </div>
        </div>
      </section>

      <section class="space-y-3">
        <h3 class="text-sm font-extrabold text-slate-800"><?php echo t('visual_aids'); ?></h3>

        <label class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-2xl px-3 py-2">
          <input id="ruler" type="checkbox" class="w-4 h-4" />
          <span class="text-sm font-semibold text-slate-700"><?php echo t('ruler_mode'); ?></span>
        </label>

        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3 space-y-2">
          <div class="flex items-center justify-between gap-3">
            <label class="text-sm font-extrabold text-slate-800"><?php echo t('guided_mode'); ?></label>
            <select id="guided-mode" class="text-sm bg-white border border-slate-200 rounded-xl px-3 py-2">
              <option value="off"><?php echo t('guided_off'); ?></option>
              <option value="sentence"><?php echo t('guided_sentence'); ?></option>
              <option value="paragraph"><?php echo t('guided_paragraph'); ?></option>
            </select>
          </div>

          <label class="flex items-center gap-3">
            <input id="guided-window" type="checkbox" class="w-4 h-4" />
            <span class="text-sm font-semibold text-slate-700"><?php echo t('guided_show_window'); ?></span>
          </label>

          <div class="flex gap-2">
            <button id="guided-prev" class="flex-1 px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-chevron-left mr-1"></i><?php echo t('guided_prev'); ?></button>
            <button id="guided-next" class="flex-1 px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><?php echo t('guided_next'); ?><i class="fas fa-chevron-right ml-1"></i></button>
          </div>
        </div>

        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3 space-y-2">
          <div class="flex items-center justify-between gap-3">
            <label class="text-sm font-extrabold text-slate-800"><?php echo t('syllable_mode'); ?></label>
            <select id="syllable-mode" class="text-sm bg-white border border-slate-200 rounded-xl px-3 py-2">
              <option value="off"><?php echo t('syllable_off'); ?></option>
              <option value="color"><?php echo t('syllable_color'); ?></option>
              <option value="underline"><?php echo t('syllable_underline'); ?></option>
              <option value="separators"><?php echo t('syllable_separators'); ?></option>
            </select>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <div><label class="text-[11px] font-bold text-slate-600"><?php echo t('syllable_color_a'); ?></label><input id="syl-color-a" type="color" class="w-full h-10 rounded-xl border border-slate-200 bg-white" value="#1e40af"></div>
            <div><label class="text-[11px] font-bold text-slate-600"><?php echo t('syllable_color_b'); ?></label><input id="syl-color-b" type="color" class="w-full h-10 rounded-xl border border-slate-200 bg-white" value="#0f766e"></div>
          </div>
        </div>

        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3 space-y-2">
          <div class="flex items-center justify-between">
            <h4 class="text-sm font-extrabold text-slate-800"><?php echo t('confusions'); ?></h4>
            <input id="conf-color" type="color" class="w-10 h-10 rounded-xl border border-slate-200 bg-white" value="#b45309" title="Couleur">
          </div>
          <p class="text-[11px] text-slate-500"><?php echo t('confusion_help'); ?></p>
          <div class="grid grid-cols-3 gap-2 text-xs font-bold">
            <?php
              $conf = ['b','d','p','q','m','n','v','f','t','l','il','an','en','on','ou','é','è'];
              foreach ($conf as $c) {
                $id = 'conf_' . preg_replace('/[^a-zA-Z0-9]/', '_', $c);
                echo '<label class="flex items-center gap-2 bg-white border border-slate-200 rounded-xl px-2 py-2 cursor-pointer hover:bg-slate-50">';
                echo '<input type="checkbox" class="conf-check w-4 h-4" value="'.htmlspecialchars($c, ENT_QUOTES, 'UTF-8').'" id="'.$id.'">';
                echo '<span>'.htmlspecialchars($c, ENT_QUOTES, 'UTF-8').'</span>';
                echo '</label>';
              }
            ?>
          </div>
        </div>
      </section>

      <section class="space-y-3">
        <h3 class="text-sm font-extrabold text-slate-800"><?php echo t('tts'); ?></h3>
        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3 space-y-2">
          <label class="text-xs font-bold text-slate-600"><?php echo t('tts_voice'); ?></label>
          <select id="tts-voice" class="w-full text-sm bg-white border border-slate-200 rounded-xl px-3 py-2"></select>
          <div class="grid grid-cols-2 gap-2">
            <div>
              <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('tts_rate'); ?>: <span id="val-tts-rate" class="font-extrabold">0.8</span></label></div>
              <input id="tts-rate" type="range" min="0.5" max="1.2" step="0.05" value="0.8" />
            </div>
            <div>
              <div class="flex items-center justify-between"><label class="text-xs font-bold text-slate-600"><?php echo t('tts_pitch'); ?>: <span id="val-tts-pitch" class="font-extrabold">1.0</span></label></div>
              <input id="tts-pitch" type="range" min="0.6" max="1.4" step="0.05" value="1.0" />
            </div>
          </div>
          <label class="flex items-center gap-3 mt-2">
            <input id="tts-karaoke" type="checkbox" class="w-4 h-4" checked />
            <span class="text-sm font-semibold text-slate-700"><?php echo t('tts_karaoke'); ?></span>
          </label>
          <label class="flex items-center gap-3">
            <input id="tts-read-selection" type="checkbox" class="w-4 h-4" checked />
            <span class="text-sm font-semibold text-slate-700"><?php echo t('tts_read_selection'); ?></span>
          </label>
          <div class="grid grid-cols-2 gap-2 pt-2">
            <button id="tts-play" class="px-3 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-extrabold"><i class="fas fa-play mr-2"></i><?php echo t('tts_play'); ?></button>
            <button id="tts-stop" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-stop mr-2 text-red-500"></i><?php echo t('tts_stop'); ?></button>
            <button id="tts-pause" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-pause mr-2 text-amber-600"></i><?php echo t('tts_pause'); ?></button>
            <button id="tts-resume" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-play-circle mr-2 text-emerald-600"></i><?php echo t('tts_resume'); ?></button>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-2 no-print">
          <button id="btn-export" class="px-3 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-extrabold"><i class="fas fa-file-export mr-2"></i><?php echo t('export_btn'); ?></button>
          <button id="btn-import-cfg" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-file-import mr-2"></i><?php echo t('import_cfg_btn'); ?></button>
          <button id="btn-reset" class="col-span-2 px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-rotate-left mr-2"></i><?php echo t('reset_btn'); ?></button>
          <input id="cfg-file" type="file" accept="application/json" class="hidden" />
        </div>
      </section>
    </div>

    <footer class="border-t border-slate-200 p-4 mt-auto bg-slate-50">
        <div class="mb-4 text-center">
            <a href="https://paypal.me/FFaucheux" target="_blank" rel="noopener noreferrer" 
               class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-slate-500 hover:bg-yellow-50 hover:text-yellow-700 hover:border-yellow-200 border border-slate-200 transition-all duration-300 text-xs font-medium group w-full justify-center">
                <i class="fas fa-mug-hot group-hover:animate-bounce"></i> 
                <span><?php echo t('footer_tip'); ?></span>
            </a>
        </div>
        <div class="text-center text-[10px] text-slate-400">
            <p>© <?php echo date('Y'); ?> <strong>Fabrice Faucheux</strong></p>
            <p>v2.1 • Auto-Save ON</p>
        </div>
    </footer>
  </aside>

  <section id="preview-container" class="flex-1 overflow-y-auto p-6 bg-slate-50">
    <div id="reading-window" class="reading-window hidden no-print mb-4">
      <div class="flex items-center justify-between gap-3">
        <div class="text-xs font-extrabold text-slate-700">
          <i class="fas fa-location-crosshairs mr-2 text-blue-600"></i>
          <span id="guided-label">Guided</span>
          <span class="text-slate-400 font-bold">•</span>
          <span id="guided-index" class="text-slate-600 font-extrabold">1/1</span>
        </div>
        <div class="flex gap-2">
          <button id="guided-prev-top" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-chevron-left"></i></button>
          <button id="guided-next-top" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-xs font-extrabold"><i class="fas fa-chevron-right"></i></button>
        </div>
      </div>
      <div id="guided-content" class="mt-3 text-base leading-relaxed"></div>
    </div>

    <div id="paper" class="a4-page font-lexend" aria-label="Aperçu">
      <p class="text-slate-400 italic">…</p>
    </div>
    
    <div id="print-credit">
        <?php echo t('footer_credit'); ?>
    </div>
  </section>
</main>

<script>
(() => {
  const $ = (id) => document.getElementById(id);
  const debounce = (fn, wait=220) => { let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), wait); }; };
  function escapeHTML(str) { return (str ?? '').replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;'); }
  function clamp(n, a, b) { return Math.max(a, Math.min(b, n)); }
  function splitSentences(text) { const cleaned = (text ?? '').replace(/\s+/g, ' ').trim(); if (!cleaned) return []; const parts = cleaned.split(/(?<=[\.\!\?\…])\s+(?=[A-ZÀ-ÖØ-Þ0-9"“«])/g); return parts.map(s => s.trim()).filter(Boolean); }
  function splitParagraphs(text) { const raw = (text ?? '').replace(/\r\n/g, '\n'); const parts = raw.split(/\n\s*\n/g).map(p => p.trim()).filter(Boolean); return parts.length ? parts : (raw.trim() ? [raw.trim()] : []); }
  function isWordChar(ch) { return /[A-Za-zÀ-ÖØ-öø-ÿ0-9']/u.test(ch); }
  const VOWELS = "aeiouyàâäéèêëîïôöùûüÿœæAEIOUYÀÂÄÉÈÊËÎÏÔÖÙÛÜŸŒÆ";
  const DIGRAPHS = ["ch","ph","th","gn","gu","qu","eau","au","ou","oi","ai","ei","œu","eu","ien","ion","tion","sion"];
  
  function splitToSyllablesFR(word) {
    const w = word; if (w.length <= 3) return [w]; if (!/[A-Za-zÀ-ÖØ-öø-ÿ]/u.test(w)) return [w];
    const lower = w.toLowerCase(); let spans = []; let i = 0;
    while (i < lower.length) {
      const ch = lower[i]; const isV = VOWELS.includes(w[i]) || "aeiouyàâäéèêëîïôöùûüÿœæ".includes(ch);
      if (!isV) { i++; continue; } let j = i + 1;
      while (j < lower.length) { const ch2 = lower[j]; const isV2 = "aeiouyàâäéèêëîïôöùûüÿœæ".includes(ch2) || VOWELS.includes(w[j]); if (!isV2) break; j++; }
      spans.push([i, j]); i = j;
    }
    if (spans.length <= 1) return [w];
    let cuts = [];
    for (let k = 0; k < spans.length - 1; k++) {
      const endV = spans[k][1]; const startNextV = spans[k+1][0]; const cluster = lower.slice(endV, startNextV);
      let cut = startNextV;
      if (cluster.length === 0) cut = startNextV;
      else if (cluster.length === 1) cut = startNextV;
      else { const last2 = cluster.slice(-2); if (DIGRAPHS.includes(last2)) cut = startNextV - 2; else cut = startNextV - 1; }
      cuts.push(clamp(cut, 1, w.length-1));
    }
    let out = []; let prev = 0;
    for (const c of cuts) { out.push(w.slice(prev, c)); prev = c; }
    out.push(w.slice(prev)); return out.filter(Boolean);
  }

  // --- CONFUSION FIX (Regex unique) ---
  function applyConfusionsToToken(token, patterns) {
    if (!patterns.length) return token;
    const sorted = [...patterns].sort((a,b) => b.length - a.length);
    const escapedPatterns = sorted.map(p => p.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'));
    const re = new RegExp(`(${escapedPatterns.join('|')})`, 'giu');
    return token.replace(re, (m) => `<span class="conf-letter">${m}</span>`);
  }

  function buildRenderedHTMLFromText(text, cfg, forKaraoke=true) {
    const paragraphs = splitParagraphs(text); let fullPlain = ""; let wordRanges = []; let wordId = 0;
    const sylMode = cfg.syllableMode; const conf = cfg.confusions || [];
    
    function renderWord(word) {
      let w = word;
      // Confusions d'abord (texte brut)
      if (cfg.confEnabled && conf.length) { w = applyConfusionsToToken(w, conf); }
      
      const containsTags = /<span\b/i.test(w);
      if (sylMode !== "off" && !containsTags && /[A-Za-zÀ-ÖØ-öø-ÿ]/u.test(w)) {
        const sylls = splitToSyllablesFR(w);
        if (sylls.length > 1) {
          let alt = 0;
          if (sylMode === "separators") { w = sylls.map(s => s).join('<span class="syl-sep">·</span>'); }
          else if (sylMode === "color") { w = sylls.map(s => `<span class="${alt++ % 2 ? 'syl-b' : 'syl-a'}">${s}</span>`).join(''); }
          else if (sylMode === "underline") { w = sylls.map(s => `<span class="${alt++ % 2 ? 'syl-ub' : 'syl-ua'}">${s}</span>`).join(''); }
        }
      }
      if (!forKaraoke) return w;
      const plain = stripTags(w); const start = fullPlain.length; fullPlain += plain; const end = fullPlain.length;
      const id = `w_${wordId++}`; wordRanges.push({start, end, id});
      return `<span id="${id}" class="karaoke-word">${w}</span>`;
    }
    
    function stripTags(html) { return html.replace(/<[^>]*>/g, ''); }
    
    let html = "";
    for (let p of paragraphs) {
      const escaped = escapeHTML(p); let i = 0; let inner = "";
      while (i < escaped.length) {
        const ch = escaped[i];
        if (ch === '&') {
          const semi = escaped.indexOf(';', i); const entity = semi !== -1 ? escaped.slice(i, semi+1) : escaped.slice(i);
          const plainChar = decodeHTMLEntity(entity); inner += entity; if (forKaraoke) fullPlain += plainChar; i += entity.length; continue;
        }
        if (/\s/.test(ch)) {
          let j = i+1; while (j < escaped.length && /\s/.test(escaped[j])) j++;
          const space = escaped.slice(i, j); inner += space; if (forKaraoke) fullPlain += space.replace(/\s+/g, ' '); i = j; continue;
        }
        if (isWordChar(ch)) {
          let j = i+1; while (j < escaped.length && isWordChar(escaped[j])) j++;
          const token = escaped.slice(i, j); inner += renderWord(token); i = j;
        } else { inner += ch; if (forKaraoke) fullPlain += ch; i++; }
      }
      if (forKaraoke) fullPlain += "\n\n"; html += `<p>${inner}</p>`;
    }
    return { html, plain: (fullPlain ?? '').trim(), ranges: wordRanges };
  }

  function decodeHTMLEntity(ent) { const ta = document.createElement('textarea'); ta.innerHTML = ent; return ta.value; }

  const STORAGE_KEY = "dyshelper_profiles_v2";
  const STORAGE_ACTIVE = "dyshelper_active_profile_v2";
  const STORAGE_TEXT = "dyshelper_text_v2";

  const defaultCfg = () => ({
    fontFamily: "font-lexend", fontSize: 18, lineHeight: 1.6, wordSpacing: 0.10, letterSpacing: 0.03, paperBg: "white",
    ruler: false, guidedMode: "off", guidedWindow: false, guidedIndex: 0,
    syllableMode: "off", sylColorA: "#1e40af", sylColorB: "#0f766e",
    confEnabled: true, confColor: "#b45309", confusions: ["b","d","p","q"],
    ttsVoice: "", ttsRate: 0.8, ttsPitch: 1.0, ttsKaraoke: true, ttsReadSelection: true,
  });

  const presets = {
    default: () => ({ fontSize: 18, lineHeight: 1.6, wordSpacing: 0.10, letterSpacing: 0.03, syllableMode: "off", ruler: false, paperBg: "white" }),
    fatigue: () => ({ fontSize: 20, lineHeight: 1.9, wordSpacing: 0.16, letterSpacing: 0.05, syllableMode: "off", ruler: true, paperBg: "beige" }),
    focus: () => ({ fontSize: 19, lineHeight: 1.75, wordSpacing: 0.12, letterSpacing: 0.04, guidedMode: "sentence", guidedWindow: true, ruler: false, paperBg: "white" }),
    beginner: () => ({ fontSize: 22, lineHeight: 2.0, wordSpacing: 0.18, letterSpacing: 0.06, syllableMode: "color", ruler: true, guidedMode: "paragraph", guidedWindow: true, paperBg: "beige" }),
  };

  function loadProfiles() { try { const raw = localStorage.getItem(STORAGE_KEY); return raw ? JSON.parse(raw) : null; } catch { return null; } }
  function saveProfiles(obj) { localStorage.setItem(STORAGE_KEY, JSON.stringify(obj)); }
  function ensureProfiles() {
    let profiles = loadProfiles();
    if (!profiles || !Object.keys(profiles).length) { profiles = { "Classe": defaultCfg() }; saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, "Classe"); }
    let active = localStorage.getItem(STORAGE_ACTIVE);
    if (!active || !profiles[active]) { active = Object.keys(profiles)[0]; localStorage.setItem(STORAGE_ACTIVE, active); }
    return { profiles, active };
  }

  let { profiles, active } = ensureProfiles();
  let cfg = structuredClone(profiles[active] ?? defaultCfg());
  let lastRender = { plain: "", ranges: [] };

  const els = {
    input: $("input-text"), drop: $("drop-zone"), paper: $("paper"), readingWindow: $("reading-window"), guidedContent: $("guided-content"), guidedIndex: $("guided-index"), guidedLabel: $("guided-label"),
    profileSelect: $("profile-select"), profileNew: $("profile-new"), profileRename: $("profile-rename"), profileDelete: $("profile-delete"), presetSelect: $("preset-select"), presetApply: $("preset-apply"),
    fontFamily: $("font-family"), fontSize: $("font-size"), lineHeight: $("line-height"), wordSpacing: $("word-spacing"), letterSpacing: $("letter-spacing"),
    valFontSize: $("val-font-size"), valLineHeight: $("val-line-height"), valWordSpacing: $("val-word-spacing"), valLetterSpacing: $("val-letter-spacing"),
    ruler: $("ruler"), guidedMode: $("guided-mode"), guidedWindow: $("guided-window"), guidedPrev: $("guided-prev"), guidedNext: $("guided-next"), guidedPrevTop: $("guided-prev-top"), guidedNextTop: $("guided-next-top"),
    syllableMode: $("syllable-mode"), sylA: $("syl-color-a"), sylB: $("syl-color-b"), confColor: $("conf-color"), confChecks: () => Array.from(document.querySelectorAll(".conf-check")),
    bgChoices: () => Array.from(document.querySelectorAll(".bg-choice")), fileInput: $("file-input"), btnImport: $("btn-import"),
    ttsVoice: $("tts-voice"), ttsRate: $("tts-rate"), ttsPitch: $("tts-pitch"), valTtsRate: $("val-tts-rate"), valTtsPitch: $("val-tts-pitch"),
    ttsKaraoke: $("tts-karaoke"), ttsReadSelection: $("tts-read-selection"), ttsPlay: $("tts-play"), ttsStop: $("tts-stop"), ttsPause: $("tts-pause"), ttsResume: $("tts-resume"),
    btnSpeak: $("btn-speak"), btnStopHeader: $("btn-stop"), btnPauseHeader: $("btn-pause"), btnResumeHeader: $("btn-resume"), btnPrint: $("btn-print"),
    btnExport: $("btn-export"), btnImportCfg: $("btn-import-cfg"), cfgFile: $("cfg-file"), btnReset: $("btn-reset"),
  };

  function applyCSSVars() {
    const bg = cfg.paperBg; let color = "#ffffff"; if (bg === "beige") color = "#fff7ed"; else if (bg === "gray") color = "#f8fafc";
    document.documentElement.style.setProperty("--paper-bg", color); document.documentElement.style.setProperty("--syl-a", cfg.sylColorA || "#1e40af");
    document.documentElement.style.setProperty("--syl-b", cfg.sylColorB || "#0f766e"); document.documentElement.style.setProperty("--conf-color", cfg.confColor || "#b45309");
    document.documentElement.style.setProperty("--lh-multiplier", String(cfg.lineHeight ?? 1.6));
  }

  function applyPaperStyle() {
    applyCSSVars();
    els.paper.classList.remove("font-arial","font-verdana","font-comic","font-dys","font-lexend","font-atkinson");
    els.paper.classList.add(cfg.fontFamily || "font-lexend");
    els.paper.style.fontSize = `${cfg.fontSize}px`; els.paper.style.lineHeight = String(cfg.lineHeight);
    els.paper.style.wordSpacing = `${cfg.wordSpacing}em`; els.paper.style.letterSpacing = `${cfg.letterSpacing}em`;
    els.paper.classList.toggle("ruler-effect", !!cfg.ruler);
  }

  function syncUIFromCfg() {
    renderProfileSelect();
    els.fontFamily.value = cfg.fontFamily; els.fontSize.value = cfg.fontSize; els.lineHeight.value = cfg.lineHeight;
    els.wordSpacing.value = cfg.wordSpacing; els.letterSpacing.value = cfg.letterSpacing;
    els.valFontSize.textContent = String(cfg.fontSize); els.valLineHeight.textContent = String(cfg.lineHeight.toFixed(2)).replace(/\.00$/, ".0");
    els.valWordSpacing.textContent = String(cfg.wordSpacing.toFixed(2)); els.valLetterSpacing.textContent = String(cfg.letterSpacing.toFixed(2));
    els.ruler.checked = !!cfg.ruler; els.guidedMode.value = cfg.guidedMode || "off"; els.guidedWindow.checked = !!cfg.guidedWindow;
    els.syllableMode.value = cfg.syllableMode || "off"; els.sylA.value = cfg.sylColorA || "#1e40af"; els.sylB.value = cfg.sylColorB || "#0f766e";
    els.confColor.value = cfg.confColor || "#b45309"; els.confChecks().forEach(chk => { chk.checked = (cfg.confusions || []).includes(chk.value); });
    els.ttsRate.value = cfg.ttsRate ?? 0.8; els.ttsPitch.value = cfg.ttsPitch ?? 1.0;
    els.valTtsRate.textContent = String((cfg.ttsRate ?? 0.8).toFixed(2)).replace(/\.00$/, ".0"); els.valTtsPitch.textContent = String((cfg.ttsPitch ?? 1.0).toFixed(2)).replace(/\.00$/, ".0");
    els.ttsKaraoke.checked = !!cfg.ttsKaraoke; els.ttsReadSelection.checked = !!cfg.ttsReadSelection;
    els.bgChoices().forEach(b => { const on = b.dataset.bg === cfg.paperBg; b.classList.toggle("bg-blue-600", on); b.classList.toggle("text-white", on); b.classList.toggle("border-blue-600", on); });
    applyPaperStyle(); updateReadingWindowVisibility();
  }

  function persistCfg() { profiles[active] = cfg; saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, active); }
  function getGuidedChunks(text) { if (cfg.guidedMode === "sentence") return splitSentences(text); if (cfg.guidedMode === "paragraph") return splitParagraphs(text); return []; }
  function updateReadingWindowVisibility() { const show = cfg.guidedMode !== "off" && !!cfg.guidedWindow; els.readingWindow.classList.toggle("hidden", !show); els.guidedPrev.disabled = !show; els.guidedNext.disabled = !show; }
  
  function renderGuided(text) {
    const chunks = getGuidedChunks(text); if (!chunks.length) { cfg.guidedIndex = 0; els.guidedIndex.textContent = "0/0"; els.guidedContent.innerHTML = `<div class="text-slate-400 italic">…</div>`; return; }
    cfg.guidedIndex = clamp(cfg.guidedIndex ?? 0, 0, chunks.length - 1);
    const idx = cfg.guidedIndex + 1; els.guidedIndex.textContent = `${idx}/${chunks.length}`;
    els.guidedLabel.textContent = (cfg.guidedMode === "sentence" ? "<?php echo htmlspecialchars(t('guided_sentence'), ENT_QUOTES, 'UTF-8'); ?>" : cfg.guidedMode === "paragraph" ? "<?php echo htmlspecialchars(t('guided_paragraph'), ENT_QUOTES, 'UTF-8'); ?>" : "Guided");
    const rendered = buildRenderedHTMLFromText(chunks[cfg.guidedIndex], cfg, false); els.guidedContent.innerHTML = rendered.html;
  }

  const render = debounce(() => {
    const text = els.input.value || ""; applyPaperStyle(); const rendered = buildRenderedHTMLFromText(text, cfg, true);
    lastRender = { plain: rendered.plain, ranges: rendered.ranges }; els.paper.innerHTML = rendered.html || `<p class="text-slate-400 italic">…</p>`;
    renderGuided(text); updateReadingWindowVisibility(); localStorage.setItem(STORAGE_TEXT, text); persistCfg();
  }, 220);

  function renderProfileSelect() { const names = Object.keys(profiles); els.profileSelect.innerHTML = names.map(n => `<option value="${escapeHTML(n)}">${escapeHTML(n)}</option>`).join(""); els.profileSelect.value = active; }
  function createProfile(name) { name = (name || "").trim(); if (!name || profiles[name]) return; profiles[name] = structuredClone(defaultCfg()); active = name; cfg = structuredClone(profiles[active]); saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, active); syncUIFromCfg(); render(); }
  function renameProfile(newName) { newName = (newName || "").trim(); if (!newName || profiles[newName]) return; const oldName = active; profiles[newName] = profiles[oldName]; delete profiles[oldName]; active = newName; saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, active); syncUIFromCfg(); render(); }
  function deleteProfile() { const names = Object.keys(profiles); if (names.length <= 1) return; delete profiles[active]; active = Object.keys(profiles)[0]; cfg = structuredClone(profiles[active]); saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, active); syncUIFromCfg(); render(); }
  function applyPreset(key) { const p = presets[key]?.(); if (!p) return; cfg = { ...cfg, ...p }; cfg.guidedIndex = 0; persistCfg(); syncUIFromCfg(); render(); }
  
  function handleFile(file) {
    if (!file) return; const name = (file.name || "").toLowerCase();
    if (name.endsWith(".txt")) { const reader = new FileReader(); reader.onload = () => { els.input.value = reader.result || ""; render(); }; reader.readAsText(file, "utf-8"); return; }
    if (name.endsWith(".docx")) { const reader = new FileReader(); reader.onload = async (e) => { try { const arrayBuffer = e.target.result; const result = await mammoth.extractRawText({ arrayBuffer }); els.input.value = (result?.value || "").trim(); render(); } catch (err) { alert("Import DOCX impossible."); } }; reader.readAsArrayBuffer(file); return; }
    alert("Format non supporté.");
  }

  function setupDnD() {
    ["dragenter","dragover"].forEach(evt => els.drop.addEventListener(evt, (e) => { e.preventDefault(); e.stopPropagation(); els.drop.classList.add("drag-active"); }));
    ["dragleave","drop"].forEach(evt => els.drop.addEventListener(evt, (e) => { e.preventDefault(); e.stopPropagation(); els.drop.classList.remove("drag-active"); }));
    els.drop.addEventListener("drop", (e) => handleFile(e.dataTransfer?.files?.[0]));
  }

  let voices = []; let utterance = null; let isSpeaking = false;
  function loadVoices() {
    voices = window.speechSynthesis?.getVoices?.() || []; els.ttsVoice.innerHTML = voices.map((v, idx) => `<option value="${idx}">${escapeHTML(v.name + ' — ' + v.lang)}</option>`).join("");
    if (cfg.ttsVoice) { const idx = voices.findIndex(v => v.name === cfg.ttsVoice); if (idx >= 0) els.ttsVoice.value = String(idx); }
  }
  function clearKaraokeHighlight() { document.querySelectorAll(".karaoke-active").forEach(el => el.classList.remove("karaoke-active")); }
  function highlightByCharIndex(charIndex) {
    if (!cfg.ttsKaraoke) return; const ranges = lastRender.ranges || []; let lo = 0, hi = ranges.length - 1, found = -1;
    while (lo <= hi) { const mid = (lo + hi) >> 1; const r = ranges[mid]; if (charIndex < r.start) hi = mid - 1; else if (charIndex >= r.end) lo = mid + 1; else { found = mid; break; } }
    if (found >= 0) { clearKaraokeHighlight(); const el = document.getElementById(ranges[found].id); if (el) el.classList.add("karaoke-active"); }
  }
  function getTextForTTS() {
    const sel = window.getSelection?.(); if (!!cfg.ttsReadSelection && sel && sel.toString().trim().length > 0) return sel.toString().trim();
    const text = els.input.value || ""; const chunks = getGuidedChunks(text); if (cfg.guidedMode !== "off" && chunks.length) return chunks[clamp(cfg.guidedIndex ?? 0, 0, chunks.length - 1)]; return text;
  }
  function speak() {
    const synth = window.speechSynthesis; if (!synth) return; stopSpeak(); const text = (getTextForTTS() || "").trim(); if (!text) return;
    utterance = new SpeechSynthesisUtterance(text); utterance.rate = cfg.ttsRate ?? 0.8; utterance.pitch = cfg.ttsPitch ?? 1.0;
    const idx = parseInt(els.ttsVoice.value || "-1", 10); if (!Number.isNaN(idx) && voices[idx]) { utterance.voice = voices[idx]; cfg.ttsVoice = voices[idx].name; persistCfg(); }
    utterance.onboundary = (e) => { const readingFull = (!cfg.ttsReadSelection || window.getSelection?.().toString().trim().length === 0) && (cfg.guidedMode === "off"); if (readingFull && typeof e.charIndex === "number") highlightByCharIndex(e.charIndex); };
    utterance.onstart = () => { isSpeaking = true; }; utterance.onend = () => { isSpeaking = false; clearKaraokeHighlight(); }; utterance.onerror = () => { isSpeaking = false; clearKaraokeHighlight(); };
    synth.speak(utterance);
  }
  function stopSpeak() { const synth = window.speechSynthesis; if (!synth) return; synth.cancel(); utterance = null; isSpeaking = false; clearKaraokeHighlight(); }
  function pauseSpeak() { window.speechSynthesis?.pause(); } function resumeSpeak() { window.speechSynthesis?.resume(); }
  function exportConfig() { const blob = new Blob([JSON.stringify({ version: 2, active, profiles }, null, 2)], { type: "application/json" }); const a = document.createElement("a"); a.href = URL.createObjectURL(blob); a.download = "dys-helper-config.json"; document.body.appendChild(a); a.click(); a.remove(); }
  function importConfigFromFile(file) { if (!file) return; const reader = new FileReader(); reader.onload = () => { try { const obj = JSON.parse(reader.result); if (!obj || !obj.profiles) throw new Error(); profiles = obj.profiles; active = obj.active && profiles[obj.active] ? obj.active : Object.keys(profiles)[0]; cfg = structuredClone(profiles[active]); saveProfiles(profiles); localStorage.setItem(STORAGE_ACTIVE, active); syncUIFromCfg(); render(); } catch (e) { alert("Config invalide."); } }; reader.readAsText(file, "utf-8"); }
  function resetAll() { if (!confirm("Réinitialiser ?")) return; localStorage.removeItem(STORAGE_KEY); localStorage.removeItem(STORAGE_ACTIVE); localStorage.removeItem(STORAGE_TEXT); ({ profiles, active } = ensureProfiles()); cfg = structuredClone(profiles[active]); els.input.value = ""; syncUIFromCfg(); render(); }

  function wire() {
    els.input.value = localStorage.getItem(STORAGE_TEXT) || ""; setupDnD();
    els.btnImport.addEventListener("click", () => els.fileInput.click()); els.fileInput.addEventListener("change", (e) => handleFile(e.target.files?.[0]));
    els.profileSelect.addEventListener("change", () => { active = els.profileSelect.value; cfg = structuredClone(profiles[active] || defaultCfg()); localStorage.setItem(STORAGE_ACTIVE, active); syncUIFromCfg(); render(); });
    els.profileNew.addEventListener("click", () => { const name = prompt("Nom :", "Élève 1"); if (name) createProfile(name); });
    els.profileRename.addEventListener("click", () => { const name = prompt("Nouveau nom :", active); if (name) renameProfile(name); });
    els.profileDelete.addEventListener("click", () => { if (confirm("Supprimer " + active + " ?")) deleteProfile(); });
    els.presetApply.addEventListener("click", () => applyPreset(els.presetSelect.value));
    
    const bind = (el, key, isNum=false, isCheck=false) => { if (!el) return; el.addEventListener(isCheck || el.tagName==='SELECT' ? 'change' : 'input', () => { cfg[key] = isCheck ? el.checked : (isNum ? parseFloat(el.value) : el.value); if (key==='fontSize') els.valFontSize.textContent=cfg[key]; if (key==='lineHeight') els.valLineHeight.textContent=parseFloat(cfg[key]).toFixed(2); if (key==='wordSpacing') els.valWordSpacing.textContent=parseFloat(cfg[key]).toFixed(2); if (key==='letterSpacing') els.valLetterSpacing.textContent=parseFloat(cfg[key]).toFixed(2); if (key==='ttsRate') els.valTtsRate.textContent=parseFloat(cfg[key]).toFixed(1); if (key==='ttsPitch') els.valTtsPitch.textContent=parseFloat(cfg[key]).toFixed(1); persistCfg(); render(); }); };
    bind(els.fontFamily, 'fontFamily'); bind(els.fontSize, 'fontSize', true); bind(els.lineHeight, 'lineHeight', true); bind(els.wordSpacing, 'wordSpacing', true); bind(els.letterSpacing, 'letterSpacing', true);
    bind(els.ruler, 'ruler', false, true); bind(els.guidedMode, 'guidedMode'); bind(els.guidedWindow, 'guidedWindow', false, true); bind(els.syllableMode, 'syllableMode'); bind(els.sylA, 'sylColorA'); bind(els.sylB, 'sylColorB'); bind(els.confColor, 'confColor'); bind(els.ttsRate, 'ttsRate', true); bind(els.ttsPitch, 'ttsPitch', true); bind(els.ttsKaraoke, 'ttsKaraoke', false, true); bind(els.ttsReadSelection, 'ttsReadSelection', false, true);
    
    els.confChecks().forEach(chk => { chk.addEventListener("change", () => { const set = new Set(cfg.confusions || []); chk.checked ? set.add(chk.value) : set.delete(chk.value); cfg.confusions = Array.from(set); persistCfg(); render(); }); });
    els.bgChoices().forEach(btn => { btn.addEventListener("click", () => { cfg.paperBg = btn.dataset.bg; persistCfg(); syncUIFromCfg(); render(); }); });
    els.input.addEventListener("input", () => render());
    const navPrev = () => { guidedPrev(); }; const navNext = () => { guidedNext(); };
    els.guidedPrev.addEventListener("click", navPrev); els.guidedNext.addEventListener("click", navNext);
    els.guidedPrevTop.addEventListener("click", navPrev); els.guidedNextTop.addEventListener("click", navNext);
    els.ttsVoice.addEventListener("change", () => { if (voices[els.ttsVoice.value]) { cfg.ttsVoice = voices[els.ttsVoice.value].name; persistCfg(); } });
    els.ttsPlay.addEventListener("click", speak); els.ttsStop.addEventListener("click", stopSpeak); els.ttsPause.addEventListener("click", pauseSpeak); els.ttsResume.addEventListener("click", resumeSpeak);
    els.btnSpeak.addEventListener("click", speak); els.btnStopHeader.addEventListener("click", stopSpeak); els.btnPauseHeader.addEventListener("click", pauseSpeak); els.btnResumeHeader.addEventListener("click", resumeSpeak);
    els.btnPrint.addEventListener("click", () => window.print()); els.btnExport.addEventListener("click", exportConfig);
    els.btnImportCfg.addEventListener("click", () => els.cfgFile.click()); els.cfgFile.addEventListener("change", (e) => importConfigFromFile(e.target.files?.[0]));
    els.btnReset.addEventListener("click", resetAll);
  }

  window.addEventListener("DOMContentLoaded", () => { wire(); syncUIFromCfg(); render(); if (window.speechSynthesis) { window.speechSynthesis.onvoiceschanged = loadVoices; loadVoices(); } });
})();
</script>
</body>
</html>