<?php 
function ekit_menu_line_icon_options(){
$icon_list = array(
    'la la-500px',
    'la la-adjust',
    'la la-adn',
    'la la-align-center',
    'la la-align-justify',
    'la la-align-left',
    'la la-align-right',
    'la la-amazon',
    'la la-ambulance',
    'la la-anchor',
    'la la-android',
    'la la-angellist',
    'la la-angle-double-down',
    'la la-angle-double-left',
    'la la-angle-double-right',
    'la la-angle-double-up',
    'la la-angle-down',
    'la la-angle-left',
    'la la-angle-right',
    'la la-angle-up',
    'la la-apple',
    'la la-archive',
    'la la-area-chart',
    'la la-arrow-circle-down',
    'la la-arrow-circle-left',
    'la la-arrow-circle-o-down',
    'la la-arrow-circle-o-left',
    'la la-arrow-circle-o-right',
    'la la-arrow-circle-o-up',
    'la la-arrow-circle-right',
    'la la-arrow-circle-up',
    'la la-arrow-down',
    'la la-arrow-left',
    'la la-arrow-right',
    'la la-arrow-up',
    'la la-arrows',
    'la la-arrows-alt',
    'la la-arrows-h',
    'la la-arrows-v',
    'la la-asterisk',
    'la la-at',
    'la la-automobile',
    'la la-backward',
    'la la-balance-scale',
    'la la-ban',
    'la la-bank',
    'la la-bar-chart',
    'la la-bar-chart-o',
    'la la-barcode',
    'la la-bars',
    'la la-battery-0',
    'la la-battery-1',
    'la la-battery-2',
    'la la-battery-3',
    'la la-battery-4',
    'la la-battery-empty',
    'la la-battery-full',
    'la la-battery-half',
    'la la-battery-quarter',
    'la la-battery-three-quarters',
    'la la-bed',
    'la la-beer',
    'la la-behance',
    'la la-behance-square',
    'la la-bell',
    'la la-bell-o',
    'la la-bell-slash',
    'la la-bell-slash-o',
    'la la-bicycle',
    'la la-binoculars',
    'la la-birthday-cake',
    'la la-bitbucket',
    'la la-bitbucket-square',
    'la la-bitcoin',
    'la la-black-tie',
    'la la-bold',
    'la la-bolt',
    'la la-bomb',
    'la la-book',
    'la la-bookmark',
    'la la-bookmark-o',
    'la la-briefcase',
    'la la-btc',
    'la la-bug',
    'la la-building',
    'la la-building-o',
    'la la-bullhorn',
    'la la-bullseye',
    'la la-bus',
    'la la-buysellads',
    'la la-cab',
    'la la-calculator',
    'la la-calendar',
    'la la-calendar-check-o',
    'la la-calendar-minus-o',
    'la la-calendar-o',
    'la la-calendar-plus-o',
    'la la-calendar-times-o',
    'la la-camera',
    'la la-camera-retro',
    'la la-car',
    'la la-caret-down',
    'la la-caret-left',
    'la la-caret-right',
    'la la-caret-up',
    'la la-cart-arrow-down',
    'la la-cart-plus',
    'la la-cc',
    'la la-cc-amex',
    'la la-cc-diners-club',
    'la la-cc-discover',
    'la la-cc-jcb',
    'la la-cc-mastercard',
    'la la-cc-paypal',
    'la la-cc-stripe',
    'la la-cc-visa',
    'la la-certificate',
    'la la-chain',
    'la la-chain-broken',
    'la la-check',
    'la la-check-circle',
    'la la-check-circle-o',
    'la la-check-square',
    'la la-check-square-o',
    'la la-chevron-circle-down',
    'la la-chevron-circle-left',
    'la la-chevron-circle-right',
    'la la-chevron-circle-up',
    'la la-chevron-down',
    'la la-chevron-left',
    'la la-chevron-right',
    'la la-chevron-up',
    'la la-child',
    'la la-chrome',
    'la la-circle',
    'la la-circle-o',
    'la la-circle-o-notch',
    'la la-circle-thin',
    'la la-clipboard',
    'la la-clock-o',
    'la la-clone',
    'la la-close',
    'la la-cloud',
    'la la-cloud-download',
    'la la-cloud-upload',
    'la la-cny',
    'la la-code',
    'la la-code-fork',
    'la la-codepen',
    'la la-coffee',
    'la la-cog',
    'la la-cogs',
    'la la-columns',
    'la la-comment',
    'la la-comment-o',
    'la la-commenting',
    'la la-commenting-o',
    'la la-comments',
    'la la-comments-o',
    'la la-compass',
    'la la-compress',
    'la la-connectdevelop',
    'la la-contao',
    'la la-copy',
    'la la-copyright',
    'la la-creative-commons',
    'la la-credit-card',
    'la la-crop',
    'la la-crosshairs',
    'la la-css3',
    'la la-cube',
    'la la-cubes',
    'la la-cut',
    'la la-cutlery',
    'la la-dashboard',
    'la la-dashcube',
    'la la-database',
    'la la-dedent',
    'la la-delicious',
    'la la-desktop',
    'la la-deviantart',
    'la la-diamond',
    'la la-digg',
    'la la-dollar',
    'la la-dot-circle-o',
    'la la-download',
    'la la-dribbble',
    'la la-dropbox',
    'la la-drupal',
    'la la-edit',
    'la la-eject',
    'la la-ellipsis-h',
    'la la-ellipsis-v',
    'la la-envelope',
    'la la-envelope-o',
    'la la-envelope-square',
    'la la-eraser',
    'la la-eur',
    'la la-euro',
    'la la-exchange',
    'la la-exclamation',
    'la la-exclamation-circle',
    'la la-exclamation-triangle',
    'la la-expand',
    'la la-expeditedssl',
    'la la-external-link',
    'la la-external-link-square',
    'la la-eye',
    'la la-eye-slash',
    'la la-eyedropper',
    'la la-facebook-official',
    'la la-facebook-square',
    'la la-fast-backward',
    'la la-fast-forward',
    'la la-fax',
    'la la-female',
    'la la-fighter-jet',
    'la la-file',
    'la la-file-archive-o',
    'la la-file-audio-o',
    'la la-file-code-o',
    'la la-file-excel-o',
    'la la-file-image-o',
    'la la-file-movie-o',
    'la la-file-o',
    'la la-file-pdf-o',
    'la la-file-photo-o',
    'la la-file-picture-o',
    'la la-file-powerpoint-o',
    'la la-file-sound-o',
    'la la-file-text',
    'la la-file-text-o',
    'la la-file-video-o',
    'la la-file-word-o',
    'la la-file-zip-o',
    'la la-files-o',
    'la la-film',
    'la la-filter',
    'la la-fire',
    'la la-fire-extinguisher',
    'la la-firefox',
    'la la-flag',
    'la la-flag-checkered',
    'la la-flag-o',
    'la la-flash',
    'la la-flask',
    'la la-flickr',
    'la la-floppy-o',
    'la la-folder',
    'la la-folder-o',
    'la la-folder-open',
    'la la-folder-open-o',
    'la la-font',
    'la la-fonticons',
    'la la-forumbee',
    'la la-forward',
    'la la-foursquare',
    'la la-frown-o',
    'la la-gamepad',
    'la la-gavel',
    'la la-gbp',
    'la la-gear',
    'la la-gears',
    'la la-genderless',
    'la la-get-pocket',
    'la la-gg',
    'la la-gg-circle',
    'la la-gift',
    'la la-git',
    'la la-git-square',
    'la la-github',
    'la la-github-alt',
    'la la-github-square',
    'la la-glass',
    'la la-globe',
    'la la-google',
    'la la-google-plus',
    'la la-google-plus-square',
    'la la-google-wallet',
    'la la-graduation-cap',
    'la la-group',
    'la la-h-square',
    'la la-hacker-news',
    'la la-hand-grab-o',
    'la la-hand-lizard-o',
    'la la-hand-o-down',
    'la la-hand-o-left',
    'la la-hand-o-right',
    'la la-hand-o-up',
    'la la-hand-paper-o',
    'la la-hand-peace-o',
    'la la-hand-pointer-o',
    'la la-hand-rock-o',
    'la la-hand-scissors-o',
    'la la-hand-spock-o',
    'la la-hand-stop-o',
    'la la-hdd-o',
    'la la-header',
    'la la-headphones',
    'la la-heart',
    'la la-heart-o',
    'la la-heartbeat',
    'la la-history',
    'la la-home',
    'la la-hospital-o',
    'la la-hotel',
    'la la-hourglass',
    'la la-hourglass-1',
    'la la-hourglass-2',
    'la la-hourglass-3',
    'la la-hourglass-end',
    'la la-hourglass-half',
    'la la-hourglass-o',
    'la la-hourglass-start',
    'la la-houzz',
    'la la-html5',
    'la la-i-cursor',
    'la la-ils',
    'la la-image',
    'la la-inbox',
    'la la-indent',
    'la la-industry',
    'la la-info',
    'la la-info-circle',
    'la la-inr',
    'la la-instagram',
    'la la-institution',
    'la la-internet-explorer',
    'la la-ioxhost',
    'la la-italic',
    'la la-joomla',
    'la la-jpy',
    'la la-jsfiddle',
    'la la-key',
    'la la-keyboard-o',
    'la la-krw',
    'la la-language',
    'la la-laptop',
    'la la-lastfm',
    'la la-lastfm-square',
    'la la-leaf',
    'la la-leanpub',
    'la la-legal',
    'la la-lemon-o',
    'la la-level-down',
    'la la-level-up',
    'la la-life-bouy',
    'la la-life-buoy',
    'la la-life-saver',
    'la la-lightbulb-o',
    'la la-line-chart',
    'la la-link',
    'la la-linkedin',
    'la la-linkedin-square',
    'la la-linux',
    'la la-list',
    'la la-list-alt',
    'la la-list-ol',
    'la la-list-ul',
    'la la-location-arrow',
    'la la-lock',
    'la la-long-arrow-down',
    'la la-long-arrow-left',
    'la la-long-arrow-right',
    'la la-long-arrow-up',
    'la la-magic',
    'la la-magnet',
    'la la-mail-forward',
    'la la-mail-reply',
    'la la-mail-reply-all',
    'la la-male',
    'la la-map',
    'la la-map-marker',
    'la la-map-o',
    'la la-map-pin',
    'la la-map-signs',
    'la la-mars',
    'la la-mars-double',
    'la la-mars-stroke',
    'la la-mars-stroke-h',
    'la la-mars-stroke-v',
    'la la-maxcdn',
    'la la-meanpath',
    'la la-medium',
    'la la-medkit',
    'la la-meh-o',
    'la la-mercury',
    'la la-microphone',
    'la la-microphone-slash',
    'la la-minus',
    'la la-minus-circle',
    'la la-minus-square',
    'la la-minus-square-o',
    'la la-mobile',
    'la la-mobile-phone',
    'la la-money',
    'la la-moon-o',
    'la la-mortar-board',
    'la la-motorcycle',
    'la la-mouse-pointer',
    'la la-music',
    'la la-navicon',
    'la la-neuter',
    'la la-newspaper-o',
    'la la-object-group',
    'la la-object-ungroup',
    'la la-odnoklassniki',
    'la la-odnoklassniki-square',
    'la la-opencart',
    'la la-openid',
    'la la-opera',
    'la la-optin-monster',
    'la la-outdent',
    'la la-pagelines',
    'la la-paint-brush',
    'la la-paperclip',
    'la la-paragraph',
    'la la-paste',
    'la la-pause',
    'la la-paw',
    'la la-paypal',
    'la la-pencil',
    'la la-pencil-square',
    'la la-pencil-square-o',
    'la la-phone',
    'la la-phone-square',
    'la la-photo',
    'la la-picture-o',
    'la la-pie-chart',
    'la la-pied-piper',
    'la la-pied-piper-alt',
    'la la-pinterest',
    'la la-pinterest-p',
    'la la-pinterest-square',
    'la la-plane',
    'la la-play',
    'la la-play-circle',
    'la la-play-circle-o',
    'la la-plug',
    'la la-plus',
    'la la-plus-circle',
    'la la-plus-square',
    'la la-plus-square-o',
    'la la-power-off',
    'la la-print',
    'la la-puzzle-piece',
    'la la-qq',
    'la la-qrcode',
    'la la-question',
    'la la-question-circle',
    'la la-quote-left',
    'la la-quote-right',
    'la la-ra',
    'la la-random',
    'la la-rebel',
    'la la-recycle',
    'la la-reddit',
    'la la-reddit-square',
    'la la-refresh',
    'la la-registered',
    'la la-renren',
    'la la-reorder',
    'la la-repeat',
    'la la-reply',
    'la la-reply-all',
    'la la-retweet',
    'la la-rmb',
    'la la-road',
    'la la-rocket',
    'la la-rotate-left',
    'la la-rotate-right',
    'la la-rouble',
    'la la-rss-square',
    'la la-rub',
    'la la-ruble',
    'la la-rupee',
    'la la-safari',
    'la la-save',
    'la la-scissors',
    'la la-search',
    'la la-search-minus',
    'la la-search-plus',
    'la la-sellsy',
    'la la-server',
    'la la-share',
    'la la-share-alt',
    'la la-share-alt-square',
    'la la-share-square',
    'la la-share-square-o',
    'la la-shekel',
    'la la-sheqel',
    'la la-shield',
    'la la-ship',
    'la la-shirtsinbulk',
    'la la-shopping-cart',
    'la la-sign-in',
    'la la-sign-out',
    'la la-signal',
    'la la-simplybuilt',
    'la la-sitemap',
    'la la-skyatlas',
    'la la-skype',
    'la la-slack',
    'la la-sliders',
    'la la-slideshare',
    'la la-smile-o',
    'la la-sort-alpha-asc',
    'la la-sort-alpha-desc',
    'la la-sort-amount-asc',
    'la la-sort-amount-desc',
    'la la-sort-numeric-asc',
    'la la-sort-numeric-desc',
    'la la-soundcloud',
    'la la-space-shuttle',
    'la la-spinner',
    'la la-spoon',
    'la la-spotify',
    'la la-square',
    'la la-square-o',
    'la la-stack-exchange',
    'la la-stack-overflow',
    'la la-star',
    'la la-star-half',
    'la la-star-o',
    'la la-steam',
    'la la-steam-square',
    'la la-step-backward',
    'la la-step-forward',
    'la la-stethoscope',
    'la la-sticky-note',
    'la la-sticky-note-o',
    'la la-stop',
    'la la-street-view',
    'la la-strikethrough',
    'la la-stumbleupon',
    'la la-stumbleupon-circle',
    'la la-subscript',
    'la la-subway',
    'la la-suitcase',
    'la la-sun-o',
    'la la-superscript',
    'la la-table',
    'la la-tablet',
    'la la-tachometer',
    'la la-tag',
    'la la-tags',
    'la la-tasks',
    'la la-taxi',
    'la la-tencent-weibo',
    'la la-terminal',
    'la la-text-height',
    'la la-text-width',
    'la la-th',
    'la la-th-large',
    'la la-th-list',
    'la la-thumb-tack',
    'la la-thumbs-down',
    'la la-thumbs-o-down',
    'la la-thumbs-o-up',
    'la la-thumbs-up',
    'la la-ticket',
    'la la-times-circle',
    'la la-times-circle-o',
    'la la-tint',
    'la la-toggle-off',
    'la la-toggle-on',
    'la la-trademark',
    'la la-train',
    'la la-transgender-alt',
    'la la-trash',
    'la la-trash-o',
    'la la-tree',
    'la la-trello',
    'la la-tripadvisor',
    'la la-trophy',
    'la la-truck',
    'la la-try',
    'la la-tty',
    'la la-tumblr',
    'la la-tumblr-square',
    'la la-turkish-lira',
    'la la-twitch',
    'la la-twitter',
    'la la-twitter-square',
    'la la-umbrella',
    'la la-underline',
    'la la-undo',
    'la la-university',
    'la la-unlink',
    'la la-unlock',
    'la la-unlock-alt',
    'la la-upload',
    'la la-usd',
    'la la-user',
    'la la-user-md',
    'la la-user-plus',
    'la la-user-secret',
    'la la-user-times',
    'la la-users',
    'la la-venus',
    'la la-venus-double',
    'la la-venus-mars',
    'la la-viacoin',
    'la la-video-camera',
    'la la-vimeo',
    'la la-vimeo-square',
    'la la-vine',
    'la la-vk',
    'la la-volume-down',
    'la la-volume-off',
    'la la-volume-up',
    'la la-warning',
    'la la-wechat',
    'la la-weibo',
    'la la-weixin',
    'la la-whatsapp',
    'la la-wheelchair',
    'la la-wifi',
    'la la-wikipedia-w',
    'la la-windows',
    'la la-won',
    'la la-wordpress',
    'la la-wrench',
    'la la-xing',
    'la la-xing-square',
    'la la-y-combinator',
    'la la-y-combinator-square',
    'la la-yahoo',
    'la la-yc',
    'la la-yc-square',
    'la la-yelp',
    'la la-yen',
    'la la-youtube',
    'la la-youtube-play',
    'la la-youtube-square',
    
    'la la-caret-square-o-down',
    'la la-caret-square-o-left',
    'la la-caret-square-o-right',
    'la la-caret-square-o-up',
    'la la-empire',
    'la la-facebook',
    'la la-futbol-o',
    'la la-gratipay',
    'la la-life-ring',
    'la la-paper-plane',
    'la la-paper-plane-o',
    'la la-rss',
    'la la-sort',
    'la la-sort-asc',
    'la la-sort-desc',
    'la la-star-half-o',
    'la la-television',
    'la la-times',
    'la la-transgender',

'icon icon-add',
'icon icon-arrow-left1',
'icon icon-arrow-right1',
'icon icon-desert',
'icon icon-drinks',
'icon icon-fastfood',
'icon icon-fire',
'icon icon-home3',
'icon icon-kids',
'icon icon-paly-button-1',
'icon icon-paly-button-2',
'icon icon-recepies',
'icon icon-search2',
'icon icon-weather',
'icon icon-home',
'icon icon-apartment',
'icon icon-pencil',
'icon icon-magic-wand',
'icon icon-drop',
'icon icon-lighter',
'icon icon-poop',
'icon icon-sun',
'icon icon-moon',
'icon icon-cloud',
'icon icon-cloud-upload',
'icon icon-cloud-download',
'icon icon-cloud-sync',
'icon icon-cloud-check',
'icon icon-database',
'icon icon-lock',
'icon icon-cog',
'icon icon-trash',
'icon icon-dice',
'icon icon-heart',
'icon icon-star',
'icon icon-star-half',
'icon icon-star-empty',
'icon icon-flag',
'icon icon-envelope',
'icon icon-paperclip',
'icon icon-inbox',
'icon icon-eye',
'icon icon-printer',
'icon icon-file-empty',
'icon icon-file-add',
'icon icon-enter',
'icon icon-exit',
'icon icon-graduation-hat',
'icon icon-license',
'icon icon-music-note',
'icon icon-film-play',
'icon icon-camera-video',
'icon icon-camera',
'icon icon-picture',
'icon icon-book',
'icon icon-bookmark',
'icon icon-user',
'icon icon-users',
'icon icon-shirt',
'icon icon-store',
'icon icon-cart',
'icon icon-tag',
'icon icon-phone-handset',
'icon icon-phone',
'icon icon-pushpin',
'icon icon-map-marker',
'icon icon-map',
'icon icon-location',
'icon icon-calendar-full',
'icon icon-keyboard',
'icon icon-spell-check',
'icon icon-screen',
'icon icon-smartphone',
'icon icon-tablet',
'icon icon-laptop',
'icon icon-laptop-phone',
'icon icon-power-switch',
'icon icon-bubble',
'icon icon-heart-pulse',
'icon icon-construction',
'icon icon-pie-chart',
'icon icon-chart-bars',
'icon icon-gift',
'icon icon-diamond',
'icon icon-dinner',
'icon icon-coffee-cup',
'icon icon-leaf',
'icon icon-paw',
'icon icon-rocket',
'icon icon-briefcase',
'icon icon-bus',
'icon icon-car',
'icon icon-train',
'icon icon-bicycle',
'icon icon-wheelchair',
'icon icon-select',
'icon icon-earth',
'icon icon-smile',
'icon icon-sad',
'icon icon-neutral',
'icon icon-mustache',
'icon icon-alarm',
'icon icon-bullhorn',
'icon icon-volume-high',
'icon icon-volume-medium',
'icon icon-volume-low',
'icon icon-volume',
'icon icon-mic',
'icon icon-hourglass',
'icon icon-undo',
'icon icon-redo',
'icon icon-sync',
'icon icon-history',
'icon icon-clock',
'icon icon-download',
'icon icon-upload',
'icon icon-enter-down',
'icon icon-exit-up',
'icon icon-bug',
'icon icon-code',
'icon icon-link',
'icon icon-unlink',
'icon icon-thumbs-up',
'icon icon-thumbs-down',
'icon icon-magnifier',
'icon icon-cross',
'icon icon-menu',
'icon icon-list',
'icon icon-chevron-up',
'icon icon-chevron-down',
'icon icon-chevron-left',
'icon icon-chevron-right',
'icon icon-arrow-up',
'icon icon-arrow-down',
'icon icon-arrow-left',
'icon icon-arrow-right',
'icon icon-move',
'icon icon-warning',
'icon icon-question-circle',
'icon icon-menu-circle',
'icon icon-checkmark-circle',
'icon icon-cross-circle',
'icon icon-plus-circle',
'icon icon-circle-minus',
'icon icon-arrow-up-circle',
'icon icon-arrow-down-circle',
'icon icon-arrow-left-circle',
'icon icon-arrow-right-circle',
'icon icon-chevron-up-circle',
'icon icon-chevron-down-circle',
'icon icon-chevron-left-circle',
'icon icon-chevron-right-circle',
'icon icon-crop',
'icon icon-frame-expand',
'icon icon-frame-contract',
'icon icon-layers',
'icon icon-funnel',
'icon icon-text-format',
'icon icon-text-size',
'icon icon-bold',
'icon icon-italic',
'icon icon-underline',
'icon icon-strikethrough',
'icon icon-highlight',
'icon icon-text-align-left',
'icon icon-text-align-center',
'icon icon-text-align-right',
'icon icon-text-align-justify',
'icon icon-line-spacing',
'icon icon-indent-increase',
'icon icon-indent-decrease',
'icon icon-page-break',
'icon icon-hand',
'icon icon-pointer-up',
'icon icon-pointer-right',
'icon icon-pointer-down',
'icon icon-pointer-left',
'icon icon-air_conditioning',
'icon icon-bag',
'icon icon-brake',
'icon icon-car_1',
'icon icon-car_2',
'icon icon-cheackmark',
'icon icon-client',
'icon icon-comment',
'icon icon-computer',
'icon icon-customer',
'icon icon-download1',
'icon icon-engine',
'icon icon-fast',
'icon icon-folder',
'icon icon-history1',
'icon icon-mechanic',
'icon icon-mission',
'icon icon-objective',
'icon icon-oil',
'icon icon-percentage',
'icon icon-performance',
'icon icon-play',
'icon icon-price',
'icon icon-pricetag',
'icon icon-repair',
'icon icon-request_quote',
'icon icon-solution',
'icon icon-star1',
'icon icon-steering',
'icon icon-tag1',
'icon icon-building',
'icon icon-cycle',
'icon icon-food',
'icon icon-fun',
'icon icon-hotel',
'icon icon-marketing',
'icon icon-Monetizing',
'icon icon-netwrorking',
'icon icon-people',
'icon icon-planning',
'icon icon-pricing1Asset1',
'icon icon-pricing2Asset2',
'icon icon-pricing3Asset3',
'icon icon-ring1Asset1',
'icon icon-ring2Asset1',
'icon icon-vplay',
'icon icon-newsletter',
'icon icon-coins-2',
'icon icon-commerce-2',
'icon icon-monitor',
'icon icon-facebook',
'icon icon-business',
'icon icon-graphic-2',
'icon icon-commerce-1',
'icon icon-like',
'icon icon-home1',
'icon icon-phone-call',
'icon icon-contact',
'icon icon-comments',
'icon icon-cloud-computing',
'icon icon-care',
'icon icon-coin',
'icon icon-donation',
'icon icon-donation_2',
'icon icon-heart1',
'icon icon-dove',
'icon icon-drop1',
'icon icon-first-aid-kit',
'icon icon-groceries',
'icon icon-heartbeat',
'icon icon-left-arrow',
'icon icon-newspaper',
'icon icon-open-book',
'icon icon-down-arrow',
'icon icon-planet-earth',
'icon icon-plus-button',
'icon icon-poor-water-supply',
'icon icon-tap-water',
'icon icon-support',
'icon icon-sweater',
'icon icon-doctor',
'icon icon-team',
'icon icon-group',
'icon icon-family',
'icon icon-children',
'icon icon-team_2',
'icon icon-telemarketer',
'icon icon-water',
'icon icon-twitter',
'icon icon-twitter1',
'icon icon-linkedin',
'icon icon-youtube',
'icon icon-dribbble',
'icon icon-pinterest',
'icon icon-vimeo',
'icon icon-soundcloud',
'icon icon-youtube-v',
'icon icon-behance',
'icon icon-google-plus',
'icon icon-instagram',
'icon icon-hammer',
'icon icon-justice-1',
'icon icon-double-left-chevron',
'icon icon-double-angle-pointing-to-right',
'icon icon-arrow-point-to-down',
'icon icon-play-button',
'icon icon-minus',
'icon icon-plus',
'icon icon-tick',
'icon icon-download-arrow',
'icon icon-edit',
'icon icon-reply',
'icon icon-cogwheel-outline',
'icon icon-symbol',
'icon icon-calendar',
'icon icon-shopping-cart',
'icon icon-shopping-basket',
'icon icon-users1',
'icon icon-man',
'icon icon-support1',
'icon icon-favorites',
'icon icon-calendar1',
'icon icon-paper-plane',
'icon icon-placeholder',
'icon icon-phone-call1',
'icon icon-contact1',
'icon icon-email',
'icon icon-internet',
'icon icon-quote',
'icon icon-line',
'icon icon-money-3',
'icon icon-commerce',
'icon icon-tools',
'icon icon-pie-chart1',
'icon icon-diamond1',
'icon icon-agenda',
'icon icon-like1',
'icon icon-justice',
'icon icon-technology',
'icon icon-coins-1',
'icon icon-left-arrow1',
'icon icon-bank',
'icon icon-calculator',
'icon icon-chart2',
'icon icon-map-marker1',
'icon icon-mutual-fund',
'icon icon-phone1',
'icon icon-pie-chart2',
'icon icon-play1',
'icon icon-savings',
'icon icon-search',
'icon icon-tag2',
'icon icon-tags',
'icon icon-loan',
'icon icon-checked',
'icon icon-clock1',
'icon icon-comment1',
'icon icon-comments1',
'icon icon-consult',
'icon icon-consut2',
'icon icon-envelope1',
'icon icon-folder1',
'icon icon-invest',
'icon icon-right-arrow2',
'icon icon-quote1',
'icon icon-deal',
'icon icon-left-arrow2',
'icon icon-team1',
'icon icon-tshirt',
'icon icon-cancel',
'icon icon-drink',
'icon icon-home2',
'icon icon-music',
'icon icon-rich',
'icon icon-brush',
'icon icon-opposite-way',
'icon icon-cloud-computing1',
'icon icon-technology-1',
'icon icon-rotate',
'icon icon-medical',
'icon icon-flash-1',
'icon icon-flash',
'icon icon-down-arrow1',
'icon icon-hours-support',
'icon icon-bag1',
'icon icon-photo-camera',
'icon icon-search-minus',
'icon icon-search1',
'icon icon-down-arrow2',
'icon icon-up-arrow',
'icon icon-right-arrow',
'icon icon-left-arrows',
'icon icon-school',
'icon icon-settings',
'icon icon-smartphone1',
'icon icon-technology-11',
'icon icon-tool',
'icon icon-business1',
'icon icon-van-1',
'icon icon-van',
'icon icon-vegetables',
'icon icon-women',
'icon icon-vintage',
'icon icon-up-arrow1',
'icon icon-arrows',
'icon icon-team2',
'icon icon-team-1',
'icon icon-medal',
'icon icon-uturn',
'icon icon-apple-1',
'icon icon-apple',
'icon icon-light-bulb',
'icon icon-light-bulb-1',
'icon icon-cogwheel',
'icon icon-watch',
'icon icon-star2',
'icon icon-star-1',
'icon icon-favorite',
'icon icon-medical1',
'icon icon-eye1',
'icon icon-full-screen',
'icon icon-shuffle-arrow',
'icon icon-online-shopping-cart',
'icon icon-shopping-cart1',
'icon icon-heart-shape-outline',
'icon icon-ring3Asset2',
'icon icon-ring4Asset3',
'icon icon-speaker',

);

    foreach($icon_list as $icon_class){
        echo "<option value='$icon_class'></option>";
    }
}
